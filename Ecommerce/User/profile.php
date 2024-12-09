<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berlyn Oak-My profile</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .icons button:hover i {
            color: blue;
        }
        .nav-item h4{
            font-size: 40px;
            background-color:rgb(201,201,203);
        }
        ul.navbar-nav{
            box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);

           
            background-color:lightblue;
        }
        .btn {
  background-color: #4f4747;

}
        
    </style>

</head>

<body>

    <header class="header">
        <a href="#" class="logo">Berlyn Oak</a>
        <form class="d-flex" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light text-light" name="search_data_product">
        </form>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li> <a href="../display_all.php">Products</a>
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
            <button class='dropbtn'>Hi," . $_SESSION['username'] . "</button>
            <div class='dropdown-content' style='left:0;'>

              <a href='./User/logout.php'>Logout</a>
            </div>
          </div>
          ";
        }
        ?>
        <div class="icons">
            <button><a class="text-dark" href="../cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a></button>
        </div>
        <a class="nav-link text-dark" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
    </header>
    <div class="row mt-2">
        <div class="col-md-3">
            <ul class="navbar-nav text-center" style="height:100vh">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><h4>My Profile</h4></a>
                </li>
                <?php
               $username= $_SESSION['username'];
               $user_image="Select * from `user_table` where user_name='$username'";
               $user_image=mysqli_query($con,$user_image);
               $row_image=mysqli_fetch_array($user_image);
               $user_image=$row_image['user_image'];
               echo " <li class='nav-item mt-2'>
               <img src='./user_images/$user_image' class='profile_img' alt=''>
           </li> ";
                ?>
               
                <li class="nav-item">
                    <a class="nav-link text-dark" href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="profile.php?my_orders">My Orders</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link text-dark" href="logout.php">Logout</a>
                </li>

                

            </ul>


        </div>
        <div class="col-md-9 text-center">
            <?php
                get_user_order_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('my_orders.php');
                }
                
        
            ?>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>