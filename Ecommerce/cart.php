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
    <title>Berlyn Oak-cart details</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
            
        .icons button:hover i{
         color: blue;
    }

  /* welcome */
.navbar1{
  background-color:#877f7d;

}

.nav-itemsd a.nav-link{
  color:#4f4747;
  background-color:#C5C6D0;
}


.col-md-2{
  
  background-color:#877f7d;

}
.continue {
    color:white;
  background-color: #4f4747;

}
.btn11{
    background-color: #877f7d;
}


        
        
    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <header class="header">
        <a href="#" class="logo">Berlyn Oak</a>


        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li> <a href="display_all.php">Products</a>
                </li>
                <li> <a href="about_us.php">About Us</a></li>
            </ul>
        </nav>

        <!-- calling cart function -->
       
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
              <a href='./User/logout.php'>Logout</a>
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
    

    <!-- table -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">


                    <!-- php code to display dynamic data -->
                    <?php
                     if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $get_ip_add = getIPAddress();
                    $total_price = 0;
                    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add' and user_name='$username'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo " <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                
    
                </tr>
            </thead>
            <tbody>";
            $qtyObj = new stdClass();
               while ($row = mysqli_fetch_array($result)) {     
                            $product_id = $row['product_id'];
                            $qtyObj->$product_id = $row['quantity'];
                           // print_r($qtyObj);
                            $select_products = "Select * from `products` where product_id ='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = $row_product_price['product_price'];
                                //$price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                
                               // $product_values = array_sum($product_price);
                                //$total_price += $product_values;
                    ?>

                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                    <td><input type="number" name="qty<?php echo $product_id?>" class="form-input w-50" min="1" max="5" value=<?php echo $row['quantity']?>></td>
                                    
                                    <?php
                                
                                    $get_ip_add = getIPAddress();
                                    
                                    $product_total = $product_price * $qtyObj->$product_id;
                                    $total_price = $total_price+$product_total;
                                    $_SESSION['my_total']=$total_price;

                                    if (isset($_POST['update_cart'])) {
                                        $quantities = $_POST["qty".$product_id];
                                       
                                        
                                        $update_cart = "Update `cart_details` set quantity=$quantities where product_id='$product_id' and user_name='$username'";
                                        $result_products_quantity = mysqli_query($con, $update_cart);

                                 
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }


                                    ?>
                                    <td><?php echo $product_price ?>/-</td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                    <td>
                                        
                                        <input type="submit" value="Remove" class="btn11 px-3 py-2 border-0 mx-2" name="remove_cart">

                                    </td>


                                </tr>
                    <?php
                            }
                        }
                    } else {
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                
                    ?>
                    </tbody>

                </table>

                <!-- subtotal -->
                <div class="d-flex mb-5">
                    <?php
                    $get_ip_add = getIPAddress();
                    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<h4 class='px-3'>Subtotal: <strong class='text-dark'> $total_price/-</strong></h4>
                        <input type='submit' value='Update' class='continue px-3 py-2 border-0 mx-2' name='update_cart'>
                    
                <input type='submit' value='Continue Shopping' class='continue px-3 py-2 border-0 mx-2' name='continue_shopping'>
                <button class='btn11 px-3 py-2 border-0 '><a href='./user/checkout.php' class='text-dark text-decoration-none'>Checkout</a></button>";
                    } else {
                        echo "<input type='submit' value='Continue Shopping' class='continue px-3 py-2 border-0 mx-2' name='continue_shopping'>";
                    }
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('display_all.php','_self')</script>";
                    }
                }else{
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    echo "<input type='submit' value='Continue Shopping' class='continue px-3 py-2 border-0 mx-2' name='continue_shopping'>";
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('display_all.php','_self')</script>";
                    }


                }
                    ?>

                </div>
        </div>
    </div>
    </form>


    <!-- function to remove item -->
    <?php
    function remove_cart_item()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as  $remove_id) {
                echo $remove_id;
                $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item = remove_cart_item();

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>