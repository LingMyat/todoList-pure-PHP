<?php 
    require("./config.php");
    if (isset($_GET['id'])) {
        $deleteid = $_GET['id'];
       $query = "DELETE FROM todo WHERE id = $deleteid";
       mysqli_query($dbConnection,$query);
       header("location:./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <title>home</title>
    <style>
        *{
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Todo Home Page</h3>
                <a href="add.php" class="btn btn-primary">
                    +Add New
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <?php 
                        $query = "SELECT * FROM todo";
                        $result = mysqli_query($dbConnection,$query);
                        $table = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        $i = 1;
                        foreach($table as $eachRow) {
                            ?>
                            <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $eachRow['title'];?></td>
                        <td><?php echo $eachRow['description'];?></td>
                        <td><?php echo $eachRow['created_at'];?></td>
                        <td>
                            <a href='./edit.php?id=<?php echo$eachRow['id']; ?>' class='me-1'>Edit</a>/
                            <a href='./index.php?id=<?php echo$eachRow['id'];  ?>' onclick="return confirm('are you sure you want to delete this item')" class=' text-danger'>Delete</a>
                        </td>
                    </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    <!-- <tr>
                        <td>1</td>
                        <td>html</td>
                        <td>Hypertext Markup Language is fundamental website language</td>
                        <td>9-10-2022</td>
                        <td>
                            <a href='./edit.php' class=' me-1'>Edit</a>/
                            <a href='' class=' text-danger'>Delete</a>
                        </td>
                    </tr> -->
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>
</html>