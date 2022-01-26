<div class="container d-flex justify-content-center flex-column w-50">
  <?php
  print_r($Data) 
  ?>
   <div class="container"></div>
  <h1>Reservation: <?=$Data['reservationID'] ?></h1>
  <form action="<?= URL?>/Content/ReservationsDetails/Reservation_change" method="post">
  <div class="form-row">
      <div class="form-group col-md-6 mt-2">
        <label for="reservation-id">Reservaton id:</label>
        <input readonly value="<?=$Data['reservationID'] ?>"class="form-control" type="text" name="reservation-id" id="reservation-id">
      </div>
    </div>
    <!-- Name  -->  
    <div class="form-row">
      <div class="form-group col-md-6 mt-2">
        <label for="reservation-name">Name:</label>
        <input readonly value="<?=$_SESSION['user'] ?>"class="form-control" type="text" name="reservee-name" id="reservation-name">
      </div>
    </div>
    <!-- Horse -->
    <div class="form-row">
      <div class="form-group col-md-6 mt-2">
        <label for="reservation-name">Horse:</label>
        <input class="form-control" type="text" name="reservee-horse" id="reservation-horse" readonly
          value="<?=$Data['name'] ?>">
      </div>
    </div>
    <!-- Horse-riding -->
    <div class="form-row">
      <div class="form-group">
        <div class="col-md-6 mt-2">
          <label for="horse-riding">Do you want to go horse riding?</label>
          <select class="form-control" name="reservee-horse-riding" id="horse-riding">
            <option value="true" label="Yes" <?php if($Data['available']){echo "disabled";} ?> />
            <option value="false" label="No" <?php if($Data['available']){echo "selected";} ?> />
          </select>
        </div>
      </div>
    </div>
    <!-- Datetime of reservation -->
    <div class="form-row">
      <div class="form-group">
        <div class="col-md-6 mt-2">
          <label for="horse-riding">Start-date</label>
          <input class="form-control" type="datetime-local" value="<?=date('Y-m-d\TH:i' , strtotime($Data['date_time_start']));?>" name="starting_time"
            id="reservation-horse" ">
        </div>
        <div class=" col-md-6 mt-2">
          <label for="horse-riding">End-date</label>
          <input class="form-control" type="datetime-local" value="<?=date('Y-m-d\TH:i' , strtotime($Data['date_time_end']));?>" name="end_time"
            id="reservation-horse" ">
        </div>
      </div>

      <!--  Submit  -->
      <div class="form-row">
        <div class="form-group">
          <div class="col-md-6 mt-2 d-flex justify-content-end">
            <input name="edit_reservation" class='btn btn-warning' type="submit" value="Edit Reservation">
          </div>
        </div>
      </div>

  </form>
</div>