<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    private $home = 'http://23.97.75.244/icoparenting/';
    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function login($page = 'login')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $reqest = $this->input->post();
        if(!empty($reqest["send"]))
        {
            redirect(base_url().'index.php//backend/firm_list', 'refresh');
        }
        $this->load->database('default');

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/teacher_header', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/teacher_footer', $data);
    }
    public function firm_list($page = 'firm_list')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        if(!empty($request["check"]))
        {
            $insertdata = array();
            $insertdata["check_state"] = 1;
            $this->db->where('id',$request["check"]);
            $this->db->update('firm_info', $insertdata);
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('menu');
        }elseif(!empty($request["service"]))
        {
            redirect(base_url().'index.php/backend/service_list?firm='.$request["service"], 'refresh');
        }else if(!empty($request["sign"]))
        {
            redirect(base_url().'index.php/backend/sign_up_list?id='.$request["sign"], 'refresh');
        }else if(!empty($request["vote"]))
        {
            redirect(base_url().'index.php/backend/competitor_list?id='.$request["vote"], 'refresh');
        }else if(!empty($request["winner"]))
        {
            redirect(base_url().'index.php/backend/winner_list?id='.$request["winner"], 'refresh');
        }
        $query = $this->db->select('id, acc, name, contact_name, tel, email, identify, address, code, bank, bank_sub, bank_acc, bank_img, phone_check, check_state')->get('firm_info');
        $data['firm'] = $query->result_array();
        $data["choose"] = "1";
        $query = $this->db->select('id, name, code')
            ->get('bank');
        $service = $query->result_array();
        $data['bank'] = $service;
        $bank = array();
        foreach($data['bank'] as $item)
        {
            $bank[$item["id"]] = $item;
        }

        for($i=0; $i<count($data["firm"]); $i++)
        {
            if($data["firm"][$i]['phone_check'] == 0)
            {
                $data["firm"][$i]['pass'] = '未通過';
            }else
            {
                $data["firm"][$i]['pass'] = '通過';
            }
            if(empty($bank[$data["firm"][$i]['bank']]))
            {
                $data["firm"][$i]['bank_all'] = "";
            }else
            {
                $data["firm"][$i]['bank_all'] = $bank[$data["firm"][$i]['bank']]["name"].$bank[$data["firm"][$i]['bank']]["code"]."<br>".$data["firm"][$i]['bank_sub']."<br>".$data["firm"][$i]['bank_acc'];
                $data["firm"][$i]['bank_all'] .= '<br> <a href="'.base_url().'service_img/'.$data["firm"][$i]["bank_img"].'" target="_blank">存摺照片</a>';
            }
        }


        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function member_list($page = 'member_list')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        if(!empty($request["check"]))
        {
            $insertdata = array();
            $insertdata["check_state"] = 1;
            $this->db->where('id',$request["check"]);
            $this->db->update('firm_info', $insertdata);
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('menu');
        }elseif(!empty($request["service"]))
        {
            redirect(base_url().'index.php/backend/order_list?mid='.$request["service"], 'refresh');
        }

        $query = $this->db->select('id, acc, name, tel, email, code, phone_check')->get('member_info');
        $data['member_info'] = $query->result_array();
        $data["choose"] = "1";

        for($i=0; $i<count($data["member_info"]); $i++)
        {
            if($data["member_info"][$i]['phone_check'] == 0)
            {
                $data["member_info"][$i]['pass'] = '未通過';
            }else
            {
                $data["member_info"][$i]['pass'] = '通過';
            }

        }


        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function service_list($page = 'service_list')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["down"]))
        {
            $insertdata = array();
            $insertdata["ready"] = 2;
            $this->db->where('id',$request["down"]);
            $this->db->update('service', $insertdata);
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('service');
        }elseif(!empty($request["service"]))
        {
            redirect(base_url().'index.php/backend/service_list?firm='.$request["service"], 'refresh');
        }

        if(isset($get["firm"]))
        {
            $query = $this->db->select('id, cat, name, buy, fav, eva, fee, ready ')
                ->order_by("buy","desc")
                ->where('firm', $get["firm"])
                ->get('service');
            $service = $query->result_array();
            $data['service'] = $service;
        }else
        {
            $query = $this->db->select('id, cat, name, buy, fav, eva, fee, ready ')
                ->order_by("buy","desc")
                ->get('service');
            $service = $query->result_array();
            $data['service'] = $service;
        }

        $data["choose"] = "1";


        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }
    public function order_list($page = 'order_list')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["down"]))
        {
            $insertdata = array();
            $insertdata["ready"] = 2;
            $this->db->where('id',$request["down"]);
            $this->db->update('service', $insertdata);
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('service');
        }elseif(!empty($request["service"]))
        {
            redirect(base_url().'index.php/backend/service_list?firm='.$request["service"], 'refresh');
        }


        $this->db->select('o_info.id, service.id as s_id, service.name, o_info.re_date, o_info.re_time, o_info.fee, firm_info.name as f_name, firm_info.tel as f_tel, firm_info.id as f_id, o_info.state, member_info.name as m_name, member_info.tel as m_tel');
        $this->db->from('o_info');
        $this->db->join('service', 'service.id = o_info.service_id');
        $this->db->join('member_info', 'member_info.id = o_info.user_id');
        $this->db->join('firm_info', 'firm_info.id = service.firm');
        if(isset($get["mid"]))
        {
            $this->db->where('member_info.id ', $get["mid"]);
        }
        $query = $this->db->get();
        $data['order'] = $query->result_array();
        $data["choose"] = "1";
        for($i=0; $i<count($data["order"]); $i++)
        {
            if($data["order"][$i]['state'] == 0)
            {
                $data["order"][$i]['state'] = '未收款';
            }else if($data["order"][$i]['state'] == 2)
            {
                $data["order"][$i]['state'] = '完成';
            }else if($data["order"][$i]['state'] == 3)
            {
                $data["order"][$i]['state'] = '已收款';
            }else if($data["order"][$i]['state'] == 4)
            {
                $data["order"][$i]['state'] = '爭議申訴';
            }else if($data["order"][$i]['state'] == 5)
            {
                $data["order"][$i]['state'] = '爭議已處理';
            }
            else
            {
                $data["order"][$i]['state'] = '取消';
            }

        }


        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function a_list($page = 'a_list')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["down"]))
        {
            $insertdata = array();
            $insertdata["state"] = 5;
            $this->db->where('id',$request["down"]);
            $this->db->update('o_info', $insertdata);
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('service');
        }elseif(!empty($request["service"]))
        {
            redirect(base_url().'index.php/backend/service_list?firm='.$request["service"], 'refresh');
        }


        $this->db->select('o_info.id, service.id as s_id, service.name, o_info.re_date, o_info.re_time, o_info.fee, firm_info.name as f_name, firm_info.tel as f_tel, firm_info.id as f_id, o_info.state, member_info.name as m_name, member_info.tel as m_tel');
        $this->db->from('o_info');
        $this->db->join('service', 'service.id = o_info.service_id');
        $this->db->join('member_info', 'member_info.id = o_info.user_id');
        $this->db->join('firm_info', 'firm_info.id = service.firm');
        $this->db->where('state',4);
        $query = $this->db->get();
        $data['o_info'] = $query->result_array();
        $data["choose"] = "1";
        for($i=0; $i<count($data["order"]); $i++)
        {
            if($data["order"][$i]['state'] == 0)
            {
                $data["order"][$i]['state'] = '未收款';
            }else if($data["order"][$i]['state'] == 2)
            {
                $data["order"][$i]['state'] = '完成';
            }else if($data["order"][$i]['state'] == 3)
            {
                $data["order"][$i]['state'] = '已收款';
            }else if($data["order"][$i]['state'] == 4)
            {
                $data["order"][$i]['state'] = '爭議申訴';
            }else if($data["order"][$i]['state'] == 5)
            {
                $data["order"][$i]['state'] = '爭議已處理';
            }
            else
            {
                $data["order"][$i]['state'] = '取消';
            }

        }


        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function m_count($page = 'm_count')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["down"]))
        {
            $insertdata = array();
            $insertdata["state"] = 5;
            $this->db->where('id',$request["down"]);
            $this->db->update('o_info', $insertdata);
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('service');
        }elseif(!empty($request["search"]))
        {
            redirect(base_url().'index.php/backend/m_count_list?d='.$request["y"].'-'.$request["m"].'-', 'refresh');
        }



        $data["choose"] = "1";



        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function m_count_list($page = 'm_count_list')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["down"]))
        {
            $this->db->select('draw.id, draw.draw');
            $this->db->from('draw');
            $query = $this->db->get();
            $draw = $query->result_array();
            $this->db->select('o_info.id, service.id as s_id, service.name, o_info.re_date, o_info.re_time, o_info.fee, firm_info.id as f_id, firm_info.name as f_name, firm_info.tel as f_tel, firm_info.id as f_id, o_info.state, member_info.name as m_name, member_info.tel as m_tel');
            $this->db->from('o_info');
            $this->db->join('service', 'service.id = o_info.service_id');
            $this->db->join('member_info', 'member_info.id = o_info.user_id');
            $this->db->join('firm_info', 'firm_info.id = service.firm');
            $this->db->where('firm_info.id',$request["down"]);
            $this->db->where('o_info.state',2);
            $this->db->or_where('o_info.state',3);
            $this->db->like('o_info.finish_date',$request["d"]);
            $query = $this->db->get();
            $order = $query->result_array();
            $order_id = array();
            foreach($order as $item)
            {
                $order_id[] = $item["id"];
            }
            $insertdata = array();
            $insertdata["state"] = 3;
            $insertdata["final_p"] = $draw[0]['draw'];
            $this->db->where_in('id',$order_id);
            $this->db->update('o_info', $insertdata);
        }elseif(!empty($request["down_all"]))
        {
            $this->db->select('o_info.id, service.id as s_id, service.name, o_info.re_date, o_info.re_time, o_info.fee, firm_info.id as f_id, firm_info.name as f_name, firm_info.tel as f_tel, firm_info.id as f_id, o_info.state, member_info.name as m_name, member_info.tel as m_tel');
            $this->db->from('o_info');
            $this->db->join('service', 'service.id = o_info.service_id');
            $this->db->join('member_info', 'member_info.id = o_info.user_id');
            $this->db->join('firm_info', 'firm_info.id = service.firm');
            $this->db->where('o_info.state',2);
            $this->db->or_where('o_info.state',3);
            $this->db->like('o_info.finish_date',$request["d"]);
            $query = $this->db->get();
            $order = $query->result_array();
            $order_id = array();
            foreach($order as $item)
            {
                $order_id[] = $item["id"];
            }
            $insertdata = array();
            $insertdata["state"] = 3;
            $this->db->where_in('id',$order_id);
            $this->db->update('order', $insertdata);
        }elseif(!empty($request["back"]))
        {
            redirect(base_url().'index.php/backend/m_count', 'refresh');
        }

        if(isset($get["d"]))
        {
            $data["d"] = $get["d"];
        }else if(isset($request["d"]))
        {
            $data["d"] = $request["d"];
        }
        $o_state = [2,3];
        $this->db->select('o_info.id, service.id as s_id, service.name, o_info.re_date, o_info.re_time, o_info.fee, firm_info.id as f_id, firm_info.name as f_name, firm_info.tel as f_tel, firm_info.id as f_id, o_info.state, member_info.name as m_name, member_info.tel as m_tel, o_info.final_p');
        $this->db->from('o_info');
        $this->db->join('service', 'service.id = o_info.service_id');
        $this->db->join('member_info', 'member_info.id = o_info.user_id');
        $this->db->join('firm_info', 'firm_info.id = service.firm');
        $this->db->like('o_info.finish_date',$data["d"]);
        $this->db->where_in('o_info.state',$o_state);

        $query = $this->db->get();
        $data['order'] = $query->result_array();
        $data["choose"] = "1";

        $this->db->select('draw.id, draw.draw');
        $this->db->from('draw');
        $query = $this->db->get();
        $data['draw'] = $query->result_array();


        $count = array();
        foreach($data['order'] as $item )
        {
            if(isset($count[$item["f_id"]]))
            {
                //var_dump($item["f_id"]);
                $count[$item["f_id"]]["money"] = $count[$item["f_id"]]["money"]+$item["fee"];

            }else
            {
                $count[$item["f_id"]]["id"] = $item["f_id"];
                $count[$item["f_id"]]["name"] = $item["name"];
                $count[$item["f_id"]]["money"] = $item["fee"];
                if($item["state"] == 3)
                {
                    $count[$item["f_id"]]["state"] = "已收款";
                    $count[$item["f_id"]]["p"] = $data['draw'][0]['draw'];

                }else
                {
                    $count[$item["f_id"]]["state"] = "未收款";
                    $count[$item["f_id"]]["p"] = $item["final_p"];
                }
            }
        }

        //var_dump($count);
        $data['total'] = 0;
        $data['total_get'] = 0;

        foreach($count as $item)
        {
            $data['total'] = $data['total']+$item["money"];
            $data['total_get'] = $data['total_get'] + $item["money"]*$item["p"]/100;
        }
        $data['count'] = $count;
        //$data['total_get'] = $data['total']*$data['draw'][0]['draw']/100;
        $data['total_pay'] = $data['total'] - $data['total_get'];
        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function y_count($page = 'y_count')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["down"]))
        {
            $insertdata = array();
            $insertdata["state"] = 5;
            $this->db->where('id',$request["down"]);
            $this->db->update('o_info', $insertdata);
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('service');
        }elseif(!empty($request["search"]))
        {
            redirect(base_url().'index.php/backend/y_count_list?d='.$request["y"].'-', 'refresh');
        }



        $data["choose"] = "1";



        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function y_count_list($page = 'y_count_list')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["down"]))
        {
            $this->db->select('o_info.id, service.id as s_id, service.name, o_info.re_date, o_info.re_time, o_info.fee, firm_info.id as f_id, firm_info.name as f_name, firm_info.tel as f_tel, firm_info.id as f_id, o_info.state, member_info.name as m_name, member_info.tel as m_tel');
            $this->db->from('o_info');
            $this->db->join('service', 'service.id = o_info.service_id');
            $this->db->join('member_info', 'member_info.id = o_info.user_id');
            $this->db->join('firm_info', 'firm_info.id = service.firm');
            $this->db->where('firm_info.id',$request["down"]);
            $this->db->where('o_info.state',2);
            $this->db->or_where('o_info.state',3);
            $this->db->like('o_info.finish_date',$request["d"]);
            $query = $this->db->get();
            $order = $query->result_array();
            $order_id = array();
            foreach($order as $item)
            {
                $order_id[] = $item["id"];
            }
            $insertdata = array();
            $insertdata["state"] = 3;
            $this->db->where_in('id',$order_id);
            $this->db->update('o_info', $insertdata);
        }elseif(!empty($request["down_all"]))
        {
            $this->db->select('o_info.id, service.id as s_id, service.name, o_info.re_date, o_info.re_time, o_info.fee, firm_info.id as f_id, firm_info.name as f_name, firm_info.tel as f_tel, firm_info.id as f_id, o_info.state, member_info.name as m_name, member_info.tel as m_tel');
            $this->db->from('o_info');
            $this->db->join('service', 'service.id = o_info.service_id');
            $this->db->join('member_info', 'member_info.id = o_info.user_id');
            $this->db->join('firm_info', 'firm_info.id = service.firm');
            $this->db->where('o_info.state',2);
            $this->db->or_where('o_info.state',3);
            $this->db->like('o_info.finish_date',$request["d"]);
            $query = $this->db->get();
            $order = $query->result_array();
            $order_id = array();
            foreach($order as $item)
            {
                $order_id[] = $item["id"];
            }
            $insertdata = array();
            $insertdata["state"] = 3;
            $this->db->where_in('id',$order_id);
            $this->db->update('order', $insertdata);
        }elseif(!empty($request["back"]))
        {
            redirect(base_url().'index.php/backend/m_count', 'refresh');
        }

        if(isset($get["d"]))
        {
            $data["d"] = $get["d"];
        }else if(isset($request["d"]))
        {
            $data["d"] = $request["d"];
        }
        $o_state = [2,3];
        $this->db->select('o_info.id, service.id as s_id, service.name, o_info.re_date, o_info.re_time, o_info.fee, firm_info.id as f_id, firm_info.name as f_name, firm_info.tel as f_tel, firm_info.id as f_id, o_info.state, member_info.name as m_name, member_info.tel as m_tel, o_info.final_p');
        $this->db->from('o_info');
        $this->db->join('service', 'service.id = o_info.service_id');
        $this->db->join('member_info', 'member_info.id = o_info.user_id');
        $this->db->join('firm_info', 'firm_info.id = service.firm');
        $this->db->like('o_info.finish_date',$data["d"]);
        $this->db->where_in('o_info.state',$o_state);

        $query = $this->db->get();
        $data['order'] = $query->result_array();
        $data["choose"] = "1";

        $this->db->select('draw.id, draw.draw');
        $this->db->from('draw');
        $query = $this->db->get();
        $data['draw'] = $query->result_array();


        $count = array();
        foreach($data['order'] as $item )
        {
            if(isset($count[$item["f_id"]]))
            {
                //var_dump($item["f_id"]);
                if($item["state"] == 3)
                {
                    $count[$item["f_id"]]["p_money"] = $count[$item["f_id"]]["p_money"]+$item["fee"];
                    $count[$item["f_id"]]["p_money2"] = $count[$item["f_id"]]["p_money2"]+$item["fee"]*$item["final_p"]/100;

                }else
                {
                    $count[$item["f_id"]]["u_money"] = $count[$item["f_id"]]["p_money"]+$item["fee"];
                }


            }else
            {
                $count[$item["f_id"]]["id"] = $item["f_id"];
                $count[$item["f_id"]]["name"] = $item["name"];
                //$count[$item["f_id"]]["money"] = $item["fee"];
                if($item["state"] == 3)
                {
                    $count[$item["f_id"]]["p_money"] = $item["fee"];
                    $count[$item["f_id"]]["p_money2"] = $item["fee"]*$item["final_p"]/100;
                    $count[$item["f_id"]]["u_money"] = 0;
                }else
                {
                    $count[$item["f_id"]]["p_money"] = 0;
                    $count[$item["f_id"]]["p_money2"] = 0;
                    $count[$item["f_id"]]["u_money"] = $item["fee"];
                }
            }
        }

        //var_dump($count);
        $data['total'] = 0;
        $data['total_get'] = 0;

        foreach($count as $item)
        {
            $data['total'] = $data['total']+$item["p_money"]+$item["u_money"];
        }
        $data['count'] = $count;
        //$data['total_get'] = $data['total']*$data['draw'][0]['draw']/100;
        $data['total_pay'] = $data['total'] - $data['total_get'];
        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function set($page = 'draw')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["save"]))
        {
            $insertdata = array();
            $insertdata["draw"] = $request["draw"];
            $this->db->where('id',1);
            $this->db->update('draw', $insertdata);
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('service');
        }elseif(!empty($request["search"]))
        {
            redirect(base_url().'index.php/backend/m_count_list?d='.$request["y"].'-'.$request["m"], 'refresh');
        }

        $this->db->select('draw.id, draw.draw');
        $this->db->from('draw');
        $query = $this->db->get();
        $data['draw'] = $query->result_array();

        $data["choose"] = "1";



        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function special_list($page = 'special_list')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["new"]))
        {
            redirect(base_url().'index.php/backend/edit_special', 'refresh');
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('special_item');
        }elseif(!empty($request["edit"]))
        {
            redirect(base_url().'index.php/backend/edit_special?id='.$request["edit"], 'refresh');
        }


        $this->db->select('special_item.id, service.id as s_id, service.name, 	special_item.type, 	special_item.title');
        $this->db->from('special_item');
        $this->db->join('service', 'service.id = special_item.service_id');
        $query = $this->db->get();
        $data['special_item'] = $query->result_array();
        $data["choose"] = "1";

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }

    public function edit_special($page = 'edit_special')
    {
        if (!file_exists(APPPATH . 'views/backend/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        /*
        if (isset($session["login"]) && $session["login"] == 2) {
            $data["login"] = $session["login"];
        } else {
            redirect(base_url() . 'index.php', 'refresh');
        }
        */
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["update"]))
        {
            $insertdata = array();
            $insertdata["service_id"] =  $request["service_id"];
            $insertdata["title"] =  $request["title"];
            $insertdata["type"] =  $request["type"];
            $this->db->where('id',$request["update"]);
            $this->db->update('special_item', $insertdata);
            redirect(base_url().'index.php/backend/special_list', 'refresh');
        }elseif(!empty($request["save"]))
        {
            $insertdata = array();
            $insertdata["service_id"] =  $request["service_id"];
            $insertdata["title"] =  $request["title"];
            $insertdata["type"] =  $request["type"];
            $this->db->insert('special_item', $insertdata);
            redirect(base_url().'index.php/backend/special_list', 'refresh');
        }elseif(!empty($request["service"]))
        {
            redirect(base_url().'index.php/backend/service_list?firm='.$request["service"], 'refresh');
        }

        if(isset($get['id']))
        {
            $this->db->select('special_item.id, special_item.service_id, 	special_item.type, 	special_item.title');
            $this->db->from('special_item');
            $this->db->where('id',$get['id']);
            $query = $this->db->get();
            $data['special_item'] = $query->result_array();
        }
        $this->db->select('service.id, service.name');
        $this->db->from('service');
        $query = $this->db->get();
        $data['service'] = $query->result_array();
        $data["choose"] = "1";

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/backend_header', $data);
        //$this->load->view('templates/backend_left_edm', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/backend_footer', $data);
    }
}