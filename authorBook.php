<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Author</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <h2 class="pull-left">My Books</h2>

    <?php
    require_once "config.php";
    
    $author_id = $_GET['author_id']; // fetches/ gets author id from author.php page after clicking the my books button 

    $sql = "SELECT book_title FROM BOOK WHERE author_id = $author_id ORDER BY book_title ASC";
    $retrieval = mysqli_query($link, $sql);

    if (mysqli_num_rows($retrieval) > 0) { // for number of rows or results queryed from the db to add the book header/title

        echo '<table class = "table table-bordered">';
        echo "<tr>";
        echo " <th> Book Title </th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($retrieval)) { // fields to display the book_title row
            echo "<tr>";

            echo "<td>" . $row['book_title'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
    } else echo "NO Books Found for Author";

    mysqli_close($link);

    ?>

</body>

</html>