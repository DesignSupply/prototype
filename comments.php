<?php
  if (post_password_required()) {
  return;
  }

  // コメントリスト出力
  require_once('components/comment-list.php');

  // コメントフォーム出力
  require_once('components/comment-form.php');

?>