<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "user_db";



    $connection = new mysqli($severname, $username, $password, $database);

    $sql = "DELETE FROM user_form WHERE id=$id";
    $connection->query($sql);

}
header("location:/Assignment/admin_login.php");
exit;
?>