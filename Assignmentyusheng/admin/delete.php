<?php

require 'dbcon.php';

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $ids = $_POST['delete'];

    $sql = "DELETE FROM students WHERE id IN ($ids)";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo 'Error deleting rows';
    }
}

?>