<?php

foreach($data as $post)
{
  ?>
  <div>
    <h2><a href="postView?id=<?= $post->params['id']; ?>"><?= $post->params['name']; ?></a></h2>
    <time><?= $post->params['date']; ?></time>
  </div>
<?
}

?>

