<?php
$login = false;
$showerror = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'C:\xampp\htdocs\shresth\sql.php';
    
// echo "Welcome to connection of database <br>";
    $servername="localhost";
    $username="root";
    $password="";
    $database = "dbshresth";
    //create a connection 
    $conn=mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
        echo " ";
    }
    

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM signup1 where password='$password'";
    // $result = mysqli_query($conn, $sql);
    // $num = mysqli_num_rows($result);

    $result = mysqli_query($conn, $sql);
    
    // Check if the query executed successfully
    if ($result) {
      // Retrieve number of rows from result set
      $num = mysqli_num_rows($result);
      
      if ($num == 1) {
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header("location: welcome.php");
      } 
      else{
          $showerror = "Invalid Credentials";
      }
      
        // Rest of your code
        
    } 
    else {
        // Display error message
        $showerror = "Error executing SQL query: " . mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'C:\xampp\htdocs\shresth\_nav.php';
    ?>

    <?php
    if ($login==true) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($showerror) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> ' . $showerror . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <div class="container mt-3">
        <h1>Login</h1>
        <h4>Please Enter Your Username and Password</h4>
        <form action="/shresth/login.php" method="post">
            <div class="mb-1 col-md-6">
                <label for="exampleInputname" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" aria-describedby="textHelp" name="username" placeholder="Enter your Name">
            </div>
            <div class="mb-1 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p>Don't have an account?</p>
            <a href="/shresth/Signup.php" alt="Error">SignUp</a>

          </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
