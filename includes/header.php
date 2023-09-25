 <!-- page header -->
 <?php
     $host = "localhost";
     $username = "root";
     $password = "";
     $database = "portfolio_php";
  
     $con = mysqli_connect($host,$username,$password,$database);
    $select = "SELECT * FROM tbl_user";
    $query = mysqli_query($con, $select);
    $data = mysqli_fetch_assoc($query);
 ?>
 <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content container">
            <h1 class="header-title">
                <span class="up">HI!</span>
                <span class="down">I am <?= $data['user_name'];?></span>
            </h1>
            <p class="header-subtitle"><?= $data['user_designation'];?></p>

            <a href="#portfolio" class="btn btn-primary">Visit My Works</a>
        </div>
    </header><!-- end of page header -->
