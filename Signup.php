<?php
$showAlert=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $err='';
  include 'C:\xampp\htdocs\shresth\sql.php';
  $username=$_POST["username"];
  $email=$_POST['email'];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  //checking if username exists
  $existsql="SELECT * FROM `signup1` WHERE name='shresht' ";
  
  $exist=false;
  if(($cpassword== $password)&& ($exist==false)){
    $sql="INSERT INTO `signup1` ( `Name`, `Email`, `Password`, `Confirm Password`) VALUES ( '$username','$email', '$password', '$cpassword')";
    $result=mysqli_query($conn,$sql);
    if($result){
      $showAlert=true;
    }
    else{
      $showerror=true;
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    require 'C:\xampp\htdocs\shresth\_nav.php' ;

    ?>
    <?php
    if($showAlert){
      echo'
      <div class=" alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your account has been created ,Now you can login.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> -->
      </div>';
    }
    if($showerror){
      echo'
      <div class=" alert alert-success alert-dismissible fade show" role="alert">
          <strong>Failed!</strong> '.$showerror.'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> -->
      </div>';
    }
    ?>
    <div class="container mt-3" >
      <h1>Sign up</h1>
      <h4>Please Enter Your Name,Email and Password</h4>
      <form action="/shresth/Signup.php" method="post">
          
          <div class="mb-1 col-md-6">
              <label for="exampleInputname" class="form-label">Name</label>
              <input type="text" class="form-control" id="username" aria-describedby="textHelp"name="username" placeholder="Enter your Name">
              
          <div class="mb-1">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp"name="email" placeholder="Enter your Email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              
          </div>
              <div class="mb-1">
                  <label for="exampleInputPassword1" class="form-label">Create a Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
              </div>
          </div>
              <div class="mb-1 col-md-6">
                  <label for="cpassword" >Confirm Your Password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter your password">
                  <div id="emailHelp" class="form-text">Make sure to enter the same password.</div>
              </div>
          
          
          <button type="submit" class="btn btn-primary">Register</button>
          <!-- <p>Already have an account?</p>
        <a href="/shresth/form.php" alt="Error">Login</a> -->
      </form>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
      
  </body>
</html>