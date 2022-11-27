<?php include('reviewer_header.php') ?>
<?php
if (isset($_GET['id'], $_GET['comment'])) {
  $id = $_GET["id"];
  $comment = $_GET['comment'];
  $update_qry = "UPDATE `new_paper` SET `paper_status`=8 WHERE `id`='$id'";
  $run_qry = mysqli_query($conn, $update_qry);
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
                    <th width="50%">Paper Title</th>
                    <th>Status</th>
                    <th>Comment</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
  // select paper information
  $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status`=8";
  $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
  $serial_no = 1;
  if (mysqli_num_rows($run_select_from_new_paper) > 0) {
    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $serial_no; ?>
                    </td>
                    <td>
                      <?php echo $row['paper_title'] ?>
                    </td>
                    <td class="text-danger fw-bold">
                      <?php echo "Need Changes" ?>
                    </td>
                    <td>
                      <?php echo $GLOBALS['comment'] ?>
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
<?php
}
?>
<?php include('reviewer_footer.php') ?>