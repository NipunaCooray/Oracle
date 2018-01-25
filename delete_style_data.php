<?php 
include("connect.php"); 	

$link=Connection();

$styleID = isset($_POST['styleID']) ? $_POST['styleID'] : null;

// //Required due to a space in the URL, without this php unlink() wont work, also need to change / to \
// $imageLocation = str_replace(" ","",$imageLocation);
// $imageLocation = str_replace("/","\\", $imageLocation);

// $imageLocation = getcwd()."\\".$imageLocation;

$get_style_number_query = "SELECT styledata.styleNumber FROM `styledata` Where styledata.styleID ='".$styleID."'";

$styleNumberResult=mysqli_query($link,$get_style_number_query);

if($styleNumberResult === FALSE) { 
	die(mysqli_error($link)); // TODO: better error handling
}

$styleNumber = "";

while($row = mysqli_fetch_array($styleNumberResult)) {
	$styleNumber = $row['styleNumber'];
}


$delete_styledata_query="DELETE FROM `styledata` WHERE `styleID`= '".$styleID."' ";


$result = mysqli_query($link,$delete_styledata_query) or die(mysqli_error($link));


//After deleting styledata row, particular style table need to be dropped

$drop_style_table_query = "DROP TABLE ".$styleNumber." ";



$result2 = mysqli_query($link,$drop_style_table_query) or die(mysqli_error($link));



//Later : No need to remove the image from the folder

//Need to remove the image from the StyleImages folder
// if (!unlink($imageLocation)){
// 	$result3 = "Error deleting $imageLocation";
// }
// else{
// 	$result3 = "Deleted $imageLocation";
// }

if($result==1 && $result2==1){
	$resultString = "Deleted all the records of the style with style number ".$styleNumber;
}



mysqli_close($link);

echo $resultString;

?>