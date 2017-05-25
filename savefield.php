<?php
require 'db.php';
session_start();
$data = json_decode(stripslashes($_POST['data']));
foreach($data as $key=>$val)
{
	$arr[] = $val; 
}
$fielders = implode(",",$arr);
$username = $_SESSION['name'];
$select_query = "SELECT id FROM bowler WHERE name='$username'";
$conn = new database();
$result = $conn->query($select_query);
$row = $result->fetch_assoc();
$bid = $row['id'];

$result1 = $conn->query("SELECT fid FROM field WHERE bid='$bid'");
if($result1->num_rows)
{
	$row1 = $result1->fetch_assoc();
	$fid = $row1['fid'];
	$update_query = "UPDATE field SET fielders='$fielders' WHERE fid=$fid";
	if($conn->update($update_query))
		echo "Field Setup saved";
	else
		echo "Error Occured. Field Setup not saved."."\n".$update_query;
}
else
{
	$insert_query = "INSERT INTO field (bid,fielders) VALUES ('$bid','$fielders')";
	if($conn->update($insert_query))
		echo "Field Setup saved";
	else
		echo "Error Occured. Field Setup not saved.".$insert_query;
}
?>