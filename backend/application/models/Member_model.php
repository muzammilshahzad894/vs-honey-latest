<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member_model extends CRUD_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = "members";
        $this->field = "mem_id";
    }

    function getMember($mem_id, $where = '')
    {
        if(!empty($where))
            $this->db->where($where);
        $this->db->where('mem_id', $mem_id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

	function getNonVerifiedUser($email)
	{
        $this->db->where('mem_email', $email);
        $this->db->where('mem_verified', 0);
        $query = $this->db->get($this->table_name);
        return $query->row();
	}

    function getMemData($mem_id)
    {
        $this->db->select('mem_fname, mem_lname, mem_email, mem_phone, mem_image');
        $this->db->from('members');
        $this->db->where('mem_id', $mem_id);
        return $this->db->get()->row();
    }

    function getMembers($where = '', $start = '', $offset = '', $order_by = '')
    {
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("mem_id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function getSavedJobs($mem_id)
    {
        $this->db->select('j.*, sj.id as saved_id, sj.online_test, sj.interview, sj.second_round_interview, sj.final_round_interview, sj.offer');
        $this->db->from('jobs j');
        $this->db->join('saved_jobs sj', 'j.id=sj.job_id');
        $this->db->where(['sj.mem_id'=> $mem_id, 'j.status'=> '1']);
        $this->db->order_by('j.id', 'desc');
        $this->db->group_by('j.id');
        return $this->db->get()->result();
    }

    function clear_notifs()
    {
        $this->db->set(['status'=> 'seen']);
        $this->db->where(['mem_id'=> $this->session->mem_id]);
        $this->db->update('notifications');
        return true;
    }

    function get_members_by_order($where = '', $start = '', $offset = '', $order_field = 'mem_id', $order_by = '')
    {

        $this->db->select("*, (SELECT AVG(rating) FROM `tbl_reviews` `r` WHERE `r`.`mem_id`=`tbl_members`.`mem_id`) as rating");
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by($order_field, $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);

        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_active_members()
    {

        $this->db->where(array('mem_status' => 1, 'mem_verified' => 1));
        $this->db->order_by("mem_id", $order_by);

        $query = $this->db->get($this->table_name);
        return $query->result();
    }


    function get_player($mem_id)
    {

        $this->db->where(array('mem_status' => 1, 'mem_verified' => 1, 'mem_player_verified' => 1, 'mem_type' => 'player'/*, 'mem_phone_verified' => '1'*/));
        $this->db->where("mem_id", $mem_id);

        $query = $this->db->get($this->table_name);
        return $query->row();
    }
    
    function oldPswdCheck($mem_id, $mem_pswd)
    {
        $mem_pswd = doEncode($mem_pswd);
        $this->db->where('mem_id', $mem_id);
        $this->db->where('mem_pswd', $mem_pswd);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }
    function getMembersInterviews()
    {
        $this->db->where(['mem_id <>'=> null]);
        $query = $this->db->get('video_interview');
        return $query->result();
    }


    function search_members($post)
    {
        // $this->db->select('mem.*, ms.price, s.price_label, (SELECT AVG(rating) FROM `tbl_reviews` where `tbl_reviews`.mem_id=mem.mem_id and parent_id is NULL) as mem_avg_rating');
        $this->db->from($this->table_name.' mem');
        $this->db->join('characters c', "FIND_IN_SET(c.id, mem.mem_characters) > 0");
        if (!empty($post['character'])) {
            $this->db->group_start()
            // ->where("subject_id in(select id from tbl_subjects where name like '".$this->db->escape_like_str($post['subject'])."%')")
            ->like('c.title', $post['character'], 'both')
            ->or_like('mem.mem_profile_heading', $post['character'], 'both')
            ->or_like('mem.mem_fname', $post['character'], 'both')
            ->or_like('mem.mem_lname', $post['character'], 'both')
            ->group_end();
        }

        if (!empty($post['price'])) {
            $ary = @explode(';', $post['price']);
            $min_rate = floatval(trim($ary[0]));
            $max_rate = floatval(trim($ary[1]));
            $this->db->where("( mem.mem_rate >= $min_rate AND mem.mem_rate <= $max_rate ) ", null, false);
        }
        
        /*
        if (isset($keywords['gender']) && count($keywords['gender']) > 0) {
            $genders = $keywords['gender'];

            foreach ($genders as $gen) {
                $where_type[] = " (gender LIKE '%$gen%')";
            }
            if (count($where_type) > 0) {
                $where_type_string = @implode(' OR ', $where_type);
            }
            $this->db->where(" ( " . $where_type_string . " ) ", null, false);
        }

        if (isset($keywords['gender']) && count($keywords['gender']) > 0) {
            $genders = $keywords['gender'];

            foreach ($genders as $gen) {
                $where_type[] = " (p.gender LIKE '%$gen%')";
            }
            if (count($where_type) > 0) {
                $where_type_string = @implode(' OR ', $where_type);
            }
            $this->db->where(" ( " . $where_type_string . " ) ", null, false);
        }
        */

        $this->db->where('mem.mem_type', 'player');
        $this->db->where('mem.mem_verified', 1);
        $this->db->where('mem.mem_status', 1);
        // $this->db->where('mem.mem_phone_verified', 1);
        $this->db->where('mem.mem_player_verified', 1);

        if (!empty($post['city']))
            $this->db->like('mem.mem_city', $post['city']);
        if (!empty($post['country']))
            $this->db->where("FIND_IN_SET('".$post['country']."', mem.mem_availability) >0");
            // $this->db->where('mem.mem_country_id', $post['country']);

        if (!empty($post['zip'])){
            $coordinates = get_location_detail($post['zip']);
            $post['lat'] = $coordinates->Latitude;
            $post['lng'] = $coordinates->Longitude;
        }
        
        /*if (!empty($post['lat']) && !empty($post['lng'])) {
            $d=intval($post['distance']);
            $this->db->select("mem.*, (69.0 * DEGREES(ACOS(COS(RADIANS({$post['lat']}))
                      * COS(RADIANS(mem.mem_map_lat))
                      * COS(RADIANS({$post['lng']}) - RADIANS(mem.mem_map_lng))
                        + SIN(RADIANS({$post['lat']}))
                      * SIN(RADIANS(mem.mem_map_lat))))) AS distance, (SELECT AVG(rating) FROM `tbl_reviews` where `tbl_reviews`.mem_id = mem.mem_id and parent_id is NULL) as mem_avg_rating
                        ");
            $this->db->having('mem.mem_travel_radius >= distance');
            $this->db->having('distance<=',  50);
        }
        else*/
            $this->db->select('mem.*, (SELECT AVG(rating) FROM `tbl_reviews` where `tbl_reviews`.mem_id = mem.mem_id and parent_id is NULL) as mem_avg_rating');

        /*if (!empty($post['sort']) && in_array($post['sort'], array('asc', 'desc'))) 
            $this->db->order_by('mem.mem_hourly_rate', $post['sort']);*/
        
        $this->db->group_by('mem.mem_id');
        // $this->db->order_by('mem.mem_membership_pref', 'desc');
        return $this->db->get()->result();

        /*$query = $this->db->get();
        $rows = array();
        foreach ($query->result() as $key => $row) {
            $rows[$key] = $row;
            $rows[$key]->total_favorites = $this->total_favorites($row->id);
        }
        return $rows;*/
    }


    function changeStatus($mem_id)
    {
        $this->db->where('mem_id', $mem_id);
        $query = $this->db->get($this->table_name);
        $rs = $query->row();

        if ($rs->mem_status == '0') {
            $vals['mem_status'] = '1';
        } else {
            $vals['mem_status'] = '0';
        }
        $this->db->set($vals);
        $this->db->where('mem_id', $mem_id);
        $this->db->update($this->table_name);
        return $vals['mem_status'];
    }


    function emailExists($mem_email, $mem_id = 0)
    {
        $this->db->where('mem_email', $mem_email);
        $this->db->where('mem_id <> ' . $mem_id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function phoneExists($mem_phone, $mem_id = 0)
    {
        $this->db->where('mem_phone', $mem_phone);
        $this->db->where('mem_id <> ' . $mem_id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function forgotEmailExists($mem_email)
    {
        $this->db->where('mem_email', $mem_email);
        // $this->db->where('mem_status', '1');
        $this->db->where('mem_verified', '1');
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function memberExists($mem_keyword)
    {
        $this->db->where('mem_email', $mem_keyword);
        $this->db->or_where('mem_username', $mem_keyword);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function usernameExists($mem_username)
    {
        $this->db->where('mem_username', $mem_username);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function ipExists($mem_id, $mem_ip)
    {
        if (!empty($mem_ip)) {
            $this->db->where("mem_id <> " . $mem_id);
            $this->db->where('mem_ip', $mem_ip);
            $query = $this->db->get($this->table_name);
            if ($query->row())
                return true;
        }
        return false;
    }

    function socialIdExists($mem_type, $mem_id)
    {
        $this->db->where('mem_social_type', $mem_type);
        $this->db->where('mem_social_id', $mem_id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function getMemCode($mem_code, $mem_id = 0)
    {
        if($mem_id>0)
            $this->db->where('mem_id', $mem_id);
        $this->db->where('mem_code', $mem_code);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function authenticate($mem_email, $mem_pswd, $mem_type = NULL) {
        $mem_pswd = doEncode($mem_pswd);
        if (!empty($mem_type))
            $this->db->where('mem_type', $mem_type);

        $this->db->where('mem_email', $mem_email);
        $this->db->where('mem_pswd', $mem_pswd);
        // $this->db->where('mem_status', '1');
        $query = $this->db->get($this->table_name);
        // return $this->db->last_query();
        return $query->row();
    }

    function authenticateEmail($mem_email) {
        $this->db->where('mem_email', $mem_email);
        $this->db->where('mem_verified', '1');
        $query = $this->db->get($this->table_name);
        // return $this->db->last_query();
        return $query->row();
    }
    function update_last_login($id, $token = '')
    {
        /*
        $this->db->where('mem_id', $id);
        $query = $this->db->get($this->table_name);
        $rs = $query->row();
        */

        // $this->session->set_userdata('last_login', array('ip' => $rs->site_ip, 'time_date' => $rs->site_lastlogindate));

        // $vals['mem_ip'] = $_SERVER["REMOTE_ADDR"];
        if(!empty($token))
            $vals['mem_remember'] = $token;

        $vals['mem_token'] = $this->session->session_id;
        $vals['mem_last_login'] = date('Y-m-d h:i:s');
        $this->save($vals, $id);
    }

    function get_max_rate()
    {
        $this->db->select_max('mem_rate');
        $query = $this->db->get('members');
        return floatval($query->row()->mem_rate);
    }

    function get_max_distance()
    {
        $this->db->select_max('mem_travel_radius');
        $query = $this->db->get($this->table_name);
        return floatval($query->row()->mem_travel_radius);
    }

    function get_plan_paid_status($mem_id)
    {
        $this->db->select('plan_buy_status');
        $this->db->where('mem_id', $mem_id);
        $query = $this->db->get('mem_plan_details');
        return $query->row();
    }

    function getPlanDetails($plan_id = ''){
        $this->db->where('id', $plan_id);
        $query = $this->db->get('plans');
        return $query->row();
    }
}
?>

