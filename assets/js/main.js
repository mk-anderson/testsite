import '../scss/main.scss'

document.documentElement.classList.add('js')

// assets/js/main.js
const { __, _x } = window.wp.i18n; // ← これで十分（グローバルを使う）

document.addEventListener('DOMContentLoaded', () => {
  console.log( __('Read more', 'testtheme') );
});


//ハンバーガーメニューのjs
document.addEventListener('DOMContentLoaded', function () {
  var btn = document.querySelector('.hamburger');
  var menu = document.querySelector('#gmenu'); // wp_nav_menu で付与される id

  if (!btn || !menu) return;

  btn.addEventListener('click', function () {
    var isOpen = menu.classList.toggle('open');
    btn.setAttribute('aria-expanded', String(isOpen));
  });
});
