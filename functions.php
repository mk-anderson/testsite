<?php
function mytheme_is_dev() {
  return defined('WP_DEBUG') && WP_DEBUG;
}

function mytheme_asset_url($path) {
  return get_stylesheet_directory_uri() . '/dist/' . ltrim($path, '/');
}

add_action('wp_enqueue_scripts', function () {
  //if ( mytheme_is_dev() ) {
  // WP_DEBUG が true なら dev と見なす運用
  if ( defined('WP_DEBUG') && WP_DEBUG ) {
    // LocalのURLが https の場合、必要に応じて Vite を https/wss に合わせる
    wp_enqueue_script('vite-client', 'http://localhost:5173/@vite/client', [], null, true);
    wp_script_add_data('vite-client', 'type', 'module'); // ★これが重要
    wp_enqueue_script('theme-main', 'http://localhost:5173/assets/js/main.js', [], null, true);
    wp_script_add_data('theme-main', 'type', 'module');  // ★これが重要
  } else {
    $manifest_path = get_stylesheet_directory() . '/dist/manifest.json';
    if ( file_exists($manifest_path) ) {
      $manifest = json_decode(file_get_contents($manifest_path), true);
      $entry = $manifest['assets/js/main.js'] ?? null;

      if ($entry) {
        if (!empty($entry['css'])) {
          foreach ($entry['css'] as $css) {
            wp_enqueue_style('theme-main', mytheme_asset_url($css), [], null);
          }
        }
        if (!empty($entry['file'])) {
          wp_enqueue_script('theme-main', mytheme_asset_url($entry['file']), [], null, true);
        }
      }
    }
  }
}, 20);

add_filter('script_loader_tag', function ($tag, $handle) {
  if (in_array($handle, ['vite-client', 'theme-main'], true)) {
    $tag = str_replace('<script ', '<script type="module" ', $tag);
  }
  return $tag;
}, 9999, 2); // ← 高優先度で確実に上書き