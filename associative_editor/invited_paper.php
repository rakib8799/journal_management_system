<?php include('associative_editor_header.php') ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-11 col-12">
      <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
        <div class="card-header">
          <h3 class="text-center text-secondary fw-bold">Invited Paper</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
              <thead>
                <tr>
                  <th>Serial No</th>
                  <th width="50%">Paper Title</th>
                  <th>Select</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // select paper information
                $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id`='$_SESSION[associative_editor_id]' and `paper_status` = 2";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $serial_no = 1;
                while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                ?>
                <tr>
                  <td>
                    <?php echo $serial_no; ?>
                  </td>
                  <td>
                    <?php echo $row['paper_title'] ?>
                  </td>
                  <td class="bg-black text-light fw-bold">
                    <?php echo "Invited" ?>
                  </td>
                  <td>
                    <button class="btn btn-success text-light fw-bold"><a
                        href="assign_reviewer.php?id=<?php echo $row['id'] ?>" class="nav-link">Accept</a></button>
                    <button class="btn btn-danger text-light fw-bold"><a
                        href="new_submitted_papers.php?id=<?php echo $row['id'] ?>" class="nav-link">Reject</a></button>
                  </td>
                </tr>
                <?php
                  $serial_no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('associative_editor_footer.php') ?>