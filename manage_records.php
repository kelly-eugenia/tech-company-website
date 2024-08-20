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

            function sanitise_input($data){
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                $data = trim($data);
                return $data;
            }
            
            $searchall = @$_POST['searchall'];
            $searchall = sanitise_input($searchall);

            $searchjob = @$_POST['searchjob'];
            $searchjob = sanitise_input($searchjob);

            $searchfname = @$_POST['searchfname'];
            $searchfname = sanitise_input($searchfname);

            $searchlname = @$_POST['searchlname'];
            $searchlname = sanitise_input($searchlname);

            if (isset($_POST['btnAll'])) {
                $searchjob = null;
                $searchfname = null;
                $searchlname = null;
            } elseif (isset($_POST['btnJob'])) {
                $searchall = null;
                $searchfname = null;
                $searchlname = null;
            } elseif (isset($_POST['btnName'])) {
                $searchall = null;
                $searchjob = null;  
            }

            if (!empty($searchall)) {
                $query = "SELECT EOINum, referenceNum, firstName, lastName, email, phoneNum, address, suburb, state, postcode, skills, otherSkills, status
                FROM EOI WHERE (EOINum LIKE '%$searchall%') OR (referenceNum LIKE '%$searchall%') 
                OR (CONCAT(firstName, ' ', lastName) LIKE '%$searchall%') OR (email LIKE '%$searchall%') OR (phoneNum LIKE '%$searchall%') 
                OR (CONCAT(address, ' ', suburb, ' ', state, ' ', postcode) LIKE '%$searchall%') OR (skills LIKE '%$searchall%') 
                OR (otherSkills LIKE '%$searchall%') OR (status LIKE '%$searchall%')";
            } elseif (!empty($searchjob)) {
                $query = "SELECT * FROM EOI WHERE referenceNum LIKE '%$searchjob%'";
            } elseif (!empty($searchfname) && !empty($searchlname)) {
                $query = "SELECT * FROM EOI WHERE firstName LIKE '%$searchfname%' AND lastName LIKE '%$searchlname%'";
            } elseif (!empty($searchfname)) {
                $query = "SELECT * FROM EOI WHERE firstName LIKE '%$searchfname%'";
            } elseif (!empty($searchlname)) {
                $query = "SELECT * FROM EOI WHERE lastName LIKE '%$searchlname%'";
            } else {
                $query = "SELECT * FROM EOI";
            }
            
            $sort = null;
            if (isset($_POST['btnSort'])) {
                $sort = @$_POST['order'];
                $query .= " ORDER BY $sort ASC";
            }

            $result = mysqli_query($conn, $query);

            $username = $_SESSION['manager'];
            $queryName = "SELECT * FROM Managers WHERE username='$username'";
            $resultName = mysqli_query($conn, $queryName);
            $data = mysqli_fetch_assoc($resultName);

            //checks if execution is successful
            if (!$result) {
                echo "<p>Something is wrong with ", $query, "</p>";
            } elseif (!$resultName) {
                echo "<p>Something is wrong with ", $queryName, "</p>";
            } else { 
                ?>
        
        <div class="sidebar">
            <a id="homebtn" href="index.php"><i class='fa fa-home fa-lg'></i></a>
            <h2>Welcome, <?php echo $data["name"]; ?></h2>
            <input type="checkbox" id="barbutton">
            <div id="baricon">
                <label for="barbutton">&#x2630;</label>
            </div>
            <div id="barlinks">
                <a href="manage.php"><i class='fa fa-tachometer fa-lg'></i><br>Dashboard</a>
                <a class="active" href="manage_records.php"><i class='fa fa-database fa-lg'></i><br>EOI Records</a>
                <a href="logout.php" id="logout"><i class='fa fa-sign-out fa-lg'></i><br>Logout</a>
            </div>
        </div>

        <div class="content">

        <section>
            <div id="search">
                <div id="buttons">
                    <p><strong>Search for</strong></p>
                    <a href="#searchBar" class="btn-secondary">All</a>
                    <a href="#searchJob" class="btn-secondary">Position</a>
                    <a href="#searchName" class="btn-secondary">Applicant</a>
                    <a href="" class="btn-primary" id="display">Display All</a>
                </div>

                <form name="searchsort" action="" method="post">
                    <div id="searchBar">
                        <input type="text" name="searchall" id="searchall" placeholder="Search..." value="<?php if (isset($_POST['btnAll']) || isset($_POST['btnSort'])) { echo sanitise_input($searchall); } else { echo '';} ?>">
                        <button type="submit" class="btn-primary" name="btnAll" id="btnAll" value="Search">Search <i class="fa fa-search"></i></button>
                    </div>
                    
                    <div id="searchJob">
                        <input type="text" name="searchjob" id="searchjob" placeholder="Enter Job Reference Number" value="<?php if (isset($_POST['btnJob']) || isset($_POST['btnSort'])) { echo sanitise_input($searchjob); } else { echo '';} ?>">
                        <button type="submit" class="btn-primary" name="btnJob" id="btnJob" value="Search">Search <i class="fa fa-search"></i></button>
                    </div>

                    <div id="searchName">
                        <input type="text" name="searchfname" id="searchfname" placeholder="Enter First Name" value="<?php if (isset($_POST['btnName']) || isset($_POST['btnSort'])) { echo sanitise_input($searchfname); } else { echo '';} ?>">
                        <input type="text" name="searchlname" id="searchlname" placeholder="Enter Last Name" value="<?php if (isset($_POST['btnName']) || isset($_POST['btnSort'])) { echo sanitise_input($searchlname); } else { echo '';} ?>">                    
                        <button type="submit" class="btn-primary" name="btnName" id="btnName" value="Search">Search <i class="fa fa-search"></i></button>
                    </div> 
                </div>

                <div id="sort">
                    <select name="order" id="order">
                        <option value="">Sort by:</option>
                        <option value="EOINum" <?php if($sort == 'EOINum'){ echo 'selected'; }?> >ID</option>
                        <option value="referenceNum" <?php if($sort == 'referenceNum'){ echo 'selected'; }?> >Job Reference Number</option>
                        <option value="firstName" <?php if($sort == 'firstName'){ echo 'selected'; }?> >Name</option>
                        <option value="status" <?php if($sort == 'status'){ echo 'selected'; }?> >Status</option>
                    </select>
                    <button type="submit" class="btn-primary" name="btnSort" id="btnSort"></input>Sort <i class="fa fa-sort"></i></button>
                </div>
            </form>
        </section>

                <div id="tablerecords">
                <table>
                <tr>
                    <th class="smallcolumn">ID</th>
                    <th class="medcolumn">Job Reference Number</th>
                    <th class="bigcolumn">Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th class="bigcolumn">Address</th>
                    <th>Skills</th>
                    <th>Other Skills</th>
                    <th class="medcolumn">Status</th>
		            <th class="smallcolumn"></th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>', $row["EOINum"], '</td>';
                    echo '<td>', $row["referenceNum"], ' <a href="delete_job.php?referenceNum='.$row["referenceNum"].'"><i class="fa fa-trash"></i></a></td>';
                    echo '<td>', $row["firstName"], ' ' , $row["lastName"],'</td>';
                    echo '<td>', $row["email"], '</td>';
                    echo '<td>', $row["phoneNum"], '</td>';
                    echo '<td>', $row["address"], '<br>', $row["suburb"], ' ', $row["state"], ' ', $row["postcode"], '</td>';
                    echo '<td>', $row["skills"], '</td>';
                    echo '<td>', $row["otherSkills"], '</td>';
                    echo '<td>', $row["status"], '<a href="edit_status.php?EOINum='.$row["EOINum"].'"><i class="fa fa-pencil"></i></a></td>';
                    echo '<td><a href="delete_record.php?EOINum='.$row["EOINum"].'"><i class="fa fa-trash"></i></a></td>';
                    echo '</tr>';
                }
                echo "</table></div>";
                //frees up the memory after using the result pointer
                mysqli_free_result($result);
            }
            //close the database connection
            mysqli_close($conn);
        }
    }
?>
</div>
</body>
</html>