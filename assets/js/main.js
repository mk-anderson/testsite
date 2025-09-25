import '../scss/main.scss'

document.documentElement.classList.add('js')

// assets/js/main.js
const { __, _x } = window.wp.i18n; // ← これで十分（グローバルを使う）

document.addEventListener('DOMContentLoaded', () => {
  console.log( __('Read more', 'testtheme') );
});
