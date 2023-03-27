<?php 

class Job_types extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(7);
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_types';

        $this->data['rows'] = $this->master->getRows('job_types', array(), '', '', 'desc', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_types';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_types', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Type has been saved successfully.');
            redirect(ADMIN . '/job_types', 'refresh');
        }

        $this->data['row'] = $this->master->getRow('job_types', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Type" : "Add New Job Type";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_types', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Type has been deleted successfully.');
        redirect(ADMIN . '/job_types', 'refresh');
    }

}


?>