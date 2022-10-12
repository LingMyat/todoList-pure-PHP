<?php
    require("./config.php");
    $errDesc = $errTitle = $title = $desc = "";
    $currentId = $_GET['id'];
    $query = "SELECT title,description FROM todo WHERE id=$currentId";
    $result = mysqli_query($dbConnection,$query);
    $table = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $currentTitle = $table[0]['title'];
    $currentDesc = $table[0]['description'];

    if (isset($_POST["save"])){
        //  var_dump($_POST);
        //  var_dump(empty($_POST["description"]));
        if (empty($_POST['title'])) {
            $errTitle = "this field is require!";
            
        } else {
            $title = $_POST['title'];
        }
        if (empty($_POST["description"])) {
           
            $errDesc = "this field is require!";  
        } else {
            $desc =  $_POST['description'];
              
        }
        if ($title <> '' && $desc <> "") {
            $query = "UPDATE todo SET title ='$title',description = '$desc' WHERE id=$currentId ";
            mysqli_query($dbConnection,$query);
            header("location:./index.php");
        }

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
    <title>Edit</title>
    <style>
        * {
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card w-50 m-auto">
            <div class="card-header">
                <h3>
                    Todo Edit
                </h3>
            </div>
            <div class="card-body ">
                <form method="post" class="">
                    <div class="mb-3">
                        <label for="exampleInputTitle" class="form-label">Title</label>
                        <input type="text" name="title" 
                        value="<?php 
                        if (isset($_POST["save"])) {
                        echo $title;
                        } else{
                            echo $currentTitle;
                            }?>" class="form-control" id="exampleInputTitle" aria-describedby="emailHelp">
                    <span class=" text-danger"><?php echo $errTitle ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleTextarea" class="form-label">Description</label>

                        <textarea name="description" rows="9" cols="20" class="form-control" id="exampleTextarea"><?php 
                        if (isset($_POST["save"])) {
                        echo $desc;
                        } else{
                            echo $currentDesc;
                        }?></textarea>
                        <span class=" text-danger"><?php echo $errDesc; ?></span>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary float-end">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>