<?php

class Jobs extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        // $this->load->model('newsletter_model');
        $this->load->model('Pages_model', 'page');
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/jobs';
        $this->data['blogs'] = $this->master->get_data_rows('jobs', [], 'desc');
        foreach ($this->data['blogs'] as $key => $blog) {
            $saved_job = $this->master->getRow('saved_jobs', ['job_id' => $blog->id]);
            $mem_id = $saved_job->mem_id;
            $member = $this->master->getRow('members', ['mem_id' => $mem_id]);
            $this->data['blogs'][$key]->member_name = $member->mem_fname . ' ' . $member->mem_lname;
        }
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    } 

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/jobs';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->get_data_row('jobs', array('id'=>$this->uri->segment(4)));
            if($vals['is_featured'] == $content_row->is_featured){
                $vals['is_featured'] = $content_row->is_featured;
                $vals['featured_date'] = $content_row->featured_date;
            }else{
                $vals['is_featured'] = $vals['is_featured'];
                $vals['featured_date'] = date('Y-m-d h:i:s');
            }
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image1 = upload_file(UPLOAD_PATH.'jobs/', 'image');
                    generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],100,'thumb_');
                $vals['image']=$image1['file_name'];
            }
            else{
                $vals['image']=$content_row->company_logo;
            }

            $created_date="";
            if(empty($content_row->created_date)){
                $created_date=date('Y-m-d h:i:s');
            }
            else{
                $created_date=$content_row->created_date;
            }
            $values=array(
                'title'=>$vals['title'],
                'job_cat'=>$vals['job_category'],
                'job_type'=>$vals['job_type'],
                'job_level'=>$vals['job_level'],
                'company_name'=>$vals['company_name'],
                'company_link'=>$vals['company_link'],
                'min_salary'=>$vals['min_salary'],
                'max_salary'=>$vals['max_salary'],
                'min_working_hour'=>$vals['min_working_hour'],
                'max_working_hour'=>$vals['max_working_hour'],
                'job_office_type'=>$vals['job_office_type'],
                'company_logo'=>$vals['image'],
                'status'=>$vals['status'],
                'is_featured'=>$vals['is_featured'],
                'featured_date'=>$vals['featured_date'],
                'created_date'=>$created_date,
            );

            $id = $this->master->save('jobs', $values, 'id', $this->uri->segment(4));
            if($id > 0){
                setMsg('success', 'Job has been saved successfully.');
                redirect(ADMIN . '/jobs', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('jobs',array('id'=>$this->uri->segment('4')));
        $this->data['categories'] = $this->master->get_data_rows('job_categories', ['status'=> 1], 'asc', 'title');
        $this->data['job_types'] = $this->master->get_data_rows('job_types', ['status'=> 1], 'asc', 'title');
        $this->data['levels'] = $this->master->get_data_rows('job_levels', ['status'=> 1], 'asc', 'title');
        $this->data['locations'] = $this->master->get_data_rows('job_locations', ['status'=> 1], 'asc', 'title');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);        
    }

	function upload_bulk()
	{
		if(isset($_FILES) && !empty($_FILES['jobsFile']['name']))
		{
			$file = $_FILES['jobsFile'];
			$extension = explode('.', $file['name']);
			if($extension[1] === 'csv')
			{
				$row = 0;
				if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						if(++$row === 1)
						{
							continue;
						}
						else
						{
							$insert = [];
							if(!empty(trim($data[0])) 
								&& !empty(trim($data[1]))
							 	&& !empty(trim($data[3]))
							 	&& !empty(trim($data[4]))
							 	&& !empty(trim($data[5]))
							 	&& !empty(trim($data[6]))
							 	&& !empty(trim($data[7]))
							 	&& !empty(trim($data[8]))
							 	&& !empty(trim($data[9]))
							 	&& !empty(trim($data[10]))
							 	&& !empty(trim($data[11]))
							 	&& !empty(trim($data[12]))
							 	&& !empty(trim($data[13]))
							 	&& !empty(trim($data[14]))
							){
								$insert['status'] = trim(strtolower($data[0])) == 'publish' ? 1 : 0;

                                $company = $this->page->checkCompanyExist(trim($data[1]));
								$insert['company_name'] = $company;
								$insert['company_link'] = trim($data[2]);

								$level = $this->page->checkLevelExist(trim($data[3]));
								$insert['job_level'] 	= trim($level);

                                $job_cat = $this->page->checkJobCategoryExist(trim($data[4]));
								$insert['job_cat'] 	= trim($job_cat);

								$location = $this->page->checkLocationExist(trim($data[5]));
								$insert['city'] 	    = trim($location);
								$insert['title'] 	    = trim($data[6]);

                                $job_industry = $this->page->checkJobIndustryExist(trim($data[7]));
								$insert['job_industry'] = $job_industry;

                                $degree = $this->page->checkDegreeExist(trim($data[8]));
								$insert['degree_requirement']  = trim($degree);

								$insert['salary_method']       = trim(strtolower($data[9]));
								$insert['salary_interval']     = trim(strtolower($data[10]));
								$insert['min_salary'] = str_replace(',','', trim($data[11]));
								$insert['max_salary'] = str_replace(',','', trim($data[12]));
                                
                                $job_expire = db_format_date_csv(trim($data[13]));

                                
								$insert['job_expire'] = trim($job_expire);
								$insert['job_link'] = trim($data[14]);
								$insert['visa_acceptance'] = trim(strtolower($data[15])) == 'yes' ? 'Yes' : 'No';
								$insert['description'] = trim($data[16]);

								$this->master->save('jobs', $insert);
							}
							
						}
					}
                    setMsg('success', 'File uploaded successfully! Empty records will be ignored.');
                    redirect(ADMIN . '/jobs', 'refresh');
                    exit;
				}
			}
			else
			{
				setMsg('error', 'Please select only csv file.');
				redirect(ADMIN . '/jobs', 'refresh');
				exit;
			}
		}
		else
		{
			setMsg('error', 'No File was seleted.');
			redirect(ADMIN . '/jobs', 'refresh');
			exit;
		}
	}

    function add_category(){
        $data=$this->input->post();
        $res=array();
        if(empty($data['cat_name'])){
            $res['status']=false;
            $res['empty']=true;
            echo json_encode($res);
        }
        else{
            $vals=array(
                'name'=>$data['cat_name']
            );
            $q=$this->master->save("categories",$vals);
            if($q>0){
                $res['status']=true;
                $res['success']=true;
                $res['cat_id']=$q;
            }
            else{
                 $res['status']=false; 
                 $res['fail']=false;  
            }
            echo json_encode($res);
        }
    }	
    
    function delete()
    {
        has_access(17);
        $this->master->delete('jobs','id', $this->uri->segment(4));
        $this->master->delete_where('saved_jobs', array('job_id' => $this->uri->segment(4)));
        setMsg('success', 'Job has been deleted successfully.');
        redirect(ADMIN . '/jobs', 'refresh');
    }

	function deleteAll(){
        $ids = $this->input->post('checkbox_id');
        if(!empty($ids)){
            $delete = $this->master->delete('jobs','id',$ids);
            setMsg('success', 'Deleted successfully !');
        }
        else{
            setMsg('error', 'Please Select atleast 1 Record !');
        }
        redirect(ADMIN . '/jobs', 'refresh');
    }

    function view_applications(){
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/view_applications';
        $job_id = $this->uri->segment(4);
        $this->data['applicants'] = $this->page->fetch_job_applicants($job_id);
        $this->data['employer_id'] = $this->page->get_employer_id($job_id);
        $this->data['employer'] = $this->db->get_where('members', array('mem_id' => $this->data['employer_id']))->row();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function cover_letter(){
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/cover_letter';
        $job_id = $this->uri->segment(4);
        $jobDetails = $this->db->get_where('mem_job_applications', array('job_id' => $job_id))->row();
        $this->data['cover_letter'] = $jobDetails->cover_letter;
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    } 
}

?>
