<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Book Record</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<body>

    <a href="index.php"> Home page</a>

    <h2>Update Book Record</h2>

    <form method="post">

        <div class="form-group">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="book_title" placeholder="Enter Book Title">
        </div>

        <div class="form-group">
            <label class="form-label">Color</label>
            <input type="text" class="form-control" name="book_color" placeholder="Enter Book Color">
        </div>

        <div class="form-group">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="book_price" placeholder="Enter Book Price">
        </div>

        <div class="form-group">
            <label class="form-label">Author</label>

            <select name="author_id" class="form-control">

                <?php
                require "config.php";
                $result = mysqli_query($link, "SELECT author_id, first_name,last_name FROM AUTHOR ORDER BY first_name ASC");
                while ($row = mysqli_fetch_array($result)) {
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $author_id = $row['author_id'];

                    echo "<option value ='$author_id'> $first_name $last_name</option>";
                }

                ?>
            </select>
        </div>

        <button type="submit" value="Update" name="update" class="btn btn-primary">Update</button>
    </form>
    </div>
</body>
</html>

<?php

require_once "config.php";

$book_id = $_GET['book_id']; // fetches the book_id from the URL of the ahref of updatebook button in the Book.php

if (isset($_POST['update'])) {
    $book_title = $_POST['book_title'];
    $book_color = $_POST['book_color'];
    $book_price = $_POST['book_price'];
    $author_id = $_POST['author_id'];

    $sql = "UPDATE BOOK SET book_title= '$book_title', book_color= '$book_color', book_price = $book_price, author_id = $author_id WHERE book_id= $book_id";

    $result = mysqli_query($link, $sql);
    if ($result) {


        header("Location:http://localhost/CrudBook/Book.php"); // redirection page
    } else {
        echo die(mysqli_error($link));
    }
    mysqli_close($conn);
}



// $name=$_GET["FirstName"];//receiving name field value in $name variable  
// echo "Welcome, $name";  

//  if(isset($_GET["FirstName"])){
//      echo "<p>Hi, " . $_GET["FirstName"] . "</p>";
//  }





?>