<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Author</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <a href="index.php"> Home page</a>
    <h2 class="pull-left">Author Table</h2>

    <?php
    require_once "config.php";

    $sql = "SELECT * FROM AUTHOR";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) { // number of rows in table more than 0{
        echo '<table class="table table-bordered table-striped">';
        echo "<tr>";

        echo "<th>Author_ID</th>"; // header title
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";

        echo "<th class'container'>" . // button for add author in table header
            "<button class='btn btn-primary'> <a href='createAuthor.php' class='text-light'> + Add Author </a> </button>" .
            "</th>";

        echo "</tr>";

        while ($row = mysqli_fetch_array($result)) { 

            $count = mysqli_query($link, "SELECT COUNT(book_title) as total FROM BOOK WHERE author_id = $row[0] ");
            $data = mysqli_fetch_assoc($count); // for book count row

            echo "<tr>"; // table row/ horizantal
            echo "<td>" . $row[0] . "</td>"; // table data/content author id. loops in each row for author_id and displays author id from fetch array result
            echo "<td>" . $row[1] . "</td>"; // first name
            echo "<td>" . $row[2] . "</td>"; // last name

            // Update button, link to updateAuthor.php page and query parameter has get request and fetches author_id
            echo "<td>" . "<button class ='btn btn-primary'>" . "<a href= 'updateAuthor.php?author_id=$row[0]' class = 'text-light'>Update </a>" . "</button>";
            
            // Delete Author button
            echo "<button class ='btn btn-danger'> <a href= 'deleteAuthor.php?author_id=$row[0]' class = 'text-light'>Delete </a>" . "</button>";
            "</td>";
            

            // Add book button for each author and link to createBook page and fetches the author_id 
            echo "<td>" . "<button name = 'AddBook' class ='btn btn-primary'>" . "<a href= 'createBook.php?author_id=$row[0]' class = 'text-light'>Add Book </a>" . "</button>";

            echo "<td>" . "<button class ='btn btn-primary'> <a href= 'authorBook.php?author_id=$row[author_id]' class = 'text-light'>My Books </a>" . "</button>";
            "</td>"; // my books button for each author and link to authorBook.php to display the book_titles for the author_id

            echo "<td>" . $data['total'] . "</td>"; // display book count (number) at end of table for each author


            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "NO RECORDS FOUND";
    }

    mysqli_close($link);
    ?>
</body>

</html>























<!-- //  if ($result) {
  
//  } -->








<!-- if (isset($_POST['AddBook']))
                {
                        header("Location:http://localhost/CrudBook/Book.php"); // redirection page
   
                } -->