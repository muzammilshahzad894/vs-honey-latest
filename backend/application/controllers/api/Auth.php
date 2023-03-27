<?php
class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('Member_model', 'member');
        $this->load->model('Pages_model', 'page');
    }

    function sign_up()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[2]|max_length[20]', 
                [
                    'alpha' => 'First Name should contains only letters and avoid space.',
                    'min_length' => 'First Name should contains atleast 2 letters.',
                    'max_length' => 'First Name should not be greater than 20 letters.'
                ]);
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[2]|max_length[20]', 
                [
                    'alpha' => 'Last Name should contains only letters and avoid space.',
                    'min_length' => 'Last Name should contains atleast 2 letters.',
                    'max_length' => 'Last Name should not be greater than 20 letters.'
                ]);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[members.mem_email]', 
                [
                    'valid_email' => 'Please enter a valid email.',
                    'is_unique' => 'This email is already in use.'
                ]);
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', 
                [
                    'min_length' => 'Password should be atleast 6 characters long.'
                ]);
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]', 
                [
                    'matches' => 'Your passwords do no match.'
                ]);

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());
                $rando = doEncode(rand(99, 999) . '-' . $post['email']);
                $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

                // if (isset($_FILES["document"]["name"]) && $_FILES["document"]["name"] != "") {
                //     $image = upload_file(UPLOAD_PATH . 'members', 'document', 'file');
                //     $mem_cv = $image['file_name'];
                // }

                $save_data = [
                    'mem_fname' => ucfirst($post['fname']),
                    'mem_lname' => ucfirst($post['lname']),
                    'mem_email' => $post['email'],
                    // 'mem_phone' => $post['phone'],
                    'mem_pswd'  => doEncode($post['password']),
                    // 'mem_language'      => $post['language'],
                    // 'mem_ethnicity'     => $post['ethnicity'],
                    // 'mem_sex'           => $post['sexual'],
                    // 'mem_disablity'     => $post['disability'],
                    // 'mem_nationality'   => $post['nationality'],
                    // 'mem_current_status'=> $post['edu_current'],
                    // 'mem_university'    => $post['edu_uni'],
                    // 'mem_subject'       => $post['edu_degree'],
                    // 'mem_graduate_year' => $post['edu_graduation'],
                    // 'mem_opportunity'   => $post['job_type'],
                    // 'mem_industry'      => $post['sector'],
                    // 'mem_cv'            => $mem_cv,
                    'mem_code'          => $rando,
                    'mem_status'        => 1,
                    'mem_last_login'    => date('Y-m-d h:i:s')
                ];
                $mem_id = $this->member->save($save_data);
                // $this->session->set_userdata('mem_id', $mem_id);
                // $this->session->set_userdata('mem_type', $as);


                // $verify_link = site_url('verification/' . $rando);
                // $mem_data = array('name' => ucfirst($post['firstName']) . ' ' . ucfirst($post['lasName']), "email" => $post['email'], "link" => $verify_link);
                // $this->send_site_email($mem_data, 'signup');

                $res['authToken'] = doEncode('auth_'.$mem_id);
                $res['mem'] = ucfirst($post['fname']).' '.ucfirst($post['lname']);
                if($mem_id)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function sign_up_candidate()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[2]|max_length[20]', 
                [
                    'alpha' => 'First Name should only contain letters and avoid space.',
                    'min_length' => 'First Name should contains atleast 2 letters.',
                    'max_length' => 'First Name should not be greater than 20 letters.'
                ]);
            // $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[2]|max_length[20]', 
            //     [
            //         'alpha' => 'Last Name should only contain letters and avoid space.',
            //         'min_length' => 'Last Name should contains atleast 2 letters.',
            //         'max_length' => 'Last Name should not be greater than 20 letters.'
            //     ]);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_is_email_exists', 
                [
                    'valid_email' => 'Please enter a valid email.',
                    'is_email_exists' => 'This email is already in use.'
                ]);
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', 
                [
                    'min_length' => 'Password should be atleast 6 characters long.'
                ]);
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]', 
                [
                    'matches' => 'Your passwords do no match.'
                ]);

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = $this->input->post();

				# 6 OTP CODE AND EXPIRE TIME 
                $six_digit_random_number = random_int(100000, 999999);
                $expire_time = date('Y-m-d H:i:s', strtotime('+12 hours'));
                
				# IF NON VERIFIED MEMBER THEN UPDATE INFO AND OTP AND SEND SEND FOR VERIFICATION
				$mem = null;
				$mem_id = null;
				$mem = $this->member->getNonVerifiedUser(trim($post['email']));

				if($mem)
				{
					$mem_id = $mem->mem_id;
				}

                $save_data = [
                    'mem_fname' => ucfirst($post['fname']),
                    'mem_lname' => ucfirst($post['lname']),
                    'mem_email' => $post['email'],
                    'mem_phone' => $post['phone'],
                    'profession' => $post['profession'],
                    'mem_experience' => $post['experience'],
                    'mem_country' => $post['country'],
                    'mem_city' => $post['city'],
                    'mem_zip' => $post['zip'],
                    'mem_pswd'  => doEncode($post['password']),
                    'mem_verification_code'  => $six_digit_random_number,
                    'mem_code_expire'   => $expire_time,
					'mem_type'          => 'candidate',
                    'mem_last_login'    => date('Y-m-d h:i:s')
                ];
                if($_FILES['image']['name'] != ''){
                    $image1 = upload_file(UPLOAD_PATH.'members/', 'image');
                        generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image1['file_name'],100,'thumb_');
                    $save_data['mem_image'] = $image1['file_name'];
                }
                else{
                    $save_data['mem_image'] = '';
                }
                $mem_id = $this->member->save($save_data, $mem_id);

                $skills = implode(',', $post['skills']);
                $skills = htmlspecialchars_decode($skills);
                $skills = str_replace('"', '', $skills);
                if($_FILES['cv']['name'] != ''){
                    $cv = upload_file(UPLOAD_PATH.'members/resume/', 'cv');
                    $cv = $cv['file_name'];
                }
                else{
                    $cv = '';
                }
                $profession_details = [
                    'mem_id' => $mem_id,
                    'professional_summary' => $post['summary'],
                    'skills' => $skills,
                    'min_price' => $post['minPrice'],
                    'max_price' => $post['maxPrice'],
                    'resume' => $cv,
                    'orignal_resuma_name'=> $_FILES['cv']['name'],
                    'education' => $post['degree'],
                    'second_activity_field' => $post['second_activity_field'],
                ];
                $this->db->insert('mem_profession_details', $profession_details);

                $email_info = array('name' => ucfirst($post['fname']) . ' ' . ucfirst($post['lname']), "email" => $post['email'], "code" => $six_digit_random_number);

                $email_template = $this->master->getRow('email_templates', array('page_name' => 'verify_code_template'));
                $email_info['email_template'] = $email_template;
                $this->send_signup_code($email_info);

                $res['email'] = trim($post['email']);
                if($mem_id)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function sign_up_employer()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required', 
                [
                    'required' => 'Company Name is required.'
                ]);
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_is_email_exists', 
                    [
                        'required' => 'Email is required.',
                        'valid_email' => 'Please enter a valid email',
                        'is_email_exists' => 'This email is already in use.'
                    ]);
            $this->form_validation->set_rules('address', 'Address', 'trim|required', 
                [
                    'required' => 'Address is required.'
                ]);
            $this->form_validation->set_rules('province', 'Province', 'trim|required', 
                [
                    'required' => 'Province is required.'
                ]);
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[20]', 
                [
                    'required' => 'First Name is required.',
                    'min_length' => 'First Name should not be greater than 20 characters.',
                ]);
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[20]', 
                [
                    'required' => 'Last Name is required.',
                    'min_length' => 'Last Name should not be greater than 20 characters.',
                ]);
            // $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]', 
            //     [
            //         'required' => 'Title is required.',
            //         'min_length' => 'Title should be greater than atleast 2 characters.',
            //     ]);
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required', 
            [
                'required' => 'Phone is required.'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', 
                [
                    'required' => 'Password is required.',
                    'min_length' => 'Password should be atleast 8 characters long.'
                ]);
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]', 
                [
                    'matches' => 'Your passwords does no match.'
                ]);

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());

				# 6 OTP CODE AND EXPIRE TIME 
                $six_digit_random_number = random_int(100000, 999999);
                $expire_time = date('Y-m-d H:i:s', strtotime('+12 hours'));
                
				# IF NON VERIFIED MEMBER THEN UPDATE INFO AND OTP AND SEND SEND FOR VERIFICATION
				$mem = null;
				$mem_id = null;
				$mem = $this->member->getNonVerifiedUser(trim($post['email']));

				if($mem)
				{
					$mem_id = $mem->mem_id;
				}

                // $name = explode(' ', trim($post['full_name']));

                $mem_image = '';
                if($_FILES['image']['name'] != ''){
                    $image1 = upload_file(UPLOAD_PATH.'members/', 'image');
                        generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image1['file_name'],100,'thumb_');
                    $mem_image = $image1['file_name'];
                }
                else{
                    $mem_image = '';
                }
                $save_data = [
                    'mem_reference_number' => trim($post['reference_num']),
                    'mem_company' => trim($post['company_name']),
                    'mem_email' => trim($post['email']),
                    'mem_address' => trim($post['address']),
                    'mem_province' => trim($post['province']),
                    'mem_website' => trim($post['website']),
                    // 'mem_fname' => ucfirst($name[0]),
                    // 'mem_lname' => ucfirst($name[1]),
                    'mem_fname' => trim($post['fname']),
                    'mem_lname' => trim($post['lname']),
                    // 'mem_title' => trim($post['title']),
                    'mem_phone' => trim($post['phone']),
                    'mem_facebook_link' => trim($post['facebook_link']),
                    'mem_twitter_link' => trim($post['twitter_link']),
                    'mem_instagram_link' => trim($post['instagram_link']),
                    'mem_linkedin_link' => trim($post['linkedin_link']),
                    'mem_company_description' => trim($post['company_description']),
                    'mem_pswd'  => doEncode($post['password']),
                    'mem_verification_code'  => $six_digit_random_number,
                    'mem_code_expire'   => $expire_time,
					'mem_type'          => 'employer',
                    'mem_last_login'    => date('Y-m-d h:i:s'),
                    'plan_id'           => doDecode($post['planId']),
                    'mem_image'         => $mem_image,
                ];

                $mem_id = $this->member->save($save_data, $mem_id);
                $plan_detail = $this->master->getRow('plans', ['id' => doDecode($post['planId'])]);
                $mem_plan_details = [
                    'mem_id' => $mem_id,
                    'plan_id' => doDecode($post['planId']),
                    'plan_start_date' => date('Y-m-d'),
                    'plan_end_date' => date('Y-m-d', strtotime('+'.$plan_detail->no_of_days.' days')),
                ];
                $this->db->insert('mem_plan_details', $mem_plan_details);

                $email_info = array('name' => ucfirst(ucfirst($name[0])) . ' ' . ucfirst(ucfirst($name[1])), "email" => trim($post['email']), "code" => $six_digit_random_number);
                $email_template = $this->master->getRow('email_templates', array('page_name' => 'verify_code_template'));
                $email_info['email_template'] = $email_template;

                $this->send_signup_code($email_info);

                $res['email'] = trim($post['email']);
                if($mem_id)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function verify_email()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $this->form_validation->set_rules('code', 'Code', 'trim|required', 
                [
                    'required' => 'Verification code is required.'
                ]);

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());
                $code = trim($post['code']);
                $email = trim($post['email']);
                $mem = $this->master->getRow('members', ['mem_verification_code'=> $code, 'mem_email'=> $email, 'mem_verified'=> 0]);
                if(count((array)$mem) > 0)
                {
                    $current_time = strtotime(date('Y-m-d H:i:s'));
                    $expire_time = strtotime($mem->mem_code_expire);
                    if($current_time > $expire_time)
                    {
                        $res['validationErrors'] = '<p>Verification code has expired.</p>';
                        $res['status'] = 0; 
                    }
                    else
                    {
                        $save_data = 
                        [
                            'mem_verification_code' => NULL,
                            'mem_verified' => 1,
                            'mem_last_login'    => date('Y-m-d h:i:s')
                        ];
                        $mem_id = $this->member->save($save_data, $mem->mem_id, 'mem_id');
        
        
                        $email_data = array('name' => $mem->mem_fname . ' ' . $mem->mem_lname, "email" => $mem->mem_email);
                        $this->send_verification_confirmation($email_data);
        
                        
                        $res['authToken'] =  $this->createAuthToken($mem, $this->input->ip_address());
                        $res['mem_type'] = $mem->mem_type;
                        $res['mem'] = $mem->mem_fname . ' ' . $mem->mem_lname;
                        if($mem_id)
                        {
                            $res['status'] = 1;
                        }
                    }
                }
                else
                {
                    $res['validationErrors'] = '<p>Invalid or expired verification code.</p>';
                    $res['status'] = 0;
                } 
            }
            echo json_encode($res);
            exit;
        }
    }

    function sign_in()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $data = $this->input->post();

                $checkEmailExist = $this->member->authenticateEmail($data['email']);

                if(count((array)$checkEmailExist))
                {
                    $row = $this->member->authenticate($data['email'], $data['password']);
                    if (count((array)$row) > 0) {
                        if ($row->mem_status == 0) {
                            $res['status'] = 0;
                            $res['validationErrors'] = '<p>Your account has been deactivated by the admin.</p>';
                        }
                        else
                        {
                            $this->member->save(['mem_first_time_login' => 'no'], $row->mem_id);
                            $this->member->update_last_login($row->mem_id, $remember_token);
                            $res['authToken'] = $this->createAuthToken($row, $this->input->ip_address());
                            $res['mem_type'] = $row->mem_type;
                            $res['mem'] = $row->mem_fname . ' ' . $row->mem_lname;
                            $res['status'] = 1;
                        }
                    } else {
                        $res['status'] = 0;
                        $res['validationErrors'] = '<p>Incorrect email or password.</p>';
                    }
                }
                else
                {
                    $res['status'] = 0;
                    $res['validationErrors'] = '<p>Account does not exist.</p>';
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function forgot_password()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $res['notExist'] = 0;

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            } else {
                $post = $this->input->post();
                if ($mem = $this->member->forgotEmailExists($post['email'])) {
                    $rando = doEncode(randCode(rand(15, 20)));
                    $this->master->save('members', array('mem_code' => $rando), 'mem_id', $mem->mem_id);

                    // $reset_link = site_url('reset/' . $rando);
                    $reset_link = $this->data['site_settings']->site_domain.'reset-password/' . $rando;
                    $mem_data = array('name' => $mem->mem_fname, "email" => $mem->mem_email, "link" => $reset_link);

                    $email_template = $this->master->getRow('email_templates', array('page_name' => 'password_reset_link_template'));
                    $mem_data['email_template'] = $email_template;
                    $this->send_password_reset_link($mem_data);

                    // $res['msg'] = showMsg('success', 'We’ve sent a reset password link to the email address you entered to reset your password. If you don’t see the email, check your spam folder or email.');
                    $res['status'] = 1;
                    // $res['frm_reset'] = 1;
                } else {
                    // $res['msg'] = '<p>No such email address exists. Please try again.</p>';
                    $res['status'] = 0;
                    $res['notExist'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function reset_password()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $res['notExist'] = 0;

            // pr($this->input->post());
            
            $mem_id = '';
            if ($row = $this->member->getMemCode($this->input->post('token'))) {
                $mem_id = $row->mem_id;
            } else {
                $res['notExist'] = 1;
                echo json_encode($res);
                exit;
            }


            $this->form_validation->set_rules('password', 'New Password', 'required|min_length[8]|callback_is_password_strong', ['is_password_strong' => 'Password should contain at least one upper case letter, one lower case letter, one number and one special character.']);
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]', ['matches' => 'Confirm password must be the as the password.']);
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $this->member->save(array('mem_pswd' => doEncode($post['password'])), $mem_id);
                $this->member->save(array('mem_code' => ''), $mem_id);

                $mem_data = array('name' => $row->mem_fname, "email" => $row->mem_email);
                $email_template = $this->master->getRow('email_templates', array('page_name' => 'email_password_reset_success_template'));
                $mem_data['email_template'] = $email_template;
                $this->send_password_reset_successful($mem_data);


                $res['status'] = 1;
            }
            echo json_encode($res);
            exit;
        }
    }


    ### callback functions
    public function is_password_strong($password)
    {
        $whiteListedSpecial = "\$\@\#\^\|\!\~\=\+\-\_\.";
        if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password) && preg_match('/[' . $whiteListedSpecial . ']/', $password)) {
            return TRUE;
        }
        return FALSE;
    }

    public function is_email_exists($email)
    {
        $email = $this->master->getRow('members', ['mem_email'=> $email, 'mem_verified'=> 1]);
		if(empty($email))
		{
			return TRUE;	
		}
		return FALSE;
    }

    public function check_paid_account(){
        if($this->input->post())
        {
            $post = $this->input->post();
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);
            $plan_paid_status = $this->member->get_plan_paid_status($mem_id);
            echo json_encode($plan_paid_status);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

}
