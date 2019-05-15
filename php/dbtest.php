<?php
$mysqli_connection = new MySQLi('mysql', 'scalar', 'scalar', 'scalar_store');
if ($mysqli_connection->connect_error) {
    echo "Not connected, error: " . $mysqli_connection->connect_error;
}
else {
    echo "Connected.";
}