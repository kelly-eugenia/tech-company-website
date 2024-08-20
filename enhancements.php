<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enhancements Page">
    <meta name="keywords" content="HTML, tags, webpage">
    <meta name="author" content="JKL - Joina Nicholas">
    
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
        <h1>Enhancements</h1>
        <br><a href="phpenhancements.php">Go to Enhancements for Assignment 2</a>
    </header>
    <article>
        <section class="features">
            <img class="enhancements" src="images/webdesign.jpeg" alt="designstock">
            <h2>Animation</h2>
            <p>We implemented animations to provide a more interactive website which can <strong>capture user's attention and engage them more effectively</strong>. Using <em>dynamic</em> elements instead of <em>static</em> is more likely to attract the users' focus and enhance their experience. 
                By using custom animations, it enhances our website and style, making them more memorable to users. The code implemented also extends the basic HTML and CSS beyond the course with the use of the CSS <strong>@keyframes</strong> and <strong>animation</strong> property.</p>
        </section>
        <section id="animation">
            <div class="animationexample">
                <h3>Scroll Text Animation</h3>
                <a href="index.html#hero" class="btn-tertiary"><i class="fa fa-link"></i>Hero Title</a>
                <p><strong>Description</strong></p>
                <p>The Scroll Text Animation vertically slides text automatically, infinitely showing different prompts. It provides a cleaner look to the website as each prompt can be shown without occupying more space on the page than necessary. Each piece of text displays the specialties offered by the company, thus providing insights on the company in an interesting and eyecatching way.</p>
                <p><strong>Code</strong></p>
                <p>The code for the animation can be found under the name <strong>'scroll'.</strong> The different prompts displayed are written in a list. After setting a certain line height to only display one list item at a time, the code utilises translating in the y-axis <strong>(transform: translateY(y))</strong>. This allows for the text to slide up and away from the screen after a certain time, thereby creating the scrolling animation. </p>
                <p>We took inspiration for the code and modified it from <a href="https://codepen.io/yoannhel/pen/DMzjog">Text Animation by @yoannhel</a>.</p>
            </div>
            <div class="animationexample">
                <h3>Pulse Animation</h3>
                <a href="index.html#contact" class="btn-tertiary"><i class="fa fa-link"></i>CTA Button</a>
                <p><strong>Description</strong></p>
                <p>The Pulse Animation pulses a light glow from an element infinitely. It provides emphasis to draw attention from the user. It is used to highlight important information to users, particularly Call-to-Action buttons to entice the users to click on the button and interact with the website and company. In a real-world, professional setting, this can bring in benefits like increasing sales and engagement.</p>
                <p><strong>Code</strong></p>
                <p>The code implemented is located under the name <strong>'pulse'</strong>. It utilises the property of adjusting the scale <strong>transform: (scale())</strong>. It increases and decreases the size of the object as well as add a box-shadow after a certain time/point of the animation. </p>
                <p>We took inspiration for the code and modified it from <a href="https://codepen.io/FlorinPop17/pen/drJJzK">#026 - CSS Pulse Effect by @FlorinPop17</a>.</p>
            </div>
            <div class="animationexample">
                <h3>Float Animation</h3>
                <a href="about.html#groupphoto" class="btn-tertiary"><i class="fa fa-link"></i>Group Photo</a>
                <p><strong>Description</strong></p>
                <p>The Float Animation causes the object to rise and fall slowly automatically for an infinite amount of time. It improves visual appeal, adding movement, and can reduce boredom. It is particularly applied to the group picture in the about page, thereby increasing the emphasis of the image and draws the attention of the users.</p>
                <p><strong>Code</strong></p>
                <p>The code for this animation is located under the name <strong>'float'</strong>. It uses the transform property, translating the object along its y-axis <strong>(transform: translateY())</strong>. The object rises for a certain distance before falling and repeats infinitely. The box-shadow property is also added to make the element appear more like it is floating.</p>
                <p>We took inspiration for the code and modified it from <a href="https://codepen.io/MarioDesigns/pen/woJgeo">Floating Animation by @MarioDesigns</a>.</p>
            </div>
        </section>
        <hr>
        <section class="features">
            <img class="enhancements" src="images/responsive.jpeg" alt="responsivewebstock">
            <h2>Responsive Layout</h2>
            <p><strong>Description</strong></p>
            <p>We wanted to make a responsive website which allows users to view and interact <em>with any device viewport.</em> By making it responsive, users can expect a <strong>high quality and functional website on any device.</strong> 
                This also increases accessibility as users can access it on any device and not just a computer. By optimising our responsiveness, it can also lead to faster loading times compared to non-responsive websites. By making our web fully responsive, we utilised complex CSS and significantly extended beyond the basic CSS taught in the lecture and tutorials.</p>
            <p><strong>Code</strong></p>
            <p>The code implemented is located throughout the CSS file under the comments <strong>'Responsiveness'</strong> in each page section. The main property used was the media query <strong>(@media screen and (max-width:))</strong> which allows for web designers to adjust their website page depending on the size and width. 
                For our website, we modified the page design and layout for mobile and tablet devices compared to viewing on a laptop. The changes that were primarily made include re-arrangement and sizing of blocks of content or images.</p>
        </section>
        <section class="center" id="images">
            <img src="images/web-view.png" alt="Web view - Home page">
            <img src="images/tablet-view.png" alt="Tablet view - Home page">
            <img src="images/mobile-view.png" alt="Mobile view - Home page">
        </section>
    </article>

    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>