<?php
// Include the database connection file
require_once("../connection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$booktitle = mysqli_real_escape_string($mysqli, $_POST['booktitle']);
	$booksold = mysqli_real_escape_string($mysqli, $_POST['booksold']);
	$bookprice = mysqli_real_escape_string($mysqli, $_POST['bookpric']);	
	$directsales = mysqli_real_escape_string($mysqli, $_POST['directsales']);	
	$indirectsales = mysqli_real_escape_string($mysqli, $_POST['indirectsales']);	
	
	// Check for empty fields
	if (empty($booktitle) || empty($booksold) || empty($bookprice)) {
		if (empty($booktitle)) {
			echo "<font color='red'>book title field is empty.</font><br/>";
		}
		
		if (empty($booksold)) {
			echo "<font color='red'>booksold field is empty.</font><br/>";
		}
		
		if (empty($bookprice)) {
			echo "<font color='red'>bookprice field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE user_work_report SET `booktitle` = '$booktitle', `booksold` = '$booksold', `bookprice` = '$bookprice', `directsales` = '$directsales', `indirectsales` = '$indirectsales' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}