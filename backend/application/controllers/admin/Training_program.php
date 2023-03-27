<?php

class Training_program extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('training_program_model');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/training_program';
        $this->data['rows'] = $this->training_program_model->get_rows('', '', '', 'desc');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/training_program';
        if ($this->input->post()) {
            $vals = $this->input->post();
            if (($_FILES["image"]["name"] != "")) {
                $this->remove_file($this->uri->segment(4));
                $image = upload_image(UPLOAD_PATH . "training_program/", 'image');
                if (!empty($image['file_name'])) {
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "training_program/", UPLOAD_PATH . "training_program/", $image['file_name'],100,'thumb_');
                    generate_thumb(UPLOAD_PATH . "training_program/", UPLOAD_PATH . "training_program/", $image['file_name'],200,'200p_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/training_program/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            $this->training_program_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Trainer has been saved successfully.');
            redirect(ADMIN . '/training_program', 'refresh');
            exit;
        }
        $this->data['row'] = $this->training_program_model->get_row_where(array('id' => $this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id) {
        $id = intval($id);
        if ($row = $this->training_program_model->get_row($id)) {
            $this->training_program_model->delete($this->uri->segment('4'));
            setMsg('success', 'Trainer has been deleted successfully.');
            redirect(ADMIN . '/training_program', 'refresh');
            exit;
        }
        else
            show_404();
    }

    function remove_file($id) {
        $arr = $this->training_program_model->get_row($id);

        $filepath = "./" . UPLOAD_PATH . "/training_program/" . $arr->image;
        $filepath_thumb = "./" . UPLOAD_PATH . "/training_program/thumb_" . $arr->image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($filepath_thumb)) {
            unlink($filepath_thumb);
        }
        return;
    }

}

?>