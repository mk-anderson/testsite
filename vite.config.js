import { defineConfig } from 'vite'
import { resolve } from 'path'

export default defineConfig(({ mode }) => ({
  root: '.',
  base: mode === 'development'
    ? '/' 
    : '/wp-content/themes/mytheme/dist/',
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'assets/js/main.js'),
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
    hmr: {
      host: 'localhost',
      port: 5173,
      protocol: 'ws', // Localがhttpsでもwsで動くことが多い。ダメなら 'wss'
    },
  },
}))
