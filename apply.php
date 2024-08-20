<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Job Application Page">
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

    <title>Application Form | JKL Tech</title>
</head>
<body class="apply">
    <nav>
        <?php include 'menu.inc'; ?>
    </nav>
    <div id="apply-form">
        <h1>Apply Now</h1><br>
        <p class="caption">Please complete this application form to apply and join the JKL Tech team.</p>
        <br><br>
        <p class="caption" id="message">Fields marked <span class="required">*</span> are required.</p>
        <form id="form" method="post" action="processEOI.php" novalidate="novalidate">
            <p><label for="referenceNum">Job Reference Number <span class="required">*</span></label>
                <input type="text" name="referenceNum" id="referenceNum" pattern="[a-zA-Z0-9]{5}" placeholder="e.g. A1001" required>
            </p>
            <fieldset>
                <legend><i class="fa fa-user-circle-o"></i>Profile</legend>
                <p><label for="firstName">First Name <span class="required">*</span></label>
                    <input type="text" name="firstName" id="firstName" pattern="[a-zA-Z ]{2,20}" placeholder="Enter your first name" required>
                </p>
                <p><label for="lastName">Last Name <span class="required">*</span></label>
                    <input type="text" name="lastName" id="lastName" pattern="[a-zA-Z ]{2,20}" placeholder="Enter your last name" required>
                </p>
                <p><label for="dob">Date of Birth <span class="required">*</span></label>
                    <input type="date" name="dob" id="dob" required>
                </p>
                <fieldset class="gender">
                    <legend class="gender">Gender <span class="required">*</span></legend>
                        <p><label for="genderM"><input type="radio" id="genderM" name="gender" value="Male" checked>Male</label>
                        <label for="genderF"><input type="radio" id="genderF" name="gender" value="Female">Female</label>
                        <label for="genderO"><input type="radio" id="genderO" name="gender" value="Other">Other</label>
                        </p>
                </fieldset>
                <p class="col-2"><label for="email">Email <span class="required">*</span></label>
                    <input type="email" name="email" id="email" pattern="[a-zA-Z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" placeholder="e.g. user@example.com" required>
                </p>
                <p class="col-2"><label for="confEmail">Confirm Email <span class="required">*</span></label>
                    <input type="email" name="confEmail" id="confEmail" pattern="[a-zA-Z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" placeholder="e.g. user@example.com" required>
                </p>
                <p><label for="phoneNum">Phone Number <span class="required">*</span></label>
                    <input type="tel" name="phoneNum" id="phoneNum" placeholder="e.g. 041234567" pattern="[0-9 ]{8,12}" required>
                </p>
            </fieldset>
            <br>
            <fieldset>
                <legend><i class="fa fa-home"></i>Address</legend>
                <p><label for="address">Street Address <span class="required">*</span></label>
                    <input type="text" name="address" id="address" maxlength="40" placeholder="Enter a street address" required>
                </p>
                <p><label for="suburb">Suburb/Town <span class="required">*</span></label>
                    <input type="text" name="suburb" id="suburb" maxlength="40" placeholder="Enter a suburb" required>
                </p>
                <p><label for="state">State <span class="required">*</span></label>
                    <select name="state" id="state" required>
                        <option value="">Please Select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                    </p>
                <p><label for="postcode">Postcode <span class="required">*</span></label>
                    <input type="text" name="postcode" id="postcode" pattern="[0-9]{4}" placeholder="Enter a postcode" required>
                </p>
            </fieldset>
            <br>
            <fieldset>
                <legend><i class="fa fa-cogs"></i>Skill List</legend>
                <p id="skills"><br>Select all that apply: <span class="required">*</span></p>
                <p><input type="checkbox" name="skills[]" id="skillsProgramming" value="Programming" checked><label for="skillsProgramming" class="checkbox">Proficient in programming</label></p>
                <p><input type="checkbox" name="skills[]" id="skillsIT" value="IT"><label for="skillsIT" class="checkbox">Strong IT skills and understanding</label></p>
                <p><input type="checkbox" name="skills[]" id="skillsOS" value="OS_Knowledge"><label for="skillsOS" class="checkbox">Operating system knowledge</label></p>
                <p><input type="checkbox" name="skills[]" id="skillsNetworkConf" value="Network_Conf"><label for="skillsNetworkConf" class="checkbox">Network configuration</label></p>
                <p><input type="checkbox" name="skills[]" id="skillsComm" value="Communication"><label for="skillsComm" class="checkbox">Communication</label></p>
                <p><input type="checkbox" name="skills[]" id="skillsPnA" value="ProblemSolving_Analytical"><label for="skillsPnA" class="checkbox">Problem-solving and analytical</label></p>
                <p><input type="checkbox" name="skills[]" id="skillsNone" value="None"><label for="skillsNone" class="checkbox">None of the above</label></p>
                <p><input type="checkbox" name="skills[]" id="skillsOther" value="Other"><label for="skillsOther" class="checkbox">Other skills</label></p>
                <p><label id="otherSkills">If you selected 'Other skills':<br><textarea name="otherSkills" rows="8" placeholder="List your other skills here."></textarea></label></p>
            </fieldset>
            <br>
            <input class="btn-primary" type="submit" value="Apply">
            <input class="btn-secondary" type="reset" value="Reset Form">
        </form>
    </div>

    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>