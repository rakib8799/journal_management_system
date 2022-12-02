<?php include('associative_editor_header.php') ?>
<?php
if (isset($_GET["id"])) {
    $_SESSION['reviewer'] = $_COOKIE['reviewer'];
    $reviewer = $_SESSION['reviewer'];
    $select_qry = "SELECT `reviewer_email` FROM `reviewer_information` WHERE `reviewer_name` = '$reviewer'";
    $run_qry = mysqli_query($conn, $select_qry);
    if (mysqli_num_rows($run_qry) > 0) {
        $row = mysqli_fetch_assoc($run_qry);
        $_SESSION['reviewer_email'] = $row['reviewer_email'];
    }

    $id = $_GET["id"];
    $update_qry = "UPDATE `new_paper` SET `paper_status`=4 WHERE `id`='$id'";
    $run_qry = mysqli_query($conn, $update_qry);

    // mail sending
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $sender_email = $_SESSION['associative_editor_email'];
    $sender_pass = 'uianqswruogvxnpv';

    $receiver = $_SESSION['reviewer_email'];
    $mail->isSMTP(); // for localhost use enable this line otherwise don't use it
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = $sender_email; // Sender Email Id
    $mail->Password = $sender_pass; // password of gmail

    $mail->setFrom($sender_email, $_SESSION['reviewer']);

    $mail->addAddress($receiver); // Receiver Email Address
    $mail->addReplyTo($sender_email);

    $mail->isHTML(true);
    $mail->Subject = "Paper Assign";
    $mail->Body = '<h5>Dear Sir/Madam, <br />You have successfully assigned by the associative editor. Please check your paper status. <br /> <br /> Best Regards, ASSOCIATIVE EDITOR Journal Organization</h5>';
    if ($mail->send()) {
        $mail->ClearAddresses();
        $mail->clearReplyTos();
        // mail_sent = 1 kore dilam er mane mail sent hoyse.
        $mail_sent = 1;
    } else {
        echo "<h5>Mail is not sent yet</h5>";
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
                                $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = 4";
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
                                        <?php echo "Assigned" ?>
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