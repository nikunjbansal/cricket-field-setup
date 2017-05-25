<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location: index.php");
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
			function save() {
				if(selection.length < 9)
					alert("Wrong Selection. Choose "+(9-selection.length)+"more")
				else if(selection.length > 9)
					alert("Wrong Selection. Choose "+(selection.length-9)+"less")
				else
				{
					$(".fpos").hide();
					for(var i=0;i<selection.length;i++)
					{
						var show_id = selection[i];
						$('#' + show_id).show();
					}
					var jsonString = JSON.stringify(selection);
					$.ajax({ url: 'savefield.php',
					         data: {'data': jsonString},
					         type: 'post',
					         success: function(output) {
					                      alert(output);
					                  },
			                 error: function (request, status, error) {
        									alert(error);
									}
						});
				}
				
			}
			function revert() {
				$(".fpos").show();
			}
			function in_array(array, id) {
				for(var i=0;i<array.length;i++) {
					if(array[i] === id)
						return array[i];
				}
				return -1;
			}
			var selection = [];
			function highlightPos(elem){
				elem.toggleClass('highlighted');
			}
			function toggleselection(elem) {
				elem.toggleClass('selected');
				var chk = in_array(selection,elem.attr('id'));
				if(chk === -1)
					selection.push(elem.attr('id'));
				else
				{
					var index = selection.indexOf(chk);
					if (index >= 0) {
					  selection.splice( index, 1 );
					}
				}
			};
			$(document).ready(function(){
				$("#background div:not('#Backgroundcopy')").hover(function() {
				    		highlightPos($(this));
				  		}, function() {
			    			highlightPos($(this));
				  });
					$("#background div:not('#Backgroundcopy')").click(function(){
					toggleselection($(this));
				});
			});
		</script>
	</head>
	<body>
		<div id='header'>
		</div>
		<form align="right" name="form1" method="post" action="logout.php">
		  <label class="logoutLblPos">
		  <input name="submit2" type="submit" id="submit2" value="log out">
		  </label>
		</form>
		<div id='cssmenu'>
			<ul>
			   <li class='active'><a href='#'><span>Home</span></a></li>
			   <li><a href='profile.php'><span>Profile</span></a></li>
			   <li><a href='allteam.php'><span>All Team</span></a></li>
			</ul>
		</div>
		<div id="background">
			<div id="Backgroundcopy"><img src="images/Backgroundcopy.png"></div>
			<div id="squareleg" class="fpos"><img src="images/squareleg.png">
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
			<div id="cover" class="fpos"><img src="images/cover.png"></div>
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