<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Process EOI Table">
    <meta name="keywords"  content="PHP, HTML, EOI table">
    <meta name="author"  content="JKL Tech - Joina Nicholas">
    <link rel="stylesheet" href="styles/style.css">
    <title>Process EOI</title>
</head>
<body class="processEOI">
    <?php
      require_once 'settings.php';

      //sanitise function
      function sanitise_input($data){
        if (is_array($data)){
          foreach ($data as $key => $value){
            $data[$key] = sanitise_input($value);
          }
        } else {
          $data = htmlspecialchars($data);
          $data = stripslashes($data);
          $data = trim($data);
        }
        return $data;
      } 
      
      //validating postcodes match states
      function valid_postcode($postcode, $state){
        $state_postcode_ranges = [
          'VIC' => ['3'],
          'NSW' => ['1', '2'],
          'QLD' => ['4'],
          'NT' => ['0'],
          'WA' => ['6'],
          'SA' => ['5'],
          'TAS' => ['7'],
          'ACT' => ['0']
        ];
        if (isset($state_postcode_ranges[$state])){
          return in_array($postcode[0], $state_postcode_ranges[$state]);
        } else {
          return false;
        }
      }

      //ensuring form submitted via POST method
      if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        header('Location: apply.php');
        exit();
      }
      
      //sanitising fields
      $errors = [];

      if (!empty($_POST["referenceNum"])){
        $referenceNum = sanitise_input($_POST["referenceNum"]);
        if ($referenceNum !== 'IT001' && $referenceNum !== 'QA002' && $referenceNum !== 'CS003'){
          $errors[] = "Invalid reference number.";
        }
      } else {
          $errors[] = "Job reference number is required.";
      }

      if (!empty($_POST["firstName"])){
        $firstName = sanitise_input($_POST["firstName"]);
        if (!preg_match('/^[a-zA-Z ]{2,20}$/', $firstName)){
          $errors[] = "Letters and white spaces only for the first name.";
        }
      } else {
          $errors[] = "First name is required.";
      }

      if (!empty($_POST["lastName"])){
        $lastName = sanitise_input($_POST["lastName"]);
        if (!preg_match('/^[a-zA-Z ]{2,20}$/', $lastName)){
          $errors[] = "Letters and white spaces only for the last name";
        }
      } else {
          $errors[] = "Last name is required.";
      }

      if (!empty($_POST["dob"])){
        $dob = sanitise_input($_POST["dob"]);      
        if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $dob)){
         $errors[] = "Invalid date format.";
        } else {
          $birthdate = new DateTime($dob);
          $today = new DateTime();
          $age = $birthdate->diff($today);
          $years = $age->y;
          if ($years <= 15 || $years >= 80 ){
            $errors[] = "Age must be between 15 and 80.";
          }
        }
      } else {
          $errors[] = "Date of birth is required.";
      }

      if (!empty($_POST["gender"])){
        $gender = sanitise_input($_POST["gender"]);
      } else {
        $errors[] = "Gender is required.";
      }

      if (!empty($_POST["address"])){
        $address = sanitise_input($_POST["address"]);
        if (!preg_match('/^[a-zA-Z0-9 ]{1,40}$/', $address)){
          $errors[] = "Street address must be up to 40 characters.";
        }
      } else {
          $errors[] = "Street address is required.";
      }

      if (!empty($_POST["suburb"])){
        $suburb = sanitise_input($_POST["suburb"]);
        if (!preg_match('/^[a-zA-Z0-9 ]{1,40}$/', $suburb)){
          $errors[] = "Suburb must be up to 40 characters.";
        }
      } else {
          $errors[] = "Suburb is required.";
      }
      
      if (!empty($_POST["state"])){
        $state = sanitise_input($_POST["state"]);
        if (!in_array($state, ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'])){
          $errors[] = "Invalid state.";
        }
      } else {
          $errors[] = "State is required.";
          $state = '';
      }

      if (!empty($_POST["postcode"])){
        $postcode = sanitise_input($_POST["postcode"]);
        if (!preg_match('/^[0-9]{4}$/', $postcode) || !valid_postcode($postcode, $state)){
          $errors[] = "Invalid postcode.";
        }
      } else {
          $errors[] = "Postcode is required.";
      }
      
      if (!empty($_POST["email"])){
        $email = sanitise_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors[] = "Invalid email."; 
        }
      } else {
          $errors[] = "Email is required.";
      }

      if (!empty($_POST["confEmail"])){
        $confEmail = sanitise_input($_POST["confEmail"]);
        if (!isset($email)){
          $email = '';
        }
        if ($confEmail !== $email){
          $errors[] = "Emails do not match."; 
        }
      } else {
          $errors[] = "Confirm email is required.";
      }

      if (!empty($_POST["phoneNum"])){
        $phoneNum = sanitise_input($_POST["phoneNum"]);
        if (!preg_match('/^[0-9 ]{8,12}$/', $phoneNum)){
          $errors[] = "Invalid phone number.";
        }
      } else {
          $errors[] = "Phone number is required.";
      }

      if (!empty($_POST['skills'])){
        $skills = $_POST['skills'];
        $skills_sanitised = [];
        foreach($skills as $skill){
          $skills_sanitised[] = sanitise_input($skill);
        }
        $skills = $skills_sanitised;
      } else {
          $errors[] = "Please select a skill.";
          $skills = [];
      }
      
      if (isset($_POST['otherSkills'])){
        $otherSkills = sanitise_input($_POST["otherSkills"]);
        if (in_array('Other', $skills) && empty($otherSkills)){
          $errors[] = "If you checked 'Other skills', it must be provided.";
        }
        if (!empty($otherSkills) && !(in_array('Other', $skills))){
          $skills[] = 'Other';
        }
      } else {
          $otherSkills = '';
      }

      //error page
      if (!empty($errors)){
        echo "<div class='message'>";
        echo "<h2>Oops!</h2>";
        echo "<h3>There were errors in your form:</h3>";
        foreach ($errors as $error){
          echo "<ul class='error-list'><li>$error</li></ul>";
        }
        echo "</div>";
        exit();
      }
      
      //check connection 
      if ($conn){
        //create eoi table if it does not exists
        $check_table_query = "SHOW TABLES LIKE 'EOI'";
        $result_table = mysqli_query($conn, $check_table_query);
        if (mysqli_num_rows($result_table) == 0){
          $create_table_query = "CREATE TABLE EOI(
            EOINum INT AUTO_INCREMENT PRIMARY KEY,
            referenceNum VARCHAR(5) NOT NULL,
            firstName VARCHAR(20) NOT NULL,
            lastName VARCHAR(20) NOT NULL,
            dob DATE NOT NULL, 
            gender VARCHAR(10) NOT NULL,
            email VARCHAR(50) NOT NULL,
            phoneNum VARCHAR(15) NOT NULL,
            address VARCHAR(40) NOT NULL, 
            suburb VARCHAR(40) NOT NULL,
            state VARCHAR(3) NOT NULL,
            postcode VARCHAR(4) NOT NULL,
            skills TEXT NOT NULL,
            otherSkills TEXT,
            status VARCHAR(20) NOT NULL DEFAULT 'New')";
          if (!mysqli_query($conn, $create_table_query)){
            echo "Error creating table: " . mysqli_error($conn);
          } 
        }
        //insert data into eoi table
        $skills = implode(", ", $skills);
        $record_query = "INSERT INTO EOI (referenceNum, firstName, lastName, dob, gender, email, phoneNum, address, suburb, state, postcode, skills, otherSkills, status) 
        VALUES ('$referenceNum', '$firstName', '$lastName', '$dob', '$gender', '$email', '$phoneNum', '$address', '$suburb', '$state', '$postcode', '$skills', '$otherSkills', 'New')";
          $result_record = mysqli_query($conn, $record_query);
          if (!$result_record){
            echo "<p class='wrong-line'>Error: " . mysqli_error($conn) . "</p>";
          } else {
              $EOINum = mysqli_insert_id($conn);
              echo "<div class='message'>";
              echo "<h2>Thank you for applying!</h2>";
              echo "<p>Your EOI number is $EOINum.</p>";
              echo "<img class='success-img' src='images/happycircle.jpeg' alt='groupofhappypeople'>";
              echo "<a class='apply-link' href='apply.php'>Return to apply page</a>";
              echo "</div>";
          }
        //free results and close connection
        mysqli_free_result($result_table);
        mysqli_close($conn);
        exit();
      }      
    ?>
</body>
</html>