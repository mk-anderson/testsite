import { defineConfig } from 'vite'
import { resolve } from 'path'
import FullReload from 'vite-plugin-full-reload'

export default defineConfig(({ mode }) => ({
  root: '.',
  base: mode === 'development'
    ? '/' 
    : '/wp-content/themes/testtheme/dist/',
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        //main: resolve(__dirname, 'assets/js/main.js'),
        main: resolve(process.cwd(), 'assets/js/main.js'),
      },
    },
  },
  server: {
    port: 5173,
    strictPort: true,
    // HTTPSのLocalと合わせたい場合は下記コメントアウトを活用（mkcert等で証明書発行）
    // https: {
    //   key: fs.readFileSync('/path/to/localhost-key.pem'),
    //   cert: fs.readFileSync('/path/to/localhost.pem'),
    // },
    cors: true, // ← CORS有効化（デフォルトtrueだが明示）
    headers: {
      // ← 304でも確実に付与されるように明示
      'Access-Control-Allow-Origin': '*',
      'Access-Control-Allow-Methods': 'GET,OPTIONS',
      'Access-Control-Allow-Headers': '*',
      // 念のためキャッシュ弱めに（304回避）
      'Cache-Control': 'no-store'
    },
    hmr: {
      host: 'localhost',
      port: 5173,
      protocol: 'ws', // Localがhttpsでもwsで動くことが多い。ダメなら 'wss'
    },
    // originを明示するとimport解析時のURL生成が安定
    origin: 'http://localhost:5173',
  },
  plugins: [
    // テーマ配下のPHPを監視してフルリロード
     FullReload([
      'index.php',
      'header.php',
      'footer.php',
      'functions.php',
      'front-page.php',
      'page-*.php',
      'single-*.php',
      'archive-*.php',
      'template-parts/**///*.php',
    ]),
  ], 
}))
