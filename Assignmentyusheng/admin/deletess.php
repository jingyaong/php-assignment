<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "event";



    $connection = new mysqli($severname, $username, $password, $database);

    $sql = "DELETE FROM userevent WHERE id=$id";
    $connection->query($sql);

}
header("location:/Assignment_Latest/Assignment_Latest/admin/edit_event.php");
exit;
?>