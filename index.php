<?php
/// databse connection
include 'db_connection.php';

// Category Add code 

$addAlert = "";
if(isset($_POST['cat_submit'])){
  $categoryName = $_POST['category'];

  $insert = " INSERT INTO category (name) VALUES ('$categoryName')";
  $queryCategory = mysqli_query($con, $insert);
  if ($queryCategory == true) {
    $addAlert = "<div class='alert alert-primary bg-warning text-white' role='alert'>
    Category Add Successfully !
</div>";
    echo " <script>
    setTimeout(function(){window.location='http://localhost/foreign_key_category/'},3000);
    </script>";
  }
};


// *********** Category Edit code **********************

$updateAlert = "";
if (isset($_POST['edit'])) {
  $editId = $_POST['id'];
  $editValu = $_POST['Up_category'];


  $updateCategory = "UPDATE category SET name = '$editValu'  WHERE id = '$editId' ";
  $updateQuery = mysqli_query($con, $updateCategory);

  if ($updateQuery == true) {
    $updateAlert = "<div class='alert alert-primary bg-warning text-white' role='alert'>
        Category Update Successfully !
         </div>";
    echo " <script>
        setTimeout(function(){window.location='http://localhost/foreign_key_category/'},3000);
        </script>";
  }
}

include 'dashboard.php';
?>