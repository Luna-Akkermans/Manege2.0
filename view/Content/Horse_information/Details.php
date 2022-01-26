<div class="container">
    <div class="card mt-5">
        <div class="row no-gutters">
            <div class="col-auto">
                <img src="<?=URL?>/public/images/<?= $Horse['img_path']?>.jpg" class="w-50" alt="Horse img">
            </div>
            <div class="col">
                <div class="h-100 card-block px-2 d-flex flex-column">
                    <h4 class="card-title"><?=$Horse['name'] ?></h4>
                    <p class="card-text"><?=$Horse['description'] ?></p>
                    <a href="<?=URL?>Content/ReservationPage/<?=$Horse['id']?>" class="mt-auto btn btn-success mb-2">Create activity</a>
                </div>
            </div>
        </div>
        <div class="card-footer w-100 text-muted h-25 p-3">

        </div>
    </div>
</div>