<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

		$this->view('application/landing', $data);
        // $this->view('admin/index');
    }

    public function reg_portal() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('application/reg_portal', $data);
        // $this->view('admin/index');
    }

    public function code_examiners() {
        $data = [
            'title' => 'Home page'
        ];

		$this->view('code_examiners/landing', $data);
    }

    public function password_reset(){
		$this->view('admin/forgot_password');
    }
    
    // public function landing_page(){
	// 	$this->view('application/landing');
    // }
    
    public function index_admin() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('admin/index');
    }

    public function counseling() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST); die();
            $data = [
                'cantype' => trim($_POST['cantype']),
                'phone_no' => trim($_POST['phone_no']),
                'email' => trim($_POST['email']),
                'studid' => trim('00000021')
            ];
            $insertdata = $this->userModel->subcouncil($data);
            if($insertdata){
                // $data1 = [
                // 'status' => 'success',
                // 'message' => 'Your application has been updated successfully'
                // ];
                echo '<script>alert("Submitted Successfully")</script>';
                echo '<script>window.location.replace("http://hrmscode.com/counseling.php")</script>';
            }else{
                // $data1 = [
                //     'status' => 'error',
                //     'message' => 'Error updating data please refresh and try again'
                //     ];
                echo '<script>alert("Error Submitting please try again")</script>';
                echo '<script>window.location.replace("http://hrmscode.com/counseling.php")</script>';
            }
        }else{
            $data = [
                'title' => 'Home page'
            ];
    
            $this->view('application/counseling', $data);
        }
       
    }

    public function application_form() {
		// $total_app = $this->userModel->gettotal_courses();
		$applicantdata = $this->userModel->applicantdata();
		$gettotal_allcourses = $this->userModel->gettotal_allcourses();
		$total_cen = $this->userModel->gettotal_centers();
        // var_dump($total_cen);die();
        $data = [
            'title' => 'Home page',
            'applicantdata' => $applicantdata,
            'total_course' => $gettotal_allcourses,
            'total_cen' => $total_cen
        ];
        if(!empty($applicantdata)){
            foreach($applicantdata as $applicantdata){}
        
        // var_dump($applicantdata->state);die();
        // echo $applicantdata['state'];die();
        if($applicantdata->state == 1 && !empty($applicantdata->state)){
            $this->view('application/application_print', $data);
        }else{
            $this->view('application/index' , $data);
        }
    }else{
        $this->view('application/index' , $data);

    }
    }

    public function admin_page() {
        if(isset($_SESSION['user_id'])){
		$total_app = $this->userModel->gettotal_app();
		$com_app = $this->userModel->getall_app();
        // var_dump($com_app);die();
        $allcounsel_stud = $this->userModel->allcounsel_stud();
        $counselreceived = $this->userModel->counsel_received();
        $newcounsel_studapp = $this->userModel->newcounsel_studapp();
        $counsel_completed = $this->userModel->counsel_completed();
        $counsel_awaitng = $this->userModel->counsel_awaitng();

        $data = [
            'title' => 'Home page',
            'allcounsel_stud' => $allcounsel_stud,
            'counselreceived' => $counselreceived,
            'newcounsel_studapp' => $newcounsel_studapp,
            'counsel_awaitng' => $counsel_awaitng,
            'counsel_completed' => $counsel_completed,
            'com_app' => $com_app,
            'total_app' => $total_app
        ];

            $this->view('admin/admin_page', $data);
        }else{
            $this->view('admin/index');
        }
    }

    public function all_applicants() {
        if(isset($_SESSION['user_id'])){
		$total_app = $this->userModel->getall_app();
        $data = [
            'title' => 'Home page',
            'total_app' => $total_app
        ];

            $this->view('admin/all_applicants', $data);
        }else{
            $this->view('admin/index');
        }
    }

    public function received_stud() {
        if(isset($_SESSION['user_id'])){
        $counselreceived = $this->userModel->counsel_received();
        $counsel_users = $this->userModel->counsel_users();
        $data = [
            'title' => 'Home page',
            'counsel_users' => $counsel_users,
            'total_app' => $counselreceived
        ];
            $this->view('admin/received_stud', $data);
        }else{
            $this->view('admin/index');
        }
    }

    public function counseling_stud() {
        if(isset($_SESSION['user_id'])){
        $newcounsel_studapp = $this->userModel->newcounsel_studapp();
        $data = [
            'title' => 'Home page',
            'total_app' => $newcounsel_studapp
        ];
            $this->view('admin/counseling_stud', $data);
        }else{
            $this->view('admin/index');
        }
    }

    public function report() {
        $total_app = $this->userModel->getall_app();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(!empty($_POST['degree_status'])){
                $total_srh = $this->userModel->report_query($_POST['degree_status']);
                if(!empty($total_srh)){
                    $data = [
                        'title' => 'Home page',
                        'total_app' => $total_app,
                        'total_srh' => $total_srh
                    ];
            
                    if(isset($_SESSION['user_id'])){
                        $this->view('admin/report', $data);
                    }else{
                        $this->view('admin/index');
                    }
                }else{
                    $data = [
                        'title' => 'Home page',
                        'total_app' => $total_app
                    ];
            
                    if(isset($_SESSION['user_id'])){
                        $this->view('admin/report', $data);
                    }else{
                        $this->view('admin/index');
                    }
                }
            }else{
                $data = [
                    'title' => 'Home page',
                    'total_app' => $total_app
                ];
        
                if(isset($_SESSION['user_id'])){
                    $this->view('admin/report', $data);
                }else{
                    $this->view('admin/index');
                }
            }
        }else{
            $data = [
                'title' => 'Home page',
                'total_app' => $total_app
            ];
    
            if(isset($_SESSION['user_id'])){
                $this->view('admin/report', $data);
            }else{
                $this->view('admin/index');
            }
        }
    }

    public function download(){
        
        // echo $file;
        // die();
        // echo $file;
        $urll = basename($_SERVER['REQUEST_URI']);
        // die();
        $base = explode('?', $urll);
        // $base[0];
        // $base[1];
        $file = APPROOT2."/public/images/tutor_files/".$base[1];
        // echo $base[1];
        // echo $file;
        // echo basename($file);
        // if (file_exists($file)) {
        //     echo 'pa';
        // }else{
        //     echo 'la';
        // }
        // die();
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }else{
            echo '<marquee> <h1>No file was uploaded </h1> <br>
            <p> Applicant did not upload any file or file encounted an error </p></marquee>';
            
        }
    }

    public function viewfiles($uid) {
        // echo $uid;
		$total_app = $this->userModel->getapp_data($uid);
        $data = [
            'title' => 'Home page',
            'total_app' => $total_app
        ];

		if(isset($_SESSION['user_id'])){
            $this->view('admin/viewfiles', $data);
        }else{
            $this->view('admin/index');
        }
    }

}
