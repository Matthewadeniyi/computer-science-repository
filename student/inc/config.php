<?php
    $dbuser="root";
    $dbpass="";
    $host="localhost";
    $db="csc_repository";
    // connection to the database
    $db=new mysqli($host,$dbuser, $dbpass, $db);
    
    if(!$db){
        die(mysqli_error($db));
    }

    class student{
        function __construct(){
            if(isset($_POST['student_signup'])){
                $this->studentSignup();
            }elseif(isset($_POST['student_login'])){
                $this->studentLogin();
            }elseif(isset($_POST['updatestudentprofile'])){
                $this->updateStudentProfile();
            }elseif(isset($_POST['updatePassword'])){
                $this->updateStudentPassword();
            }
        }


        function sanitize($str){
            global $db;
            return mysqli_real_escape_string($db, $str);
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
        
        function createSlug($name) {
            // Convert to lowercase
            $slug = strtolower($name);
            // Replace spaces with hyphens
            $slug = str_replace(' ', '-', $slug);
            // Remove non-alphanumeric characters
            $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
            return $slug;
        }

        function studentSignup(){
            global $db;
            if(empty($_POST['student_name']) || 
                empty($_POST['student_email']) || 
                !isset($_POST['matriculation_number']) || 
                !isset($_POST['password'])){             
                $_SESSION['status'] = 'All Fields Must are required';
                $_SESSION['status_code'] = 'error';
                return;    
            }
            $studentName = $this->sanitize($_POST['student_name']);
            $studentEmail = $this->sanitize($_POST['student_email']); 
            $matricNumber = $this->sanitize($_POST['matriculation_number']); 
            $password = $this->sanitize($_POST['password']);
            $slug = $this->createSlug($studentName);

             // Validate the matric number length and structure (Example: 190404056)
            if (preg_match("/^\d{9}$/", $matricNumber)) {
                $admission_year = substr($matricNumber, 0, 2);  // First two digits
                $faculty_code = substr($matricNumber, 2, 2);    // Next two digits
                $department_code = substr($matricNumber, 4, 2); // Next two digits

                // Get the last two digits of the current year
                $current_year = (int) date("y"); // Example: 2024 becomes '24'

                // Allow admission years up to 5 years older than the current year
                $min_valid_year = $current_year - 5;

                // Check if the faculty and department codes match your department
                if ($faculty_code === '04' && $department_code === '04') {
                    // Ensure admission year is within a valid range (last 5 years)
                    if ((int)$admission_year >= $min_valid_year && (int)$admission_year <= $current_year) {
                        // Now proceed to register the user (insert into the database)
                        
                        // Hash the password for security
                        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                        // Check if matric number or email already exists
                        $check_sql = $db->query("SELECT * FROM students WHERE matricno = '$matricNumber' OR email = '$studentEmail'");
                        // $result = mysqli_query($conn, $check_sql);

                        if (mysqli_num_rows($check_sql) > 0) {
                            $_SESSION['status'] = "Matric number or email already exists.";
                            $_SESSION['status_code'] = 'error';
                            return;
                        } else {
                            // Insert the user into the database
                            $sql = $db->query("INSERT INTO students (fullname, email, matricno, password) VALUES ('$slug', '$studentEmail', '$matricNumber', '$hashed_password')");

                            if ($sql) {
                                $_SESSION['status'] = "Signup successful!";
                                $_SESSION['status_code'] = 'success';
                                header("Location: login.php"); // Redirect to login page after successful 
                                exit();
                            } else {
                                $_SESSION['status'] = "Error: Could not register user.";
                                $_SESSION['status_code'] = 'error';
                                header("Location: signup.php"); // Redirect back to signup page
                                exit();
                            }
                        }

                        
                    } else {
                        // Invalid admission year
                        $_SESSION['status'] = "Invalid admission year. Matric number must be from the last 5 years.";
                        $_SESSION['status_code'] = 'error';
                        return;
                    }
                } else {
                    // Faculty or department code mismatch
                    $_SESSION['status'] = "Matric number does not belong to the Department of Computer Science.";
                    $_SESSION['status_code'] = 'error';
                    return;
                }
            } else {
                // Invalid matric number format
                $_SESSION['status'] = "Invalid matric number format.";
                $_SESSION['status_code'] = 'error';
                return;
            }

               
        }

        function studentLogin(){
            global $db;
            if(empty($_POST['matriculation_number']) || empty($_POST['password'])) {
                $_SESSION['status'] = 'All Fields Must are required';
                $_SESSION['status_code'] = 'error';
                return;    
            } 

            $matricNumber = $this->sanitize($_POST['matriculation_number']);
            $password = $this->sanitize($_POST['password']);
                   
           
                // Validate the matric number format (Example: 190404056)
                if (preg_match("/^\d{9}$/", $matricNumber)) {
                    

                    // Query the database for the matric number
                    $sql = $db->query("SELECT * FROM students WHERE matricno = '$matricNumber'");

                    // Check if the matric number exists
                    if (mysqli_num_rows($sql) > 0) {
                        $user = mysqli_fetch_assoc($sql);

                        // Verify the password
                        if (password_verify($password, $user['password'])) {
                            // Successful login, store user details in session
                            session_start();
                            $_SESSION['user_id'] = $user['sn'];
                            $_SESSION['fullname'] = $user['fullname'];
                            $_SESSION['matricno'] = $user['matricno'];
                            $_SESSION['email'] = $user['email'];
                           

                            // Redirect to the dashboard or homepage
                            header("Location: student-dashboard.php");
                            exit();
                        } else {
                            // Incorrect password
                            $_SESSION['status'] = "Invalid password.";
                            $_SESSION['status_code'] = 'error';
                            return;
                        }
                    } else {
                        // Matric number does not exist
                        $_SESSION['status'] = "Matric number does not exist.";
                        $_SESSION['status_code'] = 'error';
                        return;
                    }

                } else {
                    // Invalid matric number format
                    $_SESSION['status'] = "Invalid matric number format.";
                    $_SESSION['status_code'] = 'error';
                    return;
                }

        }


        function updateStudentProfile(){
            global $db;
            if(empty($_POST['fullname']) && empty($_POST['email'])){
                $_SESSION['status']  = "All fields must be filled!.";
                $_SESSION['status_code'] = 'error';
                return;
            }
            $fullName = $this->sanitize($_POST['full_name']);
            $email = $this->sanitize($_POST['email']);
            $matricNo = $_SESSION['matricno'];

            if(empty($fullName)){
                $fullName = $_SESSION['fullname'];
            }

            if(empty($email)){
                $email = $_SESSION['email'];
            }

            $sql = $db->query("UPDATE students SET fullname='$fullName', email='$email' WHERE matricno='$matricNo' ");
            if($sql){
                $_SESSION['status']  = "Profile Updated successfully.";
                $_SESSION['status_code'] = 'success';
                return;
            }else{
                $_SESSION['status']  = "Sorry, there was an error updating your profile.";
                $_SESSION['status_code'] = 'error';
            }
            

        }

        function updateStudentPassword(){
            global $db;
            if(empty($_POST['c_newPassword']) && empty($_POST['new_password'])){
                $_SESSION['status']  = "All fields must be filled!.";
                $_SESSION['status_code'] = 'error';
                return;
            }
            $newPassword = $this->sanitize($_POST['new_password']);
            $confirmNewP = $this->sanitize($_POST['c_newPassword']);
            $matricNo = $_SESSION['matricno'];


            if($newPassword != $confirmNewP){
                $_SESSION['status']  = "passwords do not correspond.";
                $_SESSION['status_code'] = 'error';
                return;
            }
            $hashedPass = password_hash($newPassword,PASSWORD_BCRYPT);
            $sql = $db->query("UPDATE students SET password='$hashedPass', WHERE matricno='$matricNo' ");
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



    $stud = new student();



?>