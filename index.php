<?php

// A Steam API Key is required so as to be able to contact steam and get a users profile image and name
// You can get a Steam API Key by visiting http://steamcommunity.com/dev/apikey
// Don't worry about the web address, it won't have any effect so just type in any web site
// Once you have your steam API Key simply paste the key below. (Make sure the quotation marks are still there or else it won't work)
$SteamAPIKey = "97186F08D0DBD4C287372778276D76D4";


// Don't edit any of the PHP stuff here or else you may break the script
// If you website isn't displaying correctly then please make sure you have configured your loading url correctly
if (!isset($_GET["steamid"])) {
	die("Woops, you don't seem to be using the correct loading URL format, please make sure it has the correct extension it should look like this: www.yourdomain.com/loading/index.php?steamid=%s");
}

$steamid64 = $_GET["steamid"];

$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $SteamAPIKey . "&steamids=" . $steamid64;
$json = file_get_contents($url);
$table2 = json_decode($json, true);
$table = $table2["response"]["players"][0];

?>

<!DOCTYPE HTML>
<html>
	<head>
    <!-- Hello, your reading the source code for the server load page -->
	<!-- Created by CaptainMcMarcus for CoderHire -->
    <!-- This is the HTML code below and is safe to edit to your needs -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="description" content="Welcome to Crystal Load - Crystal Blue Persuassion!" /> <!-- Webpage Description --> 
	<title>Crystal Load</title> <!-- Webpage Title -->
	<link href="style.css" rel="stylesheet" type="text/css" /> <!-- Links to the Stylesheet -->
    <link href="colour.css" rel="stylesheet" type="text/css" /> <!-- Links to the Stylesheet for main colours -->
	
    <script type="text/javascript" src="scripts/jquery.js"></script><!-- Link to jquery so we can do cool stuff -->
    <script type="text/javascript" src="scripts/cycle.js"></script><!-- For Rotating Backgrounds -->
    
    <script type="text/javascript"><!-- Script to center content -->
	$(document).ready(function() {
		//Changes volume of song. 0.5=50% volume
		$('.audio').prop("volume", 0.5);
			
		//Perfectly centres content to the middle of the screen both vertically and horizontally
		$(window).resize(function(){
			  $('.core-wrapper').css({
			   position:'absolute',
			   left: ($(window).width() 
				 - $('.core-wrapper').outerWidth())/2,
			   top: ($(window).height() 
				 - $('.core-wrapper').outerHeight())/2
			  });	
		});
		// Initiate centre function
		$(window).resize();
		
		//Lets get thos backgrounds moving
		$('#background-scroll').cycle({ 
			fx: 'fade',
			pause: 0, 
			speed: 1800, //Time to fade into the next image [in milliseconds]
			timeout: 3500  //Time spent on image [in milliseconds]
		});
	});
    </script>
    

	</head>
	
	<body>
    
    <div id="background-scroll"><!-- Add Backgrounds so we can have multiple ones -->
    	<!-- IF YOU NEED LESS BACKGROUNDS JUST REMOVE THEM OUT OF THE LIST -->
        <!-- TO ADD EXTRA BACKGROUNDS YOU NEED TO MODIFY THE STYLESHEET [ADVANCED USERS ONLY] -->
    	<div id="bg1"></div><!-- BG 1 -->
        <div id="bg2"></div><!-- BG 2 -->
        <div id="bg3"></div><!-- BG 3 -->
        <div id="bg4"></div><!-- BG 4 -->
        <div id="bg5"></div><!-- BG 5 -->
        <div id="bg6"></div><!-- BG 6 -->
   	</div>
    
    <div class="core-wrapper"><!-- Opens the wrapper so we can contain and center everything -->
    	
        <img src="images/logo.png" width="960" height="120" alt="Your Logo" /><!-- This adds in the logo, simply change logo.png to make this look different -->
    
    	<div id="left-items"><!-- Opens the wrapper for the left content, there isn't really much to change on the left side as it's dynamic -->
    
			<?php
				//PHP Code for the avatar display, it's probably best to leave this section alone
				echo "<div id=\"profile-wrap\">";
					
					//Add in the players avatar
					echo "<div id=\"profile-top\">";
						echo "<div id=\"avatarimg\">";
							echo "<img src=\"" . $table["avatarfull"] . "\" />";
						echo "</div>";
					echo "</div>";
					
					//Adds in the players name
					echo "<div id=\"profile-bottom\">";
						echo "<p>" . $table["personaname"] . "</p>";
					echo "</div>";
					
				echo "</div>";
            ?>
            <div class="clear"></div>
            
            
            <div class="Mysticgaming">
            	<h2>Server</h2><!-- Adds in the server title, you can change the text to be whatever you would like -->
           	</div>
            
            <!-- Lets get the server Details in here -->
            <ul id="server-list">
            	<li><img src="images/server-name.png" alt="Mysticgaming" /> <span id="s-name">Server Name</span></li><!-- Dynamically adds the server name -->
                <li><img src="images/server-mode.png" alt="darkrp" /> <span id="s-mode">Server Game Mode</span></li><!-- Dynamically adds game mode name -->
                <li><img src="images/server-map.png" alt="rp_downtown_v4c_v2" /> <span id="s-map">Server Map Name</span></li><!-- Dynamically adds map name -->
           	</ul>
            
     	</div><!-- Close The Wrapper for the Left Items -->
        
        <div id="right-items"><!-- Open wrapper for the items on the right -->
        	
            <div class="title">
            	<h2> Rules</h2><!-- Adds in the rules title, you can change the text to be whatever you would like -->
           	</div>
            
            <!-- Let's add in all the rules, the number inside the <span></span> tags will appear in a brighter coloured box  -->
            <ul id="rules">
            	<li><span>1</span> Do not bully or harass other players</li>
                <li><span>2</span> Do not be annoying</li>
                <li><span>3</span> Do not propkill</li>
                <li><span>4</span> Do not RDM</li>
                <li><span>5</span> Do not metagame</li>
                <li><span>6</span> Do not hack or exploit</li>
                <li><span>7</span> Do not micspam</li>
                <li><span>8</span> Do not kill players who are AFK</li>
                <li><span>9</span> Obey all staff orders</li>
                <li><span>10</span> Thanks, and have fun!</li>
            </ul>
            
      	</div><!-- This close the right content wrapper -->
        
        <div class="clear"></div><!-- This clears things up so that we can vertically align things correctly -->
        
        <!-- This adds in the progress bar -->
        <div id="bar">
        	<div id="bar-width" style="width: 0%;"></div>
       	</div>
        
        <!-- This adds in the progress percentage bar -->
        <div id="percentage">
        	<p></p>
       	</div>
        
        <!-- This adds the current item being downloaded, we use the word connecting by default because if we don't download anything then it won't change -->
        <div id="download-item">
        	<p>Connecting...</p>
      	</div>
    
    </div><!-- now we close the core wrapper to keep everything nicely contained and in the middle -->
    
    <!-- MUSIC SCRIPT -->
    <!-- To activate simply delete the comment tags and replace music.mp3 with the path to your sound file. -->
    <!-- Adding copyrighted music is illegal as you will be redistributing from the server this is hosted from, this means that you will be held liable -->
    
    <!--
    <audio class="audio" autoplay autobuffer="autobuffer">
    	<source src="music.ogg" type="audio/ogg">
    </audio>
    -->
    
    <script type="text/javascript" src="scripts/main.js"></script><!-- Script to get downloads, map, players, game mode and sort out the loading bar -->

	</body><!-- Closes off the HTML Document -->
</html>
