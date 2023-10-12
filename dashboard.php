<?php
// data delect from category table
$selectCategory = "SELECT * FROM category";
$selectSql = mysqli_query($con, $selectCategory);

// data delect from post table

// $seletPost = "SELECT * FROM post ";
$seletPost = "SELECT  * FROM post INNER JOIN category ON post.category_id=category.id";

$postQuery = mysqli_query($con, $seletPost);


// delete category code 
include 'delete.php';

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="">

    <div class="row">
      <div class="col-12 mx-auto bg-white main">
        <div class="">
        </div>

        <!-- ------- Tab buttons ------  -->
        <div class="tab bg-info tab_btn">
          <button class="tablinks" onclick="openCity(event, 'Dashboard')" id="defaultOpen">Dashboard</button>
          <button class="tablinks" onclick="openCity(event, 'Add_Category')">Add Category</button>
          <a href="post.php" target='blank' style="text-decoration: none;">
            <button>Creat New Post</button>
          </a>
          <button class="tablinks" onclick="openCity(event, 'view_post')">All Post</button>
          <button class="tablinks" onclick="openCity(event, 'view_categorys')">View Categorys</button>
        </div>

        <!-- -------- Dashboard Home section -----------  -->
        <div id="Dashboard" class="tabcontent abir m-0">

          <div class="row">
            <div class="col-6 mx-auto">
              <?php echo $deleteAlert ?>
              <?php echo $addAlert ?>
              <?php echo $updateAlert ?>
              <?php echo $postDelete ?>
            </div>
          </div>
          <h3>Dashboard </h3>
          <div class="row">
            <div class="col-2 col-sm-0"></div>
            <div class="col-md-4 col-sm-12">
              <div class="post bg-warning count">
                <h3>Total Post</h3>
                <span>
                  <?php
                  $selectPost = "SELECT * FROM post ";
                  $countQuery = mysqli_query($con, $selectPost);
                  $postCount = mysqli_fetch_assoc($countQuery);

                  $countResult = count($postCount);
                  echo $countResult;

                  ?>
                </span>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="post bg-success count">
                <h3>Total Categorys</h3>
                <span>9</span>
              </div>
            </div>
            <div class="col-2 col-sm-0"></div>
          </div>
        </div>

        <!-- -------------- Category add section -------------  -->
        <div id="Add_Category" class="tabcontent abir">
          <div class="col-6">
            <h3>Add Category</h3>
            <form action="" method="POST">
              Category Name :
              <input type="text" name="category" required class="form-control"> <br>
              <input type="submit" value="Save" name="cat_submit" class="btn btn-primary">
            </form>
          </div>
        </div>

        <!-- --------- All Post Section ------------   -->
        <div id="view_post" class="tabcontent abir">
          <h3>All Post </h3>
          <table class='table table-bordered table-hover table-striped'>
            <tr class='table_header'>
              <th>S/L</th>
              <th>Post Tittle</th>
              <th>Category Name</th>
              <th>Post img</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
            <?php
            $postSL = 1;
            // $demo = mysqli_fetch_assoc($postQuery);
            while ($postArray  = mysqli_fetch_assoc($postQuery)) {

              $postId = $postArray['id'];
              $psl = $postSL++;
              $postTitle = $postArray['title'];
              $catId = $postArray['name'];
              $img = $postArray['img'];
              // $creat_at = date('d-m-Y H:s A', $postArray['created_at']);
              // $update_at = date('d-m-Y H:s A', $postArray['updated_at']);

              $creat_at = $postArray['created_at'];
              $update_at = $postArray['updated_at']

            ?>
              <tr>
                <td><?php echo $psl++ ?></td>
                <td><?php echo $postTitle ?> </td>
                <td><?php echo $catId ?></td>
                <td> <img src='img/<?= $img ?>' class='img'></td>
                <td><?php echo $creat_at ?></td>
                <td><?php echo $update_at ?></td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="edit.php?postEdit=<?php echo $postId ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                    <!-- <a href="#" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash-fill"></i>
                  </a> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $postId; ?>" role="group">
                      <i class="bi bi-trash-fill"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop<?= $postId ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-left">
                            Are You Sure Want To Delete ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="index.php?deletePost=<?php echo $postId; ?>">
                              <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>

          </table>
        </div>

        <!-- --------- all categorys show section ----------- -->
        <div id="view_categorys" class="tabcontent abir">
          <h3>All Categorys </h3>
          <div class="row">
            <div class="col-8">
              <?php
              echo "<table class='table table-bordered table-hover table-striped'><tr class='table_header'>
          <th>S/L</th>
          <th>Category Name</th>
          <th>Created Date</th>
          <th>Action</th>";
              $sl = 1;
              while ($CaArray = mysqli_fetch_assoc($selectSql)) {
                $cName = $CaArray['name'];
                $createdDate = $CaArray['Created_Date'];
                $totalCategory = count($CaArray);
              ?>
                <tr>
                  <td><?php echo $sl++ ?></td>
                  <td><?php echo $cName ?></td>
                  <td><?php echo $createdDate ?></td>
                  <td>

                    <!-- ************** Edit Button Modal Start ************ -->

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $CaArray['id'] ?>">
                      Edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $CaArray['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category Name</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div id="" class="">
                              <div class="col-10 mx-auto">
                                <form action="" method="POST">
                                  Category Name : <br>
                                  <input type="text" name="Up_category" required class="form-control" value="<?php echo $CaArray['name'] ?> "> <br>
                                  <input type="text" name="id" value="<?php echo $CaArray['id'] ?>" hidden>

                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="edit" class="btn btn-primary" value="Save Changes">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- ************** Delete Button Modal Start ************ -->

                    <!-- Button trigger modal -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $CaArray['id'] ?>">
                      Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop<?php echo $CaArray['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-left">
                            Are You Sure Want To Delete ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="index.php?deleteId=<?php echo $CaArray['id']; ?>">
                              <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- ------ js file --------   -->

  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>