<div class="container d-flex justify-content-center ">
    <div class="card mb-3 mt-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-12">
            <div class="card-header">
            <h5 class="card-title">Reservation: #<?=$reservation_data['id']?></h5>
  </div>
                <div class="card-body">

                   
                    <p class="card-text">Thanks you for creating a reservation 
                    </p>
                    <p class='card-text'>You will start at
                        <?=date('y-m-d H:i',strtotime($reservation_data['date_time_start'])); ?> and end at
                        <?=date('y-m-d H:i',strtotime($reservation_data['date_time_end'])); ?></p>
                    <span>The total price of your appointment is
                        <?= PrintDateDiffrence($reservation_data['date_time_start'], $reservation_data['date_time_end'])?></span>
                    <p class="card-text"><small class="text-muted">Check your email for more information about the
                            reservations. 
                    </p>
                </div>
                <div class="card-footer text-muted">
                    <a class='btn btn-primary' href="<?=URL?>/Content/Index">Back to homepage</a>
                </div>
            </div>
        </div>
    </div>
</div>