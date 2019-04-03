<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tasty Therapy</title>
    <link rel="stylesheet" type="text/css" href="../login/styleLogin.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
		
		button[name=remove_btn] {
			background: #003366;
        }
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
	</style>
</head>
<body style="background-image:url(../images/bgimg1.jpg); background-size: cover; background-attachment: fixed;">
<!-- Navbar (sit on top) -->
<div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
          <a href="../login/index.php" class="w3-bar-item w3-button w3-wide">HOME</a>
          <!-- Right-sided navbar links -->
          <div class="w3-right w3-hide-small">
            <a href="../login/index.php#about" class="w3-bar-item w3-button"><i class="fas fa-question"></i> ABOUT</a>
            <a href="../recipes/recipes.php" class="w3-bar-item w3-button"><i class="fas fa-utensils"></i> RECIPES</a>
            <a href="../login/index.php#team" class="w3-bar-item w3-button"><i class="fas fa-concierge-bell"></i> CHEFS</a>
            <a href="../login/index.php#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
            <a href="../login/home.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fas fa-clipboard-list"></i> ADMIN MENU</a>
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
        <a href="../recipes/recipes.php" onclick="w3_close()" class="w3-bar-item w3-button">RECIPES</a>
        <a href="../login/index.php#team" onclick="w3_close()" class="w3-bar-item w3-button">CHEFS</a>
        <a href="../login/index.php#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
        <a href="../login/home.php" onclick="w3_close()" class="w3-bar-item w3-button">Admin Menu</a>
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
	 
	           Logout</button></a>
        
        </nav>


<div style="padding-top: 64px;">
	<div class="header">
		<h2>Admin - remove user</h2>
	</div>
	
	<form method="post" action="remove_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username of user to remove</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		
		<div class="input-group">
			<button type="submit" class="btn" style="background: rgb(131, 64, 64)" name="remove_btn"> - Remove user</button>
		</div>
    </form>
    </div>
</body>
</html>