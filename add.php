<?php
require("config.php");
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
    <title>Add</title>
    <style>
        * {
            font-family: sans-serif;
        }
    </style>
</head>
<?php 
$errTitle = $errDEscription = $title = $description = "";
if ( isset($_POST['create'])) {
    
    $_POST['title'] ==  '' ? $errTitle = "this field is require" : $title = $_POST['title'] ;
    $_POST['description'] ==  '' ? $errDEscription = "this field is require" : $description = $_POST['description'] ;
    if ($title <> "" && $description <> "") {
        $query = "INSERT INTO todo (title,description) VALUES ('$title','$description')";
        mysqli_query($dbConnection,$query);
        header("location:./index.php");
    }
    
}

?>
<body>
    <div class="container">
        <div class="card w-50 m-auto">
            <div class="card-header">
                <h3>
                    Todo Create
                </h3>
            </div>
            <div class="card-body ">
                <form method="post" class="">
                    <div class="mb-3">
                        <label for="exampleInputTitle" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputTitle" aria-describedby="emailHelp" value="<?php if($title !==''){
                            echo $title;
                        }?>">
                        <span class=" text-danger"><?php echo$errTitle ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleTextarea" class="form-label">Description</label>

                        <textarea name="description" rows="9" cols="20" class="form-control" id="exampleTextarea"><?php if($description !==''){
                            echo $description;
                        }?></textarea>
                        <span class=" text-danger"><?php echo$errDEscription ?></span>
                    </div>
                    <button type="submit" name="create" class="btn btn-primary float-end">Create</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>