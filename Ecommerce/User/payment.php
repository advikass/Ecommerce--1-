<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<style>
    .payment_img {
        width: 90;
        margin: auto;
        display: block;
    }
    .hr{
	height:0.5px;
	margin:60px 0 50px 0;
	background:#4f4747;/*divide line*/
}
form{
    box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
form.frm{
    box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);


}
</style>

<body>
    <!-- php code to access user id -->
    <?php
    $user_session_name= $_SESSION['username'];
    $select_query = "Select * from `user_table` where user_name='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['user_name'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
    $total_payment=$_SESSION['my_total'];
    

    ?>
    <div class="container">
        <h1 class="text-center">Payment Details</h1>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data" class="w-75 border p-3 mx-auto">
                  <div class="form-outline my-2 d-flex">
                    <label for="" class="form-label w-50">Billing Details</label>
                    
                    </div>
                    <div class="hr mt-3">
                    </div>
                    
                
               
                    <div class="form-outline my-4 d-flex">
                    <label for="" class="form-label w-50">Username</label>
                        <input type="text" class="form-control w-75 m-auto border border-dark" value="<?php echo $user_name ?>" name="user_username">
                    </div>
                    <div class="form-outline mb-4 d-flex">
                    <label for="" class="form-label w-50">Email</label>
                        <input type="email" class="form-control w-75 m-auto border border-dark" name="user_email" value="<?php echo $user_email ?>">
                    </div>
                    <div class="form-outline mb-4 d-flex">
                    <label for="" class="form-label w-50">Address</label>
                        <input type="text" class="form-control w-75 m-auto border border-dark" name="user_address" value="<?php echo $user_address ?>">
                    </div>
                    <div class="form-outline mb-4 d-flex">
                    <label for="" class="form-label w-50">Mobile</label>
                        <input type="text" class="form-control w-75 m-auto border border-dark" name="user_mobile" value="<?php echo $user_mobile ?>">
                    </div>
                    <div class="text-center ">
                        <input type="submit" value="Submit" class=" btn bg-info py-2 px-3 border-0 border border-dark text-light" name="user_update">
                    </div>
            </div>


            <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data" class="frm w-75 border p-3 mx-4">
            <div class="form-outline my-2 d-flex">
                    <label for="" class="form-label w-50">Total</label>
                    </div>
                    <div class="hr mt-3">
                    </div>
                    <div class="form-outline my-4 d-flex">
                    <label for="" class="form-label w-50">Subtotal</label>
                        <input type="text" class="form-control w-75 m-auto border border-dark" value="<?php echo '₹'.$total_payment ?>" name="">
                    </div>
                    <div class="form-outline mb-4 d-flex">
                    <label for="" class="form-label w-50">Discount</label>
                        <input type="email" class="form-control w-75 m-auto border border-dark" name="" value="₹0">
                    </div>
                    <div class="form-outline mb-4 d-flex">
                    <label for="" class="form-label w-50">Delivery Fees</label>
                        <input type="text" class="form-control w-75 m-auto border border-dark" name="" value="₹100">
                    </div>
                    <div class="form-outline mb-4 d-flex">
                    <label for="" class="form-label w-50">Grand Total</label>
                        <input type="text" class="form-control w-75 m-auto border border-dark" name="" value="<?php echo  '₹'.$total_payment+100;?>">
                    </div>
                    <div class="text-center">
                    <a href="order.php?user_id=<?php echo $user_id ?>">
                    <h2 class="btn text-center text-light">Proceed</h2>
                </a>       </div>
            </div>
                
               
            </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
        
   

if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];


    //update queryA
    $update_data = "Update `user_table` set user_name='$username',user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile' where user_id='$update_id'";
    $result_query_update = mysqli_query($con, $update_data);
    if ($result_query_update) {
        echo "<script>alert('Details submitted successfully')</script>";
        echo "<script>window.open('checkout.php?payment','_self')</script>";
    }
}
?>