<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-registration</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .container-fluid form {
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
        }
        .hero{
    height: 100%;
    width:100%;
    background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(../images/lampp.jpg);
    background-position: center;
    background-size: cover;
    position: absolute;
}
    </style>
    <script>
        function validatePassword() {
            var password = document.getElementById("user_password").value;
            var confirmPassword = document.getElementById("conf_user_password").value;
            var alphabetRegex = /[a-zA-Z]/;
            var numberRegex = /[0-9]/;
            // Check if the password field is empty
            if (password === "") {
                alert("Please enter a password.");
                return false;
            }
            // Check if the password is at least 6 characters long
            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }
            // Check if the password and confirm password fields match
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            if (!alphabetRegex.test(password)) {
                alert("Password must contain at least one alphabet.");
                return false;
            }
            if (!numberRegex.test(password)) {
                alert("Password must contain at least one number.");
                return false;
            }
            alert("Registered Successfully.")
            return true;
        }
        function validateInput(event) {
            var input = event.target.value;
            var regex = /^[a-zA-Z\s]+$/;
            if (!regex.test(input)) {
                event.target.value = input.replace(/[^a-zA-Z\s]/g, '');
            }
        }
    </script>
</head>
<body>
    <div class="hero">
        <form action="" method="post" class="form-box border border-4" onsubmit="return validatePassword()">
            <div class="form-outline text-center text-light">
                <label for="" class="label m-auto ">
                    <h2>REGISTER</h2>
                </label>
            </div>
            <!-- username -->
            <div class="form-outline mx-4">
            <label for="user_username" class="form-label my-0 text-light">User name</label>
                <input type="text" id="user_username" class="form-control mb-1" placeholder="Enter your user name" autocomplete="off" required="required" name="user_username" minlength="3" maxlength="15" oninput="validateInput(event)" />
            </div>
            <!-- email -->
            <div class="form-outline mx-4">

                <label for="user_email" class="form-label  my-0 text-light">User Email</label>
                <input type="email" id="user_email" class="form-control mb-1" placeholder="Enter your Email Id" autocomplete="off" required="required" name="user_mail" />
            </div>
            <div class="form-outline mx-4">
                <!-- image -->
                <label for="user_image" class="form-label my-0 text-light">User Image</label>
                <input type="file" id="user_image" class="form-control mb-1" name="user_image" />
            </div>
            <div class="form-outline mx-4">
                <!-- password -->
                <label for="user_password" class="form-label my-0 text-light"> Password</label>
                <input type="password" id="user_password" class="form-control mb-1" placeholder="Enter your password" autocomplete="off" required="required" name="user_password" />
            </div>
            <div class="form-outline mx-4">
                <!-- confirm password -->
                <label for="conf_user_password" class="form-label my-0 text-light">Confirm Password</label>
                <input type="password" id="conf_user_password" class="form-control mb-1" placeholder="confirm password" autocomplete="off" required="required" name="conf_user_password" />
            </div>
            <!-- address field -->
            <div class="form-outline mx-4">
                <label for="user_address" class="form-label my-0 text-light">User Address</label>
                <input type="text" id="user_address" class="form-control mb-1" placeholder="Enter your address" autocomplete="off" required="required" name="user_address" />
            </div>
            <!-- contact field -->
            <div class="form-outline mx-4">
                <label for="user_contact" class="form-label my-0 text-light">Contact</label>
                <input type="text" id="user_contact" class="form-control mb-1" placeholder="Enter your mobile number" autocomplete="off" required pattern=".{10,}" title="Please enter valid number" name="user_contact" />
                </div>
            <div class="form-outline mx-5 text-center text-light">
                <input type="submit" value="Register" class="btn text-light" name="user_register">
                <p class="small fw-bold my-0 pt-1">Already have an account ?<a href="user_login.php" class="text-danger"> Login</a></p>
        </form>
    </div>
    </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_mail'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    //select query
    $select_query = "Select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('User name and email already exists')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        //insert query
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);

        echo "<script>window.open('user_login.php','_self')</script>";
    }
    //selecting cart items
    $select_cart_items = "Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $row_count = mysqli_num_rows($result_cart);
    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<scriptwindow.open('index.php','_self')</script>";
    }
}
?>



















