<?php
  $httpUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
  $httpsUrl = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $twitterName = 'ツイッターアカウント名';
?>
<ul>
  <!-- Facebook -->
  <li>
    <a href="http://www.facebook.com/share.php?u=<?php echo $httpsUrl; ?>&t=<?php echo get_the_title(); ?>" target="_blank" rel="nofollow">
      シェア
    </a>
  </li>
  <!-- Twitter -->
  <li>
    <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo $httpsUrl; ?>&related=<?php echo $twitterName; ?>" target="_blank" rel="nofollow">
      ツイート
    </a>
  </li>
  <!-- Twitter -->
  <li>
    <a href="http://b.hatena.ne.jp/entry/<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank" rel="nofollow" title="このエントリーをはてなブックマークに追加">
      はてブ
    </a>
  </li>
  <!-- Poket -->
  <li>
    <a href="https://getpocket.com/edit?url=<?php echo $httpsUrl; ?>" target="_blank" rel="nofollow">
      Poket
    </a>
  </li>
  <!-- Linkedin -->
  <li>
    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $httpsUrl; ?>" target="_blank" rel="nofollow">
      シェア
    </a>
  </li>
  <!-- Feedly -->
  <li>
    <a href="https://feedly.com/i/subscription/feed/<?php echo $httpsUrl; ?>feed/" target="_blank" rel="nofollow">
      Feedly
    </a>
  </li>
  <!-- LINE -->
  <li>
    <a href="http://line.me/R/msg/text/?<?php echo get_the_title(); ?><?php echo $httpsUrl; ?>" target="_blank" rel="nofollow">
      LINE
    </a>
  </li>
</ul>
<!-- share buttons end -->