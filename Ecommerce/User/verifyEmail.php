<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot.css">
</head>

<body>
    <div id="container">
        <h2>Email </h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
        <form action="user_login.php" method="POST" autocomplete="off">
            <?php
           /* if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php

                }
            }*/
            ?>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="submit" name="forgot_password" value="Check">
        </form>
    </div>


</body>

</html>