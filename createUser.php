<?php

    include 'connection.php';

    class User {
        var $name;
        var $email;
        var $mobile;
        var $password;

        function __construct($name, $email, $mobile, $password) {
            $this->name = $name;
            $this->email = $email;
            $this->mobile = $mobile;
            $this->password = $password;
        }
    }

    // if (isset($_POST['submit'])) {
    //     $name=$_POST['name'];
    //     $email=$_POST['email'];
    //     $mobile=$_POST['mobile'];
    //     $password=$_POST['password'];

    //     $sql = "
    //         insert into `details` (name, email, mobile, password)
    //         values ('$name', '$email', '$mobile', '$password')
    //     ";

    //     $result = mysqli_query($con, $sql);

    //     if ($result) {
    //         echo "Data inserted successfully";
    //     } else {
    //         die(mysqli_erro($con));
    //     }
    // }

    // CREATING USER USING CLASSES
    if (isset($_POST['submit'])) {
        $newUser = new User(
            $_POST['name'],
            $_POST['email'],
            $_POST['mobile'],
            $_POST['password']
        );

        $sql = "
            insert into `details` (name, email, mobile, password)
            values ('$newUser->name', '$newUser->email', '$newUser->mobile', '$newUser->password')
        ";

        $result = mysqli_query($con, $sql);

        if (!$result) {
            die(mysqli_error($con));
        } else {
            header('location:homepage.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Create User</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add user</button>
            <a href="homepage.php" class="btn btn-light">Cancel</a>
        </form>
    </div>
</body>
</html>