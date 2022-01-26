<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Riding School</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="<?=URL?>/Content">Home</a>
        </li>
        <?php   if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {?>
        <li class="nav-item">
          <a class="nav-link" href="<?=URL?>/Content/ShowReservations">Reservations</a>
        </li>
        <?php }?>
      </ul>
    </div>
    <div class="nav-right">
    <?php 
      if(!isset($_SESSION['user']) && empty($_SESSION['user'])) {
    ?>
      <ul class='navbar-nav'>

        <li class='nav-item'><a class="nav-link" href="<?=URL?>/Content/Registration">Sign up</a></li>
        <li class='nav-item'><a class="nav-link" href="<?=URL?>/Content/Login">Log in</a></li>
      </ul>
    <?php }else{ ?>
                <ul class="navbar-nav">
                <li>  <a class="navbar-brand" href="#"><?= $_SESSION['user'] ?></a></li>
                </li>
              </ul>
              <a href="<?=URL?>/Content/Logout">Logout</a>
     <?php }?>
    </div>
  </div>
</nav>