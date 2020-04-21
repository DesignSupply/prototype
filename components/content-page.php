<!-- 投稿タイトル -->
<?php echo get_the_title(); ?>
<br>

<!-- パーマリンク -->
<a href="<?php echo get_permalink(); ?>"><?php echo get_permalink(); ?></a>
<br>

<!-- 本文 -->
<?php the_content('More…'); ?>
<br>

<!-- 編集ページリンク -->
<?php
  if(is_user_logged_in()) {
    echo '<a href="'.get_edit_post_link().'">編集する</a>';
  }
?>
<br>