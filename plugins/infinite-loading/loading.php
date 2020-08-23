<!-- Ajax無限ローディング 初期表示サブループ start -->
<?php
  $args = array(
    'posts_per_page' => 3,
    'post_type' => 'blog'
  );
  $the_query = new WP_Query($args);
  if($the_query->have_posts()):
?>
  <?php while($the_query->have_posts()): $the_query->the_post(); ?>
<?php get_template_part('components/loop'); ?>
  <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<!-- Ajax無限ローディング 初期表示サブループ end -->
<div id="infinite_loading_container">
<!-- Ajax無限ローディング 追加サブループ start -->
<!-- Ajax無限ローディング 追加サブループ end -->
</div>
<button id="infinite_loading_button">もっと読み込む</button>