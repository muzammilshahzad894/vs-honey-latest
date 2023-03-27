<?php 
 
 class Pages_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 		$this->table_name="sitecontent";
 	}

	 function checkJobCategoryExist($val)
	 {
		$this->db->where(['LOWER(title)'=> $val, 'status'=> 1]);
		$this->db->from('job_categories');
		$row = $this->db->get()->row();

		if(!empty($row))
		{
			return $row->id;
		}
		else
		{
			$arr = [];
			$arr['title'] = $val;
			$arr['status'] = 1;
			$this->db->set($arr);
			$this->db->insert('job_categories');
			return $this->db->insert_id();
		}
	 }

	 function checkJobIndustryExist($val)
	 {
		$this->db->where(['LOWER(title)'=> $val, 'status'=> 1]);
		$this->db->from('job_industries');
		$row = $this->db->get()->row();

		if(!empty($row))
		{
			return $row->id;
		}
		else
		{
			$arr = [];
			$arr['title'] = $val;
			$arr['status'] = 1;
			$this->db->set($arr);
			$this->db->insert('job_industries');
			return $this->db->insert_id();
		}
	 }

	 function checkCompanyExist($val)
	 {
		$this->db->where(['LOWER(title)'=> $val, 'status'=> 1]);
		$this->db->from('job_companies');
		$row = $this->db->get()->row();

		if(!empty($row))
		{
			return $row->id;
		}
		else
		{
			$arr = [];
			$arr['title'] = $val;
			$arr['status'] = 1;
			$this->db->set($arr);
			$this->db->insert('job_companies');
			return $this->db->insert_id();
		}
	 }

	function checkLevelExist($val)
	 {
		$this->db->where(['LOWER(title)'=> $val, 'status'=> 1]);
		$this->db->from('job_levels');
		$row = $this->db->get()->row();

		if(!empty($row))
		{
			return $row->id;
		}
		else
		{
			$arr = [];
			$arr['title'] = $val;
			$arr['status'] = 1;
			$this->db->set($arr);
			$this->db->insert('job_levels');
			return $this->db->insert_id();
		}
	 }

	 function checkLocationExist($val)
	 {
		$this->db->where(['LOWER(title)'=> $val, 'status'=> 1]);
		$this->db->from('job_locations');
		$row = $this->db->get()->row();

		if(!empty($row))
		{
			return $row->id;
		}
		else
		{
			$arr = [];
			$arr['title'] = $val;
			$arr['status'] = 1;
			$this->db->set($arr);
			$this->db->insert('job_locations');
			return $this->db->insert_id();
		}
	 }

	 function checkDegreeExist($val)
	 {
		$this->db->where(['LOWER(title)'=> $val, 'status'=> 1]);
		$this->db->from('job_degree');
		$row = $this->db->get()->row();

		if(!empty($row))
		{
			return $row->id;
		}
		else
		{
			$arr = [];
			$arr['title'] = $val;
			$arr['status'] = 1;
			$this->db->set($arr);
			$this->db->insert('job_degree');
			return $this->db->insert_id();
		}
	 }

 	function savePageContent($vals,$page_slug=""){
 		$this->db->set($vals);
 		if($page_slug != ""){
 			//die("here");
 			$this->db->where("ckey",$page_slug);
 			$this->db->update($this->table_name);
 			return $page_slug;
 		}	 		
 		else{
 			$this->db->insert($this->table_name);
 			return $this->db->insert_id();
 		}
 	}
 	function saveMetaContent($vals,$page_slug=""){
 		$this->db->set($vals);
 		if($page_slug != ""){
 			//die("here");
 			$this->db->where("slug",$page_slug);
 			$this->db->update('meta_info');
 			return $page_slug;
 		}	 		
 		else{
 			$this->db->insert('meta_info');
 			return $this->db->insert_id();
 		}
 	}
	 function getJobCities()
	 { 
		 $this->db->from('jobs');
		 $this->db->where(['status'=> 1]);
		 $this->db->select('city');
		 $this->db->distinct();
		 return $this->db->get()->result();
	 }
 	function getPageContent($page_slug="", $site_lang="french")
	{
 		if($page_slug != ""){
 			$this->db->where("ckey",$page_slug);
			if($site_lang != "")
 				$this->db->where("lang",$site_lang);
 			return $this->db->get($this->table_name)->row();
 		}
 		else{
 			 return $this->db->get($this->table_name)->result();
 		}
 	}
 	 function getMetaContent($page_slug=""){
 		if($page_slug != ""){
 			$this->db->where("slug",$page_slug);
 			return $this->db->get('meta_info')->row();
 		}
 		else{
 			 return $this->db->get('meta_info')->result();
 		}
 	}
 	function deletePage($page_slug=""){
 		$this->where("ckey",$page_slug);
 		$this->db->delete($this->table_name);
 		return $page_slug;	
 	}

	function get_products($post)
	{
		$this->db->select('*, (price - discount) as final_price');
		$this->db->from('products');
		$this->db->where('category_id', $post['category']);

		if(isset($post['price']) && !empty(trim($post['price'])))
		{
		  $priceIndex = explode(';', $post['price']);
		  $this->db->where(['(price - discount) >='=> $priceIndex[0], '(price - discount) <='=> $priceIndex[1]]);
		}

		if(isset($post['types']) && !empty($post['types']))
		{
			$this->db->group_start();
			foreach($post['types'] as $key => $value)
			{
				if($key == 0)
					$this->db->where('phone_type', $value);
				else
					$this->db->or_where('phone_type', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['brands']) && !empty($post['brands']))
		{
			$this->db->group_start();
			foreach($post['brands'] as $key => $value)
			{
				if($key == 0)
					$this->db->where('brand_id', $value);
				else
					$this->db->or_where('brand_id', $value);
			}
			$this->db->group_end();
		}

		$this->db->where(['status'=> 1]);
		$this->db->order_by('id', 'DESC');
		return $this->db->get()->result();
		// pr($this->db->last_query());

	}

	function fetch_jobs_data($post)
	{
		$this->db->select('j.*');
		$this->db->from('jobs j');
		$this->db->join('job_companies com', 'j.company_name=com.id');
		$this->db->join('job_locations loc', 'j.city=loc.id');

		if(isset($post['jobCats']) && !empty($post['jobCats']))
		{
			$this->db->group_start();
			foreach($post['jobCats'] as $key => $value)
			{
				if($key == 0)
					$this->db->where('j.job_industry', $value);
				else
					$this->db->or_where('j.job_industry', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['cities']) && !empty($post['cities']))
		{
			$this->db->group_start();
			foreach($post['cities'] as $key => $value)
			{
				$value = str_replace('"', '', $value);
				if($key == 0)
					$this->db->where('j.city', $value);
				else
					$this->db->or_where('j.city', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['types']) && !empty($post['types']))
		{
			$this->db->group_start();
			foreach($post['types'] as $key => $value)
			{
				$value = str_replace('"', '', $value);
				if($key == 0)
					$this->db->where('j.job_cat', $value);
				else
					$this->db->or_where('j.job_cat', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['jobRequirements']) && !empty($post['jobRequirements']))
		{
			$this->db->group_start();
			foreach($post['jobRequirements'] as $key => $value)
			{
				$value = str_replace('"', '', $value);
				if($key == 0)
					$this->db->where('j.degree_requirement', $value);
				else
					$this->db->or_where('j.degree_requirement', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['searchKeyword']) && !empty($post['searchKeyword']) && $post['searchKeyword'] != 'null')
		{
			$keyword = trim($post['searchKeyword']);
			$this->db->group_start();
			$this->db->like('j.title', $keyword);
			$this->db->or_like('com.title', $keyword);
			$this->db->or_like('loc.title', $keyword);
			$this->db->group_end();
		}

		if($post['visaAcceptance'] == 'true')
		{
			$this->db->where('j.visa_acceptance', 'Yes');
		}
		

		$this->db->where(['j.status'=> 1]);
		$this->db->where(['j.job_expire >' => date('Y-m-d')]);
		if(!empty($post['sortBy']))
		{
			$this->db->order_by('j.id', $post['sortBy']);
		}
		else
		{
			$this->db->order_by('j.id', 'desc');
		}

		return $this->db->get()->result();
		// pr($this->db->last_query());

	}

	function fetch_events_data($post)
	{
		$this->db->select('*');
		$this->db->from('events');

		if(isset($post['searchKeyword']) && !empty($post['searchKeyword']) && $post['searchKeyword'] != 'null')
		{
			$keyword = trim($post['searchKeyword']);
			$this->db->group_start();
			$this->db->like('title', $keyword);
			$this->db->group_end();
		}

		if(isset($post['location']) && !empty(trim($post['location'])))
		{
			$this->db->where('location', $post['location']);
		}

		if(isset($post['eventCats']) && !empty($post['eventCats']))
		{
			$this->db->group_start();
			foreach($post['eventCats'] as $key => $value)
			{
				$value = str_replace('"', '', $value);
				if($key == 0)
					$this->db->where('event_type', $value);
				else
					$this->db->or_where('event_type', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['dateRange']) && !empty(trim($post['dateRange'])))
		{
			$today = date('Y-m-d');
			if($today === $post['dateRange'])
			{
				$this->db->where('event_date', $today);
			}
			else
			{
				$this->db->where(['event_date >='=> $today, 'event_date <='=> $post['dateRange']]);
			}
			
		}
		
		$this->db->where(['status'=> 1]);
		// if(!empty($post['sortBy']))
		// {
		// 	$this->db->order_by('id', $post['sortBy']);
		// }
		// else
		// {
		// 	$this->db->order_by('id', 'desc');
		// }

		return $this->db->get()->result();
		// pr($this->db->last_query());

	}

	function get_member_id_by_token($token = ''){
		$this->db->select('mem_id');
		$this->db->from('members');
		$this->db->where('mem_auth_token', $token);
		$query = $this->db->get();
		$result = $query->row();
		if($result)
		{
			return $result->mem_id;
		}
		else
		{
			return false;
		}
	}

	function fetch_employer_jobs($mem_id = ''){
		$job_ids = $this->db->select('job_id')->from('saved_jobs')->where('mem_id', $mem_id)->order_by('id', 'desc')->get()->result();
		$jobs= [];
		foreach($job_ids as $index => $job_id):
			$job = $this->master->getRow('jobs', ['id'=> $job_id->job_id]);
			$row = $this->master->getRow('job_types', ['id'=> $job->job_type]);
			$job->job_type_name = $row->title;
			$job->applicants = $this->fetch_job_applicants($job->id);
			$jobs[] = $job;
		endforeach;

		return $jobs;
	}

	function fetch_saved_jobs($mem_id = ''){
		$job_ids = $this->db->select('job_id')->from('like_jobs')->where('mem_id', $mem_id)->order_by('id', 'desc')->get()->result();
		$jobs= [];
		foreach($job_ids as $index => $job_id):
			$job = $this->master->getRow('jobs', ['id'=> $job_id->job_id]);
			$row = $this->master->getRow('job_types', ['id'=> $job->job_type]);
			$job->job_type_name = $row->title;
			$jobs[] = $job;
		endforeach;

		return $jobs;
	}
	
	function fetch_candidate_applications($mem_id){
		$job_ids = $this->db->select('job_id, created_at')->from('mem_job_applications')->where('mem_id', $mem_id)->order_by('id', 'desc')->get()->result();
		$jobs= [];
		foreach($job_ids as $index => $job_id):
			$job = $this->master->getRow('jobs', ['id'=> $job_id->job_id]);
			$row = $this->master->getRow('job_types', ['id'=> $job->job_type]);
			$job->job_type_name = $row->title;
			$job->applied_time = $job_id->created_at;
			$jobs[] = $job;
		endforeach;
		return $jobs;
	}

	function get_pricing_plan($mem_id){
		$mem = $this->master->getRow('members', ['mem_id'=> $mem_id]);
		$plan = $this->master->getRow('plans', ['id'=> $mem->plan_id]);
		return $plan;
	}

	function fetch_job_applicants($jobId){
		$mem_ids = $this->db->select('mem_id')->from('mem_job_applications')->where('job_id', $jobId)->order_by('id', 'desc')->get()->result();
		$members= [];
		foreach($mem_ids as $index => $mem_id):
			$member = $this->master->getRow('members', ['mem_id'=> $mem_id->mem_id]);
			$applicationDetails = $this->master->getRow('mem_job_applications', ['mem_id'=> $mem_id->mem_id, 'job_id'=> $jobId]);
			$member->created_at = $applicationDetails->created_at;
			$member->cover_letter = $applicationDetails->cover_letter;
			$member->resume = $applicationDetails->resume;
			$job = $this->master->getRow('jobs', ['id'=> $jobId]);
			$member->job_tags = $job->tags;
			$members[] = $member;
		endforeach;
		return $members;
	}

	function getJobCategories(){
		$jobCategories = $this->master->getRows('job_categories', ['status'=> 1], '', '', 'asc', 'id');
		$categoies = [];
		foreach($jobCategories as $category)
		{
			$jobs = $this->master->getRows('jobs', ['job_cat'=> $category->id, 'status' => 1], '', '', 'asc', 'id');
			if(!empty($jobs))
			{
				$categoies[] = $category;
			}
		}
		return $categoies;
	}

	function getJobTypes(){
		$jobTypes = $this->master->getRows('job_types', ['status'=> 1], '', '', 'asc', 'id');
		$types = [];
		foreach($jobTypes as $type)
		{
			$jobs = $this->master->getRows('jobs', ['job_type'=> $type->id, 'status' => 1], '', '', 'asc', 'id');
			if(!empty($jobs))
			{
				$types[] = $type;
			}
		}
		return $types;
	}

	function getExperienceLevels(){
		$experienceLevels = $this->master->getRows('job_levels', ['status'=> 1], '', '', 'asc', 'id');
		$levels = [];
		foreach($experienceLevels as $level)
		{
			$jobs = $this->master->getRows('jobs', ['job_level'=> $level->id, 'status' => 1], '', '', 'asc', 'id');
			if(!empty($jobs))
			{
				$levels[] = $level;
			}
		}
		return $levels;
	}

	function getFeaturedJobs(){
		$jobs = $this->master->getRows('jobs', ['is_featured'=> 1, 'status' => 1], '', '', 'desc', 'featured_date');
		return $jobs;
	}

	function getCandidates(){
		$candidates = $this->master->getRows('members', ['mem_type'=> 'candidate'], '', '', 'desc', 'mem_id');
		foreach($candidates as $index => $candidate)
		{
			$details = $this->master->getRow('mem_profession_details', ['mem_id'=> $candidate->mem_id]);
			$candidates[$index]->details = $details;
		}
		return $candidates;
	}

	function getTrainers(){
		$trainers = $this->master->getRows('training_program', ['status'=> 1], '', '', 'desc', 'id');
		return $trainers;
	}

	function get_employer_id($job_id)
    {
        $job = $this->master->getRow('saved_jobs', ['job_id'=> $job_id]);
        return $job->mem_id;
    }

	function getProfessions(){
		$professions = $this->master->getRows('members', ['mem_type'=> 'candidate'], '', '', 'desc', 'mem_id');
		$professions = array_unique(array_column($professions, 'profession'));
		$professinsList = [];
		foreach($professions as $profession)
		{
			$professinsList[] = $profession;
		}
		return $professinsList;
	}

	function fetch_payment_methods($mem_id){
		$methods = $this->master->getRows('payment_methods', ['mem_id'=> $mem_id], '', '', 'desc', 'id');

		// $methods = $this->master->getRows('payment_methods', '', '', '', 'desc', 'id');
		return $methods;
	}

	function save_like_job($mem_id, $job_id){
		$data = [
			'mem_id' => $mem_id,
			'job_id' => $job_id,
		];
		if($this->master->getRow('like_jobs', $data))
		{
			return false;
		}
		if($this->master->save('like_jobs', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function check_job_saved($jobId, $mem_id){
		if($mem_id){
			$data = [
				'mem_id' => $mem_id,
				'job_id' => $jobId,
			];
			if($this->master->getRow('like_jobs', $data))
			{
				return true;
			}
			else
			{
				return false;
			}	
		}
		else
		{
			return false;
		}
	}

	function fetch_all_members(){
		$this->db->where('mem_auth_token !=', '' || 'mem_auth_token !=', null);
		$members = $this->master->getRows('members', '', '', '', 'desc', 'mem_id');
		return $members;
	}
 }

?>
