<?php
class Sitecontent extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(21);
        $this->table_name = 'sitecontent';
    }

    public function home()
    { 
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_home';
        if ($vals = $this->input->post()) 
        {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'home', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 11; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                    if($i === 2)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],600,'thumb_');
                    }
                    if($i > 3 && $i < 6)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    if($i === 6)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'thumb_');
                    }
                    if($i === 7)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1200,'thumb_');
                    }
                    if($i === 8)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],700,'thumb_');
                    }
                    if($i === 9)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],50,'thumb_');
                    }
                    if($i === 10)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],50,'thumb_');
                    }
                    if($i === 11)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],50,'thumb_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            

            if (isset($_FILES["video"]["name"]) && $_FILES["video"]["name"] != "") {

                    

                $image = upload_file(UPLOAD_PATH.'images/', 'video', 'video');

                generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],600,'thumb_');

                if(!empty($image['file_name'])){

                    if(isset($content_row['video']))
                        $this->remove_file(UPLOAD_PATH."images/".$content_row['video']);
                        $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['video']);


                    $vals['video'] = $image['file_name'];

                }

            }

            $sec5l['title'] = $vals['sec5l_title'];
            $sec5l['txt1'] = $vals['sec5l_txt1'];
            $sec5l['txt2'] = $vals['sec5l_txt2'];
            $sec5l['detail'] = $vals['sec5l_detail'];
            $sec5l['order_no'] = $vals['sec5l_order_no'];
            unset($vals['sec5l_order_no'],$vals['sec5l_title'], $vals['sec5l_detail'], $vals['sec5l_txt1'], $vals['sec5l_txt2']);
            $this->master->delete_where('multi_text', array('section'=> 'home-sec5l', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec5ls = array('order_no' => $sec5l['order_no'], 'title' => $sec5l['title'], 'txt1'=> $sec5l['txt1'], 'txt2'=> $sec5l['txt2'], 'detail' => $sec5l['detail']);
            saveMultiMediaFields($sec5ls, 'home-sec5l', $this->session->userdata('site_lang'));

            $sec5r['title'] = $vals['sec5r_title'];
            $sec5r['order_no'] = $vals['sec5r_order_no'];
            $sec5r['txt1'] = $vals['sec5r_txt1'];
            $sec5r['txt2'] = $vals['sec5r_txt2'];
            $sec5r['detail'] = $vals['sec5r_detail'];
            unset($vals['sec5r_order_no'],$vals['sec5r_title']);
            $this->master->delete_where('multi_text', array('section'=> 'home-sec5r', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec5rs = array('order_no' => $sec5r['order_no'], 'title' => $sec5r['title'], 'txt1'=> $sec5r['txt1'], 'txt2'=> $sec5r['txt2'], 'detail' => $sec5r['detail']);
            saveMultiMediaFields($sec5rs, 'home-sec5r', $this->session->userdata('site_lang'));




            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'home', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'home', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'home', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/home");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'home', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function pricing()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_pricing';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'pricing', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            $sec3['title'] = $vals['sec3_title'];
            $sec3['detail'] = $vals['sec3_detail'];
            $sec3['order_no'] = $vals['sec3_order_no'];
            unset($vals['sec3_order_no'],$vals['sec3_title'], $vals['sec3_detail']);
            $this->master->delete_where('multi_text', array('section'=> 'pricing-sec3', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec3s = array('order_no' => $sec3['order_no'], 'title' => $sec3['title'], 'detail' => $sec3['detail']);
            saveMultiMediaFields($sec3s, 'pricing-sec3', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'pricing', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'pricing', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'pricing', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/pricing");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'pricing', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function find_jobs()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_find_jobs';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'find_jobs', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                   
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
    
            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'find_jobs', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'find_jobs', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'find_jobs', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/find_jobs");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'find_jobs', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function candidates()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_candidates';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'candidates', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                   
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
    
            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'candidates', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'candidates', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'candidates', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/candidates");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'candidates', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function trainings()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_trainings';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'trainings', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                   
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
    
            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'trainings', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'trainings', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'trainings', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/trainings");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'trainings', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function about_us()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_about_us';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'about_us', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 15; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                    if($i > 1 && $i < 5)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    if($i === 5)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],600,'thumb_');
                    }
                    if($i > 6 && $i < 9)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    if($i === 8)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'thumb_');
                    }
                    if($i === 9)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'thumb_');
                    }
                    if($i === 10)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1000,'thumb_');
                    }
                    if($i === 11)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'thumb_');
                    }
                    if($i > 11 && $i > 16)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }

                    if(!empty($image['file_name'])){
                    if(isset($content_row['image'.$i])){
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'about_us', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'about_us', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'about_us', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/about_us");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'about_us', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function signup_candidate()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_signup_candidate';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'signup_candidate', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 15; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                    if($i > 1 && $i < 5)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    if($i === 5)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],600,'thumb_');
                    }
                    if($i > 6 && $i < 9)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    if($i === 8)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'thumb_');
                    }
                    if($i === 9)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'thumb_');
                    }
                    if($i === 10)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1000,'thumb_');
                    }
                    if($i === 11)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'thumb_');
                    }
                    if($i > 11 && $i > 16)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }

                    if(!empty($image['file_name'])){
                    if(isset($content_row['image'.$i])){
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'signup_candidate', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'signup_candidate', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'signup_candidate', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/signup_candidate");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'signup_candidate', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function how_it_works()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_how_it_works';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'how_it_works', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 14; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                    if($i > 1 && $i < 6)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    if($i === 6)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],600,'thumb_');
                    }
                    if($i > 6 && $i < 14)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    if($i === 14)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }

                    if(!empty($image['file_name'])){
                    if(isset($content_row['image'.$i])){
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'how_it_works', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'how_it_works', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'how_it_works', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/how_it_works");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'how_it_works', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function employer_home()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_employer_home';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'employer_home', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 14; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                    if($i === 2)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],200,'thumb_');
                    }
                    if($i > 2 && $i < 5)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],700,'thumb_');
                    }
                    if($i === 5)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],200,'thumb_');
                    }
                    if($i === 6)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1200,'thumb_');
                    }

                    if(!empty($image['file_name'])){
                    if(isset($content_row['image'.$i])){
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2_1['title'] = $vals['sec2_1_title'];
            $sec2_1['order_no'] = $vals['sec2_1_order_no'];
            unset($vals['sec2_1_order_no'],$vals['sec2_1_title']);
            $this->master->delete_where('multi_text', array('section'=> 'home-sec2_1', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2_1s = array('order_no' => $sec2_1['order_no'], 'title' => $sec2_1['title']);
            saveMultiMediaFields($sec2_1s, 'home-sec2_1', $this->session->userdata('site_lang'));

            $sec2_2['title'] = $vals['sec2_2_title'];
            $sec2_2['detail'] = $vals['sec2_2_detail'];
            $sec2_2['order_no'] = $vals['sec2_2_order_no'];
            unset($vals['sec2_2_detail'],$vals['sec2_2_order_no'],$vals['sec2_2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'home-sec2_2', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2_2s = array('order_no' => $sec2_2['order_no'],'detail' => $sec2_2['detail'],'title' => $sec2_2['title']);
            saveMultiMediaFields($sec2_2s, 'home-sec2_2', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'employer_home', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'employer_home', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'employer_home', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/employer_home");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'employer_home', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function employer_signup()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_employer_signup';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'employer_signup', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 14; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1920,'thumb_');
                    }
                    if($i === 2)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],200,'thumb_');
                    }
                    if($i > 2 && $i < 5)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],700,'thumb_');
                    }
                    if($i === 5)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],200,'thumb_');
                    }
                    if($i === 6)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],1200,'thumb_');
                    }

                    if(!empty($image['file_name'])){
                    if(isset($content_row['image'.$i])){
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2_1['title'] = $vals['sec2_1_title'];
            $sec2_1['order_no'] = $vals['sec2_1_order_no'];
            unset($vals['sec2_1_order_no'],$vals['sec2_1_title']);
            $this->master->delete_where('multi_text', array('section'=> 'home-sec2_1', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2_1s = array('order_no' => $sec2_1['order_no'], 'title' => $sec2_1['title']);
            saveMultiMediaFields($sec2_1s, 'home-sec2_1', $this->session->userdata('site_lang'));

            $sec2_2['title'] = $vals['sec2_2_title'];
            $sec2_2['detail'] = $vals['sec2_2_detail'];
            $sec2_2['order_no'] = $vals['sec2_2_order_no'];
            unset($vals['sec2_2_detail'],$vals['sec2_2_order_no'],$vals['sec2_2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'home-sec2_2', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2_2s = array('order_no' => $sec2_2['order_no'],'detail' => $sec2_2['detail'],'title' => $sec2_2['title']);
            saveMultiMediaFields($sec2_2s, 'home-sec2_2', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'employer_signup', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'employer_signup', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'employer_signup', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/employer_signup");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'employer_signup', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function contact_us()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_contact';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'contact_us', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'contact_us', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'contact_us', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'contact_us', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/contact_us");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'contact_us', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function header_footer()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_header_footer';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'header_footer', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'header_footer', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'header_footer', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'header_footer', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/header_footer");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'header_footer', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function signin()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_signin';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'signin', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    // if($i === 1)
                    // {
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    // }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'signin', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'signin', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'signin', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/signin");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'signin', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function forgot_password()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_forgot_password';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'forgot_password', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    // if($i === 1)
                    // {
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    // }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'forgot_password', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'forgot_password', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'forgot_password', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/forgot_password");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'forgot_password', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function reset_password()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_reset_password';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'reset_password', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    // if($i === 1)
                    // {
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    // }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'reset_password', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'reset_password', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'reset_password', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/reset_password");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'reset_password', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function careers()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_careers';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'careers', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 9; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],700,'700p_');
                    }
                    else
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'careers', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'careers', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'careers', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/careers");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'careers', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function work_with_us()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_work_with_us';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'work_with_us', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'for-university-faq', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'for-university-faq', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'work_with_us', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'work_with_us', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'work_with_us', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/work_with_us");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'work_with_us', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function uk_corporate_culture()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_uk_corporate_culture';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'uk_corporate_culture', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'uk_corporate_culture', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'uk_corporate_culture', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'uk_corporate_culture', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/uk_corporate_culture");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'uk_corporate_culture', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    public function cv_guidence()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cv_guidence';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cv_guidence', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'cv_guidence', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'cv_guidence', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'cv_guidence', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cv_guidence");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cv_guidence', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cover_letter_guidence()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cover_letter_guidence';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cover_letter_guidence', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'cover_letter_guidence', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'cover_letter_guidence', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'cover_letter_guidence', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cover_letter_guidence");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cover_letter_guidence', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    public function recruitement_process()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_recruitement_process';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'recruitement_process', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'recruitement-proccess-sec2', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'recruitement-proccess-sec2', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'recruitement_process', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'recruitement_process', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'recruitement_process', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/recruitement_process");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'recruitement_process', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function assessment_center()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_assessment_center';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'assessment_center', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'assessment-center-sec2', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'assessment-center-sec2', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'assessment_center', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'assessment_center', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'assessment_center', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/assessment_center");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'assessment_center', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function interview()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_interview';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'interview', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'interview-sec2', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'interview-sec2', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'interview', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'interview', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'interview', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/interview");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'interview', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cv_page()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cv_page';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cv_page', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            // for($i = 1; $i <=1; $i++) {
            //     if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
            //         $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
            //         if($i === 1)
            //         {
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
            //         }
            //         if(!empty($image['file_name'])){
            //             if(isset($content_row['image'.$i]))
            //                 // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
            //             $vals['image'.$i] = $image['file_name'];
            //         }
            //     }
            // }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'cv-page-left-instructions', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'cv-page-left-instructions', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'cv_page', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'cv_page', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'cv_page', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cv_page");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cv_page', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cover_letter_page()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cover_letter_page';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cover_letter_page', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            // for($i = 1; $i <=1; $i++) {
            //     if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
            //         $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
            //         if($i === 1)
            //         {
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
            //         }
            //         if(!empty($image['file_name'])){
            //             if(isset($content_row['image'.$i]))
            //                 // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
            //             $vals['image'.$i] = $image['file_name'];
            //         }
            //     }
            // }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'cover-letter-page-left-instructions', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'cover-letter-page-left-instructions', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'cover_letter_page', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'cover_letter_page', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'cover_letter_page', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cover_letter_page");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cover_letter_page', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cv_and_cover_letter()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cv_and_cover_letter';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cv_and_cover_letter', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=2; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'cv_and_cover_letter', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'cv_and_cover_letter', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'cv_and_cover_letter', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cv_and_cover_letter");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cv_and_cover_letter', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function uni_vs_emp()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_uni_vs_emp';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'uni_vs_emp', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=2; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'uni_vs_emp', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'uni_vs_emp', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'uni_vs_emp', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/uni_vs_emp");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'uni_vs_emp', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function partner_with_us()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_partner_with_us';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'partner_with_us', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'for-employer-faq', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'for-employer-faq', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'partner_with_us', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'partner_with_us', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'partner_with_us', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/partner_with_us");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'partner_with_us', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function job_profile()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_job_profile';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'job_profile', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'job_profile', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'job_profile', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'job_profile', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/job_profile");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'job_profile', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function faq()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_faq';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'faq', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'faqs', 'site_lang'=> $this->session->userdata('site_lang')));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'faqs', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'faq', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'faq', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'faq', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/faq");
            exit;
        }



        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'faq', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function career_options()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_career_options';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'career_options', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            $heading1['title'] = $vals['heading1_title'];
            $heading1['detail'] = $vals['heading1_detail'];
            $heading1['order_no'] = $vals['heading1_order_no'];
            unset($vals['heading1_pics'],$vals['heading1_detail'],$vals['heading1_order_no'],$vals['heading1_title']);
            $this->master->delete_where('multi_text', array('section'=> 'heading1-content', 'site_lang'=> $this->session->userdata('site_lang')));
            $heading1s = array('order_no' => $heading1['order_no'],'detail' => $heading1['detail'],'title' => $heading1['title']);
            saveMultiMediaFields($heading1s, 'heading1-content', $this->session->userdata('site_lang'));

            $heading2['title'] = $vals['heading2_title'];
            $heading2['detail'] = $vals['heading2_detail'];
            $heading2['order_no'] = $vals['heading2_order_no'];
            unset($vals['heading2_pics'],$vals['heading2_detail'],$vals['heading2_order_no'],$vals['heading2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'heading2-content', 'site_lang'=> $this->session->userdata('site_lang')));
            $heading2s = array('order_no' => $heading2['order_no'],'detail' => $heading2['detail'],'title' => $heading2['title']);
            saveMultiMediaFields($heading2s, 'heading2-content', $this->session->userdata('site_lang'));

            $heading3['title'] = $vals['heading3_title'];
            $heading3['detail'] = $vals['heading3_detail'];
            $heading3['order_no'] = $vals['heading3_order_no'];
            unset($vals['heading3_pics'],$vals['heading3_detail'],$vals['heading3_order_no'],$vals['heading3_title']);
            $this->master->delete_where('multi_text', array('section'=> 'heading3-content', 'site_lang'=> $this->session->userdata('site_lang')));
            $heading3s = array('order_no' => $heading3['order_no'],'detail' => $heading3['detail'],'title' => $heading3['title']);
            saveMultiMediaFields($heading3s, 'heading3-content', $this->session->userdata('site_lang'));

            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'career_options', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'career_options', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'career_options', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/career_options");
            exit;
        }



        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'career_options', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function online_test()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_online_test';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'online_test', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'online_test', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'online_test', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'online_test', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/online_test");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'online_test', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function video_interview_main()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_video_interview_main';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'video_interview_main', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'video_interview_main', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'video_interview_main', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'video_interview_main', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/video_interview_main");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'video_interview_main', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function testimonials()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_testimonials';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'testimonials', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'testimonials', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'testimonials', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'testimonials', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/testimonials");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'testimonials', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function blogs()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_blogs';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'blogs', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'blogs', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'blogs', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'blogs', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/blogs");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'blogs', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function terms_and_conditions()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_terms_and_conditions';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'terms_and_conditions', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'terms_and_conditions', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'terms_and_conditions', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'terms_and_conditions', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/terms_and_conditions");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'terms_and_conditions', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function privacy_policy()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_privacy_policy';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'privacy_policy', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'privacy_policy', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'privacy_policy', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'privacy_policy', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/privacy_policy");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'privacy_policy', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function signup()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_signup';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'signup', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'signup', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'signup', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'signup', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/signup");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'signup', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function disclaimer()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_disclaimer';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'disclaimer', 'lang'=> $this->session->userdata('site_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));

            if($this->master->num_rows($this->table_name, ['ckey'=> 'disclaimer', 'lang'=> $this->session->userdata('site_lang')]) > 0)
            {
                $this->master->updateMultilang($this->table_name, $data, ['ckey'=> 'disclaimer', 'lang'=> $this->session->userdata('site_lang')]);
            }
            else
            {
                $this->master->save($this->table_name, ['code' => $data, 'ckey'=> 'disclaimer', 'lang'=> $this->session->userdata('site_lang')]);
            }

            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/disclaimer");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'disclaimer', 'lang'=> $this->session->userdata('site_lang')));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function delete()
    {
        $arr = $this->input->post('delete');
        foreach ($arr as $key => $values) {
            $this->master->delete($this->table_name, 'id', $values);
        }
        redirect("admin/sitecontent/slider", 'refresh');
    }

    function remove_file($filepath)
    {
        if (is_file($filepath))
            unlink($filepath);
        return;
    }

}
?>