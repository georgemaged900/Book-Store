<?php
require_once "config.php";

if (isset($_GET['author_id'])) {
    $author_id = $_GET['author_id'];

    $sql = "DELETE FROM AUTHOR WHERE author_id = $author_id ";
    $result = mysqli_query($link, $sql);

    if ($result) {
        echo "Deleted Successful";
        header("Location:http://localhost/CrudBook/Author.php"); // redirection page
    } else {
        die(mysqli_error($link));
    }
}
mysqli_close($conn);














// $name=$_GET["FirstName"];//receiving name field value in $name variable  
// echo "Welcome, $name";  

//  if(isset($_GET["FirstName"])){
//      echo "<p>Hi, " . $_GET["FirstName"] . "</p>";
//  }
