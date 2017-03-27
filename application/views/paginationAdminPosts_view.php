<div class="pagination">
	
	<ul class="pagination-list">
		<li><a title="2" href="/postList?page=0" class="pagenav"><?= '<'; ?></a></li>
	<?php
	for ($i=1; $i <= $pagination['lastPage']; $i++) 
	{ 
	?>
		<li><a title="2" <?php if($pagination['thisPage'] == ($i - 1)){ echo 'class="active"'; } ?> href="/postList?page=<?= (($i - 1) * $pagination['objectsPerPage']); ?>" class="pagenav"><?= $i; ?></a></li>

	<?php	
	}
	?>
		<li><a title="2" href="/postList?page=<?= (($pagination['lastPage'] - 1) * $pagination['objectsPerPage']); ?>" class="pagenav"><?= '>'; ?></a></li>
	</ul>

	<div class="pagination-counter">страница <?= ($pagination['thisPage'] / $pagination['objectsPerPage']) + 1; ?> из <?= $pagination['lastPage']; ?></div>

</div>