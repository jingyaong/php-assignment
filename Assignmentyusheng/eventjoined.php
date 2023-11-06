<?php

$con = mysqli_connect("localhost", "root", "", "blog");

if (!$con) {
  die('Connection Failed' . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Computer Science Society</title>

  <link rel="stylesheet" type="text/css" href="adminheader.css">
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />




</head>




<?php include "sidebar.php"; ?>
<!DOCTYPE html>
<html>



<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit Event</h4>
        </div>
        <div class="card-body">
          <input id="filter" class="form-control mb-4" type="text" placeholder="Search event...">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>

                <th>Event</th>

              </tr>
            </thead>
            <tbody>
              <?php
              require 'dbcons.php';

              $query = "SELECT * FROM students";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $student) {
                  ?>
                  <tr>
                    <td>
                      <?= $student['id'] ?>
                    </td>
                    <td>
                      <?= $student['name'] ?>
                    </td>


                    <td>
                      <?= $student['event'] ?>
                    </td>

                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


</body>

</html>