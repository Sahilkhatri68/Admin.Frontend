<?php
$conn=mysqli_connect("localhost","root","","admindb");
//signup//
if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpsw=$_POST['cpsw'];

    $image=$_FILES['image']['name'];
    $tpm_name=$_FILES['image']['tmp_name'];
    $path="../uploads/".$image;
    move_uploaded_file($tpm_name,$path);

    if($password==$cpsw){
        $insert="INSERT INTO user(name,address,email,password,image) VALUES('$name','$address','$email','$password','$path')";
        
        $check=mysqli_query($conn,$insert);
        header("location:http://projects.test/adminpanel/frontend/admin/fashprofile.php");
    }else{
        echo "<div class='psw'>password does't match </div>";
    }
    
}
//login//
session_start();
if(isset($_POST['login'])){
    $name=$_POST['name'];    
    $password=$_POST['password'];

    $select="SELECT * FROM user WHERE name='$name' && password='$password'";
    $query=mysqli_query($conn,$select);
    $data=mysqli_fetch_assoc($query);

    if(isset($data)){
        $_SESSION['email']=$data['email'];
    
header("location:http://projects.test/adminpanel/frontend/index.php");
    }else{
        echo "<div class ='error'>wrong data!</div>";
    }
}

?>
<!DOCTYPE HTML>
<head>
    
 
    <style>
   
        body {
    font-family: 'Open Sans',sans-serif;
    font-weight: 500;
    color:#fff;
    overflow-y: scroll; /* Show vertical scrollbar */
  overflow-x: scroll;
  }
  .info p {
    text-align:center;
    color: #999;
    text-transform:none;
    font-weight:600;
    font-size:15px;
    margin-top:2px
  }
  
  .info i {
    color:#55acee;
  }
  
  h1 {
    text-align:center; 
    color: #666;
    text-shadow: 1px 1px 0px #FFF;
    margin:50px 0px 0px 0px
  }
  
  h2 {
    font-size: 20px;
    font-weight: 600;
  }
  
  h3 {
    font-size: 17px;
    font-weight: 600;
  }
  
  a {
    text-decoration: inherit;
    color: inherit;
  }
  
  a:hover {
    text-decoration: inherit;
  }
  
  hr {
    position: relative;
    margin-top: 27%;
    border: 1px solid #fff;
    border-radius: 50px;
    opacity: 0.15;
  }
  
  .content {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 900px;
    background: #f2f2f2;
    z-index:-1;
  }
  
  .container {
    display: block;
    position: relative;
    width: 530px;
    height: 679px;
    margin: auto;
    margin-top: 180px; 
    box-shadow: 1px 5px 10px 1px #333;
    overflow:hidden;
  }
  
  img.bg-img {
    display: block;
    position: absolute;
    margin: auto;
  }
  
  .menu {
    position: relative;
    padding: 15% 13% 0 13%;
  }
  
  .menu h2 {
    display: inline;
    margin: 20px;
    padding-bottom: 3px;
    border-bottom: 3px solid #1161ee;
  }
  a:not(.active) {
    cursor:inherit;
  }
  .menu .active h2 {
    border-bottom: 0 solid #1161ee;
    color: #AEAEAE;
    transition: color 0.5s ease-in;
  }
  
  .connexion {
      position: absolute;
      padding: 15% 13%;
      width: 74%;
      left:0px;
      transition: all 0.7s;
  }
  
  .connexion h2 {
      display: inline;
      margin: 20px;
      padding-bottom: 3px;
      border-bottom: 2px solid #1161ee;
  }
  
  .connexion h4 {
      margin-bottom: 0;
      text-align: center;
      color: #ffffff;
      opacity: 0.3;
  }
  
  .connexion h4:hover {
      opacity: 0.8;
      transition: all 0.1s ease-in;
  }
  .file{
    margin-bottom: 0;
      text-align: center;
      color: #ffffff;
      opacity: 0.3;
  }
  .sah{
    display: block;
      margin-top: 10px;
      padding: 5px 10px;
      font-size: 15px;
      font-weight: 600;
      color: #fff;
    }
    .error{
      padding-top: 10px;
      text-align: center;
      color: black ;
      font-size: 20px;
    }
    .psw{
      padding-top: 10px;
      text-align: center;
      color: black ;
      font-size: 20px;
    }
  label {
      display: block;
      margin-top: 10px;
      padding: 3px 10px;
      font-size: 14px;
      font-weight: 600;
      color: #fff;
  }
  
  input {
      display: block;
      width: 93%;
      margin: auto;
      padding: 13px;
      border: 1px;
      border-radius: 20px;
      font-family: "Roboto",sans-serif;
      opacity: 0.15;
      font-size: 20px;
      color: black;
  }
  
  input p {
      color: #fff;
      opacity: 1;
  }
  
  /* input.submit {
      width: 100%;
      padding: 10px;
      font-size: 17px;
      font-weight: 700;
      color: #fff;
      opacity: 1;
      background-color: #1161EE;
      cursor: pointer;
  } */
  .lgbtn{
    width: 100%;
      padding: 10px;
      font-size: 17px;
      font-weight: 700;
      color: #fff;
      opacity: 1;
      background-color: #1161EE;
      cursor: pointer;
      color: #fff;
      opacity: 1;
      border: 1px;
      border-radius: 20px;
  }
  .check label {
      float: left;
      width: 10%;
      margin-left: 5%;
  }
  
  .check h3 {
      padding: 15px;
  }
  
  .checkbox {
      display: none;
  }
  
  .checkbox:checked + svg .path-moving {
      -webkit-transition: stroke .4s,stroke-dasharray .4s,stroke-dashoffset .4s cubic-bezier(.3,.8,.6,1.5);
      transition: stroke .4s,stroke-dasharray .4s,stroke-dashoffset .4s cubic-bezier(.3,.8,.6,1.5);
      stroke-dasharray: 25 90;
      stroke-dashoffset: 0;
  }
  
  .path-moving,
  .path-back {
      fill: none;
      stroke: #1161ee;
      stroke-width: 3px;
      stroke-linecap: round;
      stroke-linejoin: round;
  }
  
  .path-moving {
      -webkit-transition: stroke .4s,stroke-dasharray .4s,stroke-dashoffset .4s;
      transition: stroke .4s,stroke-dasharray .4s,stroke-dashoffset .4s;
      stroke: #ffffff;
      stroke-dasharray: 110;
      stroke-dashoffset: -32;
  }
  .enregistrer {
      position: absolute;
      padding: 6% 13%;
      width: 74%;
      right:0px;
      transition: all 0.7s;
  }
  .active-section {
      position: absolute;
      right:500px;
  }
  .remove-section {
      position: absolute;
      left: 500px;
  }
  .btsub{
    width: 100%;
      padding: 10px;
      font-size: 17px;
      font-weight: 700;
      color: #fff;
      opacity: 1;
      background-color: #1161EE;
      cursor: pointer;
      color: #fff;
      opacity: 1;
      border: 1px;
      border-radius: 20px;
    }
  
        </style>
</head>
<body> 
<h1>Login & registration Form</h1>
  
<div class="content">
	<div class="container">
		<img class="bg-img" src="https://mariongrandvincent.github.io/HTML-Personal-website/img-codePen/bg.jpg" alt="">
			<div class="menu">
				<a href="#" class="btn-connexion"><h2>Log-In</h2></a>
				<a href="#" class="btn-enregistrer active"><h2>SIGN UP</h2></a>
			</div>
			<div class="connexion">
				<div class="contact-form">
				<form method="POST" enctype="multipart/form-data">
                <label>NAME</label>
					<input name="name" type="text">
					
					<label>PASSWORD</label>
					<input  name="password"  type="password">
					
					<div class="check">
						<label>				
							<input id="check" type="checkbox" class="checkbox">
								<svg xmlns="http://www.w3.org/2000/svg" width="26px" height="23px">
									<path class="path-back"  d="M1.5,6.021V2.451C1.5,2.009,1.646,1.5,2.3,1.5h18.4c0.442,0,0.8,0.358,0.8,0.801v18.398c0,0.442-0.357,0.801-0.8,0.801H2.3c-0.442,0-0.8-0.358-0.8-0.801V6"/>
									<path class="path-moving" d="M24.192,3.813L11.818,16.188L1.5,6.021V2.451C1.5,2.009,1.646,1.5,2.3,1.5h18.4c0.442,0,0.8,0.358,0.8,0.801v18.398c0,0.442-0.357,0.801-0.8,0.801H2.3c-0.442,0-0.8-0.358-0.8-0.801V6"/>
								</svg>
						</label>
						<h3>Keep me login</h3>
					</div>
					
                    <button type="submit" name="login" class="lgbtn" value="login">Log-In</button>
				</form>
                </div>
				
				<hr>
				<a href="#"><h4>Forgot password?</h4></a>
			</div>
		<form method="POST" enctype="multipart/form-data">	
			<div class="enregistrer active-section">
				<div class="contact-form">
					<label>Name</label>
					<input name="name" type="text">
						
					
                    <label>Address</label>
					<input name="address" type="text">
                    
					
					<label>E-MAIL</label>
					<input name="email" type="text">	
					
					<label>PASSWORD</label>
					<input name="password" type="password">
					
                   
					
                    <label>CONFIRM PASSWORD</label>
					<input  name="cpsw" type="password">
                    
                   
                  
					
                    <label >Image</label>
					<b><input class="sah" type="file" name="image" ></b>
                  
                    <!-- <div class="check">
						<label>				
							<input id="check" type="checkbox" class="checkbox">
								<svg xmlns="http://www.w3.org/2000/svg" width="26px" height="23px">
									<path class="path-back"  d="M1.5,6.021V2.451C1.5,2.009,1.646,1.5,2.3,1.5h18.4c0.442,0,0.8,0.358,0.8,0.801v18.398c0,0.442-0.357,0.801-0.8,0.801H2.3c-0.442,0-0.8-0.358-0.8-0.801V6"/>
									<path class="path-moving" d="M24.192,3.813L11.818,16.188L1.5,6.021V2.451C1.5,2.009,1.646,1.5,2.3,1.5h18.4c0.442,0,0.8,0.358,0.8,0.801v18.398c0,0.442-0.357,0.801-0.8,0.801H2.3c-0.442,0-0.8-0.358-0.8-0.801V6"/>
								</svg>
						</label>
						<h3>I agree</h3>
					</div>
					 -->
					<button type="submit" value="signup" name="signup" value="signup" class="btsub"  >	Sign-up</button>
				</div>
			</div>
        </form>
	</div>

</div>

</body>




<script>
    
$('.btn-enregistrer').click(function() {
  $('.connexion').addClass('remove-section');
	$('.enregistrer').removeClass('active-section');
  $('.btn-enregistrer').removeClass('active');
  $('.btn-connexion').addClass('active');
});

$('.btn-connexion').click(function() {
  $('.connexion').removeClass('remove-section');
	$('.enregistrer').addClass('active-section');	
  $('.btn-enregistrer').addClass('active');
  $('.btn-connexion').removeClass('active');
});


</script>

