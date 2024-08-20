<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Process EOI Table">
    <meta name="keywords"  content="PHP, HTML, EOI table">
    <meta name="author"  content="JKL - Joina Nicholas">

    <link href="styles/style.css" rel="stylesheet">
    <link rel="icon" href="images/icon-logo.png">
    <!-- Open Sans font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Log In Page | JKL Tech</title>
</head>
<?php
    session_start();
    if(isset($_SESSION["manager"])) {
        header("location: manage.php");
    } else {
?>
<body class="login">
    <div id="apply-form">
        <h2>Log In</h2>
        <form method="POST" action="processLogin.php" novalidate="novalidate">
            <label for="username">Username <span class="required">*</span></label>
            <input type="text" id="username" name="username" pattern="[a-zA-Z0-9_ ]{5,20}" required>
            <label id="login-show-icon" for="show-hide-password"><i class="fa fa-eye"></i></label>
            <input type="checkbox" id="show-hide-password" name="show-hide-password">
            <label for="password">Password <span class="required">*</span></label>
            <input type="text" id="password" name="password" pattern="(?=.*[A-Z])(?=.*[0-9]).{8,}" required>
            <br><br><br>
            <input class="btn-primary" type="submit" value="Log in">
            <a class="btn-secondary" href="register.html">Sign up</a>
        </form>
    </div>    
</body>
<?php
}
?>
</html>