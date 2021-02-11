<?php

  // StyleSheet読み込み
  function register_stylesheet() {
    wp_enqueue_style('style-css', get_template_directory_uri().'/style.css', array(), null, 'all');
    wp_enqueue_style('main-css', get_template_directory_uri().'/assets/css/main.min.css', array(), null, 'all');
  }
  add_action('wp_enqueue_scripts', 'register_stylesheet');

  // JavaScript読み込み（管理画面を除く）
  function register_script() {
    if(!is_admin()) {
      wp_deregister_script('jquery');
      wp_enqueue_script('promise-polyfill-js', 'https://cdnjs.cloudflare.com/ajax/libs/es6-promise/3.3.1/es6-promise.min.js', array(), null, 'all');
      wp_enqueue_script('fetch-polyfill-js', 'https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.4/fetch.min.js', array(), null, 'all');
      wp_enqueue_script('main-js', get_template_directory_uri().'/assets/js/main.min.js', array(), null, 'all');
      wp_enqueue_script('infinite-loading-post-js', get_template_directory_uri().'/plugins/infinite-loading/post.js', array(), null, 'all');
    }
  }
  add_action('wp_enqueue_scripts', 'register_script');

  // 管理画面カスタマイズ
  function custom_login_page() {
    wp_enqueue_style('login-customize-css', get_template_directory_uri().'/functions/login/customize.css', array(), null, 'all');
    wp_enqueue_script('login-customize-js', get_template_directory_uri().'/functions/login/customize.js', array(), null, 'all');
  }
  add_action('login_enqueue_scripts', 'custom_login_page');

  // タイトルタグ出力
  function output_title() {
    add_theme_support('title-tag');
  }
  add_action('after_setup_theme', 'output_title');

  // RSS用リンク出力
  add_theme_support('automatic-feed-links');

  // カスタムロゴ有効化
  function custom_logo() {
    add_theme_support('custom-logo');
  }
  add_action('after_setup_theme', 'custom_logo');

  // アイキャッチ画像有効化
  add_theme_support('post-thumbnails');

  // カスタムメニュー有効化
  add_theme_support('menus');

  // WordPressバージョン情報の非表示
  remove_action('wp_head', 'wp_generator');
  
  // 外部ツールの編集用URLの非表示
  remove_action('wp_head', 'rsd_link');

  // Windows Live Writerの編集用URLの非表示
  remove_action('wp_head', 'wlwmanifest_link');

  // Admin Bar の非表示
  function disable_admin_bar() {
    return false;
  }
  add_filter('show_admin_bar', 'disable_admin_bar');
  
  // 絵文字機能の削除
  function disable_emoji() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  }
  add_action('init', 'disable_emoji');

  // デフォルト投稿メニュー非表示
  function remove_menus() {
    remove_menu_page('edit.php');
  }
  add_action('admin_menu', 'remove_menus');

  // 抜粋文字数の指定
  function custom_excerpt_length($length) {   
    return 60; 
  }   
  add_filter('excerpt_length', 'custom_excerpt_length');

  // 抜粋文末文字の指定
  function custom_excerpt_more($more) {
    return '…';
  }
  add_filter('excerpt_more', 'custom_excerpt_more');

  // コンテンツ幅定義
  if (!isset($contentWidth)) {
    $contentWidth = 1440;
  }

  // ログアウト後にトップページへリダイレクト
  function redirect_logout_page(){
    $url = esc_url(home_url());  
    wp_safe_redirect($url);
    exit();
  }
  add_action('wp_logout','redirect_logout_page');

  // ユーザープロフィール情報追加
  function add_user_profile( $userProfile ) {
    $userProfile['Facebook'] = __('Facebookページ');
    $userProfile['Twitter'] = __('Twitterページ');
    return $userProfile;
  }
  add_filter('user_contactmethods', 'add_user_profile');

  // 最終更新日の出力
  function post_modified($date) {
    $modifiedDate = get_the_modified_time('U');
    $postDate = get_the_time('U');
    if ($modifiedDate < $postDate) {
      return get_the_time($mod_date);
    } else if($modifiedDate === $postDate) {
      return get_the_modified_time($date);
    } else {
      return get_the_modified_time($date);
    }
  }

  // 固定ページの親子ページチェック
  function has_parent_page() {
    global $post;
    if(is_page() && $post->post_parent) {
      return $post->post_parent;
    } else {
      return false;
    }
  }

  // 日付別アーカイブのチェック
  function is_date_archive() {
    if(get_query_var('year') && get_query_var('monthnum')) {
      return true;
    }
  }
  
  // プラグイン・テーマの自動更新設定
  add_filter('auto_update_plugin', '__return_true');
  add_filter('auto_update_theme', '__return_true');

?>