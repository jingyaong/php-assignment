<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "blog");
if (isset($_POST['save_event_image'])) {
    $name = $_POST['event_name'];
    $image = $_FILES['event_image']['name'];

    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['event_image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extension)) {
        $_SESSION['status'] = "You are allowed with only jpg, png, jpeg and gif ";
        header('Location: addgallery.php');
    } else {

        if (file_exists("upload/" . $_FILES['event_image']['name'])) {

            $filename = $_FILES['event_image']['name'];
            $_SESSION['status'] = "Image already Exists " . $filename;
            header('Location:listGallery.php');
        } else {

            $query = "INSERT INTO events (event_name,event_image) VALUES ('$name','$image')";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                move_uploaded_file($_FILES["event_image"]["tmp_name"], "upload/" . $_FILES["event_image"]["name"]);
                $_SESSION['status'] = "Image Stored Successfully";
                header('Location: listGallery.php');
            } else {

                $_SESSION['status'] = "Image Not Inserted!";
                header('Location: listGallery.php');
            }
        }
    }
}

if (isset($_POST['update_event_image'])) {
    $event_id = $_POST['event_id'];
    $name = $_POST['event_name'];
    $new_image = $_FILES['event_image']['name'];
    $old_image = $_POST['event_image_old'];

    if ($new_image != '') {
        $update_filename = $_FILES['event_image']['name'];
    } else {
        $update_filename = $old_image;
    }
    //   if($_FILES['event_image']['name'] !='')
//   {
    if (file_exists("upload/" . $_FILES['event_image']['name'])) {

        $filename = $_FILES['event_image']['name'];
        $_SESSION['status'] = "Image already Exists " . $filename;
        header('Location:listGallery.php');
    }
    //  }
    else {
        //updating
        $query = "UPDATE events SET event_name='$name',event_image='$update_filename' WHERE id='$event_id' ";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            if ($_FILES['event_image']['name'] != '') {
                move_uploaded_file($_FILES["event_image"]["tmp_name"], "upload/" . $_FILES["event_image"]["name"]);
                unlink("upload/" . $old_image);
            }
            $_SESSION['status'] = "Updated Successfully";
            header("Location: listGallery.php");
        } else {
            $_SESSION['status'] = "Image Not Updated!";
            header("Location: listGallery.php");
        }
    }




}
if (isset($_POST['delete_event_image'])) {
    $id = $_POST['delete_id'];
    $event_image = $_POST['del_event_image'];
    $query = "DELETE FROM events WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        unlink("upload/" . $event_image);
        $_SESSION['status'] = "Image Deleted Successfully";
        header("Location: listGallery.php");
    } else {
        $_SESSION['status'] = "Image Not Deleted";
        header("Location: listGallery.php");
    }

}

?>