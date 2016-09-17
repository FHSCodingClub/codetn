<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
	<?php
	$searchQuery = $_GET['query'];
	if($searchQuery==""){ //If query empty
		echo '<h2>Sorry, We don\'t yet support that material!</h2><h3>Please enjoy this other project. It\'s a team favorite!</h3>';
		echo '<h1>&nbsp;Hanging Bottle Garden</h1>';
		echo '<div class="media"><div class="media-left col-sm-4 col-xs-12"><iframe width="300" height="225" src="http://www.youtube.com/embed/5NAcVtPZQIs"></iframe></div>';
		echo '<div class="media-right col-sm-8 col-xs-12"><h3><span style="text-decoration: underline;">Materials Needed: </span>Bottles, Scissors, and String</h3>';
		echo '<h3 class="desc">In this craft you will be making garden pots out bottles and connecting them with string! Next just add some soil and your favorite plants.</h3></div>';
		echo '<h3>Tweet about this craft! <a href="https://twitter.com/intent/tweet?screen_name=teamfplusplus&text=Pumped%20for%20recycling!" class="twitter-mention-button" data-size="large" data-related="teamfplusplus">&nbsp;<i class="fa fa-twitter fa-3"></i></a></h3></div>';
	} else {
//Connect to mySql server
	$con = mysql_connect("localhost","1e1c98592f73","b105f03c8d4de93c");  
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
//Displaying results
	$db_selected = mysql_select_db("fplusplus",$con);
	if (!$db_selected) {
		die ('Database selection failed: ' . mysql_error());
	}
	
	$result=mysql_query("SELECT * FROM crafts WHERE materials LIKE '%".$searchQuery."%'",$con);
	if(!$result) {
		die("Database query failed: " . mysql_error());
	} else if(!isset($result)) {
		echo '<h2>Sorry We don\'t yet support that material!</h2><h3>Please enjoy this other project!</h3>';
		echo '<h1>&nbsp;Hanging Bottle Garden</h1>';
		echo '<div class="media"><div class="media-left col-sm-4 col-xs-12"><iframe width="300" height="225" src="http://www.youtube.com/embed/5NAcVtPZQIs"></iframe></div>';
		echo '<div class="media-right col-sm-8 col-xs-12"><h3><span style="text-decoration: underline;">Materials Needed:</span>Bottles, Scissors, and String</h3>';
		echo '<h3 class="desc">In this craft you will be making garden pots out bottles and connecting them with string! Next just add some soil and your favorite plants.</h3></div>';
		echo '<h3>Tweet about this craft! <a href="https://twitter.com/intent/tweet?screen_name=teamfplusplus&text=Pumped%20for%20recycling!" class="twitter-mention-button" data-size="large" data-related="teamfplusplus">&nbsp;<i class="fa fa-twitter fa-3"></i></a></h3></div>';
	
	} else if(empty($result)) {
		while($searchQuery = mysql_fetch_row($result))
		{   
			echo '<h1>&nbsp;'.$searchQuery[1].'</h1>';
			echo '<div class="media"><div class="media-left col-sm-4 col-xs-12"><iframe width="300" height="225" src="http://www.youtube.com/embed/'.$searchQuery[2].'"></iframe></div>';
			echo '<div class="media-right col-sm-8 col-xs-12"><h3><span style="text-decoration: underline;">Materials Needed:</span>'.$searchQuery[3].'</h3>';
			echo '<h3 class="desc">'.$searchQuery[4].'</h3></div>';
			echo '<h3>Tweet about this craft! <a href="https://twitter.com/intent/tweet?screen_name=teamfplusplus&text=Pumped%20for%20recycling!" class="twitter-mention-button" data-size="large" data-related="teamfplusplus"><i class="fa fa-twitter fa-3"></i></a></h3></div>';
		}
	} else { //If result array empty
		echo '<h2>Sorry We don\'t yet support that material!</h2><h3>Please enjoy this other project!</h3>';
		echo '<h1>&nbsp;Hanging Bottle Garden</h1>';
		echo '<div class="media"><div class="media-left col-sm-4 col-xs-12"><iframe width="300" height="225" src="http://www.youtube.com/embed/5NAcVtPZQIs"></iframe></div>';
		echo '<div class="media-right col-sm-8 col-xs-12"><h3><span style="text-decoration: underline;">Materials Needed:</span>Bottles, Scissors, and String</h3>';
		echo '<h3 class="desc">In this craft you will be making garden pots out bottles and connecting them with string! Next just add some soil and your favorite plants.</h3></div>';
		echo '<h3>Tweet about this craft! <a href="https://twitter.com/intent/tweet?screen_name=teamfplusplus&text=Pumped%20for%20recycling!" class="twitter-mention-button" data-size="large" data-related="teamfplusplus">&nbsp;<i class="fa fa-twitter fa-3"></i></a></h3></div>';
	}
}
	?>
</body>
</html>