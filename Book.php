<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>

    <a href="index.php"> Home page</a>

    <h2 class="pull-left">Book Database</h2>

    <?php

    require_once "config.php";

    $sql = "SELECT * FROM BOOK INNER JOIN AUTHOR ON AUTHOR.author_id=BOOK.author_id ORDER BY BOOK.book_price";

    $retrieval = mysqli_query($link, $sql);

    if (mysqli_num_rows($retrieval) > 0) { // for titles
        echo '<table class = "table table-bordered table-striped">';
        echo "<tr>";

        echo "<th> Book ID </th>";
        echo " <th> Title </th>";
        echo " <th> Color </th>";
        echo "<th> Price </th>";
        echo "<th> Author First Name</th>";
        echo "<th> Author Last Name</th>";
        echo "<th class'container'>" .
            "<button class='btn btn-primary'> <a href='createBook.php' class='text-light'> + Add Book </a> </button>" .
            "</th>";


        echo "</tr>";


        while ($row = mysqli_fetch_array($retrieval)) { // fields 

            echo "<tr>";

            echo "<td>"  . $row['book_id'] . "</td>";
            echo "<td>"  . $row['book_title'] . "</td>";
            echo "<td>"  . $row['book_color'] . "</td>";
            echo "<td>"  . $row['book_price'] . "</td>";

            echo "<td>"  . $row['first_name'] . "</td>";
            echo "<td>"  . $row['last_name'] . "</td>";

            echo "<td>" . "<button class ='btn btn-primary'>" . " <a href= 'updateBook.php?book_id=$row[book_id]' class = 'text-light'>Update </a>" . "</button>";
            echo "<button class ='btn btn-danger'> <a href= 'deleteBook.php?book_id=$row[book_id]' class = 'text-light'>Delete </a>" . "</button>";

            echo "</tr>";
        } // end while 


        echo "</table>";
    } // end if  
    else echo "NO RECORDS FOUND";

    mysqli_close($link);

    ?>

</body>

</html>