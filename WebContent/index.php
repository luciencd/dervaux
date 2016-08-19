<?php

//Connecting to db.
$connect=mysqli_connect('us-cdbr-iron-east-04.cleardb.net','b1b99d81422530','ab26697e','ad_871dcd2475d2c8f');

//echo 'Connection created';

//Getting rows.
$sql = "SELECT * FROM submission WHERE state = 'Accepted';";

$result = mysqli_query($connect,$sql);
$rows = array();


//Generating php array.
while($r = mysqli_fetch_array($result))
{
	$newrow = array();

	//$newrow["s_id"] = $r["s_id"];
	$newrow["Name"] = $r["name"];
  //$newrow["Type"] = $r["type"];
	$newrow["Description"] = $r["description"];
	$newrow["Link"] = $r["link"];
  //$newrow["PostedDate"] = $r["posted_date"];
	/*
  $sql2 = "SELECT * FROM action WHERE s_id = '".$r["s_id"]."';";

  $result2 = mysqli_query($connect,$sql2);
	$action = mysqli_fetch_array($result2);
  $newrow["Address"] = $action["address"];




  $sql3 = "SELECT * FROM icons WHERE resource = '".$r["resource"]."' and type = '".$r["type"]."' and data_kind = '".$action["data_kind"]."' and data_type = '".$action["data_type"]."';";
	//echo $sql3;
  $result3 = mysqli_query($connect,$sql3);
  $newrow["Img"] = mysqli_fetch_array($result3)["img"];

	*/
	$rows[] = $newrow;
}

$jsonstring = '{"submissions":'.json_encode($rows)."}";
$json = json_decode($jsonstring,true);


require './Vendor/Mustache/Autoloader.php';
Mustache_Autoloader::register();


$template = file_get_contents('./index.mustache');

$m = new Mustache_Engine;
//render the template with the set values
echo $m->render($template, $json);
//echo $jsonstring;
?>
