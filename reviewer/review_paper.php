<?php include('reviewer_header.php') ?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET["id"];
}
?>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-11 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
          <div class="card-header">
            <h3 class="text-center text-secondary fw-bold">Review Paper</h3>
          </div>
          <div class="card-body">
            <form action="paper_status.php" method="POST">
              <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th>Serial No</th>
                      <th width="50%">Paper Title</th>
                      <th>Status</th>
                      <th>Select</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // select paper information
                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status`=5 && `id`='$id'";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    $serial_no = 1;
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                      $row = mysqli_fetch_assoc($run_select_from_new_paper);
                    ?>
                    <tr>
                      <td>
                        <?php echo $serial_no; ?>
                      </td>
                      <td>
                        <?php echo $row['paper_title'] ?>
                      </td>
                      <td class="bg-black text-light fw-bold">
                        <?php echo "Processing Review" ?>
                      </td>
                      <td>
                        <select name="select_review" id="select_review" onchange="selectReview(this)">
                          <option value="">Select Review</option>
                          <option value="Accept" <?php if (
                          isset($_POST['select_review']) &&
                          $_POST['select_review'] == "Accept"
                        )
                          echo "selected" ?>>Accept</option>
                          <option value="Reject" <?php if (
                          isset($_POST['select_review']) &&
                          $_POST['select_review'] == "Reject"
                        )
                          echo "selected" ?>>Reject</option>
                          <option value="Need Changes" <?php if (
                          isset($_POST['select_review']) &&
                          $_POST['select_review'] == "Need Changes"
                        )
                          echo "selected" ?>>Need Changes</option>
                        </select>
                        <br><br>
                        <?php
                        $select_comment = "SELECT * FROM `comment` WHERE `paper_id`='$id'";
                        $run_select_comment = mysqli_query($conn, $select_comment);
                        if (mysqli_num_rows($run_select_comment) > 0) {
                          $row1 = mysqli_fetch_assoc($run_select_comment);
                          // echo $row1['comment'];
                          // $_SESSION['comment_select'] = $row1['comment'];
                        }
                        ?>
                        <textarea name="comment_review" id="comment_review" cols="30" rows="10" 
                          style="display:none"><?php if(isset($row1['comment'])) echo $row1['comment']?></textarea>
                      </td>
                      <td>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <?php
                        if(isset($row1['comment'])){
                          ?>
                            <input type="submit" value="Update" name="update" class="btn btn-success text-white fw-bold">
                          <?php
                        }
                        else{
                          ?>
                            <input type="submit" value="Submit" name="submit" class="btn btn-success text-white fw-bold">
                          <?php
                        }
                        ?>
                      </td>
                    </tr>
                    <?php
                        $serial_no++;
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
  </div>
  <script>
    function selectReview(select) {
      const comment_review = document.getElementById("comment_review");
      if (select.value === "Need Changes")
        comment_review.style.display = "block";
      else
        comment_review.style.display = "none";
    }
  </script>
</body>
<?php include('reviewer_footer.php') ?>