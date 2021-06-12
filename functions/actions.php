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

  // 不要メニュー非表示
  function remove_menus() {
    remove_menu_page('edit.php');
  }
  add_action('admin_menu', 'remove_menus');
  if(current_user_can('editor')) {
    // 編集者
    function remove_menus_for_editor() {
      remove_menu_page('tools.php');
    }
    add_action('admin_menu', 'remove_menus_for_editor');
  } else if(current_user_can('author')) {
    // 投稿者
    function remove_menus_for_author() {
      remove_menu_page('tools.php');
    }
    add_action('admin_menu', 'remove_menus_for_author');
  } else if(current_user_can('contributor')) {
    // 寄稿者
    function remove_menus_for_contributor() {
      remove_menu_page('tools.php');
    }
    add_action('admin_menu', 'remove_menus_for_contributor');
  } else if(current_user_can('subscriber')) {
    // 購読者
    function remove_menus_for_subscriber() {
      return;
    }
    add_action('admin_menu', 'remove_menus_for_subscriber');
  }

  // WordPressデフォルトのfaviconを非表示
  function default_favicon_delete() {
    exit;
  }
  add_action('do_faviconico', 'default_favicon_delete');

  // 自動整形機能（wpautop）設定
  remove_filter('the_excerpt', 'wpautop');

  // コンテンツ幅定義
  if(!isset($contentWidth)) {
    $contentWidth = 1440;
  }

  // ログアウト後にトップページへリダイレクト
  function redirect_logout_page(){
    $url = esc_url(home_url());  
    wp_safe_redirect($url);
    exit();
  }
  add_action('wp_logout','redirect_logout_page');

?>