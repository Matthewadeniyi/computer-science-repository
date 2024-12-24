<?php
    //contains some pre-defined functions
    include_once('function.php');
    
    $dbuser="root";
    $dbpass="";
    $host="localhost";
    $db="csc_repository";
    // connection to the database
    $db=new mysqli($host,$dbuser, $dbpass, $db);
    
    if(!$db){
        die(mysqli_error($db));
    }

    class profile{
        function __construct(){
            if(isset($_POST['addAdmin'])){
                $this->addAdmin();
            }elseif(isset($_POST['adminLogin'])){
                $this->adminLogin();
            }elseif(isset($_POST['adminLogOut'])){
                $this->adminLogOut();
            }elseif(isset($_POST['addDepartment'])){
                $this->addDepartment();
            }elseif(isset($_POST['addSupervisor'])){
                $this->addSupervisor();
            }elseif(isset($_POST['addProject'])){
                $this->addProject();
            }elseif(isset($_POST['updateadminprofile'])){
                $this->updateAdminProfile();
            }elseif(isset($_POST['updatePassword'])){
                $this->updateAdminPassword();
            }
                
            
        }

        function sanitize($str){
            global $db;
            return mysqli_real_escape_string($db, $str);
        }
                
        function isFieldEmpty($formData) {
            foreach ($formData as $key => $value) {
                if (empty($value) && $value !== '0') { // Check for empty values, allow '0' as non-empty
                    return true; // Return true if any field is empty
                }
            }
            return false; // Return false if all fields are filled
        }

        //function to add admins into the database
        function addAdmin(){
            global $db;
            
            $formfields = ($_POST);
            if($this->isFieldEmpty($formfields)){
                $_SESSION['status'] = "All Fields must be filled";
                $_SESSION['status_code'] = 'error';
                return;
            }
        
            $adminName = $this->sanitize($_POST['admin_name']);
            $adminNo = $this->sanitize($_POST['admin_no']);
            $adminPassword = $this->sanitize($_POST['admin_password']);
            $adminEmail = filter_var($_POST['admin_email'], FILTER_VALIDATE_EMAIL);
            $hashedPass = password_hash($adminPassword, PASSWORD_BCRYPT);

            // check for duplicates
            $sql = $db->query("SELECT * FROM admin WHERE admin_no='$adminNo' OR admin_email='$adminEmail' ");
            if(mysqli_num_rows($sql)>0){
                $_SESSION['status']='User already exists';
                $_SESSION['status_code']='error';
                return;
            }

            //insert into the database(admin)
            $sql = $db->query("INSERT INTO admin(admin_name,admin_email,admin_no,password) VALUES('$adminName','$adminEmail','$adminNo','$hashedPass')");
            if($sql){
                // session_start();
                $_SESSION['status']='Admin added successfully';
                $_SESSION['status_code'] = 'success';
                // $success = "Admin added Successfully";
            }else{
                $error = "Error adding Admin";
            }                     
            return;
        }

     
        //function adminLogin
        function adminLogin(){
            global $db;
            //extract values from post array
            extract($_POST);
            //check for empty form fields
            if(empty($_POST['admin_no'])||empty($_POST['password'])){
                $_SESSION['status'] = 'All Fields Must be Filled';
                $_SESSION['status_code'] = 'error';
                return;
            }
            // extract content into array
            $array = [
                'admin_no'=> sanitize($admin_no),
                'password'=> sanitize($password)
            ];
            $sql = SqL1('admin','admin_no',$array['admin_no']);
            if($sql!=1){
                $_SESSION['status'] = 'Invalid Login';
                $_SESSION['status_code'] = 'error';
                return;
            }

            $sql = $db->query("SELECT * FROM admin WHERE admin_no='{$array['admin_no']}'");

            $row = mysqli_fetch_assoc($sql);
            if(!password_verify($array['password'],$row['password'])){
                $_SESSION['status'] = 'Incorrect Password';
                $_SESSION['status_code'] = 'error';
                return;
            }
            if(session_status() == PHP_SESSION_NONE){
                session_start() ;
                $_SESSION['admin_name'] = $row['admin_name'];
                $_SESSION['admin_no'] = $row['admin_no'];
                $_SESSION['admin_email'] = $row['admin_email'];
                header('Location:dashboard.php');
                exit;
            }
            return;
            
        }

         function createSlug($name) {
            // Convert to lowercase
            $slug = strtolower($name);
            // Replace spaces with hyphens
            $slug = str_replace(' ', '-', $slug);
            // Remove non-alphanumeric characters
            $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
            return $slug;
        }
        
        function addDepartment(){
            global $db;
            if(empty($_POST['department_name']) || !isset($_POST['visibility'])){
                $_SESSION['status'] = 'All Fields Must be Filled';
                $_SESSION['status_code'] = 'error';
                return;
            }
            $departmentName = sanitize($_POST['department_name']);
            $visibility = (int)sanitize($_POST['visibility']);
            $slug = $this->createSlug($departmentName);
            // prevent double occurrence of a department using prepared statement
            $stmt = $db->prepare("SELECT * FROM departments WHERE department_name = ?");
            $stmt->bind_param('s', $departmentName);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if($result->num_rows > 0){
                $_SESSION['status'] = 'Department already exists';
                $_SESSION['status_code'] = 'error';
                return;
            } else {
                // Insert the department using prepared statement
                $stmt = $db->prepare("INSERT INTO departments (department_name, visible) VALUES (?, ?)");
                $stmt->bind_param('si', $slug, $visibility);
        
                if($stmt->execute()){
                    $_SESSION['status'] = 'Department Added Successfully';
                    $_SESSION['status_code'] = 'success';
                } else {
                    $_SESSION['status'] = 'Unable to add Department, try again';
                    $_SESSION['status_code'] = 'error';
                }
            }
            return;
        }
        
        function showStatus($x){
            $x = (int)$x;
            if($x===1){
                echo 'Visible';
            }elseif($x===0){
                echo 'Not-Visible';
            }else{
                echo '';
            }
        }

        function SqLx($table, $key, $val, $pin, $defaultValue = '') {
            global $db;
            $sql = $db->query("SELECT * FROM $table WHERE $key='$val'");
            if (!$sql) {
                die("Error in SQL query: " . $db->error);
            }
            $rows = mysqli_fetch_assoc($sql);
            
            // Check if the department is empty, and return the default value if it is
            if (empty($rows[$pin])) {
                return $defaultValue;
            }
            
            return $rows[$pin];
        }
        

        function addSupervisor(){
            global $db;
            
            if(empty($_POST['supervisor_name']) || !isset($_POST['department'])){
                $_SESSION['status'] = 'All Fields Must be Filled';
                $_SESSION['status_code'] = 'error';
                return;
            }
            $supervisorName = sanitize($_POST['supervisor_name']);
            $department = sanitize($_POST['department']);

            // Check if supervisor already exists

            $sql = $db->query("SELECT * FROM supervisors WHERE supervisor_name = '$supervisorName' AND supervisor_department = '$department'");

            if (mysqli_num_rows($sql) > 0) {
                // Supervisor already exists, output an error message
                $_SESSION['status'] = 'This supervisor already exists in the database.';
                $_SESSION['status_code'] = 'error'; //
                return;
            } else {
                // Supervisor does not exist, proceed to insert the new record
                $insert_sql = $db->query("INSERT INTO supervisors (supervisor_name, supervisor_department) VALUES ('$supervisorName', '$department')");
                
                if ($insert_sql) {
                    // Successful insertion
                    $_SESSION['status'] = 'Supervisor added successfully!';
                    $_SESSION['status_code'] = 'success';
                } else {
                    // Error while inserting the supervisor
                    $_SESSION['status'] = 'Failed to add supervisor, please try again.';
                    $_SESSION['status_code'] = 'error';
                }
            }
            return;
        }


        function addProject(){
            global $db;
            if(empty($_POST['project_title']) || 
               empty($_POST['student_name']) || 
               !isset($_POST['supervisor']) || 
               !isset($_POST['department']) || 
               empty($_FILES['project_file']['name']) ||  // Check file name in $_FILES
               empty($_POST['year'])) {
                
                $_SESSION['status'] = 'All Fields Must be Filled';
                $_SESSION['status_code'] = 'error';
                return;
            }
            
            //collect and sanitize inputs
            $projectTitle = sanitize($_POST['project_title']);
            $studentName = sanitize($_POST['student_name']);
            $supervisor = sanitize($_POST['supervisor']);
            $department = sanitize($_POST['department']);
            $keyword =sanitize($_POST['keyword']);
            $year = sanitize($_POST['year']);
            $projectBody = sanitize($_POST['project_body']);

            // Directory where uploaded files will be stored
            $targetDir = '../uploads/';

            // File upload details
            $fileTmpPath = $_FILES['project_file']['tmp_name'];
            $fileName = $_FILES['project_file']['name'];
            $fileSize = $_FILES['project_file']['size'];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Generate a unique file name to avoid file name conflicts
            $uniqueFileName = uniqid() . '-' . basename($fileName);
            $targetFile = $targetDir . $uniqueFileName;

            // Set file size limit (9MB in this case)
            $fileSizeLimit = 9 * 1024 * 1024;

            // Allowed file types
            $allowedFileTypes = ['pdf', 'doc', 'docx'];

            // Validate file size and type
            if ($fileSize > $fileSizeLimit) {
                $_SESSION['status'] = "Error: File size exceeds the allowed limit of 9MB.";
                $_SESSION['status_code'] = 'error';
                return;
            }

            if (!in_array($fileType, $allowedFileTypes)) {
                $_SESSION['status'] = "Error: Only PDF, DOC, and DOCX files are allowed.";
                $_SESSION['status_code'] = 'error';
                return;
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmpPath, $targetFile)) {
                // Insert project details into the database
                $sql = "INSERT INTO projects (project_title,student_name, year_of_submission, department,  supervisor, keywords, project_file,project_body) 
                        VALUES ('$projectTitle', '$studentName', '$year', '$department', '$supervisor', '$keyword','$targetFile','$projectBody')";

                if ($db->query($sql)) {
                    $_SESSION['status'] = 'Success! Project uploaded and added to the database.';
                    $_SESSION['status_code'] ='success';
                } else {
                    $_SESSION['status']  = "Error: " . $db->error;
                    $_SESSION['status_code'] = 'error';
                }
            } else {
                $_SESSION['status']  = "Sorry, there was an error uploading your file.";
                $_SESSION['status_code'] = 'error';
            }
            return;

        }

        function updateAdminProfile(){
            global $db;
            if(empty($_POST['full_name']) || empty($_POST['email'])){
                $_SESSION['status']  = "All fields must be filled!.";
                $_SESSION['status_code'] = 'error';
                return;
            }
            $fullName = sanitize($_POST['full_name']);
            $email = sanitize($_POST['email']);
            $adminNo = $_SESSION['admin_no'];

            if(empty($fullName)){
                $fullName = $_SESSION['admin_name'];
            }

            if(empty($email)){
                $email = $_SESSION['admin_email'];
            }

            $sql = $db->query("UPDATE admin SET admin_name='$fullName', admin_email='$email' WHERE admin_no='$adminNo' ");
            if($sql){
                $_SESSION['status']  = "Profile Updated successfully.";
                $_SESSION['status_code'] = 'success';
                return;
            }else{
                $_SESSION['status']  = "Sorry, there was an error updating your profile.";
                $_SESSION['status_code'] = 'error';
            }
            
        }
        
        function updateAdminPassword(){
            global $db;
            if(empty($_POST['c_newPassword']) && empty($_POST['new_password'])){
                $_SESSION['status']  = "All fields must be filled!.";
                $_SESSION['status_code'] = 'error';
                return;
            }
            $newPassword = sanitize($_POST['new_password']);
            $confirmNewP = sanitize($_POST['c_newPassword']);
            $adminNo = $_SESSION['admin_no'];


            if($newPassword != $confirmNewP){
                $_SESSION['status']  = "passwords do not correspond.";
                $_SESSION['status_code'] = 'error';
                return;
            }
            $hashedPass = password_hash($newPassword, PASSWORD_BCRYPT);
            $sql = $db->query("UPDATE admin SET password='$hashedPass', WHERE admin_no='$adminNo' ");
            if($sql){
                $_SESSION['status']  = "Password Updated successfully.";
                $_SESSION['status_code'] = 'success';
                return;
            }else{
                $_SESSION['status']  = "Sorry, there was an error updating your password.";
                $_SESSION['status_code'] = 'error';
            }
        }


        
    }
    









    $pro = new profile();
?>