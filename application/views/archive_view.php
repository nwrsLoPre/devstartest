<?php
foreach($data as $post)
{
  ?>
  <div>
    <h2><a href="detail.php?id=<?= $post->params['id']; ?>"><?= $post->params['name']; ?></a></h2>
    <time><?= $post->params['date']; ?></time>
  </div>
<?
}
?>

