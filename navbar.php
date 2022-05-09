<style>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap');

a {
  style="font-family: 'Quicksand', sans-serif";
}
</style>

<nav class="navbar navbar-expand-lg navbar-light white" style="position: fixed; width: 100%;z-index: 20;">
<a class="navbar-brand" href="trackproduct.php">
  <img src="images/fe.png" style="width: 50px;"> &nbsp
</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color: yellow";></span>
  </button>

  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">

    <?php
    if ( isset( $_SESSION['role'] ) ){
    ?>
    
      <li class="nav-item">
        <a class="nav-link" href="trackproduct.php" style="font-family: 'Quicksand', sans-serif;">Track Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage.php" style="font-family: 'Quicksand', sans-serif;">Notifications</a>
      </li>
    <?php
    if ( $_SESSION['role']==0 ){
    ?>
      <li class="nav-item">
        <a class="nav-link" href="sanction.php" style="font-family: 'Quicksand', sans-serif;">Sanction Products</a>
      </li>
    <?php
        }if ( $_SESSION['role']==1 || $_SESSION['role']==0 ){
    ?>
      <li class="nav-item">
        <a class="nav-link" href="scan.php" style="font-family: 'Quicksand', sans-serif;">Scan & Update Products</a>
      </li>
    <?php
    }
  }
  
    ?>
    <li class="nav-item">
    <a class="nav-link" id="aboutbtn" style="font-family: 'Quicksand', sans-serif;"> About </a>
    </li>
    </ul>

      <div class="md-form my-0">
        <a class="nav-link" href="logout.php" style="background: yellow; padding-left:20px;padding-right:20px; margin-left:0px; border-radius: 30px; font-family: 'Quicksand', sans-serif;"> Logout </a>
      </div>

  </div>
</nav>

