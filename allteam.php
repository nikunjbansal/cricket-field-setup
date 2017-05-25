<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location: index.php");
}
else
{
	$arr = array();
	$arr1 = array();
	$name = $_SESSION['name'];
	require_once 'db.php';
	$db = new database();
	$result = $db->query("SELECT `id` FROM bowler WHERE name='$name'");
	$row = $result->fetch_assoc();
	$bid =  $row["id"];
	$i = 0;

	$result1 = $db->query("SELECT b.name,f.fielders FROM field f JOIN bowler b ON b.id=f.bid");
	while($row1 = $result1->fetch_assoc())
	{
		$arr[$i."-".$row1['name']] = $row1['fielders'];
		$arr1[$i] = $row1['fielders'];
		$i++;
	}
	if(isset($_GET['key']))
	{
		$key = $_GET['key'];
		//echo $field_string;
	}
	else
	{
		$key = rand(0,count($arr));
	}
	$field_string = $arr1[$key];
	$fielders = explode(",",$field_string);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>psdtowebfieldingpositions651.psd</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<script src="jquery-3.2.1.min.js"></script>
		<script>
			function revert()
			{
				window.location = "home.php";
			}
			$(document).ready(function(){
				var retval = [];
				var showid = [];
				$('.fpos').each(function(){
					retval.push($(this).attr('id'))
				})
				var selection = $.parseJSON('<?php echo json_encode($fielders); ?>');
				for(var i=0;i<selection.length;i++) {
					if($.inArray(selection[i],retval))
						showid.push(selection[i]);
				}
				$('.fpos').hide();
				showid.forEach(function(item) {
					$('#'+item).show();
				});
			});
		</script>
	</head>
	<body>
		<div id='header'>
		</div>
		<div id='cssmenu'>
			<ul>
			   <li><a href='home.php'><span>Home</span></a></li>
			   <li class='active'><a href='profile.php'><span>Profile</span></a></li>
			   <li><a href='allteam.php'><span>All Team</span></a></li>
			</ul>
		</div>
		<div id='playermenu'>
			<ul>
				<?php foreach($arr as $key=>$val){ $name = explode("-",$key); ?>
			   <li><?php echo '<a href="?key='.$name[0].'">'?><span><?php echo $name[1];?></span></a></li>
			   <?php } ?>
			</ul>
		</div>
		<div id="background">
			<div id="Backgroundcopy"><img src="images/Backgroundcopy.png"></div>
			<div id="squareleg" class="fpos" style="<?php if(in_array("squareleg",$fielders)) echo "display:none;"?>"><img src="images/squareleg.png">
			</div>
			<div id="shortbwsquareleg" class="fpos"><img src="images/shortbwsquareleg.png"></div>
			<div id="shortfineleg" class="fpos"><img src="images/shortfineleg.png"></div>
			<div id="legslip" class="fpos"><img src="images/legslip.png"></div>
			<div id="shortleg" class="fpos"><img src="images/shortleg.png"></div>
			<div id="sillymidon" class="fpos"><img src="images/sillymidon.png"></div>
			<div id="midwicket" class="fpos"><img src="images/midwicket.png"></div>
			<div id="midon" class="fpos"><img src="images/midon.png"></div>
			<div id="slipcordon" class="fpos"><img src="images/slipcordon.png"></div>
			<div id="fourthslip" class="fpos"><img src="images/fourthslip.png"></div>
			<div id="gully" class="fpos"><img src="images/gully.png"></div>
			<div id="sillypoint" class="fpos"><img src="images/sillypoint.png"></div>
			<div id="sillymidoff" class="fpos"><img src="images/sillymidoff.png"></div>
			<div id="shortmidoff" class="fpos"><img src="images/shortmidoff.png"></div>
			<div id="midoff" class="fpos"><img src="images/midoff.png"></div>
			<div id="extracover" class="fpos"><img src="images/extracover.png"></div>
			<div id="cover" class="fpos" style="<?php if(in_array("cover",$fielders)) echo "display:none;"?>"><img src="images/cover.png"></div>
			<div id="coverpoint" class="fpos"><img src="images/coverpoint.png"></div>
			<div id="point" class="fpos"><img src="images/point.png"></div>
			<div id="flyslip" class="fpos"><img src="images/flyslip.png"></div>
			<div id="sweeper" class="fpos"><img src="images/sweeper.png"></div>
			<div id="deepcover" class="fpos"><img src="images/deepcover.png"></div>
			<div id="deepextracover" class="fpos"><img src="images/deepextracover.png"></div>
			<div id="longoff" class="fpos"><img src="images/longoff.png"></div>
			<div id="longon" class="fpos"><img src="images/longon.png"></div>
			<div id="cowcorner" class="fpos"><img src="images/cowcorner.png"></div>
			<div id="deepmidwicket" class="fpos"><img src="images/deepmidwicket.png"></div>
			<div id="deepsquareleg" class="fpos"><img src="images/deepsquareleg.png"></div>
			<div id="deepbackwardsquarele" class="fpos"><img src="images/deepbackwardsquarele.png"></div>
			<div id="longleg" class="fpos"><img src="images/longleg.png"></div>
			<div id="fineleg" class="fpos"><img src="images/fineleg.png"></div>
			<div id="longstop" class="fpos"><img src="images/longstop.png"></div>
			<div id="thirdman" class="fpos"><img src="images/thirdman.png"></div>
			<div id="backwardpoint" class="fpos"><img src="images/backwardpoint.png"></div>
		</div>
		<button type="button" onclick="save()">Save</button>
		<button type="button" onclick="revert()">Revert</button>
 </body>
 </html>