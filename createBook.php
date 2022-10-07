<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Book Record</title>

</head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<body>
    <a href="index.php"> Home page</a>
    <div class="container">
        <h2>Create Book Record</h2>
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
                    require_once "config.php"; // drop down menu in book form to fetch author name from database

                    if (isset($_GET['author_id'])) { // if author_id is fetched meaning that add book button for author_id is pressed from author page
                        $author_id = $_GET['author_id']; // author_id is fetched from URL after pressing add book from the author page for specific author drop down menu
                        $result = mysqli_query($link, "SELECT first_name,last_name FROM AUTHOR WHERE author_id = $author_id");
                    } else
                        $result = mysqli_query($link, "SELECT author_id, first_name,last_name FROM AUTHOR ORDER BY first_name ASC"); // else the add book is clicked from book page and displays authoer first and last name in order 

                    while ($row = mysqli_fetch_array($result)) { // displays the queryed results for author first and last name
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $author_id = $row['author_id'];

                        echo "<option value ='$author_id'> $first_name $last_name</option>"; // displays in drop down menu and gives them author_id value 
                    }

                    ?>
                </select>
            </div>
            <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

<?php
require_once "config.php";

$author_id = $_GET['author_id'];//fetches author_id after 'Add Book' button for authors list is pressed from Author Page and checks book count 
$q = "SELECT COUNT(book_title) as total FROM BOOK WHERE author_id = $author_id"; // counts book_title for author_id
$count = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($count);
if ($data['total'] > 2) { // author cannot add more than 3 books
    header("Location:Author.php");
}

if (isset($_POST['submit']))  // submit button for form is pressed 
 {

    $author_id = $_POST['author_id'];
    $book_title = $_POST['book_title'];
    $book_color = $_POST['book_color'];
    $book_price = $_POST['book_price'];

    // for checking if same author wrote the same book more than once 
    // Count number of book titles where author_id = ? and book_title = ? to count specific book title for specific author 
    $AuthorBookQuery = "SELECT COUNT(book_title) as total FROM BOOK WHERE author_id = $author_id AND book_title = '$book_title'";
    $checkDuplicate = mysqli_query($link, $AuthorBookQuery); // get books written by authors
    $CheckDuplicateResult = mysqli_fetch_assoc($checkDuplicate);


    if ($CheckDuplicateResult['total'] > 0) // if new book is inserted for first time than will be one and if the book is repated for the same author then it will be more than 1 
     {
        echo "already inserted";
    } else {
        $sql = "INSERT INTO BOOK (book_title,book_color,book_price,author_id) VALUES ('$book_title', '$book_color', $book_price ,$author_id)";

        if (!preg_match("/^[0-9]*$/", $book_price)) // regex expression for book_price validation
            echo "Book Price must be a valid number.";

        if (mysqli_query($link, $sql)) { // if query is successful 
            header("Location:Book.php"); // redirection page to Book.php
        } else
            die(mysqli_error($link));
    }
    mysqli_close($conn);
}
require_once "Book.php"; // for book table
















// var_dump($AuthorBookQuery); // correct

//  var_dump($checkDuplicate); // false
//var_dump($checkDuplicate['total']); // null

//die();

//  var_dump($CheckDuplicateResult['total']);


// echo "author_id:" . $author_id . '<pre>';
// echo "book_title:" . $book_title . '<pre>';


//------
// for drop down menu
// $result = mysqli_query($link, "SELECT author_id, first_name,last_name FROM AUTHOR ORDER BY first_name ASC");
// while ($row = mysqli_fetch_array($result)) {
//     $first_name = $row['first_name'];
//     $last_name = $row['last_name'];
//     $author_id = $row['author_id'];

//     echo "<option value ='$author_id'> $first_name $last_name</option>";
//-----


//$chDup = mysqli_query($link,$checkDuplicate);















//require_once "Book.php"

// $resultt = mysqli_query($link, "SELECT author_id, first_name,last_name FROM AUTHOR ORDER BY first_name ASC");
// while ($roww = mysqli_fetch_array($$result)) {

//     if (mysqli_num_rows ($roww['book_title']) > 0)
//     {

//     }

// }



// $sqlQuery = mysqli_query($link,"SELECT book_title FROM BOOK WHERE EXISTS SELECT first_name FROM AUTHOR");
// if ($roww = mysqli_fetch_array($sqlQuery))
// {
//     echo "exists";
// }
// if (mysqli_num_rows($sqlQuery)>0)
// echo "existsssssssss";

//$checkDuplicateTitle = mysqli_num_rows($sqlQuery);

// if ($checkDuplicateTitle)
// {
//     echo "title exists";
// }

//     var_dump($chDup);

//    // var_dump(mysqli_num_rows($chDup));
//     die();

// $sqll = "SELECT book_title FROM BOOK";
// $r = mysqli_query($Link,$sqll);
// echo $r;

// while ($row = mysqli_fetch_array($retrieval))
// {
//     echo $r;
// }



// $sqlBookTitle = "SELECT book_title FROM BOOK";
// $sqlAuthorFirstName = "SELECT first_name FROM AUTHOR INNER JOIN BOOK ON AUTHOR.author_id = BOOK.author_id";

// $retrievalBookTitle = mysqli_query($link,$sqlBookTitle);
// $retrievalAuthorFIrstName = mysqli_query($link,$sqlAuthorFirstName);






// $name=$_GET["FirstName"];//receiving name field value in $name variable  
// echo "Welcome, $name";  

//  if(isset($_GET["FirstName"])){
//      echo "<p>Hi, " . $_GET["FirstName"] . "</p>";
//  }

//if (!is_numeric($book_price))
//echo "Price should be number only";




// $sqll = "SELECT first_name, last_name FROM";
// $retrieval = mysqli_query($link, $sqll);

// while ($row = mysqli_fetch_array($retrieval))
// {
//    echo $row['author_id'];
//     {

// }

?>