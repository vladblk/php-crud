<?php

    include 'connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $selectQuery = "select * from `details` where id=$id;";
        $output = mysqli_query($con, $selectQuery);

        $selectedUser = mysqli_fetch_assoc($output);
        $selectedUserName = $selectedUser['name'];
        $selectedUserEmail = $selectedUser['email'];
        $selectedUserMobile = $selectedUser['mobile'];
        $selectedUserPassword = $selectedUser['password'];
    }

    if (isset($_POST['submit'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $password=$_POST['password'];

        $updateQuery = "
            update `details`
            set name='$name', email='$email', mobile='$mobile', password='$password'
            where id=$id;
        ";

        $result = mysqli_query($con, $updateQuery);

        if ($result) {
            header('location:homepage.php');
        } else {
            die(mysqli_erro($con));
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
                <input type="text" class="form-control" id="name" name="name" autocomplete="off" value=<?php echo $selectedUserName?>>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off" value=<?php echo $selectedUserEmail?>>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off" value=<?php echo $selectedUserMobile?>>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="off" value=<?php echo $selectedUserPassword?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update user</button>
            <a href="homepage.php" class="btn btn-light">Cancel</a>
        </form>
    </div>
</body>
</html>