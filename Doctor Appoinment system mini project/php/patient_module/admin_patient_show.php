<?php
session_start();
$name= $_SESSION["username"];
if(isset($_SESSION["username"]))
{
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<link href="style.css" rel="stylesheet">
</head>
<body>
<style type="text/css">
	body
    {
	background-color:#2C3335;
    }
 .mycards
 {
 	padding: 10px;
 	margin:10px;
 	margin-top: 10px;
 	margin-left: 10px;
 	margin-bottom: 10px;

 }  
 .card
 {
 	
 	margin-top: 10px;
 	margin-left: 10px;
 	border-radius: 0px;
 	transition: .5s;
 	
 } 
 .card:hover
 {
   border-radius: 0px;
 }
 .card li
 {
 	list-style: none;
 	text-decoration: none;
 }
 .card-header
 {
   color:#6AB04A;
   font-weight: 10;
 }
 .card-footer
 {

 }
 .card-body
 {

 }
 .topnav .s
{
  	border:none;
	outline: none;
	background-color: transparent;
	border-bottom: 1px solid #01CBC6;

}
.topnav div
{

}
.fa
{
	color: #01CBC6;
}
.bb
{
	transition: .5s;
	background-color: #6AB04A;
}
.bb:hover
{
  color: #fff;
  background-color: #2C3335;
  width: 150px;
}
.s
{
	color: #01CBC6;
}

 </style>




<nav class="navbar navbar-dark navbar-expand-sm bg-dark ">
	<a href="../admin_module/dashboard.php" class="navbar-brand mr-auto ml-auto">Dashboard</a>
	<div class="container-fluid">
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navresponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navresponsive">
			<ul class="navbar-nav  ">
				<!-- <li class="nav-item active"><a href="index.html" class="nav-link ">Home</a></li> -->
				<li class="nav-item"><a href="../admin_module/admin_appoinment_show.php" class="nav-link  ">Appoinments</a><ul class="ulnav">
					<!-- <li><a href="registeration.html">AS a Patient</a></li>
					<li><a href="registeration2.html">As a Doctor</a></li> -->
				</ul></li>
				<li class="nav-item"><a href="../admin_module/admin_patient_show.php" class="nav-link  active">Paitents</a></li>
				<li class="nav-item"><a href="../admin_module/admin_doctor_show.php" class="nav-link ">Doctors</a></li>
				<li class="nav-item"><a href="../admin_module/schedule.php" class="nav-link">Schedules</a></li>
<!-- 				<li class="nav-item"><a href="#" class="nav-link">My profile</a></li>
 -->				<li class="nav-item"><a href="../admin_module/destroy_session.php" class="nav-link"><span class="spancolor">log out</span></a></li>

			</ul>
		</div>
		
	</div>

</nav>
<!-- search bar -->

<div class="topnav">
	<center>
  <div>

  	<a><i class="fa fa-search" aria-hidden="true"></i></a>
  <input type="text" placeholder=" Search.." class="s">
<input type="submit" class="btn" name="" value="search">

  
  </div>
 
</div>
</center>

<!-- search bar -->






<div class="row mycards">
<?php
$conn= new mysqli("localhost:3306","root","","dasdatabase");
$sql="select * from patient_regtable";

$result=$conn->query($sql);

if($result)
{
	while($row=$result->fetch_assoc() )
	{
      ?>
      <div class="col-md-3 col-sm-3 col-lg-4">
      <div class="card animated fadeIn" style="animation-delay:1s">
      	<div class="card-header"><?php echo $row["name"]?></div>
      	<div class="card-body" style="color: #0A3D62;">
      		<img src=" <?php echo $row['upload'] ?> " height=100px; width=100px;>
      	<ul style="float: right;">
      		
      	<li><?php echo $row["email"]?></li>
      	<li><span>contact:</span><?php echo $row["mob"]?></li>
      	<li><span></span><?php echo $row["city"]?></li>
      	</ul></div>
      	<div class="card-footer" style="float: left;">
      		<form action="admin_patient_details.php" method="post">
      		<input type="hidden" name="name" value="<?php echo $row["name"]?>">
      		<input type="submit" name="submit" class="btn bb" value="view profile">
      	</form>
      	</div>


      </div>
  </div>
    <?php 
    }
}


?>
</div>

</body>
<script type="text/javascript" src="../admin_module/script.js"></script>
</html>



<?php
}
else
{
?>
<script>
     if(confirm("please login to proceed"))
     {
      window.location.href="../../admin.html";
     }
</script>
<?php
}
?>