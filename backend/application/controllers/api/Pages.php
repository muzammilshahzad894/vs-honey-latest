<?php
class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('Pages_model', 'page');
        $this->load->model('Member_model', 'member');
    }

    function site_settings()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if(empty($post['authToken']))
            {
                $memData = null;
            }
            else
            {
                $mem_id = $this->page->get_member_id_by_token($post['authToken']);
                $memData = $this->member->getMemData($mem_id);
            }

            $this->data['memData'] = $memData;
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {   
            http_response_code(404);
        }
    }
    function fetch_candidate_detail(){
        if($this->input->post())
        {
            $post = $this->input->post();
            $data = $this->master->get_data_row('members', ['mem_id'=> $post['id']]);
            $this->data['professional_details'] = $this->master->get_data_row('mem_profession_details', ['mem_id'=> $post['id']]);
            $this->data['content'] = $data;
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
    }

    function home()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('home');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('home', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = $content = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $this->data['partners']  = $this->master->get_data_rows('partners', ['status'=> '1']); 
                $this->data['sponsors']  = $this->master->get_data_rows('visa_sponsors', ['status'=> '1', 'slider'=> 1]); 
                $this->data['sponsors2']  = $this->master->get_data_rows('visa_sponsors', ['status'=> '1', 'slider'=> 2]); 
                $this->data['testimonials']  = $this->master->get_data_rows('testimonials', ['status'=> '1']); 
                $this->data['sec5ls'] = getMultiText('home-sec5l', $post['site_lang']);
                $this->data['sec5rs'] = getMultiText('home-sec5r', $post['site_lang']);
                $this->data['candidates_images'] = [$content['image1'], $content['image2'], $content['image3'], $content['image4'], $content['image5']];

                http_response_code(200);
                echo json_encode($this->data);

            } 
            else
            {
                http_response_code(404);
            }
            exit;
        }
        else
        {
            http_response_code(404);

        }
    }

    function signin()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('signin');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('signin', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function forgot_password_content()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('forgot_password');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('forgot_password', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function reset_password_content()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('reset_password');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('reset_password', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function signup()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('signup');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('signup', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function signup_candidate()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('signup_candidate');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('signup_candidate', $post['site_lang']);
            if ($data) 
            { 
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function signup_employer()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $planId = $post['planId'];
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('employer_signup');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('employer_signup', $post['site_lang']);
            if ($data) 
            { 
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                // decode te plan id and get the plan details and add in content
                $this->data['content']['plan'] = $this->master->getRow('plans', array('id' => doDecode($planId)));
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function about_us()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('about_us');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('about_us', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $this->data['faqs'] = getMultiText('about-us-faq', $post['site_lang']);
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function training()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('trainings');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('trainings',  $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $this->data['trainers'] = $this->page->getTrainers();
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function pricing()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('pricing');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('pricing', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $this->data['sec3s'] = getMultiText('pricing-sec3', $post['site_lang']);
                $plans = $this->master->get_data_rows('plans', ['status'=> '1']); 
                $this->data['plans'] = [];
                foreach($plans as $index => $plan):
                    $plan->encoded_id = doEncode($plan->id);
                    $this->data['plans'][] = $plan;
                endforeach;
                $this->data['testimonials']  = $this->master->get_data_rows('testimonials', ['status'=> '1']);
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function candidates()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('candidates');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('candidates', $post['site_lang']);
            
           
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $this->data['sec3s'] = getMultiText('pricing-sec3', $post['site_lang']);
                $this->data['candidates'] = $this->page->getCandidates();
                $this->data['professions'] = $this->page->getProfessions();


                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function employer_home()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('employer_home');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('employer_home', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $this->data['sec2u'] = getMultiText('home-sec2_1', $post['site_lang']);
                $this->data['sec2d'] = getMultiText('home-sec2_2', $post['site_lang']);
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    

    function contact_us()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('contact_us');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('contact_us', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function how_it_works()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('how_it_works');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('how_it_works', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }
    
    function uk_corporate()
    {
        $meta = $this->page->getMetaContent('uk_corporate_culture');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('uk_corporate_culture');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function testimonials()
    {
        $meta = $this->page->getMetaContent('testimonials');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('testimonials');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['testimonials'] = $this->master->getRows('testimonials', ['status'=> 1], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cv_cover_letter()
    {
        $meta = $this->page->getMetaContent('cv_and_cover_letter');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cv_and_cover_letter');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function uni_vs_emp()
    {
        $meta = $this->page->getMetaContent('uni_vs_emp');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('uni_vs_emp');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cv_guidance()
    {
        $meta = $this->page->getMetaContent('cv_guidence');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cv_guidence');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cover_letter_guidance()
    {
        $meta = $this->page->getMetaContent('cover_letter_guidence');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cover_letter_guidence');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cv_builder()
    {
        $meta = $this->page->getMetaContent('cv_page');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cv_page');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['sec2sLeft'] = getMultiText('cv-page-left-instructions', $post['site_lang']);
            $this->data['languages'] = $this->master->getRows('languages', ['status'=> 1]);
            $this->data['it_skills'] = $this->master->getRows('it_skills', ['status'=> 1]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function fetch_cv_details(){
        if($this->input->post())
        {
            $res = [];
            $post = $this->input->post();
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);
            $cv_id = $this->db->get_where('mem_cv', ['mem_id' => $mem_id])->row()->cv_id;
            $res['education'] = $this->master->getRows('cv_educational', ['cv_id' => $cv_id]);
            $res['professional_experience'] = $this->master->getRows('cv_professional_experience', ['cv_id' => $cv_id]);
            $res['volunteer'] = $this->master->getRows('cv_others', ['cv_id' => $cv_id, 'type' => 'volunteer']);
            $res['interests'] = $this->master->getRows('cv_others', ['cv_id' => $cv_id, 'type' => 'interest']);
            $res['skills'] = $this->master->getRows('cv_others', ['cv_id' => $cv_id, 'type' => 'it_skill']);
            $res['languages'] = $this->master->getRows('cv_others', ['cv_id' => $cv_id, 'type' => 'language']);

            http_response_code(200);
            echo json_encode($res);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cover_letter_builder()
    {
        $meta = $this->page->getMetaContent('cover_letter_page');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cover_letter_page');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['sec2sLeft'] = getMultiText('cover-letter-page-left-instructions', $post['site_lang']);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function recruitment_process()
    {
        $meta = $this->page->getMetaContent('recruitement_process');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('recruitement_process');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['sec2s'] = getMultiText('recruitement-proccess-sec2', $post['site_lang']);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function assessment_center()
    {
        $meta = $this->page->getMetaContent('assessment_center');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('assessment_center');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['sec2s'] = getMultiText('assessment-center-sec2', $post['site_lang']);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function interview()
    {
        $meta = $this->page->getMetaContent('interview');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('interview');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['sec2s'] = getMultiText('interview-sec2', $post['site_lang']);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function online_test()
    {
        $meta = $this->page->getMetaContent('online_test');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('online_test');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['tests'] = $this->master->getRows('online_test_categories', ['status'=> 1], '', '', 'asc', 'sort_order');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function terms_and_conditions()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('terms_and_conditions');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('terms_and_conditions', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function disclaimer()
    {
        $meta = $this->page->getMetaContent('disclaimer');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('disclaimer');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function faq()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('faq');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('faq', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $this->data['faqs'] = getMultiText('faqs', $post['site_lang']);
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function career_options()
    {
        $meta = $this->page->getMetaContent('career_options');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('career_options');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
			$rows = $this->master->getRows('career_options_accordians', ['status'=> 1], '', '', 'asc', 'sort_order');
			$this->data['rows'] = [];

			foreach($rows as $index => $row):
				$row->accordians = getMultiText('career_options_'.$row->id, $post['site_lang']);
				$this->data['rows'][] = $row;
			endforeach;
			
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function blog_detail()
    {
        if($this->input->post())
        {   
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('blog_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;

            $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
            $this->data['site_settings']->header_footer = unserialize($header_footer->code);

            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['blog'] = $blog = $this->master->getRow('blogs', ['id'=> $post['id']]);
            $this->data['page_title'] = $blog->title.' - '.$this->data['site_settings']->site_name;

            $blog_cat = $this->master->getRow('blog_categories', ['id'=> $blog->blog_cat]);
            $this->data['category_name'] = $blog_cat->title;

            $this->data['p_blogs'] = [];
            $blogs = $this->master->getRows('blogs', ['status'=> 1, 'is_featured'=> 0], '', '', 'asc', 'id');
            foreach($blogs as $index => $blog):
                $blog_cat = $this->master->getRow('blog_categories', ['id'=> $blog->blog_cat]);
                $blog->category_name = $blog_cat->title;
                $this->data['p_blogs'][] = $blog;
            endforeach;

            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function blogs()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('blogs');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('blogs', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $this->data['blogs'] = [];
                $blogs = $this->master->getRows('blogs', ['status'=> 1, 'is_featured'=> 0], '', '', 'desc', 'id');
                foreach($blogs as $index => $blog):
                    $blog_cat = $this->master->getRow('blog_categories', ['id'=> $blog->blog_cat]);
                    $blog->category_name = $blog_cat->title;
                    $this->data['blogs'][] = $blog;
                endforeach;

                $this->data['p_blogs'] = [];
                $blogs = $this->master->getRows('blogs', ['status'=> 1, 'is_featured'=> 0], '', '', 'asc', 'id');
                foreach($blogs as $index => $blog):
                    $blog_cat = $this->master->getRow('blog_categories', ['id'=> $blog->blog_cat]);
                    $blog->category_name = $blog_cat->title;
                    $this->data['p_blogs'][] = $blog;
                endforeach;

                $this->data['f_blogs'] = [];
                $blogs = $this->master->getRows('blogs', ['status'=> 1, 'is_featured'=> 1], '0', '2', 'desc', 'id');
                foreach($blogs as $index => $blog):
                    $blog_cat = $this->master->getRow('blog_categories', ['id'=> $blog->blog_cat]);
                    $blog->category_name = $blog_cat->title;
                    $this->data['f_blogs'][] = $blog;
                endforeach;

                $cats  = $this->master->getRows('blog_categories', ['status'=> 1]);
                $this->data['cats'] = [];
                foreach($cats as $index => $cat):
                    $num = $this->master->num_rows('blogs', ['blog_cat'=> $cat->id, 'status'=> 1]);
                    if($num > 0)
                        $this->data['cats'][] = $cat;
                endforeach;
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function work_with_us()
    {
        $meta = $this->page->getMetaContent('work_with_us');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('work_with_us');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['faqs'] = getMultiText('for-university-faq', $post['site_lang']);
            $this->data['companies'] = $this->master->getRows('partner_companies', ['status'=> 1, 'page'=> 'work_with_us'], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function partner_with_us()
    {
        $meta = $this->page->getMetaContent('partner_with_us');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('partner_with_us');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['faqs'] = getMultiText('for-employer-faq', $post['site_lang']);
            $this->data['companies'] = $this->master->getRows('partner_companies', ['status'=> 1, 'page'=> 'partner_with_us'], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function careers()
    {
        $meta = $this->page->getMetaContent('careers');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('careers');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function job_profile()
    {
        $meta = $this->page->getMetaContent('job_profile');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('job_profile');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['profiles'] = $this->master->getRows('job_profiles', ['status'=> 1], '', '', 'asc', 'sort_order');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function video_interview_content()
    {
        $meta = $this->page->getMetaContent('video_interview_main');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('video_interview_main');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['cats'] = $this->master->getRows('video_interview_categories', ['status'=> 1], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function events()
    {
        $meta = $this->page->getMetaContent('events');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $this->data['meta_desc'] = json_decode($meta->content);
        $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
        $events = $this->master->getRows('events', ['status'=> 1], '', '', 'desc', 'id');

        $this->data['events'] = [];
        foreach($events as $index => $event):
            $row = $this->master->getRow('event_categories', ['id'=> $event->event_type]);
            $event->cat_name = ucfirst($row->title);
            $this->data['events'][] = $event;
        endforeach;

        $cats = $this->master->get_data_rows('event_categories', ['status'=> 1]);
        $this->data['cats'] = [];
        foreach($cats as $index => $cat):
            $num = $this->master->num_rows('events', ['event_type'=> $cat->id, 'status'=> 1]);
            if($num > 0)
                $this->data['cats'][] = $cat;
        endforeach;

        http_response_code(200);
        echo json_encode($this->data);
        exit;
    }

    function event_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('event_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['event'] = $this->master->getRow('events', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function interview_category()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('interview_category');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['category'] = $this->master->getRow('video_interview_categories', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function interview_category_question()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('interview_category_question');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['questions'] = $this->master->getRows('video_interview_questions', ['cat_id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function online_test_categories()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('online_test_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['main'] = $this->master->getRow('online_test_categories', ['id'=> $post['catId']]);
            $this->data['categories'] = $this->master->getRows('online_test_sub_categories', ['cat_id'=> $post['catId'], 'status'=> 1]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cv_builder_page()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 1;
            // $res['validationErrors'] = '';
            // $res['msg'] = '';
            // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            // $this->form_validation->set_rules('password', 'Password', 'required');
            // if ($this->form_validation->run() === FALSE) {
            //     $res['validationErrors'] = validation_errors();
            // }
            // else
            // {

                $post  = $this->input->post();
                $mem_id = $this->page->get_member_id_by_token($post['authToken']);
                $mem_cv = $this->master->getRow('mem_cv', ['mem_id'=> $mem_id]);
                $cv_id = $mem_cv->cv_id;

                if($cv_id)
                {
                    $this->master->delete_where('cv_educational', ['cv_id'=> $cv_id]);
                    $this->master->delete_where('cv_professional_experience', ['cv_id'=> $cv_id]);
                    $this->master->delete_where('cv_others', ['cv_id'=> $cv_id]);
                }
                else
                {
                    $cv_id = $this->master->save('mem_cv', ['mem_id'=> $mem_id]);
                }

                $decodedData = json_decode($post['cvData']);
                $educationalRows = $decodedData->educationalRows;
                $professionalExperienceRows = $decodedData->professionalExperienceRows;
                $languageRows = $decodedData->languageRows;
                $skillRows = $decodedData->skills;
                $volunteerRows = $decodedData->volunteerRows;
                $interestRows = $decodedData->interestRows;

                foreach($educationalRows as $index => $uni):
                    $education = [
                        'cv_id'=> $cv_id,
                        'university_name' => trim($uni->e_university_name),
                        'course_name'     => trim($uni->e_course_name),
                        'detail'          => trim($uni->e_detail),
                        'year_start'      => trim($uni->e_year_start),
                        'year_end'        => trim($uni->e_year_end)
                    ];
                    $this->master->save('cv_educational', $education);
                endforeach;

                foreach($professionalExperienceRows as $index => $pro):
                    $professional = [
                        'cv_id'=> $cv_id,
                        'company_name'    => trim($pro->pe_company_name),
                        'job_title'       => trim($pro->pe_job_title),
                        'detail'          => trim($pro->pe_detail),
                        'year_start'      => trim($pro->pe_year_start),
                        'year_end'        => trim($pro->pe_year_end)
                    ];
                    $this->master->save('cv_professional_experience', $professional);
                endforeach;

                foreach($languageRows as $index => $language):
                    $languages = [
                        'cv_id'=> $cv_id,
                        'language_id'     => trim($language->l_language),
                        'type'            => 'language',
                    ];
                    $this->master->save('cv_others', $languages);
                endforeach;

                foreach($skillRows as $index => $skill):
                    $skills = [
                        'cv_id'=> $cv_id,
                        'it_skill_id'     => trim($skill->s_skill),
                        'type'            => 'it_skill',
                    ];
                    $this->master->save('cv_others', $skills);
                endforeach;

                // foreach($volunteerRows as $index => $volunteer):
                //     $volunteerArr = [
                //         'cv_id'=> $cv_id,
                //         'volunteer'        => trim($volunteer->v_volunteer),
                //         'type'            => 'volunteer',
                //     ];
                //     $this->master->save('cv_others', $volunteerArr);
                // endforeach;

                // foreach($interestRows as $index => $interst):
                //     $interstArr = [
                //         'cv_id'=> $cv_id,
                //         'interest'        => trim($interst->i_interest),
                //         'type'            => 'interest',
                //     ];
                //     $this->master->save('cv_others', $interstArr);
                // endforeach;

                // foreach($post['r_person_name'] as $index => $pref):
                //     $reference = [
                //         'cv_id'                 => $cv_id,
                //         'person_name'           => trim($pref),
                //         'job_title_and_company' => trim($post['r_job_title_and_company'][$index]),
                //         'year_start'            => trim($post['r_year_start'][$index]),
                //         'year_end'              => trim($post['r_year_end'][$index])
                //     ];

                //     $this->master->save('cv_references', $reference);
                // endforeach;
            // }

            http_response_code(200);
            echo json_encode($res);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function detail() 
    {
        $res = [];
		$this->res['cv']           = $this->master->getRow('mem_cv', ['cv_id'=> $cv_id]);
		$this->res['educational']  = $this->master->getRows('cv_educational', ['cv_id'=> $cv_id]);
		$this->res['others'] 	    = $this->master->getRows('cv_others', ['cv_id'=> $cv_id]);
		$this->res['professional'] = $this->master->getRows('cv_professional_experience', ['cv_id'=> $cv_id]);
		$this->res['references'] 	= $this->master->getRows('cv_references', ['cv_id'=> $cv_id]);
    }

    function cover_builder_page()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('dear', 'Dear Sir/Madam', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('text[]', 'Missing Paragraph', 'required');
            // foreach($this->input->post('paragraph') as $index => $para):
            //     $para = json_decode($para);
            //     if(empty(trim($para->text)))
            //     {
            //         $this->form_validation->set_rules('missing_paragraph', 'Missing Paragraph', 'required');
            //         break;
            //     }
            // endforeach;

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post  = $this->input->post();
                $token = explode('_', doDecode($post['authToken']));
                $mem_id = $token[1];
                
                $cover_data = [
                    'mem_id' => $mem_id,
                    'name'   => trim($post['name']),
                    'email'  => trim($post['email']),
                    'phone'  => trim($post['phone']),
                    'date'   => trim($post['date']),
                    'dear'   => trim($post['dear']),
                    'subject'=> trim($post['subject'])
                ];
                $cover_id = $this->master->save('mem_cover', $cover_data); 

                foreach($post['text'] as $index => $para):
                    // $para = json_decode($para);
                    $paragraph = [
                        'cover_id'              => $cover_id,
                        'text'                  => trim($para,  '"')
                    ];
                    $this->master->save('cover_paragraphs', $paragraph);
                endforeach;
                $res['status'] = 1;
            }

            http_response_code(200);
            echo json_encode($res);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function test_category_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('test_category_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['category'] = $cat = $this->master->getRow('online_test_sub_categories', ['id'=> $post['catId']]);
            $this->data['main'] = $this->master->getRow('online_test_categories', ['id'=> $cat->cat_id]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }



    function job_profile_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('job_profile_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
            $this->data['profile'] = $this->master->getRow('job_profiles', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function jobs()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('find_jobs');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('find_jobs', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                $mem_id = '';
                if($post['authToken']){
                    $mem_id = $this->page->get_member_id_by_token($post['authToken']);
                }
                // get 3 jobs from jobs table
                // $this->db->where(['status'=> 1]);
                // $this->db->order_by('id', 'DESC');
                $this->db->order_by('job_push_date_time', 'DESC');
                $this->db->where(['status'=> 1]);
                $total_jobs = $this->db->count_all_results('jobs');
                $this->db->limit(5);
                $query = $this->db->get('jobs');
                $this->data['jobs'] = $query->result();
                foreach($this->data['jobs'] as $index => $job):
                    $this->data['jobs'][$index]->job_type = $this->master->getRow('job_types', ['id'=> $job->job_type]);
                    $this->data['jobs'][$index]->job_category = $this->master->getRow('job_categories', ['id'=> $job->job_category]);
                    $this->data['jobs'][$index]->saved = $this->page->check_job_saved($job->id, $mem_id);
                endforeach;

                $this->data['total_jobs'] = $total_jobs;
                $this->data['categories'] = $this->page->getJobCategories();
                $this->data['job_types'] = $this->page->getJobTypes();
                $this->data['experience_levels'] = $this->page->getExperienceLevels();
                $this->data['featured_jobs'] = $this->page->getFeaturedJobs();
                if(count($this->data['featured_jobs']) < 3)
                {
                    if(count($this->data['featured_jobs']) > 0){
                        $this->db->where_not_in('id', array_column($this->data['featured_jobs'], 'id'));
                    }
                    $this->db->order_by('id', 'DESC');
                    $this->db->limit(3 - count($this->data['featured_jobs']));
                    $this->db->where(['status'=> 1]);
                    $query = $this->db->get('jobs');
                    $this->data['featured_jobs'] = array_merge($this->data['featured_jobs'], $query->result());
                }
                foreach($this->data['featured_jobs'] as $index => $job):
                    $this->data['featured_jobs'][$index]->job_type = $this->master->getRow('job_types', ['id'=> $job->job_type]);
                    $this->data['featured_jobs'][$index]->job_category = $this->master->getRow('job_categories', ['id'=> $job->job_category]);
                    $this->data['featured_jobs'][$index]->saved = $this->page->check_job_saved($job->id, $mem_id);
                endforeach;

                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function fetch_filtered_jobs(){
        if($this->input->post())
        {
            $data = $this->input->post();
            $post = $data['filterData'];
            $authToken = $data['authToken'];
            $mem_id = '';
            if($authToken){
                $mem_id = $this->page->get_member_id_by_token($authToken);
            }
            $cat_array = [];
            $job_type = [];
            $experience_level = [];
            $min_salary = '';
            $max_salary = '';
            $sort_by = '';
            $job_title = '';
            $job_location = '';
            $page = 1;
            
            foreach($post as $key => $value):
                $value = json_decode($value);
                if($value->field == 'category')
                {
                    if($value->value == 'allcategories')
                    {
                        $cat_array = [];
                    }
                    else
                    {
                        $cat_array[] = $value->value;
                    }
                }
                if($value->field == 'jobtype')
                {
                    $job_type[] = $value->value;
                }
                if($value->field == 'experience_level')
                {
                    $experience_level[] = $value->value;
                }
                if($value->field == 'min_price')
                {
                    $min_salary = $value->value;
                }
                if($value->field == 'max_price')
                {
                    $max_salary = $value->value;
                }
                if($value->field == 'sort_by')
                {
                    $sort_by = $value->value;
                }
                if($value->field == 'job_title')
                {
                    $job_title = $value->value;
                }
                if($value->field == 'job_location')
                {
                    $job_location = $value->value;
                }
                if($value->field == 'page')
                {
                    $page = $value->value;
                }
            endforeach;

            if(!empty($cat_array))
            {
                $this->db->where_in('job_cat' , $cat_array);
            }
            if(!empty($job_type))
            {
                $this->db->where_in('job_type' , $job_type);
            }
            if(!empty($experience_level))
            {
                $this->db->where_in('job_level' , $experience_level);
            }
            if(!empty($job_title))
            {
                $this->db->like('title' , $job_title);
            }
            if(!empty($job_location))
            {
                $this->db->like('city' , $job_location);
            }
            if(!empty($sort_by))
            {
                $this->db->order_by('id', $sort_by);
            }
            
            // $this->db->order_by('id', 'DESC');
            $this->db->order_by('job_push_date_time', 'DESC');
            $this->db->where(['status'=> 1]);
            $query_strign = $this->db->get_compiled_select('jobs');
            $total_jobs = $this->db->query($query_strign)->num_rows();
            $query = $this->db->query($query_strign.' LIMIT 5 OFFSET '.($page-1)*5);
            $jobs = $query->result();

            if(!empty($min_salary))
            {
                $jobs = array_filter($jobs, function($job) use ($min_salary){
                    return $job->min_salary >= $min_salary;
                });
            }
            if(!empty($max_salary))
            {
                $jobs = array_filter($jobs, function($job) use ($max_salary){
                    return $job->max_salary <= $max_salary;
                });
            }

            foreach($jobs as $index => $job):
                $jobs[$index]->job_type = $this->master->getRow('job_types', ['id'=> $job->job_type]);
                $jobs[$index]->job_category = $this->master->getRow('job_categories', ['id'=> $job->job_category]);
                $jobs[$index]->saved = $this->page->check_job_saved($job->id, $mem_id);
            endforeach;

            $jobList = [];
            foreach($jobs as $index => $jobs):
                $jobList[] = $jobs;
            endforeach;

            $data = [
                'jobs' => $jobList,
                'total_jobs' => $total_jobs
            ];

            http_response_code(200);
            echo json_encode($data);
            exit;
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function fetch_filtered_candidates(){
        if($this->input->post())
        {
            $post = $this->input->post();
            $professions = [];
            $experience_level = '';
            $location = '';
            $page = 1;
            
            foreach($post as $key => $value):
                $value = json_decode($value);
                if($value->field == 'profession')
                {
                    $professions[] = $value->value;
                }
                if($value->field == 'experience_level')
                {
                    $experience_level = $value->value;
                }
                if($value->field == 'location')
                {
                    $location = $value->value;
                }
                if($value->field == 'page')
                {
                    $page = $value->value;
                }
            endforeach;

            if(!empty($professions))
            {
                $this->db->where_in('profession' , $professions);
            }
            if(!empty($location))
            {
                $this->db->like('mem_city' , $location);
                $this->db->or_like('mem_country' , $location);
                $this->db->or_like('mem_zip' , $location);
            }
            $this->db->where('mem_type', 'candidate');
            $this->db->order_by('mem_id', 'DESC');
            $query_strign = $this->db->get_compiled_select('members');
            $total_candidates = $this->db->query($query_strign)->num_rows();
            $query = $this->db->query($query_strign.' LIMIT 5 OFFSET '.($page-1)*5);
            $candidates = $query->result();

            if(!empty($experience_level))
            {
                $candidates = array_filter($candidates, function($candidate) use ($experience_level){
                    return $candidate->mem_experience >= $experience_level;
                });
            }

            foreach($candidates as $index => $candidate)
            {
                $details = $this->master->getRow('mem_profession_details', ['mem_id'=> $candidate->mem_id]);
                $candidates[$index]->details = $details;
            }

            $candidateList = [];
            foreach($candidates as $index => $candidate):
                $candidateList[] = $candidate;
            endforeach;

            $data = [
                'candidates' => $candidateList,
                'total_candidates' => $total_candidates
            ];

            http_response_code(200);
            echo json_encode($data);
            exit;
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }


    // function jobs()
    // {
    //     if($this->input->post())
    //     {
    //         $post = $this->input->post();
    //         $token = explode('_', doDecode($post['authToken']));
    //         $mem_id = $token[1];
    //         $meta = $this->page->getMetaContent('jobs');
    //         $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
    //         $this->data['slug'] = $meta->slug;
    //         $data = $this->page->getPageContent('jobs');
    //         if ($data) 
    //         {
    //             $this->data['content'] = unserialize($data->code);
    //             $this->data['details'] = ($data->full_code);
    //             $this->data['meta_desc'] = json_decode($meta->content);
    //             $cats     = $this->master->getRows('job_categories', ['status'=> 1], '', '', 'asc', 'id');
    //             $this->data['cats'] = [];
    //             foreach($cats as $index => $cat):
    //                 $num = $this->master->num_rows('jobs', ['job_cat'=> $cat->id, 'job_expire >' => date('Y-m-d')]);
    //                 if($num > 0)
    //                 {
    //                     $cat->count = $num; 
    //                     $this->data['cats'][] = $cat;
    //                 }
    //             endforeach;
    
    //             $degree_reuirements     = $this->master->getRows('job_degree', ['status'=> 1], '', '', 'asc', 'title');
    //             $this->data['degree_req'] = [];
    //             foreach($degree_reuirements as $index => $requirement):
    //                 $num = $this->master->num_rows('jobs', ['degree_requirement'=> $requirement->id, 'job_expire >' => date('Y-m-d'), 'status'=> 1]);
    //                 if($num > 0)
    //                 {
    //                     $requirement->count = $num;
    //                     $this->data['degree_req'][] = $requirement;
    //                 }
    //             endforeach;

    //             $cities     = $this->master->getRows('job_locations', ['status'=> 1], '', '', 'asc', 'title');
    //             $this->data['cities'] = [];
    //             foreach($cities as $index => $city):
    //                 $num = $this->master->num_rows('jobs', ['city'=> $city->id, 'job_expire >' => date('Y-m-d'), 'status'=> 1]);
    //                 if($num > 0)
    //                 {
    //                     $city->count = $num;
    //                     $this->data['cities'][] = $city;
    //                 }
    //             endforeach;

    //             $industries     = $this->master->getRows('job_industries', ['status'=> 1], '', '', 'asc', 'title');
    //             $this->data['industries'] = [];
    //             foreach($industries as $index => $industry):
    //                 $num = $this->master->num_rows('jobs', ['job_industry'=> $industry->id, 'job_expire >' => date('Y-m-d'), 'status'=> 1]);
    //                 if($num > 0)
    //                 {
    //                     $industry->count = $num;
    //                     $this->data['industries'][] = $industry;
    //                 }
    //             endforeach;

    
    //             $this->data['jobs'] =  [];
    //             $jobs = $this->master->getRows('jobs', ['status'=> 1, 'job_expire >' => date('Y-m-d')], '', '', 'desc', 'id');
	// 			// pr($this->db->last_query());
    //             foreach($jobs as $index => $j):
    //                 $num = $this->master->num_rows('saved_jobs', ['mem_id'=> $mem_id, 'job_id'=> $j->id]);
    //                 $j->saved = false;
    //                 if($num > 0)
    //                     $j->saved = true;

    //                 $this->data['jobs'][] = $j;
    //             endforeach;
                
    //             http_response_code(200);
    //             echo json_encode($this->data);
    //         } 
    //         else
    //         {
    //             http_response_code(404);
    //         }
    //     }
    //     else
    //     {
    //         http_response_code(404);
    //     }
    //     exit;
    // }

    function save_interview_video()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $videoRecord = [];
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];
            // pr($_FILES, false);
            // pr($post);
            if (isset($_FILES["video"]["name"]) && $_FILES["video"]["name"] != "") {
                $video = upload_video(UPLOAD_PATH.'interview_videos/', 'video');
                // generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$video['file_name'],600,'thumb_');
                if(!empty($video['file_name'])){
                    // if(isset($content_row['video']))
                    //     $this->remove_file(UPLOAD_PATH."images/".$content_row['video']);
                    //     $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['video']);
                    if($post['questionNo'] == '0')
                    {
                        $videoRecord['setup_video'] = $video['file_name'];
                    }
                    else
                    {
						$videoRecord['question']     = $post['question'];
                        $videoRecord['video'] 	     = $video['file_name'];
						$videoRecord['interview_id'] = $post['interview_session_id'];
						
                    }
                }
            }

            if(isset($post['interview_session_id']) && !empty($post['interview_session_id']))
            {
				// pr($videoRecord);
                $this->master->save('video_interview_videos', $videoRecord);
            }
            else
            {
                $videoRecord['mem_id'] = $mem_id;
                $interview_session_id = $this->master->save('video_interview', $videoRecord);
                $res['interview_session_id'] = $interview_session_id;
            }

            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    
        function save_like_job()
        {
            if($this->input->post())
            {
                $res = [];
                $res['status'] = 0;
                $post = $this->input->post();
                if(empty($post['authToken']) || ($post['authToken'] == null) || ($post['authToken'] == 'null'))
                {
                    $res['status'] = 0;
                    $res['message'] = 'Please login to like job';
                    echo json_encode($res);
                    exit;
                }

                $mem_id = $this->page->get_member_id_by_token($post['authToken']);
                $job_id = $post['job_id'];
                $response = $this->page->save_like_job($mem_id, $job_id);
                if($response)
                {
                    $res['status'] = 1;
                    $res['message'] = 'Job liked successfully';
                }
                else
                {
                    $res['status'] = 0;
                    $res['message'] = 'Something went wrong';
                }
                echo json_encode($res);
            }
            else
            {
                http_response_code(404);
            }
            exit;
        }
    

    function save_job()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $mem_id = $this->page->get_member_id_by_token($post['token']);
            $total_saved_jobs = $this->master->num_rows('saved_jobs', ['mem_id'=> $mem_id]);
            $user = $this->master->getRow('members', ['mem_id'=> $mem_id]);
            $plan_id = $user->plan_id;
            $plan = $this->master->getRow('plans', ['id'=> $plan_id]);
            $total_saved_jobs_allowed = $plan->no_of_jobs;
            $mem_plan_details = $this->master->getRow('mem_plan_details', ['mem_id'=> $mem_id]);
            $plan_end_date = $mem_plan_details->plan_end_date;
            if($plan_end_date < date('Y-m-d'))
            {
                $res['msg'] = 'Your plan has been expired. Please renew your plan.';
                echo json_encode($res);
                exit;
            }elseif($total_saved_jobs_allowed > $total_saved_jobs){
                $data = [];
                $data['title'] = $post['title'];
                $data['job_cat'] = $post['category'];
                $data['job_sub_cat'] = $post['sub_category'];
                $data['job_type'] = $post['job_type'];
                $data['job_level'] = $post['experience_level'];
                $data['job_office_type'] = $post['job_office_type'];
                $data['tags'] = implode(',', $post['tags']);
                $data['tags'] = str_replace('"', '', $data['tags']);
                $data['company_name'] = $post['company_name'];
                $data['company_link'] = $post['company_link'];
                $data['city'] = $post['city'];
            
                if($_FILES['company_image']['name'] != ''){
                    $image1 = upload_file(UPLOAD_PATH.'jobs/', 'company_image');
                        generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],100,'thumb_');
                    $data['company_logo'] = $image1['file_name'];
                }
                else{
                    $data['company_logo'] = '';
                }
                
                $data['min_salary'] = $post['minimum_salary'];
                $data['max_salary'] = $post['maximum_salary'];
                $data['min_working_hour'] = $post['min_working_hours'];
                $data['max_working_hour'] = $post['max_working_hours'];
                $data['description'] = $post['description'];

                $job_id = $this->master->save('jobs', $data);
                $mem_id = $this->page->get_member_id_by_token($post['token']);
                $this->master->save('saved_jobs', ['mem_id' => $mem_id, 'job_id' => $job_id]);
                $res['status'] = 1;
            }else
            {
                $res['msg'] = 'You have reached maximum limit of saved jobs';
            }

            echo json_encode($res);
            exit;
        }
    }
    
    function fetch_jobs_categories(){
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $this->data['categories'] = $this->master->getRows('job_categories', ['status'=> 1], '', '', 'asc', 'id');
            
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function fetch_job_sub_categories(){
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $this->data['sub_categories'] = $this->master->getRows('job_subcategories', ['status'=> 1, 'parent_id'=> $post['category_id']], '', '', 'asc', 'id');
            
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function fetch_job_types(){
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $this->data['job_types'] = $this->master->getRows('job_types', ['status'=> 1], '', '', 'asc', 'id');
            
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function fetch_job_experience_levels(){
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $this->data['experience_levels'] = $this->master->getRows('job_levels', ['status'=> 1], '', '', 'asc', 'id');
            
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function fetch_job_locations(){
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $this->data['locations'] = $this->master->getRows('job_locations', ['status'=> 1], '', '', 'asc', 'id');
            
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function save_email_for_newsletter()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $res['validationErrors'] = '';
            $check = $this->master->getRows('newsletter', ['email'=> $post['email']]);
            if(!empty($check))
            {
                $res['validationErrors'] = 'You are already subscribed to our newsletter.';
            }else{
                $data = [];
                $data['email'] = $post['email'];
                $data['status'] = 1;
                $this->master->save('newsletter', $data);
                $res['status'] = 1;
            }
            echo json_encode($res);
            exit;
        }
    }

    function save_interview()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();

            $submit_for_review = $post['submit_for_review'] == 'yes' ? '1' : '0';

            $this->master->save('video_interview', ['submit_for_review'=> $submit_for_review], 'id', $post['interview_session_id']);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }


    function fetch_jobs_data()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];

            $jobs = $this->page->fetch_jobs_data($post);
            $res['jobs'] =  [];
            foreach($jobs as $index => $j):
                $num = $this->master->num_rows('saved_jobs', ['mem_id'=> $mem_id, 'job_id'=> $j->id]);
                $j->saved = false;
                $j->image = get_company_image($j->company_name);
                $j->company_name = get_company_name($j->company_name);
                $j->degree_requirement = get_job_degree($j->degree_requirement);
                $j->city = get_job_city($j->city);
                if($num > 0)
                    $j->saved = true;

                $res['jobs'][] = $j;
            endforeach;
            
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_events_data()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            // $token = explode('_', doDecode($post['authToken']));
            // $mem_id = $token[1];

            $events = $this->page->fetch_events_data($post);
            $res['events'] = [];
            foreach($events as $index => $event):
                $row = $this->master->getRow('event_categories', ['id'=> $event->event_type]);
                $event->cat_name = ucfirst($row->title);
                $res['events'][] = $event;
            endforeach;
            
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_blogs_data()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();

            $res['blogs'] = $this->master->getRows('blogs', ['blog_cat'=> $post['cat_id'], 'status'=> 1], '','', 'desc', 'id');
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_job_details(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            //get user id by auth_token
            $user_id = $this->page->get_member_id_by_token($post['authToken']);
            $res['cv'] = $this->master->getRow('mem_profession_details', ['mem_id'=> $user_id]);    
            $res['job'] = $this->master->getRow('jobs', ['id'=> $post['job_id']]);
            $row = $this->master->getRow('job_types', ['id'=> $res['job']->job_type]);
            $res['job']->job_type_name = $row->title;
            $res['is_applied'] = false;
            if($post['authToken'] && $post['authToken'] !== null){
                $mem_id = $this->page->get_member_id_by_token($post['authToken']);
                $num = $this->master->getRows('mem_job_applications', ['mem_id'=> $mem_id, 'job_id'=> $post['job_id']]);
                if(count($num) > 0)
                    $res['is_applied'] = true;
            }
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_employer_jobs(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);

            $total_saved_jobs = $this->master->num_rows('saved_jobs', ['mem_id'=> $mem_id]);
            $user = $this->master->getRow('members', ['mem_id'=> $mem_id]);
            $plan_id = $user->plan_id;
            $plan = $this->master->getRow('plans', ['id'=> $plan_id]);
            $total_saved_jobs_allowed = $plan->no_of_jobs;

            $res['jobs'] = $this->page->fetch_employer_jobs($mem_id);
            $res['pricing_plan'] = $this->page->get_pricing_plan($mem_id);
            $res['status'] = 1;
            $res['total_saved_jobs'] = $total_saved_jobs;
            $res['total_saved_jobs_allowed'] = $total_saved_jobs_allowed;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_saved_jobs(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);
            $res['jobs'] = $this->page->fetch_saved_jobs($mem_id);
            $res['status'] = 1;
            echo json_encode($res);
        }
    }

    function fetch_employer_data(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);
            $res['jobs'] = $this->page->fetch_employer_jobs($mem_id);

            $job_ids = [];
            foreach($res['jobs'] as $index => $job):
                $job_ids[] = $job->id;
            endforeach;

            // get all mem_application where in job_ids
            $applicants = [];
            foreach($job_ids as $index => $job_id):
                $response = $this->page->fetch_job_applicants($job_id);
                if(count($response) > 0){
                    foreach($response as $i => $r):
                        $job = $this->master->getRow('jobs', ['id'=> $job_id]);
                        $r->job = $job;
                        $applicants[] = $r;
                    endforeach;
                }
            endforeach;

            $res['applicants'] = $applicants;
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }   
    }

    function delete_job(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $job_id = $post['job_id'];
            $this->master->delete_row('jobs', ['id'=> $job_id]);
            $this->master->delete_row('saved_jobs', ['job_id'=> $job_id]);

            $mem_id = $this->page->get_member_id_by_token($post['authToken']);
            $res['jobs'] = $this->page->fetch_employer_jobs($mem_id);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function delete_saved_job(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $job_id = $post['job_id'];
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);
            $this->master->delete_row('like_jobs', ['job_id'=> $job_id, 'mem_id'=> $mem_id]);

            $res['jobs'] = $this->page->fetch_saved_jobs($mem_id);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function update_job(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $job_id = $post['job_id'];
            $data = [];
            $data['title'] = $post['title'];
            $data['job_cat'] = $post['job_cat'];
            $data['job_sub_cat'] = $post['job_sub_cat'];
            $data['job_type'] = $post['job_type'];
            $data['job_level'] = $post['job_level'];
            $data['job_office_type'] = $post['job_office_type'];
            $data['tags'] = implode(',', $post['tags']);
            $data['tags'] = str_replace('"', '', $data['tags']);
            $data['company_name'] = $post['company_name'];
            $data['company_link'] = $post['company_link'];
            $data['city'] = $post['city'];
           
            if($_FILES['company_logo']['name'] != ''){
                $image1 = upload_file(UPLOAD_PATH.'jobs/', 'company_logo');
                    generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],100,'thumb_');
                $data['company_logo'] = $image1['file_name'];
            }
            else{
                $data['company_logo'] = $post['company_logo'];
            }
            
            $data['min_salary'] = $post['min_salary'];
            $data['max_salary'] = $post['max_salary'];
            $data['min_working_hour'] = $post['min_working_hour'];
            $data['max_working_hour'] = $post['max_working_hour'];
            $data['description'] = $post['description'];

            $this->master->update('jobs', $data, ['id'=> $job_id]);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function job_push(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $job_id = $post['job_id']; 
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);
            $mem_jobs = $this->master->getRows('saved_jobs', ['mem_id'=> $mem_id]);
            $job_push_count = 0;
            foreach($mem_jobs as $job){
               $jobDetail = $this->master->getRow('jobs', ['id'=> $job->job_id]);
               $job_push_count += $jobDetail->job_push_count;
            }

            $mem_details = $this->master->getRow('members', ['mem_id'=> $mem_id]);
            $plan = $this->master->getRow('plans', ['id'=> $mem_details->plan_id]);
            $mem_plan_details = $this->master->getRow('mem_plan_details', ['mem_id'=> $mem_id]);
            $plan_end_date = $mem_plan_details->plan_end_date;

            if($plan_end_date < date('Y-m-d')){
                $res['msg'] = 'Your plan has been expired. Please renew your plan.';
                echo json_encode($res);
                exit;
            }elseif($plan->no_of_push > $job_push_count){
                $data = [];
                $jobDetail = $this->master->getRow('jobs', ['id'=> $job_id]);
                $data['job_push_count'] = $jobDetail->job_push_count + 1;
                $data['job_push_date_time'] = date('Y-m-d H:i:s');
                $this->master->update('jobs', $data, ['id'=> $job_id]);
                $res['status'] = 1;
            }else{
                $res['msg'] = 'You push limit is over';
            }
            echo json_encode($res);
            exit;
        }
    }

    function apply_on_job(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);

            $check = $this->master->getRow('mem_job_applications', ['job_id'=> $post['job_id'], 'mem_id'=> $mem_id]);
            if($check){
                $res['msg'] = 'You have already applied on this job';
                echo json_encode($res);
                exit;
            }

            $data = [];
            $data['job_id'] = $post['job_id'];
            $data['mem_id'] = $mem_id;
            $data['cover_letter'] = $post['cover_letter'];
            if($_FILES['resume']['name'] != ''){
                $image1 = upload_file(UPLOAD_PATH.'resumes/', 'resume');
                $data['resume'] = $image1['file_name'];
            }
            else{
                $mem = $this->master->getRow('mem_profession_details', ['mem_id'=> $mem_id]);
                $data['resume'] = $mem->resume;
            }

            $this->master->save('mem_job_applications', $data);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    public function fetch_candidate_applications()
    {
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $mem_id = $this->page->get_member_id_by_token($post['authToken']);
            $res['applications'] = $this->page->fetch_candidate_applications($mem_id);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    public function fetch_job_applicants()
    {
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $job_id = $post['job_id'];
            $res['applicants'] = $this->page->fetch_job_applicants($job_id);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function privacy_policy()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if($post['site_lang'] !== 'french' && $post['site_lang'] !== 'eng')
            {
                http_response_code(404);
                exit;
            }
            $meta = $this->page->getMetaContent('privacy_policy');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('privacy_policy', $post['site_lang']);
            if ($data) 
            {
                $header_footer = $this->page->getPageContent('header_footer', $post['site_lang']);
                $this->data['site_settings']->header_footer = unserialize($header_footer->code);
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $this->data['page_title'] = $this->data['content']['page_title'].' - '.$this->data['site_settings']->site_name;
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function save_contact_message()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[30]', ['min_length'=> 'Please enter full name.', 'max_length'=> 'Name too long.']);
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('msg', 'Comment', 'trim|required|min_length[10]|max_length[1000]', ['min_length'=> 'Please enter a complete Comment.', 'max_length'=> '1000 character limit reached.']);
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());
                $is_added = $this->master->save('contact', $post);
                if($is_added)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function save_payment_method(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $authToken = $post['authToken'];
            $mem_id = $this->page->get_member_id_by_token($authToken);
            $data = [];
            $data['mem_id'] = $mem_id;
            $details = json_decode($post['data']);
            
            $data['bank_name'] = $details->bank_name;
            $data['account_title'] = $details->account_title;
            $data['account_number'] = $details->account_number;
            $data['swift_no'] = $details->swift_no;
            $data['name_on_card'] = $details->name_on_card;
            $data['expire_date'] = $details->expire_date;
            $data['cvc'] = $details->cvc;
        

            // get all the payment_methods where mem_id = $mem_id
            $mem_payment_methods = $this->master->getRows('payment_methods', ['mem_id'=> $mem_id]);
            if($mem_payment_methods){
                foreach ($mem_payment_methods as $key => $value) {
                    if($value->status == 1 && $details->status == 1){
                        $this->master->update('payment_methods', ['status'=> 0], ['id'=> $value->id]);
                    }
                }
            }

            $data['status'] = $details->status == false ? 0 : 1;
            $this->master->save('payment_methods', $data);

            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_payment_methods(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $authToken = $post['authToken'];
            $mem_id = $this->page->get_member_id_by_token($authToken);
            $res['payment_methods'] = $this->page->fetch_payment_methods($mem_id);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function delete_payment_method(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $authToken = $post['authToken'];
            $mem_id = $this->page->get_member_id_by_token($authToken);
            $this->master->delete_row('payment_methods', ['id'=> $post['paymentMethodId']]);
            $res['payment_methods'] = $this->page->fetch_payment_methods($mem_id);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_payment_method_details(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $authToken = $post['authToken'];
            $mem_id = $this->page->get_member_id_by_token($authToken);
            $res['payment_method'] = $this->master->getRow('payment_methods', ['id'=> $post['paymentMethodId']]);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function update_payment_method(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $authToken = $post['authToken'];
            $mem_id = $this->page->get_member_id_by_token($authToken);
            $data = [];
            $data['mem_id'] = $mem_id;
            $details = json_decode($post['data']);

            $data['bank_name'] = $details->bank_name;
            $data['account_title'] = $details->account_title;
            $data['account_number'] = $details->account_number;
            $data['swift_no'] = $details->swift_no;
            $data['name_on_card'] = $details->name_on_card;
            $data['expire_date'] = $details->expire_date;
            $data['cvc'] = $details->cvc;

            // get all the payment_methods where mem_id = $mem_id
            $mem_payment_methods = $this->master->getRows('payment_methods', ['mem_id'=> $mem_id]);
            if($mem_payment_methods){
                foreach ($mem_payment_methods as $key => $value) {
                    if($value->status == 1 && $details->status == 1){
                        $this->master->update('payment_methods', ['status'=> 0], ['id'=> $value->id]);
                    }
                }
            }

            $data['status'] = $details->status == false ? 0 : 1;
            $this->master->update('payment_methods', $data, ['id'=> $details->paymentMethodId]);

            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    public function charge() {
        $amount = $this->input->post('amount');
        $card_number = $this->input->post('card_number');
        $exp_date = $this->input->post('exp_date');
        $cvv = $this->input->post('cvv');

        require_once APPPATH . 'third_party/stripe/init.php';

        \Stripe\Stripe::setApiKey("YOUR_STRIPE_API_SECRET_KEY");

        $charge = \Stripe\Charge::create([
            'amount' => $amount * 100, // convert to cents
            'currency' => 'usd',
            'source' => [
            'object' => 'card',
            'number' => $card_number,
            'exp_month' => substr($exp_date, 0, 2),
            'exp_year' => substr($exp_date, -2),
            'cvc' => $cvv,
            ],
        ]);

        if ($charge->status == 'succeeded') {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    function fetch_all_members(){
        if($this->input->post()){
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $res['members'] = $this->page->fetch_all_members();
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
        else{
            $res['status'] = 0;
            echo json_encode($res);
            exit;
        }
    }

    function upload_attachments(){

        $attachments = $_FILES['attachments'];

        // loop through the attachments and store in folder
        $attachment_names = [];
        foreach ($attachments['name'] as $key => $value) {
            $attachment_name = time().$key.'_'.$value;
            $attachment_names[] = $attachment_name;
            $this->master->save('attachments', ['attachment_name'=> $attachment_name]);
            move_uploaded_file($attachments['tmp_name'][$key], 'uploads/attachments/'.$attachment_name);
        }

        $res['status'] = 1;
        $res['attachment_names'] = $attachment_names;
        echo json_encode($res);
    }
}
 