<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Book Record</title>
</head>
<body>

    <a href="index.php"> Home page</a>

    <h2>Delete Book Record</h2>

    <form action="" method="get">

        <div> <label>Book ID</label>
            <input type="text" name="book_id">
        </div>

        <input type="submit" value="Delete">
    </form>
</body>
</html>
<?php

require_once "config.php";

$book_id = $_GET['book_id'];
$sql = "DELETE FROM BOOK WHERE book_id = $book_id ";

if (mysqli_query($link, $sql)) {

    header("Location:http://localhost/CrudBook/Book.php");
} else {
    echo die(mysqli_error($link));
}
mysqli_close($conn);














// $name=$_GET["FirstName"];//receiving name field value in $name variable  
// echo "Welcome, $name";  

//  if(isset($_GET["FirstName"])){
//      echo "<p>Hi, " . $_GET["FirstName"] . "</p>";
//  }





?>