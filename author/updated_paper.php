<?php include('author_header.php') ?>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-11 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
          <div class="card-header">
            <h3 class="text-center text-secondary fw-bold">Updated Papers</h3>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // select paper information
                  $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `author_id` = '$_SESSION[author_id]'";
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
                    <?php
                                    if ($row['paper_status'] == 9) {
                                    ?>
                                    <td class="bg-black text-light fw-bold">
                                        <?php echo "Need To Be Updated" ?>
                                    </td>
                                    <?php
                                    }
                                    else if(($row['paper_status'] == 10)){
                                      ?>
                                      <td class="bg-black text-light fw-bold"><?php echo "Successfully Updated" ?></td>
                        <?php
                                    }
                                    else{
                                      ?>
                                      <td class="bg-black text-light fw-bold"><?php echo "No Update Needed" ?></td>
                        <?php
                                    }
                                    ?>
                                    <td>
                                      <a href="revised_paper_submission.php?id=<?php echo $row['id'] ?>"
                        class="btn btn-success text-light fw-bold">Update</a>
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
<?php include('author_footer.php') ?>