<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage Page">
    <meta name="keywords" content="HTML, tags, webpage">
    <meta name="author" content="JKL - Kelly Sutopo">
    
    <link href="styles/style.css" rel="stylesheet">
    <link rel="icon" href="images/icon-logo.png">
    <!-- Open Sans font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Manage Queries | JKL Tech</title>
</head>
<body class="manage">

<?php
    require_once("settings.php");
    session_start();

    if(!isset($_SESSION['manager'])) {
        header("location: login.php");
    } else {

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        //checks if connection is successful
        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            $sql_table = "EOI";

            $queryAll = "SELECT * FROM EOI";
            $resultAll = mysqli_query($conn, $queryAll);
            
            $queryNew = "SELECT * FROM EOI WHERE status = 'New'";
            $resultNew = mysqli_query($conn, $queryNew);

            $queryCurrent = "SELECT * FROM EOI WHERE status = 'Current'";
            $resultCurrent = mysqli_query($conn, $queryCurrent);

            $queryFinal = "SELECT * FROM EOI WHERE status = 'Final'";
            $resultFinal = mysqli_query($conn, $queryFinal);

            $username = $_SESSION['manager'];
            $queryName = "SELECT * FROM Managers WHERE username='$username'";
            $resultName = mysqli_query($conn, $queryName);
            $data = mysqli_fetch_assoc($resultName);

            //checks if execution is successful
            if (!$resultAll) {
                echo "<p>Something is wrong with ", $queryAll, "</p>";
            } elseif (!$resultNew) {
                echo "<p>Something is wrong with ", $queryNew, "</p>";
            } elseif (!$resultCurrent) {
                echo "<p>Something is wrong with ", $queryCurrent, "</p>";
            } elseif (!$resultFinal) {
                echo "<p>Something is wrong with ", $queryFinal, "</p>";
            } elseif (!$resultName) {
                echo "<p>Something is wrong with ", $queryName, "</p>";
            } else { 
                $countAll = mysqli_num_rows($resultAll);
                $countNew = mysqli_num_rows($resultNew);
                $countCurrent = mysqli_num_rows($resultCurrent);
                $countFinal = mysqli_num_rows($resultFinal);
                ?>
        
        <div class="sidebar">
            <a id="homebtn" href="index.php"><i class='fa fa-home fa-lg'></i></a>
            <h2>Welcome, <?php echo $data["name"]; ?></h2>
            <input type="checkbox" id="barbutton">
            <div id="baricon">
                <label for="barbutton">&#x2630;</label>
            </div>
            <div id="barlinks">
                <a class="active" href="manage.php"><i class='fa fa-tachometer fa-lg'></i><br>Dashboard</a>
                <a href="manage_records.php"><i class='fa fa-database fa-lg'></i><br>EOI Records</a>
                <a href="logout.php" id="logout"><i class='fa fa-sign-out fa-lg'></i><br>Logout</a>
            </div>
        </div>

        <div class="content dashboard">
            <h2>Number of EOIs</h2>
            <div class="stats" id="all">
                <h1><?php echo $countAll; ?></h1>
                <h3>Total</h3>
                <a href="manage_records.php"><i class='fa fa-arrow-circle-o-right fa-lg'></i>See details</a>
            </div>
            <br>
            <div class="stats" id="new">
                <h1><?php echo $countNew; ?></h1>
                <h3>New</h3>
            </div>
            <div class="stats" id="current">
                <h1><?php echo $countCurrent; ?></h1>
                <h3>Current</h3>
            </div>
            <div class="stats" id="final">
                <h1><?php echo $countFinal; ?></h1>
                <h3>Final</h3>
            </div>
        </div>

                <?php
                //frees up the memory after using the result pointer
                mysqli_free_result($resultAll);
                mysqli_free_result($resultNew);
                mysqli_free_result($resultCurrent);
                mysqli_free_result($resultFinal);
            }
            //close the database connection
            mysqli_close($conn);
        }
    }
?>
</body>
</html>