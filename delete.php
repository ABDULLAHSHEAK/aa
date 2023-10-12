<?php

$deleteAlert = "";
if (isset($_GET['deleteId'])) {
  $delete_id =  $_GET['deleteId'];

  $delete = "DELETE FROM category WHERE id = $delete_id";
  $dSql = mysqli_query($con, $delete);
  if ($dSql == true) {
    $deleteAlert = "<div class='alert alert-primary bg-danger text-white' role='alert'>
    Category Delete Successfully !
</div>";
    echo " <script>
    setTimeout(function(){window.location='http://localhost/foreign_key_category/'},3000);
    </script>";
  }
}

$postDelete = "";

if(isset($_GET['deletePost'])){
  $postId = $_GET['deletePost'];
  $deletPost = "DELETE FROM post WHERE id = $postId";
  $post_sql = mysqli_query($con, $deletPost); 

  if($post_sql == true){
    $postDelete =
    "<div class='alert alert-primary bg-danger text-white' role='alert'>
    Post Delete Successfully !
      </div>";
    echo "<script>
    setTimeout(function(){window.location='http://localhost/foreign_key_category/'},3000);
    </script>";
  }

}

?>