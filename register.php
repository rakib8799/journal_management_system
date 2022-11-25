<?php include('header.php') ?>
<div class="container">
    <div class="row mt-3 mb-4 justify-content-center">
        <div class="col-lg-10 col-12">
            <form action="" method="POST">
                <div class="card text-white bg-light shadow mb-2">
                    <div class="card-header card_header text-center">
                        <h4><i class="fa-solid fa-id-card "></i> Register As <i>Author/Reviewer/Editor</i></h4>
                    </div>

                    <div class="card-body">
                        <marquee behavior="" direction="" class="text-danger">
                            <h5>Registration of Online Management of Nazrul Studies Journal</h5>
                        </marquee>

                        <div class="row justify-content-center mt-3 text-dark ">
                            <div class="col-lg-4 col-md-4 col-12 ">
                                <label for="" class="mb-2"><b>Enter Your Name:</b></label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-user"></i></span>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Your Name"
                                        value="<?php if (isset($_POST['name'])) {
                                            echo $_POST['name'];
                                        } ?>" required>
                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class="mb-2"><b>Please Select Designation:</b></label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-image-portrait"></i></span>
                                    <select class="form-control" name="designation" id="" required>
                                        <option value="">Please Select Designation</option>
                                        <option <?php if ( isset($_POST['designation']) &&
                                            $_POST['designation']=="Professor" ) echo "selected"; ?>>Professor</option>
                                        <option <?php if ( isset($_POST['designation']) &&
                                            $_POST['designation']=="Associate Professor" ) echo "selected"; ?>>Associate
                                            Professor</option>
                                        <option <?php if ( isset($_POST['designation']) &&
                                            $_POST['designation']=="Assistant Professor" ) echo "selected"; ?>>Assistant
                                            Professor</option>
                                        <option <?php if ( isset($_POST['designation']) &&
                                            $_POST['designation']=="Lecturer" ) echo "selected"; ?>>Lecturer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class="text-dark mb-2"> <b>Enter University Name:</b> </label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-building-columns"></i></span>
                                    <input class="form-control" type="text" name="university_name"
                                        placeholder="Enter University Name" value="<?php if (isset($_POST['university_name'])) {
                                            echo $_POST['university_name'];
                                        } ?>" required>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center mt-3">

                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class="text-dark mb-2"> <b>Enter Email:</b> </label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-envelope"></i></span>
                                    <input class="form-control" type="email" name="email" placeholder="Enter Your Email"
                                        value="
                                    <?php if (isset($_POST['email'])) {
                                        echo $_POST['email'];
                                    } ?>" required>
                                </div>
                                <p id="email" class="fw-bolder bg-warning text-dark text-center mt-1"
                                    style="display:none"></p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class="text-dark mb-2"> <b>Enter Contact No:</b> </label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-phone"></i></span>
                                    <input class="form-control" type="text" name="contact_no"
                                        placeholder="Enter Your Contact No" value="<?php if (isset($_POST['contact_no'])) {
                                            echo $_POST['contact_no'];
                                        } ?>" required>
                                </div>
                                <p id="contact_no" class="fw-bolder bg-warning text-dark text-center mt-1"
                                    style="display:none"></p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class="text-dark mb-2"> <b>Country:</b> </label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-flag"></i></span>
                                    <?php
                                    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                    ?>
                                    <select name="country" id="" class="form-select" required>
                                        <option value="">Please Select Country</option>
                                        <?php
                                        foreach ($countries as $key => $value):
                                            echo '<option value="' . $value . '">' . $value . '</option>'; //close your tags!!
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3 text-dark ">
                            <div class="col-lg-4 col-md-4 col-12 ">
                                <label for="" class="mb-2"><b>Author/Reviewer/Editor:</b></label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-image-portrait"></i></span>
                                    <select class="form-control" name="select_author_reviewer_editor" id="" required>
                                        <option value="">Please Select To Login</option>
                                        <option <?php if ( isset($_POST['select_author_reviewer_editor']) &&
                                            $_POST['select_author_reviewer_editor']=="Author" ) echo "selected"; ?>
                                            >Author</option>
                                        <option <?php if ( isset($_POST['select_author_reviewer_editor']) &&
                                            $_POST['select_author_reviewer_editor']=="Reviewer" ) echo "selected"; ?>
                                            >Reviewer</option>
                                        <option <?php if ( isset($_POST['select_author_reviewer_editor']) &&
                                            $_POST['select_author_reviewer_editor']=="Main Editor" ) echo "selected"; ?>
                                            >Main Editor</option>
                                        <option <?php if ( isset($_POST['select_author_reviewer_editor']) &&
                                            $_POST['select_author_reviewer_editor']=="Associative Editor" ) echo
                                            "selected"; ?>>Associative Editor</option>
                                    </select>
                                </div>
                                <p id="main_editor" class="fw-bolder bg-warning text-dark text-center mt-1"
                                    style="display:none"></p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class="mb-2"><b>Password:</b></label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-lock"></i></span>
                                    <input class="form-control" type="password" name="password"
                                        placeholder="Enter Password" value="<?php if (isset($_POST['password'])) {
                                            echo $_POST['password'];
                                        } ?>" required>
                                </div>
                                <p id="password" class="fw-bolder bg-warning text-dark text-center mt-1"
                                    style="display:none"></p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class="mb-2"><b>Confirm Password:</b></label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-lock"></i></span>
                                    <input class="form-control" type="password" name="confirm_password"
                                        placeholder="Enter Password Again" value="<?php if (isset($_POST['confirm_password'])) {
                                            echo $_POST['confirm_password'];
                                        } ?>" required>
                                </div>
                                <p id="confirm_password" class="fw-bolder bg-warning text-dark text-center mt-1"
                                    style="display:none"></p>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="input-group mt-2">
                                    <input class="form-control btn btn-success fw-bold" type="submit" value="Register"
                                        name="submit">
                                </div>
                            </div>
                        </div>

                        <div class="mt-1 text-center">
                            <p class="text-dark">Already Registered? <a href="login.php"
                                    class="text-decoration-none fw-bolder">Login now.</a> </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php') ?>
<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $university_name = mysqli_real_escape_string($conn, $_POST['university_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $select_author_reviewer_editor = mysqli_real_escape_string($conn, $_POST['select_author_reviewer_editor']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // ki hisabe register korte chacche tar jonno if else dewa
    if ($select_author_reviewer_editor == "Author") {
        $person = "author";
    } else if ($select_author_reviewer_editor == "Reviewer") {
        $person = "reviewer";
    } else if ($select_author_reviewer_editor == "Main Editor") {
        $person = "main_editor";
    } else {
        $person = "associative_editor";
    }
    // table name
    $person_table_name = $person . "_information";

    // jei table e data entry korbe tar column er name
    $person_column_user_name = $person . "_name";
    $person_column_designation = $person . "_designation";
    $person_column_university_name = $person . "_university_name";
    $person_column_email = $person . "_email";
    $person_column_contact_no = $person . "_contact_no";
    $person_column_country = $person . "_country";
    $person_column_password = $person . "_password";

    // Query to check whether email exists or not
    if ($person_table_name == "main_editor_information") {
        $select_query = "SELECT * FROM `$person_table_name`";
        $result = mysqli_query($conn, $select_query);
        if (mysqli_num_rows($result) == 1) {
?>
<script>
    document.getElementById('main_editor').style = "display:block";
    document.getElementById('main_editor').innerHTML = "!!One Main Editor Already Exists";
</script>
<?php
        } else {
            // Start of validation
            if (strlen($password) < 8 || strlen($confirm_password) < 8) {
?>
<script>
    document.getElementById('password').style = "display:block";
    document.getElementById('password').innerHTML = "!!Password Must Be Greater Than 8 Characters";

    document.getElementById('confirm_password').style = "display:block";
    document.getElementById('confirm_password').innerHTML = "!!Password Must Be Greater Than 8 Characters";
</script>
<?php
                exit();
            } else if ($password != $confirm_password) {
?>
<script>
    document.getElementById('password').style = "display:block";
    document.getElementById('password').innerHTML = "!!Password And Confirm Password Does Not Match";

    document.getElementById('confirm_password').style = "display:block";
    document.getElementById('confirm_password').innerHTML = "!!Password And Confirm Password Does Not Match";
</script>
<?php
                exit();
            } else {
                // If all validation passes Hash the password;
                $password = md5($password);
            }

            // If all validation Passes now insert using Prepared Statement
            $insert_into_person_table = "INSERT INTO `$person_table_name` (`$person_column_user_name`,`$person_column_designation`,`$person_column_university_name`,`$person_column_email`,`$person_column_contact_no`,`$person_column_country`,`$person_column_password`) VALUES (?,?,?,?,?,?,?)";

            if ($stmt = mysqli_prepare($conn, $insert_into_person_table)) {
                mysqli_stmt_bind_param($stmt, "sssssss", $name, $designation, $university_name, $email, $contact_no, $country, $password);
                mysqli_stmt_execute($stmt);

?>
<script>
    window.alert("Registration Successfull Completed");
    window.location = "login.php";
</script>
<?php
            }
        }
    } else {
        $select_to_validate_email = "SELECT count(id) as `total_id` FROM `$person_table_name` WHERE `$person_column_email` = '$email'";
        $run_select_to_validate_email = mysqli_query($conn, $select_to_validate_email);
        $num_rows_email = mysqli_fetch_assoc($run_select_to_validate_email);

        // Query To check whether contact_no already exists or not.
        $select_to_validate_contact_no = "SELECT count(id) as `total_id` FROM `$person_table_name` WHERE `$person_column_contact_no` = '$contact_no'";
        $run_select_to_validate_contact_no = mysqli_query($conn, $select_to_validate_contact_no);
        $num_rows_contact_no = mysqli_fetch_assoc($run_select_to_validate_contact_no);

        // Start Of Validation
        if ($num_rows_email['total_id'] > 0) {
?>
<script>
    document.getElementById('email').style = "display:block";
    document.getElementById('email').innerHTML = "!!Email Already Exists";
</script>
<?php
            exit();
        } else if ($num_rows_contact_no['total_id'] > 0) {
?>
<script>
    document.getElementById('contact_no').style = "display:block";
    document.getElementById('contact_no').innerHTML = "!!Contact Already Exists";
</script>
<?php
            exit();
        } else if (strlen($password) < 8 || strlen($confirm_password) < 8) {
?>
<script>
    document.getElementById('password').style = "display:block";
    document.getElementById('password').innerHTML = "!!Password Must Be Greater Than 8 Characters";

    document.getElementById('confirm_password').style = "display:block";
    document.getElementById('confirm_password').innerHTML = "!!Password Must Be Greater Than 8 Characters";
</script>
<?php
            exit();
        } else if ($password != $confirm_password) {
?>
<script>
    document.getElementById('password').style = "display:block";
    document.getElementById('password').innerHTML = "!!Password And Confirm Password Does Not Match";

    document.getElementById('confirm_password').style = "display:block";
    document.getElementById('confirm_password').innerHTML = "!!Password And Confirm Password Does Not Match";
</script>
<?php
            exit();
        } else {
            // If all validation passes Hash the password;
            $password = md5($password);
        }
        // End Of Validation

        // If all validation Passes now insert using Prepared Statement
        $insert_into_person_table = "INSERT INTO `$person_table_name` (`$person_column_user_name`,`$person_column_designation`,`$person_column_university_name`,`$person_column_email`,`$person_column_contact_no`,`$person_column_country`,`$person_column_password`) VALUES (?,?,?,?,?,?,?)";

        if ($stmt = mysqli_prepare($conn, $insert_into_person_table)) {
            mysqli_stmt_bind_param($stmt, "sssssss", $name, $designation, $university_name, $email, $contact_no, $country, $password);
            mysqli_stmt_execute($stmt);

?>
<script>
    window.alert("Registration Successfull Completed");
    window.location = "login.php";
</script>
<?php
        }
    }
}
?>