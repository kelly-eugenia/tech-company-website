<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About Page">
    <meta name="keywords" content="HTML, tags, webpage">
    <meta name="author" content="JKL - Kelly Sutopo & Luke Nervosa">
    
    <link href="styles/style.css" rel="stylesheet">
    <link rel="icon" href="images/icon-logo.png">
    <!-- Open Sans font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>About | JKL Tech</title>
</head>
<body class="about">
  <nav>
    <?php include 'menu.inc'; ?>
  </nav>
  <header class="title">
    <h1>About Us</h1>
  </header>
  <section id="group">
    <div id="groupdetails">
      <dl>
        <dt>Group name</dt>
          <dd>JKL</dd>
        <dt>Group ID</dt>
          <dd>2</dd>
        <dt>Group email</dt>
          <dd><a href="mailto:jkltech@gmail.com">jkltech@gmail.com</a></dd>
        <dt>Course</dt>
          <dd>Bachelor of Computer Science</dd>
        <dt>Tutor's name</dt>
          <dd>Fatma Mohammed</dd>
      </dl>
    </div>
    <figure id="groupphoto">
        <img src="images/groupphoto.jpeg" alt="JKL Group Photo">
        <figcaption class="caption">The JKL team</figcaption>
    </figure>
  </section>
  <section id="teammembers">
    <h2>Meet the Team</h2>
    <p><strong>Joina Nicholas</strong><br><a href="mailto:105178494@student.swin.edu.au">105178494@student.swin.edu.au</a><br>Joina is originally from New Zealand and was born on 19 April 2004. She was attracted to Computer science due to her keen interest in technology and desire to expand her knowledge, and is currently majoring in Cyber Security. She hopes to one day apply the skills and knowledge she's learning in her degree to her future career.</p>
    <dl> <dt>Fun Fact</dt> <dd>She spent 10 years playing netball.</dd> </dl>
    <p><strong>Kelly Eugenia Sutopo</strong><br><a href="mailto:104475686@student.swin.edu.au">104475686@student.swin.edu.au</a><br>Kelly was born on 29 December 2005 in Indonesia. She has always had a keen interest in programming and web development as well as desired to study something challenging, which is what led her to taking Computer Science with a major in Software Development.</p>
    <dl> <dt>Fun Fact</dt> <dd>She likes to design (digital media), crochet, and dance.</dd> </dl>
    <p><strong>Luke Nervosa</strong><br><a href="mailto:105350661@student.swin.edu.au">105350661@student.swin.edu.au</a><br>Born on the 14th of June 2005 in Frankston, Luke grew up as a local in Melbourne. He chose to study Computer Science out of a desire to get a good job and is currently majoring in Software Development.</p>
    <dl> <dt>Fun Fact</dt> <dd>He likes mountain biking.</dd> </dl>
  </section>
  <hr>
  <section id="timetable">
    <h3>Timetable</h3>
    <div id="table">
      <table>
        <tr>
          <th>Time</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
        </tr>
        <tr>
          <td>08.30 - 09.30</td>
          <td></td>
          <td rowspan="2" class="eco5"><strong>ECO10005</strong><br>Economics for Business Decision Making</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>09.30 - 10.30</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>10.30 - 11.30</td>
          <td></td>
          <td rowspan="2" class="cos9"><strong>COS10009</strong><br>Introduction to Programming</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>11.30 - 12.30</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>12.30 - 13.30</td>
          <td rowspan="2" class="cos26"><strong>COS10026</strong><br>Computing Technology Inquiry Project</td>
          <td></td>
          <td></td>
          <td rowspan="2" class="cos9"><strong>COS10009</strong><br>Introduction to Programming</td>
          <td></td>
        </tr>
        <tr>
          <td>13.30 - 14.30</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>14.30 - 15.30</td>
          <td></td>
          <td></td>
          <td rowspan="2" class="cos4"><strong>COS10004</strong><br>Computer Systems</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>15.30 - 16.30</td>
          <td></td>
          <td rowspan="2" class="cos26"><strong>COS10026</strong><br>Computing Technology Inquiry Project</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>16.30 - 17.30</td>
          <td></td>
          <td></td>
          <td></td>
          <td rowspan="2" class="cos4"><strong>COS10004</strong><br>Computer Systems</td>
        </tr>
        <tr>
          <td>17.30 - 18.30</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
  </section>

  <footer>
    <?php include 'footer.inc'; ?>
  </footer>
</body>
</html>