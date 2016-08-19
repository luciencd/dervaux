<?php
//Connecting to db.
$connect=mysqli_connect('us-cdbr-iron-east-04.cleardb.net','b1b99d81422530','ab26697e','ad_871dcd2475d2c8f');

$formname = $_POST['name'];
$formdescription = $_POST['description'];

if ($_FILES["file"]["error"] > 0){

} else{
	$name = $_FILES["file"]["name"];
	$type = $_FILES["file"]["type"];
	$size = ($_FILES["file"]["size"] / 1024);
	$tmp_address = $_FILES["file"]["tmp_name"];
	$move = getcwd()."/../pictures/";


	if (move_uploaded_file($_FILES['file']['tmp_name'], $move . $_FILES["file"]['name'])) {

	} else {
	   //echo "File was not uploaded";
	}

	$perm_address = $move.$_FILES["file"]["name"];

  $file_address = $_FILES["file"]["name"];
  $sqlaction = "INSERT INTO submission(name, description, link, type) VALUES ('$formname','$formdescription','$file_address','$type')";
  //echo $perm_address;
	if (mysqli_query($connect, $sqlaction)) {

	} else {
	    //echo "Error: " . $sqlaction . "<br>" . mysqli_error($connect);
	}
}
header("Location: ./index.php"); /* Redirect browser */
exit();
?>
