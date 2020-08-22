<?php
  // 初期表示投稿数
  $default_show_posts = 0;
  require_once(dirname(__FILE__).'/../../../../../wp-load.php');
  $offset_value = isset($_POST['currently_loaded_count']) ? $_POST['currently_loaded_count'] : 0;
  $loading_count = isset($_POST['additional_loading_count']) ? $_POST['additional_loading_count'] : $default_show_posts;
  $all_posts_query = new WP_Query(
    array(
      'post_type' => 'blog',
      'posts_per_page' => -1,
    )
  );
  $infinite_loading_query = new WP_Query(
    array(
      'post_type' => 'blog',
      'posts_per_page' => (int)$loading_count,
      'offset' => (int)$offset_value
    )
  );
  $posts_count = $all_posts_query->found_posts;
  if($infinite_loading_query->have_posts()):
?>
  <?php 
    while($infinite_loading_query->have_posts()): 
    $infinite_loading_query->the_post(); 
    ob_start();
    $content = '';
  ?>
    <!-- 無限読み込み サブループ start -->
<?php get_template_part('components/loop'); ?>
    <!-- 無限読み込み サブループ end -->
  <?php
    $content = ob_get_contents();
    ob_end_clean();
    endwhile; 
  ?>
<?php 
  $remaining_count = $posts_count - $offset_value - 1;
  $encoded_content = htmlspecialchars($content);
  echo json_encode(array(
      'count'=>$remaining_count, 
      'content'=>$encoded_content
    )
  );
  endif; 
?>
<?php wp_reset_postdata(); ?>