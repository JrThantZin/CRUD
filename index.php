<?php
    session_start();
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row bg-success">
                            <div class="col-md-6">
                                <div class="card-title">Post List First Pages </div>

                            </div>
                            <div class="col-md-6 ml-auto">

                                <a href="post-create.php" class="btn btn-primary float-right">+ Add New </a>
                            </div>
                        </div>
                    </div>

                    <form action="">
                        <div class="card-body">

                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php
                             echo $_SESSION['successMsg'];
                        
                             
                            ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
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
                                        
                                        $posts = mysqli_query($db, "SELECT * FROM posts");
                                        foreach($posts as $post ){
                                    ?>
                                    <tr>
                                        <td><?php
                                        echo $post['id'];     
                                        ?> </td>
                                        <td><?php
                                            echo $post ['title'];
                                        ?></td>
                                        <td><?php
                                            echo $post['description'];
                                        ?></td>
                                        <td>
                                            <a href="post-edit.php?postID=<?php
                                                echo  $post['id'];
                                            ?>">Edit</a>
                                            <a href="delete.php?post_id_delete=<?php
                                                echo $post['id'];    
                                            ?>">Delete </a>
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                    ?>

                                </tbody>
                            </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>

</body>

</html>