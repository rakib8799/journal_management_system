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
        $_SESSION['comment_review'] = $comment_review;
        redirect("need_changes.php?id=" . $id . "&comment=" . $comment_review);
    }
}
else if (isset($_POST['update'])) {
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
        $_SESSION['comment_review'] = $comment_review;
        redirect("need_changes.php?id=" . $id . "&comment1=" . $comment_review);
    }
}
else if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(isset($_SESSION['paper_status'])){
        if($_SESSION['paper_status']==6)
            $body = "accepted";
        else if($_SESSION['paper_status']==7)
            $body = "rejected";
        else  if($_SESSION['paper_status']==8){
            $comment = $_SESSION['comment'];
            $body = "needed to change/update - ".$comment;
        }
    }

    // $_SESSION['author'] = $_COOKIE['author'];
    $author = $_SESSION['author'];
    $select_qry = "SELECT * FROM `author_information` WHERE `author_name` = '$author'";
    $run_qry = mysqli_query($conn, $select_qry);
    if (mysqli_num_rows($run_qry) > 0) {
        $row = mysqli_fetch_assoc($run_qry);
        $_SESSION['author_email'] = $row['author_email'];
        // mail sending
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $sender_email = 'nazruljournal@gmail.com';
    $sender_pass = 'xtvxnhzkczbybjff';

    $receiver = $_SESSION['author_email'];
    $mail->isSMTP(); // for localhost use enable this line otherwise don't use it
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = $sender_email; // Sender Email Id
    $mail->Password = $sender_pass; // password of gmail

    $mail->setFrom($sender_email, 'JKKNIU');

    $mail->addAddress($receiver); // Receiver Email Address
    $mail->addReplyTo($sender_email);

    // $select_qry = "SELECT * FROM  `new_paper`  WHERE `paper_status`=6 and `id`='$id'";

    $mail->isHTML(true);
    $mail->Subject = "Paper Review";
    $mail->Body = '<h5>Dear Sir/Madam, <br />Paper is successfully reviewed by the reviewer. Your paper is ' .$body.'. Please check your paper status. <br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
    if ($mail->send()) {
        $mail->ClearAddresses();
        $mail->clearReplyTos();
        // mail_sent = 1 kore dilam er mane mail sent hoyse.
        $mail_sent = 1;

        $update_qry = "UPDATE `new_paper` SET `paper_status`=9 WHERE `id`='$id'";
        mysqli_query($conn, $update_qry);
        ?>
        <script>
            window.alert("Your Paper Has Successfully sent to the specific Author's email");
        </script>
        <?php
    } else {
        echo "<h5>Mail is not sent yet</h5>";
    }
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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // select paper information
                                $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status`=9";
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
                                    <td class="bg-black text-light fw-bold">
                                        <?php echo "Reviewed" ?>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('reviewer_footer.php') ?>