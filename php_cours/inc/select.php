<?php

$sql = "SELECT * FROM users LIMIT 1";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result , MYSQLI_ASSOC);