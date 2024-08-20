<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enhancements Page">
    <meta name="keywords" content="HTML, tags, webpage">
    <meta name="author" content="JKL">
    
    <link href="styles/style.css" rel="stylesheet">
    <link rel="icon" href="images/icon-logo.png">
    <!-- Open Sans font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Enhancements | JKL Tech</title>
</head>
<body class="enhancements">
    <nav>
        <?php include 'menu.inc'; ?>
    </nav>
    <header class="title">
        <h1>Enhancements for Assignment 2</h1>
    </header>
    <article>
        <section>
            <h2>Sort</h2>
            <p>On the management page, we implemented the ability to <strong>select the field on which to sort the order of the EOI records.</strong> The code is written and integrated in <em>manage_records.php.</em></p>
            <p>A select dropdown input is added where the manager can choose which column to sort by. When the submit button for the Sort field is clicked, 
                the value of the input is collected and stored in variable $sort, which is null by default. The MySQL $query is then appended with " ORDER BY $sort ASC" 
                to make the table be displayed in the specified order.<br>
                The Sort input is placed in the same form as the Search input fields so that the sorting will also take into account the search inputs and will only sort and display the records found. 
                Yet, the submit buttons are separated with different name and id attributes to still distinguish the two functions.
            </p>
        </section>
        <hr>
        <section>
            <h2>Log In and Sign Up</h2>
            <p>The register page allows for managers to make an account for the database if they <strong>do not already have an account.</strong> The username must be <strong>unique</strong> and also follow specific requirements (e.g. at least 5 characters long etc). The password must <strong>meet the requirements of the rule</strong> provided (for e.g. must be at least 8 characters long etc). Once they have successfully made an account, they can redirect to the login page to sign into the database. However, after a number of <strong>login attempts</strong> it will <strong>disable</strong> the user from logging in after a certain time. The code for the register form is located in the <em>register.html and the processRegister.php.</em> The code for the login form can be found in the <em>login.html and processLogin.php</em></p>
            <p>After a user chooses a username and password, if it already exists in the 'Manager' table of the database using 'mysqli_num_rows', a page pops up indicating that the username cannot be used. If the username and password also do not meet the requirements, a friendly error page listing each issue will pop up. <br>
            Once the account has been made, users can now try to login on the login page. Every incorrect password will result in an error page showing that the password is not correct and the number of attempts left. After 3 attempts the user is locked out from attempting for 30 seconds by utilising 'session_start()' and '$_SESSION'. <p>
        </section>
    </article>

    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>