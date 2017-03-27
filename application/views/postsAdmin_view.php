<form action="postsDeleteAction" method="post">
  <input type="hidden" name="save" value="1" />

  <table>
    <thead>
    <tr>
      <th>#</th>
      <th>Название</th>
      <th>Дата</th>
      <th><label>Выбрать <br /> <input type="checkbox" id="deleteAll" value="" /></label></th>
    </tr>
    </thead>
    <?php
    foreach($data as $post)
    {
      ?>
      <tr>
        <td><?= $post->params['id']; ?></td>
        <td><a href="postEdit?id=<?= $post->params['id']; ?>"><?= $post->params['name']; ?></a></td>
        <td><?= $post->params['date']; ?></td>
        <td><input type="checkbox" name="delete[]" value="<?= $post->params['id']; ?>" /></td>
      </tr>
    <?
    }
    ?>
    <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>
        <button type="submit">Удалить</button>
      </td>
    </tr>
    </tfoot>
  </table>
</form>
