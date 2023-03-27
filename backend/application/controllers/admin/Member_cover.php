<?php

class Member_cover extends Admin_Controller {

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
        $this->data['pageView'] = ADMIN . '/member_cover';
        $this->data['rows'] = $this->master->getRows('mem_cover', ['status'=> 1], '','', 'desc', 'cover_id');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function detail() 
    {
        $this->data['pageView'] = ADMIN . '/member_cover';
        $cover_id = $this->uri->segment(4);
		$this->data['cover']      = $this->master->getRow('mem_cover', ['cover_id'=> $cover_id]);
		$this->data['paragraphs'] = $this->master->getRows('cover_paragraphs', ['cover_id'=> $cover_id]);
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
        //     setMsg('success', 'Member Cover has been saved successfully.');
        //     redirect(ADMIN . '/member_cover', 'refresh');
        // }

        // $this->data['row'] = $this->member->getMember($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function active() 
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '1';
        $this->member->save($vals,$mem_id);
        setMsg('success', 'Member Cover has been activated successfully.');
        redirect(ADMIN . '/member_cover', 'refresh');
    }
    function inactive() 
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '0';
        $this->member->save($vals,$mem_id );

        setMsg('success', 'Member Cover has been deactivated successfully.');
        redirect(ADMIN . '/member_cover', 'refresh');
    }
    function delete() 
    {
        $this->remove_file($this->uri->segment(4));
        $this->master->delete('video_interview','id', $this->uri->segment(4));
        setMsg('success', 'Member Cover has been deleted successfully.');
        redirect(ADMIN . '/member_cover', 'refresh');
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
