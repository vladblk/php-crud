<!-- <th scope="col"><a href="" class="btn btn-warning">Edit</a></th>
<th scope="col"><a href="" class="btn btn-danger">Delete</a></th> -->

<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Homepage</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        td, th {vertical-align: middle;}
    </style>
</head>
<body>
    
    <div class="container">

        <a href="createUser.php" class="btn btn-primary my-5">Add User</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                
                    $query = "select * from `details` order by id desc;";
                    $output = mysqli_query($con, $query);

                    if ($output) {
                        while ($row = mysqli_fetch_assoc($output)) {
                            $id = $row['id'];
                            $name=$row['name'];
                            $email=$row['email'];
                            $mobile=$row['mobile'];
                            $password=$row['password'];
        
                            $html = '
                                <tr>
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$name.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$mobile.'</td>
                                    <td>'.$password.'</td>
                                    <td>
                                        <a href="updateUser.php?id='.$id.'" class="btn btn-warning">Edit</a>
                                        <a href="delete.php?id='.$id.'" class="btn btn-danger">Delete</a>
                                    </td> 
                                </tr>
                            ';
        
                            echo $html;
                        }
                    }
                    
                ?>

                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr> -->
            </tbody>
        </table>

    </div>

</body>
</html>