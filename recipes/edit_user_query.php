<?php
// connect to database
$db = mysqli_connect("127.0.0.1", "root", "", "tasty2019") or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//edit recipe
if (isset($_POST['edit_user_btn'])) {
		edit_user();
}

function edit_user(){
	global $db, $id, $username, $email, $user_type, $password, $errors;

	// grap form values
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$user_type = $_POST['user_type'];
	$password = $_POST['password'];
	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($user_type)) {
		array_push($errors, "User type is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// add recipe to db if there are no errors in the form
	if (count($errors) == 0) {

		$password = md5($password_1);//encrypt the password before saving in the database
		$query = "UPDATE `users` SET  `username` = '$username',
							    `email` = '$email',
								`user_type` = '$user_type',
								`password` = '$password'
										WHERE `id` = '$id'";
			mysqli_query($db, $query);

			header('location: ../recipes/view_users.php');
	}

}
?>
