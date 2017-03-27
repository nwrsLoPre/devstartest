<div class="pagination">
	
	<ul class="pagination-list">
		<li><a title="перейти в начало списка" href="/posts?page=0<?= $pagination['filterParams']?>" class="pagenav"><?= '<'; ?></a></li>
	<?php

	for ($i=1; $i <= $pagination['lastPage']; $i++) 
	{ 
	?>
		<li><a <?php if($pagination['thisPage'] == ($i - 1)){ echo 'class="active"'; } ?> href="/posts?page=<?= (($i - 1) * $pagination['objectsPerPage']); ?><?= $pagination['filterParams']?>" class="pagenav"><?= $i; ?></a></li>

	<?php	
	}
	?>
		<li><a title="перейти в конец списка" href="/posts?page=<?= (($pagination['lastPage'] - 1) * $pagination['objectsPerPage']); ?><?= $pagination['filterParams']?>" class="pagenav"><?= '>'; ?></a></li>
	</ul>

	<div class="pagination-counter">страница <?= ($pagination['thisPage'] / $pagination['objectsPerPage']) + 1; ?> из <?= $pagination['lastPage']; ?></div>

</div>