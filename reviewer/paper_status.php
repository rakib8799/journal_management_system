<?php ob_start() ?>
<?php include('reviewer_header.php') ?>
<?php
if (isset($_POST['submit'])) {
    extract($_POST);
    function redirect($url)
    {
        header('Location: ' . $url);
        ob_end_flush();
    }
    if ($select_review == "Accept") {
        redirect("completed_paper.php?id=" . $id);
    } else if ($select_review == "Reject") {
        redirect("rejected_paper.php?id=" . $id);
    } else {
        redirect("need_changes.php?id=" . $id . "&comment=" . $comment_review);
    }
}
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="text-center text-secondary fw-bold">Paper Status</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th width="50%">Paper Title</th>
                                    <th>Submission Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('reviewer_footer.php') ?>