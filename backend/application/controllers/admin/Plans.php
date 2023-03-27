<?php

class Plans extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('Plans_model','plans');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/plans';
        
        $this->data['rows'] = $this->plans->get_rows([], '','', 'asc', 'sort_order');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/plans';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->plans->save($vals, $this->uri->segment(4));
            setMsg('success', 'Plan has been saved successfully.');
            redirect(ADMIN . '/plans', 'refresh');
            exit; 
        }
        $this->data['row'] = $this->plans->get_row_where(array('id' => $this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id) {
        $id = intval($id);
        if ($row = $this->plans->get_row($id)) {
            $this->plans->delete($this->uri->segment('4'));
            setMsg('success', 'Plan has been deleted successfully.');
            redirect(ADMIN . '/plans', 'refresh');
            exit;
        }
        else
            show_404();
    }

}

?>