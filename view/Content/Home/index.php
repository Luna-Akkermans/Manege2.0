
<div class="container mt-5">
	<div class='row justify-content-center'>
		<?php 
		
		foreach($Horse as $HorseData){ 
		?>
		<!-- //Add way to create new row. -->
		<div class="col-md-3 d-flex align-items-stretch">
			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="<?=URL?>/public/images/<?= $HorseData['img_path']?>.jpg" alt="Card image cap">
				<div class="card-body h-100 d-flex  flex-column">
					<h5 class="card-title"><?= $HorseData['name'] ?></h5>
					<p class="card-text"><?= $HorseData['description']?></p>
					<?php   if(isset($_SESSION['user']) && !empty($_SESSION['user'])) :?>
					<a href="<?=URL?>Content/HorseDetails/<?=$HorseData['id']?>" class="mt-auto btn btn-primary">More informaiton!</a>
					<?php else:?>
						<a href="<?=URL?>Content/Login" class="mt-auto btn btn-warning">Make sure to login!</a>
						<?php endif;?>
				</div>
			</div>
		</div>
		<?php }?>
	</div>
</div>