<?php

class Email_templates extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(7);
    }

    function signup_template()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/email_templates';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['page_name'] = $this->uri->segment('3');
            $row = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
            if ($row) {
                $this->master->update('email_templates', $vals, array('page_name' => $this->uri->segment('3')));
                setMsg('success', 'Email Template has been updated successfully.');
            } else {
                $this->master->save('email_templates', $vals);
                setMsg('success', 'Email Template has been added successfully.');
                
            }
            redirect(ADMIN . '/email_templates/' . $this->uri->segment('3'));
        }

        $this->data['row'] = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Email Template" : "Add New Email Template";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function verify_code_template()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/verify_code_template';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['page_name'] = $this->uri->segment('3');
            $row = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
            if($row){
                $this->master->update('email_templates', $vals, array('page_name' => $this->uri->segment('3')));
                setMsg('success', 'Email Template has been updated successfully.');
            }else {
                $this->master->save('email_templates', $vals);
                setMsg('success', 'Email Template has been added successfully.');
            }
            redirect(ADMIN . '/email_templates/' . $this->uri->segment('3'));

        }

        $this->data['row'] = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Verify Code Email Template" : "Add Verify Code Email Template";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function password_reset_link_template()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/password_reset_link_template';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['page_name'] = $this->uri->segment('3');
            $row = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
            if($row){
                $this->master->update('email_templates', $vals, array('page_name' => $this->uri->segment('3')));
                setMsg('success', 'Email Template has been updated successfully.');
            }else {
                $this->master->save('email_templates', $vals);
                setMsg('success', 'Email Template has been added successfully.');
            }
            redirect(ADMIN . '/email_templates/' . $this->uri->segment('3'));

        }

        $this->data['row'] = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Password Reset Link Email Template" : "Add Password Reset Link Email Template";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }


    function email_password_reset_success_template()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/email_password_reset_success_template';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['page_name'] = $this->uri->segment('3');
            $row = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
            if($row){
                $this->master->update('email_templates', $vals, array('page_name' => $this->uri->segment('3')));
                setMsg('success', 'Email Template has been updated successfully.');
            }else {
                $this->master->save('email_templates', $vals);
                setMsg('success', 'Email Template has been added successfully.');
            }
            redirect(ADMIN . '/email_templates/' . $this->uri->segment('3'));

        }

        $this->data['row'] = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Password Reset Success Email Template" : "Add Password Reset Success Email Template";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function send_subscription_plan_successful_template()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/send_subscription_plan_successful_template';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['page_name'] = $this->uri->segment('3');
            $row = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
            if($row){
                $this->master->update('email_templates', $vals, array('page_name' => $this->uri->segment('3')));
                setMsg('success', 'Email Template has been updated successfully.');
            }else {
                $this->master->save('email_templates', $vals);
                setMsg('success', 'Email Template has been added successfully.');
            }
            redirect(ADMIN . '/email_templates/' . $this->uri->segment('3'));

        }

        $this->data['row'] = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Subscription Plan Successful Email Template" : "Add Subscription Plan Successful Email Template";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function  send_subscription_cancellation_successful()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/send_subscription_cancellation_successful';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['page_name'] = $this->uri->segment('3');
            $row = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
            if($row){
                $this->master->update('email_templates', $vals, array('page_name' => $this->uri->segment('3')));
                setMsg('success', 'Email Template has been updated successfully.');
            }else {
                $this->master->save('email_templates', $vals);
                setMsg('success', 'Email Template has been added successfully.');
            }
            redirect(ADMIN . '/email_templates/' . $this->uri->segment('3'));

        }

        $this->data['row'] = $this->master->getRow('email_templates', array('page_name' => $this->uri->segment('3')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Subscription Plan Successful Email Template" : "Add Subscription Plan Successful Email Template";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

}

?>