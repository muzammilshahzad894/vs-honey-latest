<?php
class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('Member_model', 'member');
        $this->load->model('Pages_model', 'page');
    }

    function dashboard()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $token = explode('_', doDecode($post['token']));
            $mem_id = $token[1];
            $this->data['page_title'] = 'Dashboard'.' - '.$this->data['site_settings']->site_name;
            $this->data['jobs'] = $this->member->getSavedJobs($mem_id);
            http_response_code(200);
            echo json_encode($this->data);
            exit;
        }
        else
        {
            http_response_code(404);
            exit;
        }
    }

    function profile_settings()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $token = explode('_', doDecode($post['token']));
            $mem_id = $token[1];
            $this->data['page_title'] = 'Profile Settings'.' - '.$this->data['site_settings']->site_name;
            $this->data['mem'] = $this->member->getMember($mem_id);
            http_response_code(200);
            echo json_encode($this->data);
            exit;
        }
        else
        {
            http_response_code(404);
            exit;
        }
    }

    function save_profile_settings()
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
            $this->form_validation->set_rules('phone', 'Email', 'trim|required');
            // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[members.mem_email]', 
            //     [
            //         'valid_email' => 'Please enter a valid email.',
            //         'is_unique' => 'This email is already in use.'
            //     ]);
            $this->form_validation->set_rules('language', 'Language', 'trim|required');
            // $this->form_validation->set_rules('ethnicity', 'Ethnicity', 'trim|required');
            // $this->form_validation->set_rules('sexual', 'Sexual Orientation', 'trim|required');
            $this->form_validation->set_rules('nationality', 'Nationality', 'trim|required');
            $this->form_validation->set_rules('edu_current', 'Current Status', 'trim|required');
            $this->form_validation->set_rules('edu_uni', 'University', 'trim|required');
            $this->form_validation->set_rules('edu_degree', 'Degree Subject', 'trim|required');
            $this->form_validation->set_rules('edu_graduation', 'Graduation Year', 'trim|required');
            $this->form_validation->set_rules('job_type', 'Opportunity Type', 'trim|required');
            $this->form_validation->set_rules('sector', 'Industry/Sector', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());
                $token = explode('_', doDecode($post['authToken']));
                $mem_id = $token[1];
                // $rando = doEncode(rand(99, 999) . '-' . $post['email']);
                // $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

				$save_data = [
                    'mem_fname' => ucfirst($post['fname']),
                    'mem_lname' => ucfirst($post['lname']),
                    'mem_phone' => $post['phone'],
                    'mem_language'      => $post['language'],
                    'mem_disablity'     => $post['disability'],
                    'mem_nationality'   => $post['nationality'],
                    'mem_current_status'=> $post['edu_current'],
                    'mem_university'    => $post['edu_uni'],
                    'mem_subject'       => $post['edu_degree'],
                    'mem_graduate_year' => $post['edu_graduation'],
                    'mem_opportunity'   => $post['job_type'],
                    'mem_industry'      => $post['sector']

                ];

                if (isset($_FILES["profile"]["name"]) && $_FILES["profile"]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH . 'members', 'profile');
					generate_thumb(UPLOAD_PATH.'members/',UPLOAD_PATH.'members/',$image['file_name'],100,'thumb_');
                    $save_data['mem_image'] = $image['file_name'];
                }

                if (isset($_FILES["document"]["name"]) && $_FILES["document"]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH . 'members', 'document', 'file');
                    $save_data['mem_cv'] = $image['file_name'];
                }



                $mem_id = $this->member->save($save_data, $mem_id);
                // $this->session->set_userdata('mem_id', $mem_id);
                // $this->session->set_userdata('mem_type', $as);


                // $verify_link = site_url('verification/' . $rando);
                // $mem_data = array('name' => ucfirst($post['firstName']) . ' ' . ucfirst($post['lasName']), "email" => $post['email'], "link" => $verify_link);
                // $this->send_site_email($mem_data, 'signup');

                if($mem_id)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function save_job_stat()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $this->master->save('saved_jobs', [$post['field'] => $post['value']], 'id', $post['saved_id']);
            $token = explode('_', doDecode($post['token']));
            $mem_id = $token[1];
            $res['jobs'] = $this->member->getSavedJobs($mem_id);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function change_password()
    {
        if ($this->input->post()) {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';

            $this->form_validation->set_rules('pass', 'Current Password', 'required');
            $this->form_validation->set_rules('new_pass', 'New Password', 'required');
            $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|matches[new_pass]');

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $token = explode('_', doDecode($post['authToken']));
                $mem_id = $token[1];
                $row = $this->member->oldPswdCheck($mem_id, $post['pass']);
                if (count($row) > 0) {
                    $ary = array('mem_pswd' => doEncode($post['new_pass']));
                    $this->member->save($ary, $mem_id);

                    $res['status'] = 1;
                } else {
                    $res['status'] = 0;
                    $res['validationErrors'] = '<p>Old Password Does Not Match.</p>';
                }
            }
            exit(json_encode($res));
        }
    }

    public function create_payment_intent()
    {
        $res = array();
        $res['hide_msg'] = 0;
        $res['scroll_top'] = 0;


        // $this->form_validation->set_rules('plan_id','Plan', 'required', ['required'=>'Please select a plan.']);
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // $this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|required');
        // if($this->form_validation->run()===FALSE)
        // {
        //     $res['msg'] = validation_errors();
        //     $res['status'] = 0;
        //     $res['scroll_top']= 1;
        // }
        // else
        // {
            $start_date = date('Y-m-d h:i:s');
            $end_date = date("Y-m-d h:i:s", strtotime("+1 month", strtotime($start_date)));

            $plan_id = doDecode($this->input->post('plan_id'));
            $plan = $this->master->getRow('plans', ['id'=> $plan_id]);

            if(empty($plan)){
                $res['msg']="Plan is not right.Something went wrong!";
                $res['status']=0;
                exit(json_encode($res));
            }
            // pr($plan);
            $vals = $this->input->post();

            $mem_id = $this->page->get_member_id_by_token($vals['token']);

            $mem = $this->master->getRow('members', ['mem_id'=> $mem_id]);
            $mem_plan_details = $this->master->getRow('mem_plan_details', ['mem_id'=> $mem_id]);

            if($mem_plan_details->plan_buy_status == 'true'){
                $res['msg']="You have already subscribed a plan.";
                $res['status']=0;
                exit(json_encode($res));
            }


            $plan_product_id = $plan->stripe_id;

            if(empty($plan_product_id)){
                $res['msg']="Technical problem about subscribe plan!";
                $res['status']=0;
                exit(json_encode($res));
            }
            
            $this->load->library('My_stripe');

                // $customer_email = $this->master->getRow('subscribed_plans', ['mem_email'=> $vals['mem_email']]);
                // if(!empty($customer_email))
                // {
                //     $res['msg']    = "You have already subscribed a plan, please contact to admin!";
                //     $res['status'] = 0;
                //     exit(json_encode($res));
                // }
                $planAmount = $plan->price;
                $total = $planAmount*100;
                $taxPercentage = $plan->tax_amount;
                $tax = ($total*$taxPercentage)/100;
                $totalAmount = $total+$tax;

                $new_plan_info = [
                    'unit_amount'=> $totalAmount,
                    'currency' => 'GBP',
                    // 'recurring' => ['interval' => 'month', 'interval_count'=> (int)$plan->plan_interval_count],
                    'recurring' => ['interval' => 'month', 'interval_count'=> 1],
                    'product' => $plan->stripe_id,
                ];

                $stripe_plan = $this->my_stripe->create_plan($new_plan_info);
                if(!empty($stripe_plan['error']))
                {
                    $res['msg']="Technical problem about subscribe plan! ".$stripe_plan['error'];
                    $res['status']=0;
                    exit(json_encode($res));
                }

                $cus_info = [
                    'name' => $mem->mem_fname.' '.$mem->mem_lname,
                    'email' => $mem->mem_email,
                    "description" => $this->data['site_settings']->site_name." Customer ".$mem->mem_fname.' '.$mem->mem_lname,
					'payment_method' => $vals['payment_method'],
                    'invoice_settings' => ['default_payment_method'=> $vals['payment_method']]
                ];


                if(empty($mem_plan_details->mem_stripe_customer_id))
                {
                    $customer_id = $this->my_stripe->save_customer($cus_info);
                    $this->master->update('mem_plan_details', ['mem_stripe_customer_id'=> $customer_id], ['mem_id'=> $mem_id]);
                }

                // if(empty($mem->mem_stripe_customer_id))
                // {
                //     $customer_id = $this->my_stripe->save_customer($cus_info);  
                //     echo 'hello';
                //     print_r($customer_id);

                //     // $card = $this->my_stripe->create_payment_method($customer_id, $vals['nonce']);
                //     // $default_payment_method = $this->my_stripe->make_defualt_payment_method($customer_id, $card->id); 
                //     $this->member->save(['mem_stripe_customer_id'=> $customer_id], $mem->mem_id);               
                // }
                else
                {
                    $stripe_fetched_customer = $this->my_stripe->get_customer($mem_plan_details->mem_stripe_customer_id);
                    if(!empty($stripe_fetched_customer->id))
                    {
                        $customer_id = $stripe_fetched_customer->id;
                    }
                    else
                    {
                        $customer_id = $this->my_stripe->save_customer($cus_info);  
                        // $card = $this->my_stripe->create_payment_method($customer_id, $vals['nonce']);
                        // $default_payment_method = $this->my_stripe->make_defualt_payment_method($customer_id, $card->id); 
                        $this->master->update('mem_plan_details', ['mem_stripe_customer_id'=> $customer_id], ['mem_id'=> $mem_id]);
                    }
                }

                $subscription = $this->my_stripe->subscribe_plan_new($customer_id, $stripe_plan->id);

                if(!empty($subscription->id))
                {
                    $this->master->update('mem_plan_details', ['stripe_plan_charge_id'=> $subscription->id, 'payment_method'=> 'stripe', 'plan_buy_status'=> 'true'], ['mem_id'=> $mem_id]);


                    $email_info = array('name' => $mem->mem_fname . ' ' . $mem->mem_lname, "email" => $mem->mem_email);
                    $email_template = $this->master->getRow('email_templates', array('page_name' => 'send_subscription_plan_successful_template'));
                    $email_info['email_template'] = $email_template;
                    $plan_detail = $this->master->getRow('plans', array('id' => $mem_plan_details->plan_id));
                    $email_info['plan_detail'] = $plan_detail;

                    $this->send_subscription_plan_successful($email_info);



					// $this->member->save(['stripe_plan_charge_id'=> $customer_id], $stripe_plan->id);  
                    $setupintent = $this->my_stripe->setupIntents([
                    	'customer' => $customer_id,
            		]);
					$res['subscriptionId'] = $subscription->id;
					$res['clientSecret'] = $subscription->latest_invoice->payment_intent->client_secret;
					$res['clientSecretSetup'] = $setupintent->client_secret;
					$res['customerId'] = $customer_id; 
                    $res['status'] =1;
                    exit(json_encode($res));
                }
                else
                {
                    $res['msg'] = 'Technical Problem! Please contact to admin.';
                    $res['status'] = 0;
                    exit(json_encode($res));
                }
            // else
            // {
            //     pr($vals);
            //     $subArr=array(
            //         'mem_id'=>$this->member->mem_id, 
            //         'plan_id'=>$row->plan, 
            //         'start_date'=>$start_date, 
            //         'end_date'=>$end_date, 
            //         'price'=>get_plan_price($plan->id,$vals['plan_type']), 
            //         'status'=>0,
            //         'txt_id' => '', 
            //         'stripe_subscription_id' => '',
            //         'payment_method'=>'paypal'
            //     );
            //     $subscribe_id = $this->master->save('subscribed_plans', $subArr);
            //     $res['redirect_url'] = site_url('pay-now/'.doEncode($subscribe_id));
            //         $res['msg']='You are redirect to paypal for payment';
            //         $res['status'] =1;
            //         $res['scroll_top']=1;
            //         $res['frm_reset']=1;
            // }
        exit(json_encode($res));
    }

}
