<?php
// database connection
include 'db_connection.php';
// add post 
$postAtlert = '';
if (isset($_POST['creat_post'])) {
  $title = $_POST['post_name'];
  $description = $_POST['description'];

  $imagName = $_FILES['img']['name'];
  $temp_name = $_FILES['img']['tmp_name'];
  $upload = 'img/' . $imagName;
  $category = $_POST['select'];

  $addPost = "INSERT INTO post (title,short_des,img,category_id) VALUES ('$title', '$description', '$imagName','$category')";
  $postQuery = mysqli_query($con, $addPost);

  if ($postQuery == true) {
    move_uploaded_file($temp_name, $upload);
    $postAtlert = "<div class='alert alert-primary bg-warning text-white' role='alert'>
        Post Publish Successfully !
         </div>";
    echo " <script>
        setTimeout(function(){window.location='http://localhost/foreign_key_category/post.php'},3000);
        </script>";
  } else {
    echo "not post" . mysqli_connect_error();
  }
}
?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create A New Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>


  <!-- ---------------- Creat Post Section -------------------  -->

  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8 post_page">
        <div class="row mx-auto pb-5">
          <?= $postAtlert ?>
          <div class="col-8">
            <h2>Create a new post</h2>
          </div>
          <div class="col-4">
            <a href="index.php" class="btn btn-primary">Return To Dashboard</a>
          </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <! --- post form ---- >
            Post Title
            <input type="text" name="post_name" class="form-control" required> <br>
            Short Description
            <textarea name="description" id="" cols="10" rows="5" class="form-control" required></textarea> <br>

            <div class="col-4">
              Select Category
              <select name="select" class="form-control">
                <option value="">Select Category</option>
                <?php
                $select = "SELECT * FROM category";
                $cQuery = mysqli_query($con, $select);
                while ($catArray = mysqli_fetch_assoc($cQuery)) {
                  $categoryId = $catArray['id'];
                  $category_name = $catArray['name'];
                  echo "<option value='$categoryId'>$category_name </option>";
                }
                ?>
                
              </select> <br>
            </div>
            Post Image
            <input type="file" name="img" class="form-control"> <br>
            <input type="submit" value="Publish" class="btn btn-primary" name="creat_post">
        </form>
      </div>
      <div class="col-2"></div>
    </div>
  </div>


  <!-- ------ js file --------   -->

  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
