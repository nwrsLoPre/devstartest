<nav>
    <ul>
        <li><a href="/">Последние посты</a></li>
    </ul>

  <?php
    if(!empty($menuItems))
    {
      ?>
      <h2>Архив постов</h2>
      <ul>
        <?php
        foreach($menuItems as $archiveItem)
        {
          ?><li><a href="posts?year=<?=$archiveItem['year'];?>&month=<?=$archiveItem['month'];?>"><?=$archiveItem['month_name'];?> <?=$archiveItem['year'];?></a></li><?
        }
        ?>
      </ul>
      <?
    }
  ?>

    <h2>Дополнительно</h2>
    <ul>
        <li><a href="/aboutAuthor">Об авторе</a></li>
    </ul>



</nav>

