<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berlyn Oak</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="slider.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .card img {
      width: 100%;
      height: 200px;
      object-fit: contain;
    }
    .cart_img {
      width: 50px;
      height: 50;
    }
    .containercc {
      width: 100%;
      height: 550px;
    }
    .container {
      background: linear-gradient(to right, white, #4f4747);
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4);
      width: 300px;
      height: 50px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');

    body {
      margin: 0;
      padding:0;
      box-sizing: border-box;
    }

    .header {
      display: flex;
      justify-content:space-between;
      align-items: center;
      background-color:white;
      border-radius: 5px;
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4);
    }
    
    .header .logo {
      background: white;
      font-size: 35px;
      margin-right:10px;
      font-family: 'Sriracha', cursive;
      color:#4f4747;
      text-decoration: none;
      margin-left: 30px;
    }

    .fa-regular{
      color:#4f4747;
    }

    .fa-regular:hover{
      color:#877f7d;
    }

    .icons{
     margin-left: 30px;
     margin-right: 50px;
     display:flex;
     background:white;
     width:75px;
     justify-content:center;
    }

    .icons button{
      border: none;
      margin-right:30px;
      cursor:pointer;
      background-color:white;
      border-radius: 5px;
      height:30px;
      width:30px;
    }
    .icons button i{
     color:#4f4747;
     font-size:30px;
    }
    .icons button:hover i{
    color:#877f7d;
    }
    
    nav ul {
     display:flex;
     justify-content: center;
     margin:1px 0 1px 0;
     list-style:none;
     background: white;
    }

    nav ul li{
     justify-content: center;
     display:inline-block;
     position:relative;
    }

    nav ul li a{
      margin-right: 20px;
      text-decoration:solid;
      font-size:large;
      font-weight: 550;
      color: #4f4747;
      padding: 20px 25px;
      display:block;
      text-align:center;
    }
  
    nav ul li a:hover{
      color:black;
      background-color:#C5C6D0;
    }
    
    .card img{
      
      width:100%;
      height:200px;
      object-fit: contain;
    }
    
    .admin_image{
      width:100px;
      object-fit: contain;
    }
  
    /* welcome */
    .navbar1{
    background:linear-gradient(to right,#072c3f,#96d2f2);
   }

   .nav-itemsd a.nav-link{
    color:black;
     background-color:white;
   }

  .col-md-2{
  
  background-color:#877f7d;

}

  .container-fluid {
  background:#253f4b;

}

  .cart_img{
  width:50px;
  height:50;
}

  .dropbtn {
  width:60px;
  height:60px;
  background-color:white;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
  button.dropbtn i{
  font-size:30px;
}

  .dropbtn {
  width:60px;
  height:60px;
  margin-left: 50px;
  margin-right: 0;
  background-color:white;
  color: black;
  padding: 0;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
  button.dropbtn i{
  font-size:30px;
}

.dropdown {
  z-index: 9999;
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn i {color:#6e7f80;}

.profile_img{
  width:75%;
  margin:auto;/*to display image in middle*/
  display: block;
  object-fit: contain;
}
.btn {
  background:linear-gradient(to right,#072c3f,#96d2f2);
}
a.nav-link{
  color:black;
}
.carousel_description{
  color: blue;
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
        <li><a href="index.php">Home</a></li>
        <li> <a href="display_all.php">Products</a>
        </li>
        <li> <a href="about_us.php">About Us</a></li>
       
      </ul>
    </nav>
    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <?php
    if (!isset($_SESSION['username'])) {
      echo "<div class='dropdown' style='float:left;'>
            <button class='dropbtn'><i class='fa-regular fa-user'></i></button>
            <div class='dropdown-content' style='left:0;'>
              <a href='./User/user_registration.php'>Register</a>
              <a href='./User/user_login.php'>Login</a>
            </div>
          </div>
          ";
    } else {
      echo "<div class='dropdown' style='float:left;'>
            <button class='dropbtn'><i class='fa-regular fa-user'></i></button>
            <div class='dropdown-content' style='left:0;'>
            <a href='user/profile.php'>My Account</a>
              <a href='./User/logout.php'>Logout</a>
            </div>
          </div>
          ";
    }
    ?>
    <div class="icons mx-1">
      <button><a class="text-dark" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a></button>
    </div>
    <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
  </header>
  <div class="navbar1 navbar-expand-lg">
    <ul class="navbar-nav me-3">
      <?php
      if (!isset($_SESSION['username'])) {
        echo " <li class='nav-item'>
      <a class='nav-link text-light' href='#'>Welcome Guest</a>
    </li>";
      } else {
        echo " <li class='nav-item'>
      <a class='nav-link text-light' href='#'>Welcome " . $_SESSION['username'] . "</a>
    </li>";
      }
      ?>
    </ul>
  </div>
  <div class="containercc">
    <div class="carousel">
      <div class="carousel_inner">
        <div class="carousel_item carousel_item__active">
          <img src="./images/spacejoy-9M66C_w_ToM-unsplash (1).jpg" alt="" class="carousel_img">
          <div class="carousel_caption">
            <h1 class="carousel_title">FURNITURE MAKES HAPPY HOME</h1>
            <p class="carousel_description">Your home should tell the story of who you are & be a collection of what you love.</p>
          </div>
        </div>
        <div class="carousel_item">
          <img src="./images/iwood-R5v8Xtc0ecg-unsplash.jpg" alt="" class="carousel_img">
          <div class="carousel_caption">
            <h1 class="carousel_title">FURNITURE MAKES HAPPY HOME</h1>
            <p class="carousel_description">Your home should tell the story of who you are & be a collection of what you love.</p>
          </div>
        </div>
        <div class="carousel_item">
          <img src="./images/slider-3.jpg" alt="" class="carousel_img">
          <div class="carousel_caption">
            <h1 class="carousel_title">FURNITURE MAKES HAPPY HOME</h1>
            <p class="carousel_description">Your home should tell the story of who you are & be a collection of what you love.</p>
          </div>
        </div>
      </div>
      <div class="carousel_indicator">
        <button class="carousel_dot carousel_dot__active"></button>
        <button class="carousel_dot"></button>
        <button class="carousel_dot"></button>
      </div>
      <div class="carousel_control">
        <button class="carousel_button carousel_button__prev">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel_button carousel_button__next">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
    </div>
    <script src="./script.js"></script>
  </div>
  <!--cards-->
  <div class="container my-2">
    <h1>Top Categories</h1>
  </div>
  <div class="row px-1">
    <div class="col-md-10">
      <div class="row">
        <!--fetching products-->
        <?php
        getproducts();
        get_unique_categories();
        get_unique_brands();
        ?>
        <!--row end-->
      </div>
      <!--col end-->
    </div>
    <!--sidebar-->
    <div class="col-md-2 p-0">
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-itemsd ">
          <a href="#" class="nav-link">
            <h4>Brands</h4>
          </a>
        </li>
        <?php
        getbrands();
        ?>
      </ul>
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-itemsd">
          <a href="#" class="nav-link">
            <h4>Categories</h4>
          </a>
        </li>
        <?php
        getcategories();
        ?>
      </ul>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>










