<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Home Page">
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

    <title>Home | JKL Tech</title>
</head>
<body class="home">
  <nav>
    <?php include 'menu.inc'; ?>
  </nav>
  <header>
    <section id="hero">
      <h3>Need help with</h3>
      <div>
        <ul>
          <li><h1>IT Consults?</h1></li>
          <li><h1>Software Dev?</h1></li>
          <li><h1>Cybersecurity?</h1></li>
          <li><h1>Any IT Problem?</h1></li>
        </ul>
      </div>
      <p><em>JKL Tech</em> is your trusted partner for all your IT needs.</p>
      <button class="btn-primary ctabutton">Get in Touch</button>
    </section>
  </header>
  <section id="whoarewe">
    <h1>Who Are We?</h1>
    <p><em>JKL Tech</em> is a leading IT solutions provider based in Melbourne, Australia. Specializing in IT consulting, software development, and cybersecurity, we empower businesses to thrive in the digital age. Our client-centric approach, combined with innovative solutions and a commitment to excellence, ensures that our clients achieve their objectives efficiently and effectively.</p>
    <button class="btn-primary">About Us</button>
  </section>
  <section id="visionmission" class="center">
    <div>
      <i class="fa fa-users fa-4x"></i>
      <h1>Our Vision</h1>
      <p>To be the leading company empowering businesses worldwide with cutting-edge IT solutions and at the forefront of innovation in the digital landscape.</p>
    </div>
    <div>
      <i class="fa fa-rocket fa-4x"></i>
      <h1>Our Mission</h1>
      <p>To provide unparalleled IT solutions tailored to meet the unique needs of each client. Through our commitment to innovation, excellence, and client satisfaction, we aim to drive sustainable growth, build long-lasting partnerships, and exceed expectations at every turn.</p>
    </div>
  </section>
  <section id="services" class="center">
    <div>
      <img src="images/services.jpg" alt="JKL Tech offers holistic IT services">
    </div>
    <div>
      <h3>What we offer</h3>
      <h1>Our Services</h1>
      <ul>
        <li>Strategic IT planning and advisory</li>
        <li>Custom software, web, and mobile application development</li>
        <li>Quality assurance and testing services</li>
        <li>Network security architecture design and implementation</li>
        <li><strong>and many more...</strong></li>
      </ul>
      <p>By offering these comprehensive services, <em>JKL Tech</em> ensures that businesses receive holistic and effective solutions to all their IT challenges.</p>
      <button class="btn-primary">View Services</button>
    </div>
  </section>
  <hr>
  <section id="clients">
    <h3>JKL Tech is a Trusted Provider</h3>
    <h1>What Our Clients Said</h1><br>
    <div>
      <p>&#x275D; Working with JKL Tech has been an absolute game-changer for our business. Their expertise in IT consulting helped us streamline our operations and improve efficiency. Their team took the time to understand our business goals, communicated seamlessly, and provided strategic solutions which positioned us for success. Certainly the best we've ever worked with! &#x275E;</p>
      <h3>&#8212; Company A</h3>
    </div>
    <div>
      <p>&#x275D; JKL Tech's cybersecurity services provided us with peace of mind knowing that our data is secure. Their team conducted a thorough assessment of our network and implemented robust security measures that have significantly strengthened our defenses against cyber threats. We highly recommend JKL Tech for their professionalism and dedication to client satisfaction. &#x275E;</p>
      <h3>&#8212; Company B</h3>
    </div>
    <div>
      <p>&#x275D; We approached JKL Tech for a mobile app development project, and we couldn't be happier with the results. Their developers demonstrated exceptional skill and creativity, delivering a solution that exceeded our expectations. Our app has received great reviews from users for its design and user experience, all thanks to JKL's expertise! We look forward to partnering with them on future projects. &#x275E;</p>
      <h3>&#8212; Company C</h3>
    </div>
  </section>
  <section id="video">
      <i class="fa fa-youtube-play fa-4x"></i>
      <h1>Link to our Video</h1><br>
      <a target="_blank" href="https://youtu.be/Dafr3yHCI-U?si=zc6hzjTmfv91zKcB"><i class="fa fa-link"></i>Group 2 - JKL: Assignment 1 Video</a> <br>
      <a target="_blank" href="https://youtu.be/AYKiQc2my20?si=t_gW1ODo3vXNzD-q"><i class="fa fa-link"></i>Group 2 - JKL: Assignment 2 Video</a>
  </section>
  <section id="contact">
    <h2>Reach out today and see how we can empower you or your company to thrive.</h2>
    <p><i class="fa fa-envelope fa-lg"></i>E-mail: <strong>JKLTech@gmail.com</strong> &#124; <i class="fa fa-phone fa-lg"></i>Phone: <strong>+61 410234567</strong> &#124; <i class="fa fa-home fa-lg"></i>Address: <strong>John St, Hawthorn VIC 3122</strong></p>
    <button class="btn-primary ctabutton">Get in Touch</button>
    <button class="btn-secondary">View Services</button>
  </section>

  <footer>
    <?php include 'footer.inc'; ?>
  </footer>
</body>
</html>