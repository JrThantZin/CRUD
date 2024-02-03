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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" />
</head>

<body>

    <?php
 
    if(isset($_GET['postID'])){
        $post_id_update = $_GET['postID'];
       

       $data = mysqli_query($db,"SELECT * FROM posts WHERE id=$post_id_update")->fetch_assoc();
    
    }

    // if(isset($_POST['update_post_button']));
    // echo $title= $_POST['title'];
    // echo $desc= $_POST['description'];
  

?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row bg-success">
                            <div class="col-md-6">
                                <div class="card-title">Post Edit List Form Updated </div>
                            </div>
                            <div class="col-md-6 ml-auto">

                                <a href="index.php" class="btn btn-secondary float-right"> >>Back </a>
                            </div>
                        </div>
                    </div>

                    <form action="update.php" method="put">
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
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title"
                                value="<?php echo $data['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Enter Desc"
                                value="<?php echo $data ['description'] ?>">
                        </div>
                        <div class="form-group bg-secondary">
                            <button type="submit" href="index.php" name="create_posts_button"
                                class="btn btn-primary m-3 "> Updated
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