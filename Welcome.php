<?php
$showAlert=false;
$showerror=false;
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

$login = false;
$showerror = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $poetries = $_POST["poetries"];
    $username = $_POST["username"];

    $sql = "INSERT INTO `signup1` (`SNo.`, `Name`, `Email`, `Password`, `Confirm Password`, `Poetry`) VALUES (NULL, '$username', '', '', '', 'Shayar koi Sayana kehke gya zaroor...\r\nSheesha ho ya ye dil ho tutega toh zaroor');";


    $result = mysqli_query($conn, $sql);
    
    // Check if the query executed successfully
    if ($result) {
      // Retrieve number of rows from result set
      $num = mysqli_num_rows($result);
      
      if ($num == 1) {
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['poetries'] = $poetries;
          header("location: welcome.php");
      } 
      else{
          $showerror = "Invalid Credentials";
      }
    } 
    else {
        // Display error message
        $showerror = "Error executing SQL query: " . mysqli_error($conn);
    }
    

}
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
    // $poetries1=$_GET['poetries'];

  $submittedPoetry = "";
  if (isset($_GET['poetry'])) {
    $submittedPoetry = $_GET['poetry'];
    // You can also sanitize the received data here
    // $submittedPoetry = htmlspecialchars($submittedPoetry);
  }


    

  if ($submittedPoetry) {
    echo "<h3>Your Submitted Poetry:</h3>";
    echo "<p>$submittedPoetry</p>";
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome - <?php $_SESSION['username']?></title>
  </head>
  <body>
    <?php require 'C:\xampp\htdocs\shresth\_nav.php' ?>
    
    <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome To the frontend task of BYTE - <?php echo $_SESSION['username']?></h4>
      <p>Hey how are you doing? Welcome to Post Poetries. You are logged in as <?php echo $_SESSION['username']?>. Aww yeah, you successfully read this important message. 
        Now you can submit your poetries .</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/shresth/logout.php"> using this link.</a></p>
    </div>
  </div>
  <form action="/shresth/login.php" method="post">
  <div class="mb-1 col-md-9">
        <label for="poetries" class="form-label">Submit Your Poetry</label>
        <input type="textarea" class="form-control" id="poetry" name="poetry" placeholder="Write your Poetry!">
     
        <button type="submit" class="btn btn-primary">Submit</button>
  

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>