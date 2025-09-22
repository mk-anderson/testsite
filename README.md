# testsite
testsite by wordpress

# HamadxHP
HamadxHP's Source Code

# 企業サイト（WordPress + Vite + FLOCSS）

## プロジェクト概要
- WordPressテーマをViteでバンドル
- スタイリングはSCSS（FLOCSS準拠）
- 開発環境は Local by Flywheel を使用

## 要件定義 / 仕様
### ページ構成
- トップ
- 企業案内
- 拠点
- お知らせ
- お問い合わせ

### 機能要件
- お知らせ一覧 / 詳細
- 拠点一覧 / 詳細
- お問い合わせフォーム（バリデーション）

### 非機能要件
- 表示速度：LCP < 2.5s
- SEO：meta設定、構造化データ
- アクセスビリティ確保

# CSS命名規則（FLOCSS準拠）

## レイヤープレフィックス
- `l-` Layout：ページ全体の骨組み（ヘッダー/フッター/グリッド）
- `c-` Component：再利用可能な小さな部品（ボタン、タグ、フォーム部品）
- `p-` Project：ページ/セクション固有の塊（Hero、NewsList、Offices）
- `u-` Utility：単機能ユーティリティ（`u-mt16`, `u-text-center`）
- `is-` / `has-`：状態（`is-active`, `has-error`）
- `js-`：JSフック用（スタイルは**当てない**）
- `qa-`：E2E等のテストフック（任意）
- 例：
  - コンポーネント：`c-card`, `c-card__title`, `c-card--featured`
  - プロジェクト：`p-news-list`, `p-news-list__item`
  - レイアウト：`l-container`, `l-header`
  - 状態：`is-active`, `has-error`
  - ユーティリティ：`u-mb16`, `u-text-center`
- SCSS構成：`foundation/`, `layout/`, `object/{component,project,utility}`

## BEM記法
- 要素：`__`、修飾：`--`
- 例）`c-button` / `c-button--primary` / `c-card__title`

## 例
```html
<section class="p-news-list is-loaded">
  <h2 class="c-card__title">タイトル</h2>
  <button class="c-button c-button--primary js-open-menu">送信</button>
</section>
```

## 開発環境構築

1.Local で WP サイト（例：http://testsite.local/）を起動

2.テーマ testtheme を配置して有効化、wp-config.php で WP_DEBUG を true

3.WP 6.x、PHP 8.1+、Node 18+、Vite、SCSS(FLOCSS) を用意

4.テーマ直下で：

```
git clone ...
npm install
npm run start   # Vite起動 + WP URL自動オープン
```

5.（必要なら）PHP変更の自動リロード：vite-plugin-full-reload を導入

6.トラブル時は FAQ を参照（CORS / type="module" / ポート / HTTPS など）

```bash
git clone ...
npm install
npm run start
