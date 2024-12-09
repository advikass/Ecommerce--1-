<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <style>
    .hero{
    height: 100%;
    width:100%;
    background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(../images/lampp.jpg);
    background-position: center;
    background-size: cover;
    position: absolute;
}
</style>
</head>
<body>
    <div class="hero">
        <form action="" method="post" class="form-box border border-4">
            <div class="form-outline mb-4 text-center my-5 text-light">
                <label for="" class="label m-auto">
                    <h2>LOGIN</h2>
                </label>
            </div>
            <!-- username -->
            <div class="form-outline mx-2 my-4">
                <label for="user_username" class="form-label text-light">User name</label>
                <input type="text" id="user_username" class="form-control" placeholder="Enter user name" autocomplete="off" required="required" name="user_username" />
            </div>
            <div class="form-outline mx-2 my-4">
                <!-- password -->
                <label for="user_password" class="form-label text-light"> Password</label>
                <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password" />
                
            </div>
            <div class="mx-2 my-4 pt-2 text-center">
                <input type="submit" value="Login" class="btn text-light" name="user_login">
                <p class="small fw-bold mt-2 pt-1 mb-0 text-light">Don't have an account ?<a href="user_registration.php" class="text-danger">Register</a></p>
            </div>
        </form>
    </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $select_query = "Select * from `user_table` where user_name='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    //cart item
    $select_query_cart = "Select * from `cart_details` where ip_address='$user_ip' and user_name='$user_username'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('../cart.php','_self')</script>";
            }
        } else {
            echo "<script>alert('UserName & password does not match')</script>";
        }
    } else {
        echo "<script>alert('UserName & password does not match')</script>";
    }
}
?>





















