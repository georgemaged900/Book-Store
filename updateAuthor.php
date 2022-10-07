<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Author Record</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<body>
    <div class="container">

        <a href="index.php"> Home page</a>

        <h2>Update Author Record</h2>

        <form method="post">

            <div class="form-group">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
            </div>

            <div class="form-group">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
            </div>

            <button type="submit" value="Update" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>


</html>

<?php
require_once "config.php";

$author_id = $_GET['author_id']; // fetches author_id from url from the ahref for the update button in author.php

if (isset($_POST['submit'])) // checks if submit button is clicked and sent to server
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sql = "UPDATE AUTHOR SET first_name= '$first_name', last_name= '$last_name' WHERE author_id= $author_id";

    if (mysqli_query($link, $sql)) {
        header("Location:http://localhost/CrudBook/Author.php"); // redirection page
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($conn);
}













// $name=$_GET["FirstName"];//receiving name field value in $name variable  
// echo "Welcome, $name";  

//  if(isset($_GET["FirstName"])){
//      echo "<p>Hi, " . $_GET["FirstName"] . "</p>";
//  }





?>