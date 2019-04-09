<?php
// connect to database
$db = mysqli_connect("127.0.0.1", "root", "", "tasty2019") or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//edit recipe
if (isset($_POST['edit_recipe_btn'])) {
		edit_recipe();
}

function edit_recipe(){
	global $db, $id, $title, $pic, $ingredients, $description, $errors;

	// grap form values
	$id = $_POST['id'];
	$title = $_POST['title'];
	$pic = $_POST['pic'];
	$ingredients = $_POST['ingredients'];
	$description = $_POST['description'];
	$directions = $_POST['directions'];

	// make sure form is filled properly
	if (empty($title)) {
		array_push($errors, "Title is required");
	}
	if (empty($pic)) {
		array_push($errors, "Picture is required");
	}
	if (empty($ingredients)) {
		array_push($errors, "List of ingredients required");
	}
	if (empty($description)) {
		array_push($errors, "Description is required");
	}
	if (empty($directions)) {
		array_push($errors, "Directions are required");
	}

	// add recipe to db if there are no errors in the form
	if (count($errors) == 0) {


		$query = "UPDATE `recipes` SET  `title` = $title,
							    `pic` = $pic,
								`ingredients` = $ingredients,
								`description` = $description,
								`directions` = $directions
										WHERE `id` = $id";
			mysqli_query($db, $query);
			header('location: ../recipes/view_recipes.php');
	}

}
?>
