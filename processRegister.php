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
    
    <title>Register Manager</title>
</head>
<body>
    <?php
        require_once 'settings.php';

        //sanitise function
        function sanitise_input($data){
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            $data = trim($data);
            return $data;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
            echo header ('location: register.html');
            exit();
        }

        $errors = [];
        if (!empty($_POST['name'])){
            $name = sanitise_input($_POST['name']);
            if (!preg_match('/^[a-zA-Z ]{2,50}$/', $name)){
                $errors[] = "Name must be maximum 50 characters long and can only contain letters or white spaces.";
            }
        } else{ 
            $errors[] = "Name is required.";           
        }
        if (!empty($_POST['username'])){
            $username = sanitise_input($_POST['username']);
            if (!preg_match('/^[a-zA-Z0-9_ ]{5,20}$/', $username)){
                $errors[] = "Username must be 5-20 characters long and can only contain letters, numbers, and underscores.";
            }
        } else{ 
            $errors[] = "Username is required.";           
        }
        if (!empty($_POST['password'])){
            $password = sanitise_input($_POST['password']);
            if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9]).{8,}$/', $password)){
                $errors[] = "Password must be at least 8 characters long and contain at least one uppercase letter and one number.";
            }
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

        if ($conn){
            //create eoi table if it does not exists
            $check_table_query = "SHOW TABLES LIKE 'Managers'";
            $result_table = mysqli_query($conn, $check_table_query);
            if (mysqli_num_rows($result_table) == 0){
              $create_table_query = "CREATE TABLE Managers(
                username VARCHAR(20) NOT NULL PRIMARY KEY UNIQUE,
                password VARCHAR(20) NOT NULL,
                name VARCHAR(50) NOT NULL)";
              if (!mysqli_query($conn, $create_table_query)){
                echo "<div class='message'><p class='wrong-line'>Error creating table: " . mysqli_error($conn) . "</p></div>";
              } 
            }
            
            $username_query = "SELECT * FROM Managers WHERE username='$username'";
            $result_username = mysqli_query($conn, $username_query);
            if (mysqli_num_rows($result_username) > 0){
                echo "<div class='message'><p class='wrong-line'>That username already exists. Please choose a different username.</p></div>";
                exit();
            }

            $record_query = "INSERT INTO Managers (username, password, name) VALUES ('$username', '$password', '$name')";
            $result_record = mysqli_query($conn, $record_query);
            if (!$result_record){
                echo "<p class='wrong-line'>Something went wrong.</p>";
            } else{
                echo "<div class='message'><h2>Successfully registered.</h2>";
                echo "<p>You can now login.</p>";
                echo "<a href='login.php'>Log in</a></div>";
            }

            mysqli_free_result($result_table);
            mysqli_free_result($result_username);
            mysqli_close($conn);
            exit();
        }
    ?>
</body>
</html>