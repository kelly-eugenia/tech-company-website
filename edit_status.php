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

    <title>Edit Record</title>
</head>

<?php
require_once("settings.php");
session_start();

if(!isset($_SESSION['manager'])) {
    header("location: login.php");
} else {

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    $id = $_GET["EOINum"];

    //checks if connection is successful
    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        $sql_table = "EOI";

        if (isset($_POST["submit"])) {
            $status = $_POST["status"];

            $query = "UPDATE EOI SET status = '".$status."' WHERE EOINum = '".$id."'";
            
            $result = mysqli_query($conn, $query);
            //checks if execution is successful
            if (!$result) {
                echo "<p>Something is wrong with ", $query, "</p>";
            } else { 
                echo "Your data has been edited successfully.";
                header("location: manage_records.php");
            }
        } elseif(isset($_POST["cancel"])) {
            header("location: manage_records.php");
        } else {
            $query = "SELECT * FROM EOI WHERE EOINum = $id";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<p>Something is wrong with ", $query, "</p>";
            } else { 
                $data = mysqli_fetch_assoc($result);
            ?>

        <body class="edit">
            <div id="apply-form">
                <h2>Edit Status of EOI Record <?php echo $data["EOINum"] ?></h2>
                <form id="editStatus" action="edit_status.php?EOINum=<?php echo $id; ?>" method="post">
                    <p><label for="referenceNum">Job Reference Number <span class="required">*</span></label>
                        <input type="text" name="referenceNum" id="referenceNum" value="<?php echo $data["referenceNum"]; ?>" readonly>
                    </p>
                    <fieldset>
                        <legend><i class="fa fa-user-circle-o"></i>Profile</legend>
                        <p><label for="firstName">First Name <span class="required">*</span></label>
                            <input type="text" name="firstName" id="firstName" value="<?php echo $data["firstName"]; ?>" readonly>
                        </p>
                        <p><label for="lastName">Last Name <span class="required">*</span></label>
                            <input type="text" name="lastName" id="lastName" value="<?php echo $data["lastName"]; ?>" readonly>
                        </p>
                        <p><label for="dob">Date of Birth <span class="required">*</span></label>
                            <input type="date" name="dob" id="dob" value="<?php echo $data["dob"]; ?>" readonly>
                        </p>
                        <p><label for="gender">Gender <span class="required">*</span></label>
                            <input type="text" name="gender" id="gender" value="<?php echo $data["gender"]; ?>" readonly>
                        </p>
                        <p><label for="email">Email <span class="required">*</span></label>
                            <input type="email" name="email" id="email" value="<?php echo $data["email"]; ?>" readonly>
                        </p>
                        <p><label for="phoneNum">Phone Number <span class="required">*</span></label>
                            <input type="tel" name="phoneNum" id="phoneNum" value="<?php echo $data["phoneNum"]; ?>" readonly>
                        </p>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend><i class="fa fa-home"></i>Address</legend>
                        <p><label for="address">Street Address <span class="required">*</span></label>
                            <input type="text" name="address" id="address" value="<?php echo $data["address"]; ?>" readonly>
                        </p>
                        <p><label for="suburb">Suburb/Town <span class="required">*</span></label>
                            <input type="text" name="suburb" id="suburb" value="<?php echo $data["suburb"]; ?>" readonly>
                        </p>
                        <p><label for="state">Suburb/Town <span class="required">*</span></label>
                            <input type="text" name="state" id="state" value="<?php echo $data["state"]; ?>" readonly>
                        </p>
                        <p><label for="postcode">Postcode <span class="required">*</span></label>
                            <input type="text" name="postcode" id="postcode" value="<?php echo $data["postcode"]; ?>" readonly>
                        </p>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend><i class="fa fa-cogs"></i>Skill List</legend>
                        <p><label for="skills">Skills <span class="required">*</span></label>
                            <input type="text" name="skills" id="skills" value="<?php echo $data["skills"]; ?>" readonly>
                        </p>
                        <p><label for="otherSkills">Other skills</label>
                            <input type="text" name="otherSkills" id="otherSkills" value="<?php if(!empty($data["otherSkills"])) { echo $data["otherSkills"]; } else { echo "--"; } ?>" readonly>
                        </p>
                    </fieldset>
                    <p><label for="status">Status <span class="required">*</span></label>
                        <select name="status" id="status" required>
                            <option value="New" <?php if($data["status"] == 'New'){ echo 'selected'; }?> >New</option>
                            <option value="Current" <?php if($data["status"] == 'Current'){ echo 'selected'; }?> >Current</option>
                            <option value="Final" <?php if($data["status"] == 'Final'){ echo 'selected'; }?> >Final</option>
                        </select>
                    </p>
                    <button class="btn-primary" type="submit" name="submit" id="submit">Submit</button>
                    <button class="btn-secondary" type="cancel" name="cancel" id="cancel">Cancel</button>
                </form>
            </div>
        </body>
            <?php
                mysqli_free_result($result);
                mysqli_close($conn);
            }
        }
    }
}
?>
</html>