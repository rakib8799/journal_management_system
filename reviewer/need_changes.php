<?php include('reviewer_header.php') ?>
<?php
if (isset($_GET['id'], $_GET['comment'])) {
  $id = $_GET["id"];
  $comment = $_GET['comment'];
  $update_qry = "UPDATE `new_paper` SET `paper_status`=8 WHERE `id`='$id'";
  mysqli_query($conn, $update_qry);

    $insert_qry = "INSERT INTO `comment`(`paper_id`, `comment`) VALUES ('$id','$comment')";
    mysqli_query($conn, $insert_qry);
}
else if((isset($_GET['id'], $_GET['comment1']))){
  $id = $_GET["id"];
  $comment1 = $_GET['comment1'];
  $update_qry = "UPDATE `new_paper` SET `paper_status`=8 WHERE `id`='$id'";
  mysqli_query($conn, $update_qry);
  
    $update_qry1 = "UPDATE `comment` SET `comment`='$comment1' WHERE `paper_id`='$id'";
    mysqli_query($conn, $update_qry1);
}
?>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-11 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
          <div class="card-header">
            <h3 class="text-center text-secondary fw-bold">Need Changes</h3>
          </div>
          <div class="card-body">
            <!-- <form action="paper_status.php" method="POST"> -->
            <div class="table-responsive">
              <table class="table table-bordered table-hover text-center">
                <thead>
                  <tr>
                    <th>Serial No</th>
                    <th width="40%">Paper Title</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Author Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
  // select paper information
  $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status`=8 and `id`='$id'";
  $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
  $serial_no = 1;
  if (mysqli_num_rows($run_select_from_new_paper) > 0) {
    $row = mysqli_fetch_assoc($run_select_from_new_paper);
      $_SESSION['paper_status'] = $row['paper_status'] ;
      $author_id = $row['author_id'];
                  ?>
                  <tr>
                    <td>
                      <?php echo $serial_no; ?>
                    </td>
                    <td>
                      <?php echo $row['paper_title'] ?>
                    </td>
                    <td class="bg-dark text-light fw-bold">
                      <?php echo "Need Changes" ?>
                    </td>
                    <td class="text-danger fw-bold">
                    <?php
                        $select_comment = "SELECT * FROM `comment` WHERE `paper_id`='$id'";
                        $run_select_comment = mysqli_query($conn, $select_comment);
                        if (mysqli_num_rows($run_select_comment) > 0) {
                          $row2 = mysqli_fetch_assoc($run_select_comment);
                          echo $row2['comment'];
                          $_SESSION['comment'] = $row2['comment'];
                        }
                        ?>
                    </td>
                    <td>
                    <?php
                    $select_author = "SELECT * FROM `author_information` WHERE `id`='$author_id'";
                    $run_select_author = mysqli_query($conn, $select_author);
                    if (mysqli_num_rows($run_select_author) > 0) {
                      $row1 = mysqli_fetch_assoc($run_select_author);
                      echo $row1['author_name'];
                      $_SESSION['author'] = $row1['author_name'];
                    }
                    ?>
                      </td>
                    <td>
                    <a
                        href="paper_status.php?id=<?php echo $row['id'] ?>" class="btn btn-success fw-bold">Send</a>
    </td>
                  </tr>
                  <?php
      $serial_no++;
    }
  // }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include('reviewer_footer.php') ?>