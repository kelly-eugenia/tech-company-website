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

    <title>Delete Job Position</title>
</head>
<?php
require_once("settings.php");
session_start();

if(!isset($_SESSION['manager'])) {
    header("location: login.php");
} else {

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    $id = $_GET["referenceNum"];

    if (isset($_POST["submit"])) {
        // Check connection
        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            $sql_table = "EOI";

            // sql to delete a record
            $query = "DELETE FROM EOI WHERE referenceNum = '".$id."'";

            $result = mysqli_query($conn, $query);
            //checks if execution is successful
            if (!$result) {
                echo "<p>Error deleting records.</p>";
            } else {
                echo "Records deleted successfully.";
                header("location: manage_records.php");
            }
            mysqli_close($conn);
        }
    } else if(isset($_POST["cancel"])) {
        header("location: manage_records.php");
    } else {
        ?>
        <body class="delete">
            <section>
                <h2>Are you sure you want to delete all EOIs with Job Reference Number <?php echo $id;?>?</h2>
                <form method="post" action="delete_job.php?referenceNum=<?php echo $id; ?>">
                    <button class="btn-secondary" type="cancel" name="cancel" id="cancel">Cancel</button> <button class="btn-primary" type="submit" name="submit" id="submit">Delete All Records</button>
                </form>
            </section>
        </body>
<?php
}
}
?>
</html>