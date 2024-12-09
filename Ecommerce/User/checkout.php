<?php
include('../includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Berlyn Oak-checkout</title>
   <link rel="stylesheet" href="../style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
  .icons button:hover i{
    color: blue;
    }
    .btn{
  background-color: #4f4747;

}
</style>
</head>

<body>

   <header class="header">
      <a href="#" class="logo">Berlyn Oak</a>
      <form class="d-flex" action="search_product.php" method="get">
         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
         <input type="submit" value="Search" class="btn btn-outline-light text-light" name="search_data_product">
      </form>
      <nav>
         <ul>
            <li><a href="../index.php">Home</a></li>
            <li> <a href="../display_all.php">Products</a>
            </li>
            <li> <a href="../about_us.php">About Us</a></li>
           
         </ul>
      </nav>

      <div class="icons">
      <?php
         if(!isset($_SESSION['username'])){
            echo "<div class='dropdown' style='float:left;'>
            <button class='dropbtn'><i class='fa-regular fa-user'></i></button>
            <div class='dropdown-content' style='left:0;'>
              <a href='./User/user_registration.php'>Register</a>
              <a href='./User/user_login.php'>Login</a>
            </div>
          </div>
          ";

         }else{
            echo "<div class='dropdown' style='float:left;'>
            <button class='dropbtn'><i class='fa-regular fa-user'></i></button>
            <div class='dropdown-content' style='left:0;'>
              <a href='./User/user_login.php'>Logout</a>
            </div>
          </div>
          ";

         }
         ?>
        

         

      </div>



   </header>

   <div class="navbar1 navbar-expand-lg">
      <ul class="navbar-nav me-3">
      <?php
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link text-light' href='#'>Welcome Guest</a>
    </li>";
    }else{
      echo " <li class='nav-item'>
      <a class='nav-link text-light' href='#'>Welcome ". $_SESSION['username']."</a>
    </li>";

    }
?>

         






      </ul>
   </div>



   <!--cards-->
   <div class="row px-1">
      <div class="col-md-12">
         <div class="row">
            <?php
            if (!isset($_SESSION['username'])) {
               include('user_login.php');
            } else {
               include('payment.php');
            }

            ?>


            <!--row end-->
         </div>
         <!--col end-->
      </div>


   </div>
   </div>




   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>