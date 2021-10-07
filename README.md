# Prototype

WordPressテーマ「Prototype」は、WordPressを使ったウェブサイトのスクラッチ制作・開発のために最適化されたテーマです。HTMLの構造化、マークアップは最小限コーディングされており、CSSによるスタイリングやスクリプトを使った動的な表現はありませんが、WordPressで使えるさまざまな機能や各種テンプレートファイルが最初から組み込まれていますので、すでに完成している静的ページと組み合わせるだけで簡単にWordPressサイトを作成できます。余計な装飾やマークアップがありませんので、スムーズな制作を実現し、工数の圧縮が期待できます。



## Features

WordPressテーマ「Prototype」で主に組み込まれている機能や、用意されているテンプレートは以下になります。

* カスタマイズが容易な各種ページテンプレート
  * トップページ
  * 固定ページ
  * アーカイブページ（カスタム投稿タイプ、カスタムタクソノミー、日付アーカイブ、投稿者アーカイブ）
  * シングルページ
  * 404エラーページ
* 動的に出力されるページヘッダー、ページネーション、などの各種パーツテンプレート
* 各種ウィジェット有効化（サイドバー、カスタムメニュー、カスタムロゴ）
* カスタマイズ可能なコメントテンプレート（コメントリスト、コメントフォーム）
* キーワード検索テンプレート
* タクソノミーリスト、日付アーカイブリスト、タグクラウド
* SEOに適したmetaタグの動的生成
* 各種SNSシェアボタン
* 承認待ち投稿のメール通知
* ログイン画面カスタマイズ用スタイルシート、スクリプトファイル
* 【NEW】サブループでの投稿データ非同期無限ローディング
* 【NEW】WP REST APIでの投稿タイプ別の全件記事および個別記事取得用エンドポイント
* 【NEW】WP REST APIでのキーワード検索結果取得用エンドポイント
* 【NEW】Schema.orgに準拠したパンくずリスト、JSON-LD構造化データ出力のスクリプト



## Requirement

PHP >= 7.0.0

WordPress >= 5.0.0

その他ウェブサーバーやデータベースサーバーなどのバージョンはWordPressで推奨されているものに準じます。



## Installation

### 1. WordPressのインストール・セットアップ

WordPress用のデータベースを作成し、ウェブサーバーにWordPressをインストールします。続けてログインユーザーを作成しWordPressのセットアップを行います。

### 2. テーマファイルを設定

WordPressのルートディレクトリから、wp-content/themesディレクトリにテーマファイル一式を移動させます。管理画面にログインし、メニューから外観→テーマを選択、テーマを有効化させます。



## Usage

* 用意されているサンプルのWordPress用の各種テンプレートタグをサイトのデザインに合わせて編集してください。
* 実際のサイト構成に合わせて、各種テンプレートファイルを編集、コピーしてお使いください。
* カスタム投稿、カスタムタクソノミーについては用意されているサンプルを編集、コピーしてお使いください。
* その他、設定等は実際のサイト要件に合わせて適宜編集してお使いください。



## Note

* WordPressテーマ「Prototype」では、投稿タイプにカスタム投稿およびカスタムタクソノミーの使用を前提として設計されています。デフォルトの投稿タイプやカテゴリ、タグをご利用の際にはテンプレートを編集してお使いください。<br>※サンプルとして、カスタム投稿タイプ「ブログ（blog）」、カスタムタクソノミー「ブログカテゴリ（blog_category）」と「ブログタグ（blog_tag）」を用意しています。
* WP REST APIについて初期設定では、```サイトURL/wp-json/wp/api/blog```にアクセスすることで投稿タイプ「ブログ（blog）」の全記事を取得できるようになっています。



## Author

Ogawa Shinya

info@designsupply-web.com



## License

Prototype is under [GNU General Public License version 3.0](http://www.gnu.org/licenses/gpl-3.0.html)