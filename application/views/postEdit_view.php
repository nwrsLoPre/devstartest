<form action="postEditAction?id=<?= $data->id; ?>" method="post">
	<input type="hidden" name="save" value="1" />
	<div><label for="name">Название:</label>
		<input type="text" id="name" name="name" value="<?= $data->name; ?>" required="required" />
	</div>
  	<div><label for="message">Сообщение:</label>
    	<textarea name="message" id="message" cols="30" rows="10"  required="required"><?= $data->message; ?></textarea>
  	</div>
  	<div>
  		<button type="submit">Сохранить</button>
  	</div>
</form>