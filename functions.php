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
    wp_enqueue_script('theme-main', 'http://localhost:5173/assets/js/main.js', ['wp-i18n'], null, true);
    wp_script_add_data('theme-main', 'type', 'module');  // ★これが重要

    // ★ ここで翻訳をひも付け
    wp_set_script_translations(
      'theme-main',                  // ↑のハンドル名と一致
      'testtheme',                   // テキストドメイン
      get_stylesheet_directory() . '/languages' // languages ディレクトリ
    );

  } else {
    $manifest_path = get_stylesheet_directory() . '/dist/manifest.json';
    if ( file_exists($manifest_path) ) {
      $manifest = json_decode(file_get_contents($manifest_path), true);
      $entry = $manifest['assets/js/main.js'] ?? null;

      if ($entry) {
        if (!empty($entry['css'])) {
          foreach ($entry['css'] as $i => $css) {
            wp_enqueue_style('theme-main' . ($i ?: ''), mytheme_asset_url($css), [], null);
          }
        }
        if (!empty($entry['file'])) {
          wp_enqueue_script('theme-main', mytheme_asset_url($entry['file']), ['wp-i18n'], null, true);
          wp_script_add_data('theme-main', 'type', 'module');

          // ★ 本番側にも必ず付ける
          wp_set_script_translations(
            'theme-main',
            'testtheme',
            //mytheme_asset_url() . '/languages'
            get_stylesheet_directory() . '/languages'
          );
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

// googleフォント追加
function add_google_fonts() {
  wp_enqueue_style( 'sawarabi', "https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap");
	wp_enqueue_style( 'barlow-condensed', "https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@800&display=swap"  );
	wp_enqueue_style( 'noto-serif-jp', "https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@700&display=swap"  );
	wp_enqueue_style( 'notosans', "https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap"  );
  }
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

// カスタム投稿タイプ追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
// 「ニュース」のカスタム投稿追加
  register_post_type(
    'news',
    array(
        'labels' => array(
            'name' => 'お知らせ',
            'singular_name' => 'お知らせ'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
        'menu_position' => 5,
        'show_in_rest' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
        ),
        'taxonomies' => array('category', 'news-tag'),
    )
);
}