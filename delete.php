<?php

    include 'connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "delete from `details` where id=$id;";
        $output = mysqli_query($con, $query);

        if ($output) {
            header('location:homepage.php');
        } else {
            die(msqli_error($con));
        }
    }

?>