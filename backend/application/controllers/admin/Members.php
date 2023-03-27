<?php

class Members extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('master');
        $this->load->model('Member_model','member');
    }

    public function index() 
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/members';
        $this->data['rows'] = $this->member->getMembers('', '', '', 'DESC');
        foreach ($this->data['rows'] as $key => $value) {
            $this->db->where('id', $value->plan_id);
            $this->data['rows'][$key]->plan_details = $this->db->get('plans')->row();
        }

        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function manage() 
    {
        $this->data['pageView'] = ADMIN . '/members';
        
        if ($this->input->post()) {
            $vals = $this->input->post();
            // if($this->form_validation->run() === FALSE) {
            //     setMsg('error', validation_errors());
            //     redirect(ADMIN . '/members/manage/' . $this->uri->segment(4), 'refresh');
            // }

            if (($_FILES["mem_image"]["name"] != "")) {
                $this->remove_file($this->uri->segment(4), 'mem_image');
                $image = upload_file(UPLOAD_PATH . 'members', 'mem_image');
                if (!empty($image['file_name'])) {
                    $vals['mem_image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image['file_name'], 100, 'thumb_');
                    generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image['file_name'], 300, '300p_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/members/manage/' . $this->uri->segment(4), 'refresh');
                }
            }

            if($vals['mem_type'] == 'candidate'){
                $save_data = [
                    'mem_status' => $vals['mem_status'],
                    'mem_verified' => $vals['mem_verified'],
                    'mem_pswd' => doEncode($vals['mem_pswd']),
                    'mem_fname' => ucfirst($vals['mem_fname']),
                    'mem_lname' => ucfirst($vals['mem_lname']),
                    'mem_email' => $vals['mem_email'],
                    'mem_phone' => $vals['mem_phone'],
                    'profession' => $vals['profession'],
                    'mem_experience' => $vals['mem_experience'],
                    'mem_country' => $vals['mem_country'],
                    'mem_city' => $vals['mem_city'],
                    'mem_zip' => $vals['mem_zip'],
                ];
                if(isset($vals['mem_image'])){
                    $save_data['mem_image'] = $vals['mem_image'];
                }

                $mem_id = $this->member->save($save_data,$this->uri->segment(4)); 

                $profession_details = [
                    'professional_summary' => $vals['mem_professional_summary'],
                    'skills' => $vals['skills'],
                    'min_price' => $vals['min_price'],
                    'max_price' => $vals['max_price'],
                    'education' => $vals['mem_education'],
                ];
                $this->db->where('mem_id', $this->uri->segment(4));
                $this->db->update('mem_profession_details', $profession_details);
                setMsg('success', 'Member has been saved successfully.');
                redirect(ADMIN . '/members', 'refresh');    
            }else{
                $vals['mem_pswd'] = doEncode($vals['mem_pswd'] );
                $mem_id = $this->member->save($vals,$this->uri->segment(4));
                setMsg('success', 'Member has been saved successfully.');
                redirect(ADMIN . '/members', 'refresh');
            }


 
                
            // $vals['mem_pswd'] = doEncode($vals['mem_pswd'] );
             
            // if (($_FILES["mem_image"]["name"] != "")) {
            //     $this->remove_file($this->uri->segment(4), 'mem_image');
            //     $image = upload_file(UPLOAD_PATH . 'members', 'mem_image');
            //     if (!empty($image['file_name'])) {
            //         $vals['mem_image'] = $image['file_name'];
            //         generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image['file_name'], 100, 'thumb_');
            //         generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image['file_name'], 300, '300p_');
            //     } else {
            //         setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
            //         redirect(ADMIN . '/members/manage/' . $this->uri->segment(4), 'refresh');
            //     }
            // }
            // $mem_id = $this->member->save($vals,$this->uri->segment(4));
            // setMsg('success', 'Member has been saved successfully.');
            // redirect(ADMIN . '/members', 'refresh');
        }

        $this->data['row'] = $this->member->getMember($this->uri->segment('4'));
        if($this->data['row']->mem_type == 'candidate'){
            $this->db->where('mem_id', $this->uri->segment('4'));
            $this->data['mem_profession_details'] = $this->db->get('mem_profession_details')->row();
        }
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function plan_details() 
    {
        $this->data['pageView'] = ADMIN . '/plan_details';
        $this->data['plan'] = $this->member->getPlanDetails($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function active() 
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '1';
        $this->member->save($vals,$mem_id);
        setMsg('success', 'Member has been activated successfully.');
        redirect(ADMIN . '/members', 'refresh');
    }
    function inactive() 
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '0';
        $this->member->save($vals,$mem_id );

        setMsg('success', 'Member has been deactivated successfully.');
        redirect(ADMIN . '/members', 'refresh');
    }
    function delete() 
    {
        $this->remove_file($this->uri->segment(4));
        $this->member->delete($this->uri->segment('4'));
        setMsg('success', 'Member has been deleted successfully.');
        redirect(ADMIN . '/members', 'refresh');
    }

    function remove_file($id, $type = '') 
    {
        $arr = $this->member->getMember($id);
        $filepath = "./" . SITE_IMAGES . "/members/" . $arr->mem_image;
        $filepath_thumb = "./" . SITE_IMAGES . "/members/thumb_" . $arr->mem_image;
        $filepath_thumb2 = "./" . SITE_IMAGES . "/members/300p_" . $arr->mem_image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($filepath_thumb)) {
            unlink($filepath_thumb);
        }
        if (is_file($filepath_thumb2)) {
            unlink($filepath_thumb2);
        }
        return;
    }
}
?>