<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Author Record</title>

</head>

<meta charset="utf-8">
<meta name="viewport" content="width = device-width, initial-scale=1, shrink-to=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<body>
    <div class="container">

        <a href="index.php"> Home page</a>

        <h2>Create Author Record</h2>

        <form method="post">

            <div class="form-group">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
            </div>

            <div class="form-group">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
            </div>

            <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>

<?php
require_once "config.php";

if (isset($_POST['submit'])) // if submit button with name= submit is set/clicked
{
    $first_name = $_POST['first_name']; // post request, assigns the first_name from the first name form to $first_name 
    $last_name = $_POST['last_name'];

    $sql = "INSERT INTO AUTHOR (first_name,last_name) VALUES ('$first_name','$last_name')";
    $result = mysqli_query($link, $sql); 

    if ($result) { // if query is succesfull
        header("Location:http://localhost/CrudBook/Author.php"); // redirect to author.php page
    } else {
        die(mysqli_error($link));
    }
    mysqli_close($conn);
}
require_once "Author.php"; // to display the author table















// $name=$_GET["FirstName"];//receiving name field value in $name variable  
// echo "Welcome, $name";  

//  if(isset($_GET["FirstName"])){
//      echo "<p>Hi, " . $_GET["FirstName"] . "</p>";
//  }





?>