<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->userFunctions = $this->model('Functions');
    }

    public function tutor_applystart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);
            // var_dump($_FILES);die();
            if (empty($_POST['phone_no'])) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Phone Number is required'
                ];
            } else {
                $checkapp = $this->userModel->check_datalog1($_POST['phone_no']);
                // var_dump($cvfilePath);
                // die();
                // echo $_POST['phone_no'];
                // echo $_POST['lname'];
                // var_dump($checkapp);
                // echo $checkapp->id; 
                // die();

                if ($checkapp) {
                    // $checkapp = $this->userFunctions->mailerfunction();
                    $uid = $checkapp->id;
                    $pno = $checkapp->phone_no;
                    $checkapp = $this->userModel->check_datalog_details($uid);
                    if ($checkapp) {
                        $_SESSION['user_id'] = $uid;
                        $_SESSION['phone_no'] = $pno;
                        // var_dump($_SESSION);die();

                        $data1 = [
                            'status' => 'success',
                            'message' => 'You can continue with your application'
                        ];
                    }else{
                        $data = [
                            'tutor_id' => $uid
                        ];
                        $inserttut = $this->userModel->submit_Appst_otherdetails($data);
                        if ($inserttut) {
                                $_SESSION['user_id'] = $uid;
                                $_SESSION['phone_no'] = $pno;
                                $data1 = [
                                    'status' => 'success',
                                    'message' => 'You can continue with your application'
                                ];
                        }
                    }
                } else {
                    $data = [
                        'fname' => trim($_POST['fname']),
                        'mname' => trim($_POST['mname']),
                        'lname' => trim($_POST['lname']),
                        'phone_no' => trim($_POST['phone_no'])
                    ];
                    $inserttut = $this->userModel->submit_Appst($data);
                    if ($inserttut) {
                        $checkapp = $this->userModel->check_datalog1($_POST['phone_no']);
                        if ($checkapp) {
                            $data = [
                                'tutor_id' => $checkapp->id
                            ];
                            $inserttut2 = $this->userModel->submit_Appst_otherdetails($data);
                            if ($inserttut2) {
                                    $_SESSION['user_id'] = $checkapp->id;
                                    $_SESSION['phone_no'] = $checkapp->phone_no;
                                    $data1 = [
                                        'status' => 'success',
                                        'message' => 'Please begin your application'
                                    ];
                            }
                        }
                    }
                }
            }
            echo json_encode($data1);
        }
    }

    public function actiontut()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);die();
            $_POST['course'] = (!empty($_POST['course']) ? $_POST['course'] : $_POST['promo_course']);
            $_POST['examinertype'] = (empty($_POST['examinertype']) ? $_POST['promo_examiner_type'] : $_POST['examinertype']);
            $_POST['res_status'] = (empty($_POST['res_status']) ? $_POST['promo_resident_status'] : $_POST['res_status']);
            $_POST['markcenter'] = (empty($_POST['markcenter']) ? $_POST['promo_marking_centre'] : $_POST['markcenter']);
            $data = [
                'examiner_type' => trim($_POST['examinertype']),
                'resident_status' => trim($_POST['res_status']),
                'marking_centre' => trim($_POST['markcenter']),
                'course' => trim($_POST['course']),
                'pid' => trim($_POST['promo_id1']),
                'status_app' => trim('2')
                // 'pid' => trim($_POST['promo_id'])
            ];
            $inserttut = $this->userModel->update_App2($data);
            if ($inserttut) {
                $data1 = [
                    'status' => 'success',
                    'message' => 'Application has been updated successfully'
                ];
            } else {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Error uploading applicant'
                ];
            }
        }
        echo json_encode($data1);
    }

    public function tutor_apply()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);
            // var_dump($_FILES);
            // die();
            if(isset($_SESSION['centre']) && !empty($_SESSION['centre'])){
                $alldata = $this->userModel->applicantdata_phone($_POST['phone_no']);
            }else{
                $alldata = $this->userModel->applicantdata();
            }
            foreach ($alldata as $adata) {
            }
            $cvfilePath = (!empty($adata->cv) ? $adata->cv : $this->userFunctions->single_fileupload($_FILES['cv']));
            $fcfilePath = (!empty($adata->f_degree_cert) ? $adata->f_degree_cert : $this->userFunctions->single_fileupload($_FILES['f_degree_cert']));
            $ftfilePath = (!empty($adata->f_degree_trans) ? $adata->f_degree_trans : $this->userFunctions->single_fileupload($_FILES['f_degree_trans']));
            $fcfilePath2 = (!empty($adata->f_degree_cert2) ? $adata->f_degree_cert2 : $this->userFunctions->single_fileupload($_FILES['f_degree_cert2']));
            $ftfilePath2 = (!empty($adata->f_degree_trans2) ? $adata->f_degree_trans2 : $this->userFunctions->single_fileupload($_FILES['f_degree_trans2']));
            $scfilePath = (!empty($adata->sec_deg_cert) ? $adata->sec_deg_cert : $this->userFunctions->single_fileupload($_FILES['sec_deg_cert']));
            $stfilePath = (!empty($adata->sec_degree_trans) ? $adata->sec_degree_trans : $this->userFunctions->single_fileupload($_FILES['sec_degree_trans']));
            $drfilePath = (!empty($adata->detail_result) ? $adata->detail_result : $this->userFunctions->single_fileupload($_FILES['detail_result']));
            $t_deg_cert = (!empty($adata->t_deg_cert) ? $adata->t_deg_cert : $this->userFunctions->single_fileupload($_FILES['t_deg_cert']));
            $t_degree_trans = (!empty($adata->t_degree_trans) ? $adata->t_degree_trans : $this->userFunctions->single_fileupload($_FILES['t_degree_trans']));
            $tb_detail_result = (!empty($adata->tb_detail_result) ? $adata->tb_detail_result : $this->userFunctions->single_fileupload($_FILES['tb_detail_result']));
            $othercert = (!empty($adata->othercert) ? $adata->othercert : $this->userFunctions->single_fileupload($_FILES['othercert']));
            $staffpic = (!empty($adata->staffpic) ? $adata->staffpic : $this->userFunctions->single_fileupload($_FILES['staffpic']));

            if (empty($scfilePath)) {
                $scfilePath = "";
            }
            if (empty($stfilePath)) {
                $stfilePath = "";
            }
            if (empty($drfilePath)) {
                $drfilePath = "";
            }
            if (!empty($_POST['delete_image']) && isset($_POST['delete_image']) == 'on') {
                $staffpic = '';
                // $inserttut = $this->userModel->submit_App_update($data, $field);
            }
            if (!empty($_POST['delete_cv']) && isset($_POST['delete_cv']) == 'on') {
                $cvfilePath = '';
                // $inserttut = $this->userModel->submit_App_update($data, $field);
            }
            if (!empty($_POST['delete_all']) && isset($_POST['delete_all']) == 'on') {
                $fcfilePath = '';
                $ftfilePath = '';
                $fcfilePath2 = '';
                $ftfilePath2 = '';
                $scfilePath = '';
                $stfilePath = '';
                $drfilePath = '';
                $t_deg_cert = '';
                $t_degree_trans = '';
                $tb_detail_result = '';
                $othercert = '';
                // $inserttut = $this->userModel->submit_App_update($data, $field);
            }
            $data = [
                'fname' => strtoupper(trim($_POST['fname'])),
                'mname' => strtoupper(trim($_POST['mname'])),
                'lname' => strtoupper(trim($_POST['lname'])),
                'dob' => trim($_POST['dob']),
                'gender' => trim($_POST['gender']),
                'phone_no' => trim($_POST['phone_no']),
                'email' => trim($_POST['email']),
                'curr_loc' => strtoupper(trim($_POST['curr_loc'])),
                'id_type' => trim($_POST['id_type']),
                'cardno' => strtoupper(trim($_POST['cardno'])),
                'f_degree' => strtoupper(trim($_POST['f_degree'])),
                'f_degree2' => strtoupper(trim($_POST['f_degree2'])),
                's_degree' => strtoupper(trim($_POST['s_degree'])),
                'sec_degree_status' => trim($_POST['degree_status']),
                'course_sel' => trim($_POST['course_sel']),
                'course_sel1' => trim($_POST['course_sel1']),
                'study_cen1' => trim($_POST['study_cen1']),
                'part_full_time' => trim($_POST['part_full_time']),
                'dept_faculty' => trim($_POST['dept_faculty']),
                'original_institution' => strtoupper(trim($_POST['original_institution'])),
                'course_taught' => strtoupper(trim($_POST['course_taught'])),
                'cv' => trim($cvfilePath),
                'staffpic' => trim($staffpic),
                'f_degree_cert' => trim($fcfilePath),
                'f_degree_trans' => trim($ftfilePath),
                'f_degree_cert2' => trim($fcfilePath2),
                'f_degree_trans2' => trim($ftfilePath2),
                'sec_deg_cert' => trim($scfilePath),
                'sec_degree_trans' => trim($stfilePath),
                'detail_result' => trim($drfilePath),
                't_degree' => strtoupper(trim($_POST['t_degree'])),
                't_degree_status' => trim($_POST['t_degree_status']),
                't_deg_cert' => trim($t_deg_cert),
                't_degree_trans' => trim($t_degree_trans),
                'othercert' => trim($othercert),
                'othercertname' => strtoupper(trim($_POST['othercertname'])),
                't_existing' => trim($_POST['t_existing']),
                'staffno' => trim($_POST['staffno']),
                'study_cen2' => trim($_POST['study_cen2']),
                'centre_coor' => trim($_POST['centre_coor']),
                'cord_centre' => trim($_POST['cord_centre']),
                'phd_inst_award' => trim($_POST['phd_inst_award']),
                't_deg_cert_yr' => trim($_POST['t_deg_cert_yr']),
                'masters_inst_award' => trim($_POST['masters_inst_award']),
                'sec_deg_cert_yr' => trim($_POST['sec_deg_cert_yr']),
                'f_deg_inst_award' => trim($_POST['f_deg_inst_award']),
                'first_deg_cert_yr' => trim($_POST['first_deg_cert_yr']),
                'tut_rank' => trim($_POST['tut_rank']),
                'area_specialization' => trim($_POST['area_specialization']),
                'prog_sel1' => trim($_POST['prog_sel1']),
                'prog_sel' => trim($_POST['prog_sel']),
                'f_deg_inst_award2' => trim($_POST['f_deg_inst_award2']),
                'first_deg_cert_yr2' => trim($_POST['first_deg_cert_yr2']),
                'other_deg_inst_award' => trim($_POST['other_deg_inst_award']),
                'other_deg_cert_yr2' => trim($_POST['other_deg_cert_yr2']),
                'tb_detail_result' => trim($tb_detail_result),

                
                'postal_address' => strtoupper(trim($_POST['postal_address'])),
                'admission_date' => trim($_POST['admission_date']),
                'digital_address' => strtoupper(trim($_POST['digital_address'])),
                'completion_date' => trim($_POST['completion_date']),
                'certificate_no' => strtoupper(trim($_POST['certificate_no'])),
                'admission_date_sec_deg' => trim($_POST['admission_date_sec_deg']),
                'certificate_no_sec_deg' => strtoupper(trim($_POST['certificate_no_sec_deg'])),
                'completion_date_sec_deg' => trim($_POST['completion_date_sec_deg']),
                'admission_date_first_deg' => trim($_POST['admission_date_first_deg']),
                'certificate_no_first_deg' => strtoupper(trim($_POST['certificate_no_first_deg'])),
                'completion_date_first_deg' => trim($_POST['completion_date_first_deg']),
                'admission_date_first_deg2' => trim($_POST['admission_date_first_deg2']),
                'certificate_no_first_deg2' => strtoupper(trim($_POST['certificate_no_first_deg2'])),
                'completion_date_first_deg2' => trim($_POST['completion_date_first_deg2']),
                'current_work_schedule' => trim($_POST['current_work_schedule']),
                'year_of_appointment' => trim($_POST['year_of_appointment']),
                'bank_name' => strtoupper(trim($_POST['bank_name'])),
                'bank_branch' => strtoupper(trim($_POST['bank_branch'])),
                'account_number' => trim($_POST['account_number']),
                'spouse_name' => strtoupper(trim($_POST['spouse_name'])),
                'next_of_kin' => strtoupper(trim($_POST['next_of_kin'])),
                'nok_phone_no' => trim($_POST['nok_phone_no']),
                'nok_digital_number' => trim($_POST['nok_digital_number']),
                'nok_postal_address' => strtoupper(trim($_POST['nok_postal_address'])),
                'centre_presence' => trim($_POST['centre_presence'])
            ];

            if (isset($_POST['save1']) == 'on' || isset($_POST['save']) == 'on' || isset($_POST['delete_image']) == 'on' || isset($_POST['delete_cv']) == 'on' || isset($_POST['savecv']) == 'on' || isset($_POST['delete_all']) == 'on') {
                $data['state'] = '0';
                if(isset($_SESSION['centre']) && !empty($_SESSION['centre'])){
                    $inserttut = $this->userModel->submit_App_phone($data);
                    // echo $_POST['phone_no'];
                    $checktut = $this->userModel->check_datalog1($_POST['phone_no']);
                    
                          $tutor_id = $checktut->id;
                    
                    $inserttut3 = $this->userModel->submit_App_other_details_phone($data, $tutor_id);
                }else{
                    $inserttut = $this->userModel->submit_App($data);
                    $inserttut3 = $this->userModel->submit_App_other_details($data);
                }
                
                if ($inserttut3) {
                    $data1 = [
                        'status' => 'success',
                        'message' => 'Your application has been updated successfully'
                    ];
                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error updating data please refresh and try again'
                    ];
                }
            } else {
                if (empty($_POST['fname']) || empty($_POST['lname'])) {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'First name and last name is required'
                    ];
                } elseif (empty($_POST['dob']) || empty($_POST['gender']) || empty($_POST['phone_no']) || empty($_POST['cardno']) || empty($_POST['postal_address'])) {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Date of Birth, Ghana Card Number, Postal Address, Gender and Phone number is required'
                    ];
                } elseif (($_POST['f_degree'] == 1) && (empty($_POST['s_degree']) || empty($_POST['othercertname']) || empty($_POST['admission_date_first_deg']) || empty($_POST['admission_date_sec_deg']))) {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'First and Second Degree Details are required'
                    ];
                } elseif (!empty($_POST['s_degree']) && empty($_POST['degree_status'])) {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Select Status of Second Degree is required'
                    ];
                } elseif (empty($_POST['course_sel']) || empty($_POST['study_cen1'])) {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Select course to teach and a study centre'
                    ];
                } elseif(empty($_POST['original_institution'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Please enter your original intitution (n/a if not applicable)'
                    ];
                } elseif(empty($_POST['tut_rank'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Select your tutors rank'
                    ];
                } elseif(empty($_POST['bank_name']) || empty($_POST['bank_branch'])||empty($_POST['account_number'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Please Enter Your Bank Details'
                    ];
                } elseif(empty($_POST['prog_sel1']) && empty($_POST['prog_sel'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Please select programs you teach'
                    ];
                } elseif(empty($_POST['course_sel']) || empty($_POST['course_sel1'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Please select courses you teach'
                    ];
                } elseif(empty($_POST['nok_postal_address']) || empty($_POST['nok_digital_number']) || empty($_POST['nok_phone_no']) || empty($_POST['next_of_kin'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Please enter next of kin details'
                    ];
                } elseif(empty($_POST['area_specialization'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Please enter your area of specialization'
                    ];
                } elseif(empty($_POST['current_work_schedule']) || empty($_POST['year_of_appointment'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Please current work schedule and date of appointment'
                    ];
                } elseif(empty($_POST['certificate_no_first_deg']) || empty($_POST['completion_date_first_deg'])){
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Please enter certicate numbers and completed dates'
                    ];
                } else {

                    // $checkapp = $this->userModel->check_data($_POST['phone_no'], $_POST['email']);
                    // var_dump($cvfilePath);
                    // die();

                    if (empty($cvfilePath)) {
                        $data1 = [
                            'status' => 'error',
                            'message' => 'Please upload ur CV'
                        ];
                    } elseif (empty($fcfilePath)) {
                        $data1 = [
                            'status' => 'error',
                            'message' => 'Please upload ur First Degree Certificate'
                        ];
                    } elseif (empty($ftfilePath)) {
                        $data1 = [
                            'status' => 'error',
                            'message' => 'Please upload ur First Degree Transcript'
                        ];
                    } elseif (($_POST['degree_status'] == 'COMPLETED') && (empty($scfilePath) || empty($stfilePath))) {
                        $data1 = [
                            'status' => 'error',
                            'message' => 'Upload files of Second Degree'
                        ];
                    } elseif (($_POST['degree_status'] == 'ONGOING') && empty($drfilePath)) {
                        $data1 = [
                            'status' => 'error',
                            'message' => 'Upload details of results details'
                        ];
                    } else {
                        $data['state'] = '1';
                        if(isset($_SESSION['centre']) && !empty($_SESSION['centre'])){
                            $inserttut = $this->userModel->submit_App_phone($data);
                    // echo $_POST['phone_no'];
                    $checktut = $this->userModel->check_datalog1($_POST['phone_no']);
                    
                          $tutor_id = $checktut->id;
                    
                    $inserttut3 = $this->userModel->submit_App_other_details_phone($data, $tutor_id);
                        }else{
                            $inserttut = $this->userModel->submit_App($data);
                            $inserttut3 = $this->userModel->submit_App_other_details($data);
                        }
                        if ($inserttut) {
                            $data1 = [
                                'status' => 'success',
                                'message' => 'Your application has been submitted successfully'
                            ];
                        } else {
                            $data1 = [
                                'status' => 'error',
                                'message' => 'Error updating data please refresh and try again'
                            ];
                        }
                    }
                }
            }
        }
        echo json_encode($data1);
    }

    public function councilact()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);die();
            $data = [
                'status_app' => trim($_POST['radio']),
                'username' => trim($_POST['staff_ass']),
                'pid' => trim($_POST['promo_id'])
            ];
            if (empty($_POST['radio'])) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Please Assign to Counsellor'
                ];
            } else {
                $inserttut = $this->userModel->update_Appcouncil($data);
                if ($inserttut) {
                    // $mailerfunction = $this->userFunctions->mailerfunction($data);
                    // if($mailerfunction){
                    $data1 = [
                        'status' => 'success',
                        'message' => 'Application has been updated successfully'
                    ];
                    // }else{
                    //     $data1 = [
                    //     'status' => 'error',
                    //     'message' => 'Mail not sent'
                    //     ];
                    // }

                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error uploading applicant'
                    ];
                }
            }
        }
        echo json_encode($data1);
    }

    public function councilact_staff()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);die();
            $data = [
                'status_app' => trim($_POST['radio']),
                'username' => trim($_POST['staff_ass']),
                'pid' => trim($_POST['promo_id'])
            ];
            if (empty($_POST['radio'])) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Please Assign to Counsellor'
                ];
            } else {
                $inserttut = $this->userModel->update_Appcouncil_staff($data);
                if ($inserttut) {
                    // $mailerfunction = $this->userFunctions->mailerfunction($data);
                    // if($mailerfunction){
                    $data1 = [
                        'status' => 'success',
                        'message' => 'Application has been updated successfully'
                    ];
                    // }else{
                    //     $data1 = [
                    //     'status' => 'error',
                    //     'message' => 'Mail not sent'
                    //     ];
                    // }

                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error uploading applicant'
                    ];
                }
            }
        }
        echo json_encode($data1);
    }

    public function tut_action()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);
            $data = [
                'status_app' => trim($_POST['radio']),
                'message' => 'Selected For Interview',
                'pid' => trim($_POST['promo_id'])
            ];
            // if (empty($_POST['radio'])) {
            //     $data1 = [
            //         'status' => 'error',
            //         'message' => 'Please select or reject file'
            //     ];
            // } else {
                $inserttut = $this->userModel->update_App($data);
                if ($inserttut) {
                    // $mailerfunction = $this->userFunctions->mailerfunction($data);
                    // if($mailerfunction){
                    $data1 = [
                        'status' => 'success',
                        'message' => 'Application has been updated successfully'
                    ];
                    // }else{
                    //     $data1 = [
                    //     'status' => 'error',
                    //     'message' => 'Mail not sent'
                    //     ];
                    // }

                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error uploading applicant'
                    ];
                }
            // }
        }
        echo json_encode($data1);
    }

    public function counselup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);die();
            //$_POST['sno'] = empty($_POST['sno'])?$_POST['sno']:$_SESSION['username'];


            if (empty($_POST['radio1'])) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Please Action'
                ];
            } else {
                if ($_POST['radio1'] == 2) {
                    $data = [
                        'status_app' => trim($_POST['radio1']),
                        'sno' => trim($_POST['sno']),
                        'comments' => trim($_POST['comments']),
                        'pid' => trim($_POST['promo_id1'])
                    ];
                    $inserttut = $this->userModel->update_Appcou1($data);
                } else {
                    $data = [
                        'status_app' => trim($_POST['radio1']),
                        'comments' => trim($_POST['comments']),
                        'pid' => trim($_POST['promo_id1'])
                    ];
                    $inserttut = $this->userModel->update_Appcou($data);
                }

                if ($inserttut) {
                    $data1 = [
                        'status' => 'success',
                        'message' => 'Application has been updated successfully'
                    ];
                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error updating'
                    ];
                }
            }
        }
        echo json_encode($data1);
    }

    public function counselup_staff()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);die();
            //$_POST['sno'] = empty($_POST['sno'])?$_POST['sno']:$_SESSION['username'];


            if (empty($_POST['radio1'])) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Please Action'
                ];
            } else {
                if ($_POST['radio1'] == 2) {
                    $data = [
                        'status_app' => trim($_POST['radio1']),
                        'sno' => trim($_POST['sno']),
                        'comments' => trim($_POST['comments']),
                        'pid' => trim($_POST['promo_id1'])
                    ];
                    $inserttut = $this->userModel->update_Appcou1_staff($data);
                } else {
                    $data = [
                        'status_app' => trim($_POST['radio1']),
                        'comments' => trim($_POST['comments']),
                        'pid' => trim($_POST['promo_id1'])
                    ];
                    $inserttut = $this->userModel->update_Appcou_staff($data);
                }

                if ($inserttut) {
                    $data1 = [
                        'status' => 'success',
                        'message' => 'Application has been updated successfully'
                    ];
                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error updating'
                    ];
                }
            }
        }
        echo json_encode($data1);
    }

    public function tut_action1()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);
            $data = [
                'status_app' => trim($_POST['radio1']),
                'pid' => trim($_POST['promo_id1'])
            ];
            // if (empty($_POST['radio1'])) {
            //     $data1 = [
            //         'status' => 'error',
            //         'message' => 'Please select or reject file'
            //     ];
            // } else {
                $inserttut = $this->userModel->update_App($data);
                if ($inserttut) {
                    $data1 = [
                        'status' => 'success',
                        'message' => 'Application has been updated successfully'
                    ];
                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error uploading applicant'
                    ];
                }
            // }
        }
        echo json_encode($data1);
    }

    public function resetpassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            $data = [
                'old_password' => trim($_POST['old_password']),
                'new_password' => trim($_POST['new_password']),
                'repeat_password' => trim($_POST['repeat_password'])
            ];
            $checkpass =  $this->userModel->login($_SESSION['username'], $data['old_password']);
            if (!$checkpass) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Wrong current password'
                ];
            } elseif ($data['new_password'] != $data['repeat_password']) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'New Password Mismatch'
                ];
            } elseif (strlen($data['new_password']) < 6) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Password must be at least 6 characters'
                ];
            } elseif (preg_match($passwordValidation, $data['new_password'])) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Password must contain alpabets, numbers & special character'
                ];
            } else {
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                $inserttut = $this->userModel->update_password($data['new_password']);
                if ($inserttut) {
                    $data1 = [
                        'status' => 'success',
                        'message' => 'Your password has been changed successfully'
                    ];
                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error changing password try again'
                    ];
                }
            }
        }
        echo json_encode($data1);
    }

    public function createuser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);

            // $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $data = [
                'fullname' => trim($_POST['fullname']),
                'uname' => trim($_POST['uname']),
                'center' => trim($_POST['center']),
                'password' => $password,
                'email' => trim($_POST['email'])
            ];
            $checkuser =  $this->userModel->checkuser($data['uname']);
            if (!$checkuser) {
                $data1 = [
                    'status' => 'error',
                    'message' => 'Username already exit'
                ];
            } else {
                // $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                $inserttut = $this->userModel->createuser($data);
                if ($inserttut) {
                    $data1 = [
                        'status' => 'success',
                        'message' => 'User has been created successfully'
                    ];
                } else {
                    $data1 = [
                        'status' => 'error',
                        'message' => 'Error creating user try again later'
                    ];
                }
            }
        }
        echo json_encode($data1);
    }

    public function register()
    {
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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            } elseif (strlen($data['password']) < 6) {
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

    public function login()
    {
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

            $data = [
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
                } else {
                    $data['passwordError'] = 'Password or Username is incorrect. Please try again.';

                    $this->view('admin/index', $data);
                }
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }

        $this->view('admin/index', $data);
    }


    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['fullname'] = $user->fullname;
        $_SESSION['role'] = $user->role;
        $_SESSION['officerole'] = $user->officerole;
        $_SESSION['centre'] = $user->centre;
        $_SESSION['email'] = $user->email;
        $_SESSION['runtype'] = $user->runtype;
        if ($_SESSION['role'] == 1) {
            header('location:' . URLROOT . '/code_examiners/admin_page.php');
        } else {
            header('location:' . URLROOT . '/admin_page.php');
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['phone_no']);
        unset($_SESSION['role']);
        unset($_SESSION['email']);
        unset($_SESSION['runtype']);
        unset($_SESSION['officerole']);
        header('location:' . URLROOT . '/users/login.php');
    }
    public function logout1()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['phone_no']);
        unset($_SESSION['role']);
        unset($_SESSION['email']);
        unset($_SESSION['runtype']);
        unset($_SESSION['officerole']);
        header('location:' . URLROOT . '/application_form.php');
    }

    public function logout2()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['phone_no']);
        unset($_SESSION['staff_no_start']);
        unset($_SESSION['role']);
        unset($_SESSION['email']);
        unset($_SESSION['runtype']);
        unset($_SESSION['officerole']);
        header('location:' . URLROOT . '/code_examiners/apply.php');
    }

    public function logout3()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['phone_no']);
        unset($_SESSION['staff_no_start']);
        unset($_SESSION['role']);
        unset($_SESSION['email']);
        unset($_SESSION['runtype']);
        unset($_SESSION['officerole']);
        header('location:' . URLROOT . '/code_examiners/print.php');
    }
}
