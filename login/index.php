<?php
  include('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Tasty Therapy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" type="text/css" href="styleLogin.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}
/* Full height image header */
.bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("../images/bg-tryout.jpg");
    min-height: 100%;
}
.w3-bar .w3-button {
    padding: 16px;
}
.a:hover, a:link{
  text-decoration: none;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide" >HOME</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button"><i class="fas fa-question"></i> ABOUT</a>
      <a href="../recipes/recipes.php" class="w3-bar-item w3-button"><i class="fas fa-utensils"></i></i></i> RECIPES</a>
      <a href="#team" class="w3-bar-item w3-button"><i class="fas fa-concierge-bell"></i></i> CHEFS</a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
      <?php if (isAdmin()==true) : ?>
        <a href="../login/home.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fas fa-clipboard-list"></i> ADMIN MENU</a>
        <?php endif ?>

      <a href="index.php?logout='1'"><button type="submit" class="w3-bar-item w3-button" name="logout_btn">
      <i class="fas fa-user-circle"></i>
	      <?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
					</small>
					<?php endif ?>

	        Logout</a></button>
      </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">RECIPES</a>
  <a href="../recipes/recipes.php" onclick="w3_close()" class="w3-bar-item w3-button">CHEFS</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <?php if (isAdmin()==true) : ?>
        <a href="../login/home.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fas fa-clipboard-list"></i> ADMIN MENU</a>
        <?php endif ?>

  <a href="index.php?logout='1'"><button type="submit" class="w3-bar-item w3-button" name="logout_btn">
      <i class="fas fa-user-circle"></i>
	      <?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
					</small>
					<?php endif ?>

	        Logout</a></button>


</nav>

<!--Carousel Wrapper-->
<div id="home">
<div id="carousel-example-2" class="carousel slide z-depth-1-half"  data-ride="carousel">
  <!--Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100 img-fluid slider-image" src="../images/bg-tryout-new.jpg" alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <span class="w3-jumbo w3-hide-small text-grey">Ready for some cooking?</span><br>
        <span class="w3-xxlarge w3-hide-large w3-hide-medium text-grey">Ready for come cooking?</span><br>
        <span class="w3-large text-lighter-grey">One thing's for sure - you just can't life a full life on an empty stomach.. </span>
        <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Get to know us</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="../images/slide2.jpg" alt="Second slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Find us on social media!</h3>
        <p>Get inspired from our recipes, capture the result and tag us online</p>
      </div>
    </div>
    <!-- <div class="carousel-item">

      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(108).jpg" alt="Third slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">This is the third title</h3>
        <p>Third text</p>
      </div>
    </div> -->
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
</div>
<!--/.Carousel Wrapper-->


<!-- About Section -->
<div class="w3-container w3-light-grey" id="about">
  <h3 class="w3-center">ABOUT THE IDEA</h3>
  <p class="w3-center w3-large">Key features of our virtual CookBook</p>
  <div class="w3-row-padding w3-center">
    <div class="w3-third cs-card">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Passion</p>
      <p>We love the entire process. Everything from the conceptual stages of planning and preparation, to the actual cooking, and of course the ritual of sharing a meal are passions of ours. </p>
    </div>
    <div class="w3-third cs-card">
      <i class="fas fa-book-reader w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Accessibility</p>
      <p>There's no need for dozens of books in your cupboards anymore, you have all your ideas in one place, all you need, easy to access anywhere, at any time.</p>
    </div>
    <div class="w3-third cs-card">
      <i class="fa fa-lightbulb w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Innovation</p>
      <p>Our chefs are constantly coming up with new and unique ideas to make sure you never get bored in the kitchen! Our chefs are constantly coming up with new and unique ideas!</p>
    </div>
  </div>
</div>



<!-- Recipes -->
<div class="w3-container" id="recipes">
  <div class="row">
    <div class="col-md-12">
        <figure class="col-md-4">
          <a href="http://tastytherapy.local/images/f6.jpg" data-size="1600x1067">
            <img alt="picture" src="../images/f6.jpg"
              class="img-fluid img-opacity" />
          </a>
        </figure>

        <figure class="col-md-4">
          <a href="http://tastytherapy.local/images/f5.jpg" data-size="1600x1067">
            <img alt="picture" src="../images/f5.jpg"
              class="img-fluid img-opacity" />
          </a>
        </figure>

        <figure class="col-md-4">
          <a href="http://tastytherapy.local/images/f4.jpg" data-size="1600x1067">
            <img alt="picture" src="../images/f4.jpg"
              class="img-fluid img-opacity" />
          </a>
        </figure>
    </div>
  </div>

    <div class="row">
      <div class="col-md-12 gallery-spacing">
        <figure class="col-md-4">
          <a href="#" data-size="1600x1067">
            <img alt="picture" src="../images/f3.jpg"
              class="img-fluid img-opacity" />
          </a>
        </figure>

        <figure class="col-md-4">
          <a href="http://tastytherapy.local/images/f2.jpg" data-size="1600x1067">
            <img alt="picture" src="../images/f2.jpg"
              class="img-fluid img-opacity">
          </a>
        </figure>

        <figure class="col-md-4">
          <a href="http://tastytherapy.local/images/f1.jpg" data-size="1600x1067">
            <img alt="picture" src="../images/f1.jpg"
              class="img-fluid img-opacity" />
          </a>
        </figure>
      </div>
    </div>

    <div class="w3-row pt-4">
      <div class="w3-col text-center">
        <h3>Already inspired?</h3>
        <p>Hundreds of recipes are waiting for you!</p>
        <p><a href="login/login.php" class="w3-button w3-black"><i class="fas fa-utensils"></i> &nbsp; Log in or register to start browsing</a></p>
      </div>
    </div>
</div>






<!-- Team Section -->
<div class="w3-container w3-light-grey" id="team">
  <h3 class="w3-center">THE CHEFS</h3>
  <p class="w3-center w3-large">The minds behind it all</p>
  <div class="w3-row-padding w3-grayscale-min" style="margin-top:34px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="../images/c1.jpg" alt="John" style="width:100%">
        <div class="w3-container p-4">
          <h3>Pheobe Buffay</h3>
          <p class="w3-opacity">Fusion cuisine</p>
          <p >Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="../images/c2.jpg" alt="Jane" style="width:100%">
        <div class="w3-container p-4">
          <h3>Ross Geller</h3>
          <p class="w3-opacity">Haute cuisine</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="../images/c3.jpg" alt="Mike" style="width:100%">
        <div class="w3-container p-4">
          <h3>Rachel Green</h3>
          <p class="w3-opacity">Nouvelle cuisine</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="../images/c4.jpg" alt="Dan" style="width:100%">
        <div class="w3-container p-4">
          <h3>Chandler Bing</h3>
          <p class="w3-opacity">Vegan cuisine</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Contact Section -->

<!--Section: Contact v.2-->
<section class="mb-5 container mt-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">Your name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Your email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form mt-2">
                            <label for="message">Your message</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left mt-3">
                <a class="w3-button w3-light-grey w3-block" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center mt-2">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>San Francisco, CA 94126, USA</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contact@tastytherapy.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fab fa-facebook w3-hover-opacity"></i>
    <i class="fab fa-instagram w3-hover-opacity"></i>
    <i class="fab fa-snapchat w3-hover-opacity"></i>
    <i class="fab fa-pinterest-p w3-hover-opacity"></i>
    <i class="fab fa-twitter w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>



<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
    } else {
        mySidebar.style.display = 'block';
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
