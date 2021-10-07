<?php

  // カスタム投稿（blog）の全件記事取得の独自エンドポイント追加
  function add_rest_endpoint_all_posts_from_blog() {
    register_rest_route(
      'wp/api',
      '/blog',
      array(
        'methods' => 'GET',
        'callback' => 'get_all_posts_from_blog',
        'permission_callback' => function() { return true; }
      )
    );
  }
  function get_all_posts_from_blog() {
    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'blog',
      'post_status' => 'publish'
    );
    $all_posts = get_posts($args);
    $result = array();
    foreach($all_posts as $post) {
      $data = array(
        'ID' => $post->ID,
        'thumbnail' => get_the_post_thumbnail_url($post->ID, 'full'),
        'slug' => $post->post_name,
        'date' => $post->post_date,
        'modified' => $post->post_modified,
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'content' => $post->post_content
      );
      array_push($result, $data);
    };
    return $result;
  }
  add_action('rest_api_init', 'add_rest_endpoint_all_posts_from_blog');

?>