<?php
class Code_examiners extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
		$this->userFunctions = $this->model('Functions');
    }

    public function index(){
        $data = [
            'title' => 'Home page'
        ];
        
		$this->view('code_examiners/landing', $data);
    }

    public function welcome(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sno  = trim($_POST['staff_no']);
            // var_dump($_POST);die();
            // $checkstaff_no = $this->userModel->checkstaff_no($sno);
            $checkstaff_code = $this->userModel->checkstaff_code($sno);
            $checkstaff_no_hr = $this->userModel->checkstaff_no_hr($sno);
            
            // var_dump($checkstaff_no);die();
            $total_cos = $this->userModel->gettotalcode_courses();
            $total_prog = $this->userModel->gettotal_prog();
            $total_cen = $this->userModel->gettotalcode_centers();
            
            if(!$checkstaff_code){
                $data1 = [
                'status' => 'error',
                'message' => 'Wrong staff number'
                ];
            }else{
                $_SESSION['staff_no_start'] = $sno;
                
                if(!$checkstaff_no_hr){
                    $staffdata = $checkstaff_code;
                }else{
                    $staffdata = $checkstaff_no_hr;
                }

                $data = [
                    'title' => 'Home page',
                    'staffdata' => $staffdata,
                    'total_cos' => $total_cos,
                    'total_prog' => $total_prog,
                    'total_cen' => $total_cen
                ];
                // $this->view('code_examiners/application', $data);

                $data1 = [
                    'status' => 'success',
                    'message' => 'Please begin your application'
                    ];
                
            }
            
            echo json_encode($data1);
        }else{
            $this->view('code_examiners/application');

        }
        
        
    }

    public function apply(){
        if(isset($_SESSION['staff_no_start'])){
            $sno = $_SESSION['staff_no_start'];
            $checkstaff_code = $this->userModel->checkstaff_code($sno);
            $checkstaff_no_hr = $this->userModel->checkstaff_no_hr($sno);
    
            if(!$checkstaff_no_hr){
                $staffdata = $checkstaff_code;
            }else{
                if(!empty($checkstaff_code[0]->fname)){
                    $staffdata = $checkstaff_code;

                }else{
                    
                $staffdata = $checkstaff_no_hr;
            }
            }
            // var_dump($staffdata);die();
            $total_cos = $this->userModel->gettotalcode_courses();
            $total_prog = $this->userModel->gettotal_prog();
            $total_cen = $this->userModel->gettotalcode_centers();
            $data = [
                'title' => 'Home page',
                'staffdata' => $staffdata,
                'total_cos' => $total_cos,
                'total_prog' => $total_prog,
                'total_cen' => $total_cen
            ];
            
            $this->view('code_examiners/application', $data);
        }else{
            $this->view('code_examiners/application');

        }
        
    }

    public function exam_apply(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // var_dump($_POST);die();
        if(empty($_POST['fname']) || empty($_POST['lname'])){
            $data1 = [
            'status' => 'error',
            'message' => 'First name and last name is required'
            ];
        }
        elseif(empty($_POST['dob']) || empty($_POST['gender']) || empty($_POST['phone_no']) || empty($_POST['staffno'])){
            $data1 = [
            'status' => 'error',
            'message' => 'Date of Birth, Gender, Staff Number and Phone number is required'
            ];
        }
        else{
            $checkapp = $this->userModel->check_data1($_POST['phone_no'], $_POST['email']);
            // var_dump($cvfilePath);
            // die();ad
            // if($checkapp){
            //     $data1 = [
            //         'status' => 'error',
            //         'message' => 'Application can only be done once'
            //         ];
            // }else{
                $data = [
                    'fname' => trim($_POST['fname']),
                    'mname' => trim($_POST['mname']),
                    'lname' => trim($_POST['lname']),
                    'dob' => trim($_POST['dob']),
                    'gender' => trim($_POST['gender']),
                    'ghcard_no' => trim($_POST['ghcard']),
                    'phone_no' => trim($_POST['phone_no']),
                    'email' => trim($_POST['email']),
                    'curr_loc' => trim($_POST['curr_loc']),
                    'course' => trim($_POST['course']),
                    'program' => trim($_POST['program']),
                    'centre' => trim($_POST['centre']),
                    'level' => trim($_POST['level']),
                    'marked' => trim($_POST['marked']),
                    'bankname' => trim($_POST['bankname']),
                    'branch' => trim($_POST['branch']),
                    'acc_name' => trim($_POST['acc_name']),
                    'staffno' => trim($_POST['staffno']),
                    'acc_no' => trim($_POST['acc_no'])
                ];
                $inserttut = $this->userModel->submit_App1($data);
                if($inserttut){
                    $data1 = [
                    'status' => 'success',
                    'message' => 'Your application has been submitted successfully'
                    ];
                }
            // }    
        }

        }
		echo json_encode($data1);

    }

    public function admin_page() {
		$total_app = $this->userModel->gettotal_app1();
        $data = [
            'title' => 'Home page',
            'total_app' => $total_app
        ];

		if(isset($_SESSION['user_id'])){
            $this->view('code_examiners/admin_page', $data);
        }else{
            $this->view('code_examiners/adminlogin', $data);
        }
    }

    public function login(){
		$data = [
			'title' => 'Login page',
			'username' => '',
			'password' => '',
			'usernameError' => '',
			'passwordError' => ''
        ];
        
		//check for post
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data =[
				'username' => trim($_POST['username']),
				'password' => trim($_POST['password']),
				'usernameError' => '',
				'passwordError' => ''
			];

			//validate username
			if (empty($data['username'])) {
				$data['usernameError'] = 'Please enter a username.';
			}

			//validate password
			if (empty($data['password'])) {
				$data['passwordError'] = 'Please enter a password.';
            }
            

			//check id all errors are empty
			if (empty($data['usernameError']) && empty($data['passwordError'])) {
				$loggedInUser = $this->userModel->login($data['username'], $data['password']);
				if ($loggedInUser) {
					$this->createUserSession($loggedInUser);
				}else{
					$data['passwordError'] = 'Password or Username is incorrect. Please try again.';

					$this->view('code_examiners/adminlogin', $data);
				}
			}

		}else{
			$data = [
				'username' => '',
				'password' => '',
				'usernameError' => '',
				'passwordError' => ''
			];
		}

		$this->view('code_examiners/adminlogin', $data);
	}

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['fullname'] = $user->fullname;
        $_SESSION['role'] = $user->role;
        $_SESSION['email'] = $user->email;
        if($_SESSION['role'] == 1){
            header('location:' . URLROOT . '/code_examiners/admin_page.php');
        }else{
            header('location:' . URLROOT . '/admin_page.php');
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        unset($_SESSION['fullname']);
        header('location:' . URLROOT . '/code_examiners/login.php');
        
    }

    public function print(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // var_dump($_POST);
        // var_dump($_FILES);die();
        if(empty($_POST['phone_no'])){
            $data1 = [
            'status' => 'error',
            'message' => 'Phone Number is required'
            ];
        }
        else{
            $checkapp = $this->userModel->check_datalog($_POST['phone_no']);
            // var_dump($checkapp);
            // die();
            // echo $_POST['phone_no'];
            // echo $_POST['lname'];
            // var_dump($checkapp);
            // echo $checkapp->id; 
            // die();

            if($checkapp){
                $_SESSION['user_id'] = $checkapp->id;
                $_SESSION['phone_no'] = $checkapp->phone_no;
                $_SESSION['ename'] = $checkapp->ename;
                $_SESSION['marking_centre'] = $checkapp->marking_centre;
                $_SESSION['course'] = $checkapp->course;
                $_SESSION['resident_status'] = $checkapp->resident_status;
                $_SESSION['examiner_type'] = $checkapp->examiner_type;
                $data1 = [
                    'status' => 'success',
                    'message' => 'You can continue with your application'
                    ];
            }else{
                $data1 = [
                    'status' => 'error',
                    'message' => 'Sorry you werent selected'
                    ];
            }
            // else{
            //     $data = [
            //         // 'fname' => trim($_POST['fname']),
            //         // 'mname' => trim($_POST['mname']),
            //         // 'lname' => trim($_POST['lname']),
            //         'phone_no' => trim($_POST['phone_no'])
            //     ];
            //     // $inserttut = $this->userModel->submit_Appst($data);
            //     // if($inserttut){
            //         $checkapp = $this->userModel->check_datalog($_POST['phone_no']);
            //         if($checkapp){
            //             $_SESSION['user_id'] = $checkapp->id;
            //             $_SESSION['phone_no'] = $checkapp->phone_no;
            //             $data1 = [
            //                 'status' => 'success',
            //                 'message' => 'Please begin your application'
            //                 ];
            //         }                    
            //     // }
            // }    
        }
        echo json_encode($data1);
        }else{
        $this->view('code_examiners/printletter');
        }

    }

    public function all_applicants() {
		$total_app = $this->userModel->getall_app1();
        $total_cos = $this->userModel->gettotalcode_courses();

        $data = [
            'total_cos' => $total_cos,
            'title' => 'Home page',
            'total_app' => $total_app
        ];

		if(isset($_SESSION['user_id'])){
            $this->view('code_examiners/all_applicants', $data);
        }else{
            $this->view('code_examiners/index', $data);
        }
    }

    public function tut_action(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);die();
            $data = [
                'status_app' => trim($_POST['radio']),
                'pid' => trim($_POST['promo_id'])
            ];
            if($_POST['radio'] == ""){
                $data1 = [
                    'status' => 'error',
                    'message' => 'Please select or reject file'
                    ];
            }else{
                $inserttut = $this->userModel->update_App1($data);
                if($inserttut){
                $data1 = [
                'status' => 'success',
                'message' => 'Application have been updated successfully'
                ];
                }else{
                $data1 = [
                'status' => 'error',
                'message' => 'Error uploading applicant'
                ];
                }            
            }
        }
        echo json_encode($data1);
    }

    public function report() {
        $total_app = $this->userModel->getall_app();
        if(isset($_SESSION['user_id'])){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(!empty($_POST['degree_status'])){
                $total_srh = $this->userModel->report_query1($_POST['degree_status']);
                if(!empty($total_srh)){
                    $data = [
                        'title' => 'Home page',
                        'total_app' => $total_app,
                        'total_srh' => $total_srh
                    ];
            
                        $this->view('code_examiners/report', $data);
                    
                }else{
                    $data = [
                        'title' => 'Home page',
                        'total_app' => $total_app
                    ];
            
                        $this->view('code_examiners/report', $data);
                    
                }
            }else{
                $data = [
                    'title' => 'Home page',
                    'total_app' => $total_app
                ];
        
                    $this->view('code_examiners/report', $data);
                
            }
        }else{
            $data = [
                'title' => 'Home page',
                'total_app' => $total_app
            ];
    
                $this->view('code_examiners/report', $data);
           
        }
    }else{
        $this->view('code_examiners/adminlogin');

    }
    }

    public function tutor_apply(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // var_dump($_POST);
//         var_dump($_FILES);
// die();
        if(empty($_POST['fname']) || empty($_POST['lname'])){
            $data1 = [
            'status' => 'error',
            'message' => 'First name and last name is required'
            ];
        }
        elseif(empty($_POST['dob']) || empty($_POST['gender']) || empty($_POST['phone_no']) || empty($_POST['staffno'])){
            $data1 = [
            'status' => 'error',
            'message' => 'Date of Birth, Gender, Staff Number and Phone number is required'
            ];
        }
        else{
            $checkapp = $this->userModel->check_data($_POST['phone_no'], $_POST['email']);
            // var_dump($cvfilePath);
            // die();ad
            if($checkapp){
                $data1 = [
                    'status' => 'error',
                    'message' => 'Application can only be done once'
                    ];
            }else{
                $data = [
                    'fname' => trim($_POST['fname']),
                    'mname' => trim($_POST['mname']),
                    'lname' => trim($_POST['lname']),
                    'dob' => trim($_POST['dob']),
                    'gender' => trim($_POST['gender']),
                    'phone_no' => trim($_POST['phone_no']),
                    'email' => trim($_POST['email']),
                    'curr_loc' => trim($_POST['curr_loc']),
                    'course' => trim($_POST['course']),
                    'program' => trim($_POST['program']),
                    'centre' => trim($_POST['centre']),
                    'level' => trim($_POST['level']),
                    'marked' => trim($_POST['marked']),
                    'bankname' => trim($_POST['bankname']),
                    'branch' => trim($_POST['branch']),
                    'acc_name' => trim($_POST['acc_name']),
                    'staffno' => trim($_POST['staffno']),
                    'acc_no' => trim($_POST['acc_no'])
                ];
                $inserttut = $this->userModel->submit_App($data);
                if($inserttut){
                    $data1 = [
                    'status' => 'success',
                    'message' => 'Your application has been submitted successfully'
                    ];
                }
            }    
        }

        }
		echo json_encode($data1);

    }

    public function tut_action1(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);
            $data = [
                'status_app' => trim($_POST['radio1']),
                'pid' => trim($_POST['promo_id1'])
            ];
            if(empty($_POST['radio1'])){
                $data1 = [
                    'status' => 'error',
                    'message' => 'Please select or reject file'
                    ];
            }else{
                $inserttut = $this->userModel->update_App($data);
                if($inserttut){
                $data1 = [
                'status' => 'success',
                'message' => 'Application have been updated successfully'
                ];
                }else{
                $data1 = [
                'status' => 'error',
                'message' => 'Error uploading applicant'
                ];
                }            
            }
        }
		echo json_encode($data1);
    }

    public function resetpassword(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            $data = [
                'old_password' => trim($_POST['old_password']),
                'new_password' => trim($_POST['new_password']),
                'repeat_password' => trim($_POST['repeat_password'])
            ];
            $checkpass =  $this->userModel->login($_SESSION['username'], $data['old_password']);
            if(!$checkpass){
                $data1 = [
                    'status' => 'error',
                    'message' => 'Wrong current password'
                    ];
            }elseif($data['new_password'] != $data['repeat_password']){
                $data1 = [
                    'status' => 'error',
                    'message' => 'New Password Mismatch'
                    ];
            }elseif(strlen($data['new_password']) < 6){
                $data1 = [
                    'status' => 'error',
                    'message' => 'Password must be at least 6 characters'
                    ];
            }elseif(preg_match($passwordValidation, $data['new_password'])){
                $data1 = [
                    'status' => 'error',
                    'message' => 'Password must contain alpabets, numbers & special character'
                    ];
            }else{
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                
                $inserttut = $this->userModel->update_password($data['new_password']);
                if($inserttut){
                $data1 = [
                'status' => 'success',
                'message' => 'Your password have been changed successfully'
                ];
                }else{
                $data1 = [
                'status' => 'error',
                'message' => 'Error changing password try again'
                ];
                }            
            }
        }
		echo json_encode($data1);
    }

    public function createuser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);
          
            // $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $data = [
                'fullname' => trim($_POST['fullname']),
                'uname' => trim($_POST['uname']),
                'password' => $password,
                'email' => trim($_POST['email'])
            ];
            $checkuser =  $this->userModel->checkuser($data['uname']);
            if(!$checkuser){
                $data1 = [
                    'status' => 'error',
                    'message' => 'Username already exit'
                    ];
            }else{
                // $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                
                $inserttut = $this->userModel->createuser($data);
                if($inserttut){
                $data1 = [
                'status' => 'success',
                'message' => 'User have been created successfully'
                ];
                }else{
                $data1 = [
                'status' => 'error',
                'message' => 'Error creating user try again later'
                ];
                }            
            }
        }
		echo json_encode($data1);
    }

    public function register() {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
    }
}