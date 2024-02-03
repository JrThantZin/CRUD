<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" />
</head>

<body>

    <?php
require "connect.php";

$titleError="";
$descError ="";

    if(isset($_POST['create_posts_button'])){

       $title= $_POST['title'];
       $desc= $_POST['description'];


       if(empty($title)){
        $titleError ="This title is empty ";
       }

       if(empty($desc)){
        $descError ="This  desc is empty pls enter here ";
       }

    if (!empty($title)  &&  !empty($desc)) {
        mysqli_query($db,"INSERT into posts (title,description)VALUES('$title','$desc')");
        $_SESSION['successMsg']='A Post created successfully now ';
        
        header('location:index.php');
    }

    }
?>


    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row bg-success">
                            <div class="col-md-6">
                                <div class="card-title">Post List Form </div>
                            </div>
                            <div class="col-md-6 ml-auto">

                                <a href="index.php" class="btn btn-secondary float-right"> >>Back </a>
                            </div>
                        </div>
                    </div>

                    <form action="post-create.php" method="post">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    
                                    $query ="SELECT * FROM posts";
                                    $posts =mysqli_query($db,$query);
                                    

                                    foreach ($posts as $post){ 
                                        ?>
                                    <tr>
                                        <td><?php
                                            echo $post ['id'];
                                        ?></td>
                                        <td><?php
                                            echo $post ['title'] ?></td>
                                        <td><?php
                                            echo $post ['description'];
                                        ?></td>

                                        <td>
                                            <a href="post-edit.php?postID=<?php
                                                echo $post['id'];
                                            ?>">Edit</a>
                                            <a href="#">Delete </a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>



                                </tbody>
                            </table>


                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control <?php if($titleError != ''): ?> is-invalid <?php
                                endif?> " name="title" placeholder="Enter Title">
                            <span class="text-danger"><?php
                               if($titleError != ""){
                                echo $titleError;
                               }
                            ?> </span>

                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control <?php if($descError != ''): ?> is-invalid <?php
                                endif?> " name="description" placeholder="Enter Desc">
                            <span class="text-danger"><?php
                               if($descError != ""){
                                echo $descError;
                               }
                            ?> </span>

                        </div>

                        <div class="form-group bg-secondary">
                            <button type="submit" href="index.php" name="create_posts_button"
                                class="btn btn-primary m-3 ">Create
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>