<?php include('reviewer_header.php') ?>
<?php
if (isset($_GET['id'], $_GET['comment'])) {
  $id = $_GET["id"];
  $comment = $_GET['comment'];
  $_SESSION['comment'] = $comment;
  $update_qry = "UPDATE `new_paper` SET `paper_status`=8 WHERE `id`='$id'";
  $run_qry = mysqli_query($conn, $update_qry);
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
                    <th>Select</th>
                    <th>Action</th>
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
      $_SESSION['paper_status'] = $row['paper_status'] ;
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
                      <?php if(isset($_SESSION['comment'])) echo $_SESSION['comment']?>
                    </td>
                    <td>
                        <select class="form-control" name="select_author" id="select_author" onchange="selectAuthor(this.value)">
                          <option value="">Select Author</option>
                          <?php
                        $select_qry = "SELECT `author_name` FROM `author_information`";
                        $run_qry = mysqli_query($conn, $select_qry);
                        if (mysqli_num_rows($run_qry) > 0) {
                          while ($row1 = mysqli_fetch_assoc($run_qry)) {
                          ?>
                          <option value="<?php echo $row1['author_name']; ?>">
                            <?php echo $row1['author_name']; ?>
                          </option>
                          <?php
                          }
                        }
                          ?>
                        </select>
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
  <script>
    function selectAuthor(str){
      const currentDate = new Date();
      document.cookie = `author=${str}; expires=${new Date(currentDate.getTime() + (5 * 60 * 1000))}`;
  }
    </script>
</body>
<?php include('reviewer_footer.php') ?>