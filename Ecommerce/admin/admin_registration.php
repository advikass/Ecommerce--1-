<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!--Bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>



    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin-regis.avif" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="for-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter username" required="required" class="form-control" autocomplete="off">
                    </div>
                    <div class="for-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="username" placeholder="Enter Email" required="required" class="form-control">
                    </div>
                    <div class="for-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password" required="required" class="form-control">
                    </div>
                    <div class="for-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn bg-info py-2 px-3 mb-2" name="admin_registration" value="Register">
                        <p class="small fw-bold">Already have an account?<a href="admin_login.php" class="text-danger text-decoration-none">Login</a></p>
                    </div>

                </form>

            </div>


        </div>



    </div>

</body>

</html>