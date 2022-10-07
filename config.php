<?php

$link = new mysqli('localhost', 'root', 'root', 'bookstore');

// Check connection
if (!$link) {

    die(mysqli_error($link));
}
