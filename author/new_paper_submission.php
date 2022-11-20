<?php include('author_header.php')?>
<form action="" method = "POST" enctype="multipart/form-data">
    <div class="container-fluid col-lg-10 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h3 class = "text-center text-secondary fw-bold">New Paper Submission (<i>Step 1</i>)</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class = "mt-2">
                            <label for=""><b>Manuscript Title: <span class = "text-danger">*</span></b></label>
                            <div class="input-group mt-2">
                                <input type="text" class = "form-control" name = "paper_title" placeholder="Please Type Paper Title" required >
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class = "mt-2">
                            <label for=""><b>Keywords: <span class = "text-danger">*</span> <i class = "text-danger">(Please Separate by ",")</i></b></label>
                            <div class="input-group mt-2">
                                <input type="text" class = "form-control" name = "paper_keywords" placeholder="Please Type Keywords" required>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class = "mt-2">
                            <label for=""><b>Abstract: <span class = "text-danger">*</span></b></label>
                            <div class="input-group mt-2">
                                <textarea name="paper_abstract" rows="4" placeholder="Please Type Paper Abstract" required></textarea>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="col-lg-6">
                        <div class = "mt-2">
                            <label for=""><b>Paper Type: <span class = "text-danger">*</span></b></label>
                            <div class="input-group mt-2">
                               <select name="paper_type" class = "form-control" required>
                                    <option value="">Please Select Paper Type</option>
                                    <option value="original research(full paper)">Original Research (Full Paper)</option>
                                    <option value="original research(short paper)">Original Research (Short Paper)</option>
                                    <option value="requested paper">Requested Paper</option>
                                    <option value="commentary papers">Commentary Papers</option>
                               </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="mt-2">
                            <label for=""><b>Number of Authors:</b></label>
                            <div class="input-group mt-2">
                                <select class = "form-control" name = "paper_authors" onchange="selectNumberOfaAuthors()" id = "select_number_of_authors" required>
                                    <option value="0">Please Select Any Number</option>
                                    <?php 
                                        for($i=1;$i<=100;$i++)
                                        {
                                            ?>
                                            <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                                            <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center" id = "create_div">
                    
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="mt-3">
                            <input type="submit" name = "next_page" class = "form-control btn btn-success fw-bold" value = "Next Page">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function selectNumberOfaAuthors()
    {
        var create_author_label_name_affiliation_designation_email_div;
        let number = document.getElementById("select_number_of_authors").value;
        
        let e = document.getElementById("create_div");
        var child = e.lastElementChild; 
        while (child) {
            e.removeChild(child);
            child = e.lastElementChild;
        }
        
        for(let j=0;j<number;j++)
        {
            let create_div = document.getElementById("create_div");
            
            let create_div_element = document.createElement("DIV");
            create_div_element.className = "col-lg-4";
            
            
            create_div.appendChild(create_div_element);
        
            let input_field_name = document.createElement("INPUT");
            let input_field_affiliation = document.createElement("INPUT");
            let input_field_designation = document.createElement("INPUT");
            let input_field_email = document.createElement("INPUT");
            let input_field_label = document.createElement("LABEL");
            
            input_field_name.type = "text";
            input_field_name.className = "form-control mt-2";
            input_field_name.name = `input_field_name${j}`;
            input_field_name.required = true;
            input_field_name.placeholder = `Enter Author Name ${j+1}`;
            
            input_field_affiliation.type = "text";
            input_field_affiliation.className = "form-control mt-2";
            input_field_affiliation.name = `input_field_affiliation${j}`;
            input_field_affiliation.required = true;
            input_field_affiliation.placeholder = `Enter Author Affiliation ${j+1}`;
            
            input_field_designation.type = "text";
            input_field_designation.className = "form-control mt-2";
            input_field_designation.name = `input_field_designation${j}`;
            input_field_designation.required = true;
            input_field_designation.placeholder = `Enter Author Designation ${j+1}`;
            
            input_field_email.type = "email";
            input_field_email.className = "form-control mt-2";
            input_field_email.name = `input_field_email${j}`;
            input_field_email.required = true;
            input_field_email.placeholder = `Enter Author Email ${j+1}`;
            
            input_field_label.className = "fw-bold mt-2";
            input_field_label.innerHTML = `Author ${j+1} Information :`;
            
            create_div_element.appendChild(input_field_label);
            create_div_element.appendChild(input_field_name);
            create_div_element.appendChild(input_field_affiliation);
            create_div_element.appendChild(input_field_designation);
            create_div_element.appendChild(input_field_email);  
        }
    }
</script>

<?php 
    if(isset($_POST['next_page']))
    {
        $_SESSION['next_page'] = 1;
        $_SESSION['paper_title'] = $_POST['paper_title'];
        $_SESSION['paper_keyword'] = $_POST['paper_keywords'];
        $_SESSION['paper_abstract'] = $_POST['paper_abstract'];
        $_SESSION['paper_type'] = $_POST['paper_type'];
        $_SESSION['number_of_authors'] = $_POST['paper_authors'];
        $_SESSION['input_field_name'] = "";
        $_SESSION['input_field_affiliation'] = "";
        $_SESSION['input_field_designation'] = "";
        $_SESSION['input_field_email'] = "";
        
        // jdi kono author select na kora hoy tahole empty jabe.
        // multiple author thakle tader information koma(,) diye seperate kore rakhbo.
        
        for($i=0;$i<$_SESSION['number_of_authors'];$i++)
        {
            if($i==$_SESSION['number_of_authors']-1)
            {
                $_SESSION['input_field_name'].= $_POST['input_field_name'.$i];
                $_SESSION['input_field_affiliation'].= $_POST['input_field_affiliation'.$i];
                $_SESSION['input_field_designation'].= $_POST['input_field_designation'.$i];
                $_SESSION['input_field_email'].= $_POST['input_field_email'.$i];
            }
            else
            {
                $_SESSION['input_field_name'].= $_POST['input_field_name'.$i].",";
                $_SESSION['input_field_affiliation'].= $_POST['input_field_affiliation'.$i].",";
                $_SESSION['input_field_designation'].= $_POST['input_field_designation'.$i].",";
                $_SESSION['input_field_email'].= $_POST['input_field_email'.$i].",";
            }
        }
        
        ?>
            <script>
                window.location = "new_paper_submission_step2.php";
            </script>
        <?php 
    }
?>
<?php include('author_footer.php')?>