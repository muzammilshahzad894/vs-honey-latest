<?php

class Video_interviews extends Admin_Controller {

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
        $this->data['pageView'] = ADMIN . '/video_interviews';
        $this->data['rows'] = $this->member->getMembersInterviews();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function detail() 
    {
        $this->data['pageView'] = ADMIN . '/video_interviews';
        $interview_id = $this->uri->segment(4);
		$this->data['interview_detail'] = $this->master->getRows('video_interview_videos', ['interview_id'=> $interview_id]);
        // if ($this->input->post()) {
        //     $vals = $this->input->post();
        //     // if($this->form_validation->run() === FALSE) {
        //     //     setMsg('error', validation_errors());
        //     //     redirect(ADMIN . '/members/manage/' . $this->uri->segment(4), 'refresh');
        //     // }

                
            
        //     // if (($_FILES["mem_image"]["name"] != "")) {
        //     //     $this->remove_file($this->uri->segment(4), 'mem_image');
        //     //     $image = upload_file(UPLOAD_PATH . 'members', 'mem_image');
        //     //     if (!empty($image['file_name'])) {
        //     //         $vals['mem_image'] = $image['file_name'];
        //     //         generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image['file_name'], 100, 'thumb_');
        //     //         generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image['file_name'], 300, '300p_');
        //     //     } else {
        //     //         setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
        //     //         redirect(ADMIN . '/members/manage/' . $this->uri->segment(4), 'refresh');
        //     //     }
        //     // }
        //     $mem_id = $this->member->save($vals,$this->uri->segment(4));
        //     setMsg('success', 'Interview has been saved successfully.');
        //     redirect(ADMIN . '/video_interviews', 'refresh');
        // }

        // $this->data['row'] = $this->member->getMember($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function active() 
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '1';
        $this->member->save($vals,$mem_id);
        setMsg('success', 'Interview has been activated successfully.');
        redirect(ADMIN . '/video_interviews', 'refresh');
    }
    function inactive() 
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '0';
        $this->member->save($vals,$mem_id );

        setMsg('success', 'Interview has been deactivated successfully.');
        redirect(ADMIN . '/video_interviews', 'refresh');
    }
    function delete() 
    {
        $this->remove_file($this->uri->segment(4));
        $this->master->delete('video_interview','id', $this->uri->segment(4));
        setMsg('success', 'Interview has been deleted successfully.');
        redirect(ADMIN . '/video_interviews', 'refresh');
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
