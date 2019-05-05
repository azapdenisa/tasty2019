<?php 
include('../login/functions.php');
?>
<html>
<head>
    <title>Tasty Therapy</title>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}

.w3-bar .w3-button {
    padding: 16px;
}
.a:hover, a:link{
  text-decoration: none;
}
.btn-light, .btn-light:active, .btn-light:visited {
    background-color: #fff !important;
}
.btn-light:hover{
  background-color: #ccc !important;
}
input[type=text], select {
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
</head>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
          <a href="../login/index.php" class="w3-bar-item w3-button w3-wide">HOME</a>
          <!-- Right-sided navbar links -->
          <div class="w3-right w3-hide-small">
            <form name="form1" class="w3-bar-item" action="search_bar.php" method="POST" style="margin-bottom: 0px; margin-top: 5px">
              <input id="search" name="search" type="text" size="40" maxlength="50" placeholder=" Type here">
              <input name="submit" type="submit" value="search" class="btn btn-light rounded-0" >
            </form>
            <a href="../login/index.php#about" class="w3-bar-item w3-button"><i class="fas fa-question"></i> ABOUT</a>
            <a href="../recipes/recipes.php" class="w3-bar-item w3-button"><i class="fas fa-utensils"></i></i></i> RECIPES</a>
            <a href="../login/index.php#team" class="w3-bar-item w3-button"><i class="fas fa-concierge-bell"></i></i> CHEFS</a>
            <a href="../login/index.php#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
            
            <?php if (isAdmin()==true) : ?>
               <a href="../login/home.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fas fa-clipboard-list"></i> ADMIN MENU</a> 
            <?php endif ?>
          
            <a href="../login/index.php?logout='1'"><button type="submit" class="w3-bar-item w3-button" name="logout_btn">
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
        <a href="../login/index.php#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
        <a href="../login/index.php#team" onclick="w3_close()" class="w3-bar-item w3-button">RECIPES</a>
        <a href="recipes.php" onclick="w3_close()" class="w3-bar-item w3-button">CHEFS</a>
        <a href="../login/index.php#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
        <?php if (isAdmin()==true) : ?>
               <a href="../login/home.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fas fa-clipboard-list"></i> ADMIN MENU</a> 
            <?php endif ?>
          
        <a href="../login/index.php?logout='1'"><button type="submit" class="w3-bar-item w3-button" name="logout_btn">
            <i class="fas fa-user-circle"></i>
              <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['username']; ?></strong>
                <small>
                  <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                </small>
                <?php endif ?> 
        
          Logout</a></button>
      </nav>
</div>

<div class="card-columns" style="padding-top: 64px; padding-left: 5px; padding-right:5px">
<?php
if(!isset($_POST['search'])){
    header("Location: recipes.php");
}

$search_sql = "SELECT * FROM recipes WHERE title LIKE '%".$_POST['search']."%'";

$search_query = mysqli_query($db, $search_sql);

    while($row = mysqli_fetch_assoc($search_query)){ ?>
        <div class="clearfix card w3-third" style="break-inside: avoid;">
        <img class="card-img-top" src="<?php echo $row['pic']?>" alt="" style="width: 100%">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row['title']?></h4>
                <p class="card-text"><?php echo $row['ingredients']?></p>
                <p class="card-text"><?php echo $row['description']?></p>
            </div>
            <div class="card-footer">
                <a href="<?php echo $row['directions']?>" class="btn btn-outline-success">Get details</a>
            </div>
        </div>  
    <?php
    }

?>
</div>

</body>
</html>