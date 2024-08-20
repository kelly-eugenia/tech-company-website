<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login page to the database">
    <meta name="keywords" content="PHP, MySql, HTML">
    <meta name="author" content="JKL - Joina Nicholas">
    
    <link href="styles/style.css" rel="stylesheet">
    <link rel="icon" href="images/icon-logo.png">
    <!-- Open Sans font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Process Login</title>
</head>
<body>
    <?php
        require_once 'settings.php';
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
            echo header ('location: login.php');
            exit();
        }

        function sanitise_input($data){
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            $data = trim($data);
            return $data;
        }

        //validates and sanitises fields
        $errors = [];
        if (!empty($_POST['username'])){
            $username = sanitise_input($_POST['username']);
        } else{ 
            $errors[] = "Username is required.";           
        }
        if (!empty($_POST['password'])){
            $password = sanitise_input($_POST['password']);
        } else{ 
            $errors[] = "Password is required.";           
        }

        if (!empty($errors)){
            echo "<div class='message'>";
            echo "<h2>Oops!</h2>";
            echo "<h3>There were errors in your login: </h3><br>";
            foreach ($errors as $error){
              echo "<ul class='error-list'><li>$error</li></ul>";
            }
            echo "</div>";
            exit();
        }
        
        //initialising attempts and creating lockout time
        if (!isset($_SESSION['attempts'])){
            $_SESSION['attempts'] = 0;
        }
        
        $lockout_duration = 30;
        $current_time = time();
        $lockout_time = isset($_SESSION['lockout_time']) ? $_SESSION['lockout_time']:0;
        
        if ($_SESSION['attempts'] >= 3 && ($current_time - $lockout_time) < $lockout_duration){
            $remaining_lockout_time = $lockout_duration - ($current_time - $lockout_time);
            echo "<div class='message'><p class='wrong-line'>You can try again in $remaining_lockout_time seconds.</p></div>";
            exit();
        }

        if ($_SESSION['attempts'] >= 3 && ($current_time - $lockout_time) >= $lockout_duration){
            $_SESSION['attempts'] = 0;
            $_SESSION['lockout_time'] = 0;
        }
        
        //handling login and password attempts
        if($conn){
            $login_query = "SELECT * FROM Managers WHERE username='$username'";
            $result_login = mysqli_query($conn, $login_query);
            
            if (mysqli_num_rows($result_login) == 1){
                $row = mysqli_fetch_assoc($result_login);
                if ($password == $row['password']){
                    $_SESSION['manager'] = $username;
                    $_SESSION['attempts'] = 0;
                    header('location: manage.php');
                    exit();
                } else {
                    $_SESSION['attempts'] += 1;
                    if ($_SESSION['attempts'] >= 3){
                        $_SESSION['lockout_time'] = $current_time;
                    }

                    echo "<div class='message'><p class='wrong-line'>Invalid password. You have " . (3 - $_SESSION['attempts']) . " attempt(s) left.</p></div>";

                    if ($_SESSION['attempts'] >= 3){
                        echo "<h3 class='wrong-line'>Too many failed login attempts. Please try again later.</h3>";
                        exit();
                    }
                }
            } else {
                echo "<div class='message'>";
                echo "<h2>Oops!</h2>";
                echo "<p class='wrong-line'>Invalid username.<p>";
                echo "</div>";
                exit();
            }

            mysqli_free_result($result_login);
            mysqli_close($conn);
            exit();
        }
    ?>
</body>
</html>