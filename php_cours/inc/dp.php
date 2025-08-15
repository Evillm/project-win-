<?php 


$conn = mysqli_connect("localhost","root","root","php_cours");


if (!$conn) {
    echo  'Error: '  . mysqli_connect_error();
}