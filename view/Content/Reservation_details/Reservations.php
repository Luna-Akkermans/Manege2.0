<?php 
$divOpen = "<div class='row d-flex justify-content-center'>";
$divClose = "</div>";

?>
<div class="container">
<div class="row d-flex justify-content-center">
<?php 

foreach($Reservations as $index => $value){
        if($index === 2){echo $divClose; echo $divOpen;}
   
?>

        <div class="card mb-3 my-3 mx-3 mb-3 py-0 px-0 shadow" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                    <img src="<?=URL?>/public/images/<?= $value['img_path']?>.jpg"  class="img-fluid h-100 rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between"><strong><span><i
                                            class="fas fa-horse"></i> Horse:</span></strong> <?=$value['name'] ?></li>
                            <li class="list-group-item d-flex justify-content-between"><strong><span><i
                                            class="fas fa-horse"></i> Riding:</span></strong><?php if($value['riding']){ echo "Yes";}else{echo "No";}?></li>
                            <li class="list-group-item d-flex justify-content-between"><strong><span><i
                                            class="fas fa-user-clock"></i>Time:</span></strong> <?= date("d-m-y | h:i", strtotime($value['date_time_start']))?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer w-100 d-flex justify-content-end">
                <a href="<?=URL?>/Content/UpdateReservation/<?=$value['id']?>" class="btn btn-warning w-25 text-body"><i class="fas fa-edit"></i> Edit</a>
            </div>
        </div>
<?php }?>

    </div>
</div>