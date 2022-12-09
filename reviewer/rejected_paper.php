<?php include('reviewer_header.php') ?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET["id"];
  $update_qry = "UPDATE `new_paper` SET `paper_status`=7 WHERE `id`='$id'";
  $run_qry = mysqli_query($conn, $update_qry);
}
?>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-11 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
          <div class="card-header">
            <h3 class="text-center text-secondary fw-bold">Rejected Papers</h3>
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
                    <th>Author Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // select paper information
                  $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status`=7";
                  $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                  $serial_no = 1;
                  if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
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
                    <td class="bg-black text-light fw-bold">
                      <?php echo "Rejected" ?>
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
                  }
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