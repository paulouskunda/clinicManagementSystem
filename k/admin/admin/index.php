<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread();
?>
	<div class="row-fluid home_text">	
         	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title><?php echo ucwords($_SESSION['username']); ?> LOGED IN </title>
<style type="text/css">
body{
	background-image: url(images/tree.jpg);
	font-size: 18px;
}

.wrapper {
	margin-top: 10%;
	float: center;
	background-color: lightgrey;
	border: 2px dotted grey;
	padding-left: 0%;
	padding-bottom: 5%;
	margin-left: 15%;
	margin-right: 20%;
	text-align: center;
}

a {
	text-decoration: none;
	font-family: monospace;
    color: #2C6F94;
}
a:hover {
	color: #A2C45B;
}
button {
	background-color: #00FFFF; /* Green */
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;

}
button btn {
    font-size: 10px; 
    font-family: monospace; 
    color: black;
}
button:hover {
  color: red;
  transition: width 2s, height 4s;
}
.danger {
	background-color: red;
	height: 25px;
	width: initial;
	line-height: 25px;

}
ul li {
	list-style: none;
	text-align: left;
    font-family: monospace;
}
li {
	padding-bottom: 2px;
}
@media screen and (max-width: 480px){
	.wrapper {
	margin-top: 10%;
	float: center;
	width: 100%;
	background-color: grey;
	border: 2px dotted grey;
	padding-left: 0%;
	padding-bottom: 5%;
	margin-left: 0%;
	margin-right: 20%;
	text-align: center;
}
}
</style>
</head>
<body>
	<?php 
	if (isset($_SESSION['username'])) {
		# code...
	}
	?>
	<div class="wrapper">
		<div class="center">
<h4>WELCOME ADMIN <?php echo ucwords($_SESSION['username']); ?></h4>

<ul>
	<li><b style="color: white;">1.NOTE: THIS IS IMPORTANT.</b> ALL MUSIC SHOULD NOT HAVE ANY SIGNATION FROM OTHER MUSIC SITES LIKE <b><i>[indimba.com, zambianmusisc blog.co or afrofire.com]</i></b></li>
	<li>2. ALL MUSIC SHOULD BE A .mp4 or m4a format.</li>
	<li><b style="color: white;">3.NOTE: THIS IS IMPORTANT.</b> All MUSIC TITLE SHOULD ONLY INVOLVE THE SONG NAME ALONE NOT A SONG WITH AN ARTIST NAME TOGETHER. FOR EXAMPLE lets say you have a song by chef187 called <i>Good Teacher Bad Kasukulu</i> It shouldn't be saved in your files before uploading like [chef187-good-teacher-bad-kasukulu]<i class="fa fa-cross" style="font-size:16px"></i><br>
		But it should saved in your files before uploading has Good-Teacher-Bad-Kasululu or good teacher bad kasukulu<i class="fa fa-tick" style="font-size:16px"></i>. Names of artists are added when uploading the song in the dialog</li>
   <li>4. ALWAYS REMEMBER THAT ARTIST LIKE K.R.Y.T.I.C should always be spelled in that form always </li>
	
</ul>
</div>
</div>
</body>

	</div>
<?php
	get_footer();
?>		

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->