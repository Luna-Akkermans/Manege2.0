<div class="container d-flex justify-content-center flex-column">
  <h1>Reservation:</h1>
  <form action="<?= URL?>/Content/ReservationsDetails/<?=$Horse['id'] ?>" method="post">

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
          value="<?=$Horse['name'] ?>">
      </div>
    </div>
    <!-- Horse-riding -->
    <div class="form-row">
      <div class="form-group">
        <div class="col-md-6 mt-2">
          <label for="horse-riding">Do you want to go horse riding?</label>
          <select class="form-control" name="reservee-horse-riding" id="horse-riding">
            <option value="true" label="Yes" <?php if($Horse['available']){echo "disabled";} ?> />
            <option value="false" label="No" <?php if($Horse['available']){echo "selected";} ?> />
          </select>
        </div>
      </div>
    </div>
    <!-- Datetime of reservation -->
    <div class="form-row">
      <div class="form-group">
        <div class="col-md-6 mt-2">
          <label for="horse-riding">Start-date</label>
          <input class="form-control" type="datetime-local" value="<?=date('Y-m-d\TH:i')?>" name="starting_time"
            id="reservation-horse" ">
        </div>
        <div class=" col-md-6 mt-2">
          <label for="horse-riding">End-date</label>
          <input class="form-control" type="datetime-local" value="<?=date('Y-m-d\TH:i')?>" name="end_time"
            id="reservation-horse" ">
        </div>
      </div>

      <!--  Submit  -->
      <div class="form-row">
        <div class="form-group">
          <div class="col-md-6 mt-2">
            <input class='btn btn-success' type="submit" value="Create Reservation">
          </div>
        </div>
      </div>

  </form>
</div>