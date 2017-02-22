<?php
class index extends CI_Controller {

    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }

        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');
        $data['url'] = $url;

        $this->load->database('default');
        $reqest = $this->input->post();
        $get = $this->input->get();
        if(!empty($get["area"]))
        {
            for($i=1; $i<=5;$i++)
            {
                $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
                    ->where('cat', $i)
                    ->where("way = '1' OR (way='2' AND zone='".$get["area"]."')")
                    ->get('service');
                $service = $query->result_array();
                $data['service'.$i] = $service;
            }
        }
        else
        {
            for($i=1; $i<=5;$i++)
            {
                $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
                    ->where('cat', $i)
                    ->get('service');
                $service = $query->result_array();
                $data['service'.$i] = $service;
            }
        }


        $this->db->close(); //database close

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function firm_reg($page = 'firm_reg')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }
        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->db->close(); //database close
        if(isset($request["send"]))
        {
            $this->load->database('default');
            $query = $this->db->select('id, acc')->where('acc', $request["email"])->get('firm_info');
            //var_dump($query);
            /*
                foreach ($query->result_array() as $row)
                {
                    echo $row['id'].'<br>';
                }
            */

            if(count($query->result_array()))
            {
                echo '<script language="JavaScript"> alert("帳號已經存在");history.go(-1); //回上一頁</script>';
                return;
            }
            else{
                $data_index=array("email"=>"電子信箱","name"=>"姓名","tel"=>"聯絡電話","psd"=>"密碼","psd_check"=>"確認密碼");
                foreach($data_index as $key=>$value)
                {
                    if(empty($request[$key]))
                    {
                        echo '<script language="JavaScript"> alert("'.$value.'未設定");history.go(-1); //回上一頁</script>';
                        return;
                    }
                }
                if($request["psd"] != $request["psd_check"])
                {
                    echo '<script language="JavaScript"> alert("兩次密碼不同");history.go(-1); //回上一頁</script>';
                    return;
                }

                $insertdata = array();
                $insertdata["name"] =  $request["name"];
                $insertdata["acc"] =  $request["email"];
                $insertdata["email"] =  $request["email"];
                $insertdata["psd"] =  $request["psd"];
                $insertdata["contact_name"] =  " ";
                //$insertdata["identify"] =  $request["identify"];
                $insertdata["tel"] =  $request["tel"];
                $insertdata["check"] =  1;
                $this->db->insert('firm_info', $insertdata);
                $this->db->close();

                /*
                $session= array();
                $session["name"] =  $reqest["name"];
                $session["acc"] = $reqest["email"];
                $session["login"] = '1';
                $this->session->set_userdata($session);
                */
                echo '<script type="text/javascript">alert(\'註冊成功。\');</script>';
                //redirect(base_url().'index.php', 'refresh');
                //var_dump($this->session->all_userdata());
            }
        }

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function firm_login( $page = "firm_login")
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }
        $this->load->helper('url');
        $data['base_url'] = base_url();
        $request = $this->input->post();
        if(isset($request["reg"]) && $request["reg"] =1)
        {
            redirect(base_url().'index.php/firm_reg', 'refresh');
        }else if(isset($request["login"]))
        {
            $this->load->database('default');
            $query = $this->db->select('id, name, check')->where('acc', $request["acc"])->where('psd', $request["psd"])->get('firm_info');
            if(count($query->result_array()))
            {
                $res =  $query->result_array();
                if($res[0]["check"] ==0)
                {
                    echo '<script language="JavaScript"> alert("您的資料尚在審核當中!");history.go(-1); //回上一頁</script>';
                    return;
                }
                //var_dump($res);
                $session_write= array();
                $session_write["uid"] =  $res[0]["id"];
                $session_write["firm_id"] =  $res[0]["id"];
                $session_write["name"] =  $res[0]["name"];
                $session_write["acc"] = $request["acc"];
                $session_write["login"] = '2';
                $this->session->set_userdata($session_write);
                redirect(base_url().'index.php', 'refresh');
            }else
            {
                echo '<script language="JavaScript"> alert("帳號密碼錯誤!");history.go(-1); //回上一頁</script>';
                return;
            }
            $this->db->close();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function logout( $page = "logout")
    {
        $this->load->library('session');
        $session = $this->session->all_userdata();
        $this->load->helper('url');
        if (isset($session["login"]))
        {
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('acc');
            $this->session->unset_userdata('login');
            $this->session->unset_userdata('uid');
        }
        redirect(base_url().'index.php', 'refresh');
    }

    public function firm_list($page = 'firm_list')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }

        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');
        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["new"]))
        {
            redirect(base_url().'index.php/service_managment', 'refresh');
        }

        $query = $this->db->select('id, cat, name, img, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone ')->where('firm', $session["uid"])->get('service');
        $data['service_list'] = $query->result_array();

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function service_managment($page = 'service_managment')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        $this->load->helper('url');
        if(isset($session["login"]) && $session["login"]==2)
        {
            $data["login"] = $session["login"];
        }else
        {
            redirect(base_url().'index.php', 'refresh');
        }

        $url = "";
        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        if(!empty($request["save"]))
        {
            $data_index=array("cat"=>"服務分類","name"=>"服務名稱","attendant"=>"服務員姓名","intro"=>"服務簡介","attendant_intro"=>"服務員簡介","fee"=>"費用"
            ,"time"=>"服務時間","service_time"=>"服務時段","city"=>"縣市","zone"=>"行政區");
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]))
                {
                    echo '<script language="JavaScript"> alert("'.$value.'未設定");history.go(-1); //回上一頁</script>';
                    return;
                }
            }
            $insertdata= array();
            $insertdata["firm"] =  $session["uid"];
            $insertdata["cat"] =  $request["cat"];
            $insertdata["name"] =  $request["name"];
            if(!empty($_FILES["imgInp"])) {
                if ($_FILES["imgInp"]["error"] > 0) {
                    echo "Error: " . $_FILES["imgInp"]["error"];
                } else {
                    //echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                    //echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                    //echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                    //echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
                    $time = (int)microtime(true);
                    move_uploaded_file($_FILES["imgInp"]["tmp_name"],"service_img/".$time.$_FILES["imgInp"]["name"]);
                    $insertdata["img"] =  $time.$_FILES["imgInp"]["name"];
                }

            }
            if(!empty($_FILES["imgInp"])) {
                if ($_FILES["imgInp"]["error"] > 0) {
                    echo "Error: " . $_FILES["imgInp"]["error"];
                } else {
                    //echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                    //echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                    //echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                    //echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
                    $time = (int)microtime(true);
                    move_uploaded_file($_FILES["imgInp"]["tmp_name"],"service_img/".$time.$_FILES["imgInp"]["name"]);
                    $insertdata["img"] =  $time.$_FILES["imgInp"]["name"];
                }

            }
            if(!empty($_FILES["imgInp2"])) {
                if ($_FILES["imgInp2"]["error"] > 0) {
                    echo "Error: " . $_FILES["imgInp2"]["error"];
                } else {
                    //echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                    //echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                    //echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                    //echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
                    $time = (int)microtime(true);
                    move_uploaded_file($_FILES["imgInp2"]["tmp_name"],"service_img/".$time.$_FILES["imgInp2"]["name"]);
                    $insertdata["img2"] =  $time.$_FILES["imgInp2"]["name"];
                }

            }
            if(!empty($_FILES["imgInp3"])) {
                if ($_FILES["imgInp3"]["error"] > 0) {
                    echo "Error: " . $_FILES["imgInp3"]["error"];
                } else {
                    //echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                    //echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                    //echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                    //echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
                    $time = (int)microtime(true);
                    move_uploaded_file($_FILES["imgInp3"]["tmp_name"],"service_img/".$time.$_FILES["imgInp3"]["name"]);
                    $insertdata["img3"] =  $time.$_FILES["imgInp3"]["name"];
                }

            }
            if($request["way"] == 2 &&empty($request["address"]))
            {
                echo '<script language="JavaScript"> alert("選擇店內服務必須設定店址");history.go(-1); //回上一頁</script>';
                return;
            }
            $insertdata["attendant"] =  $request["attendant"];
            $insertdata["intro"] =  $request["intro"];
            $insertdata["attendant_intro"] =  $request["attendant_intro"];
            $insertdata["fee"] =  $request["fee"];
            $insertdata["special_fee"] =  $request["special_fee"];
            $insertdata["time"] =  $request["time"];
            $insertdata["service_time"] =  $request["service_time"];
            $insertdata["city"] =  $request["city"];
            $insertdata["zone"] =  $request["zone"];
            $insertdata["way"] =  $request["way"];
            $insertdata["address"] =  $request["address"];
            $this->db->insert('service', $insertdata);
            $this->db->close();
            redirect(base_url().'index.php/firm_list', 'refresh');
        }elseif(!empty($request["back"]))
        {
            redirect(base_url().'index.php/firm_list', 'refresh');
        }elseif(!empty($request["update"]))
        {
            $data_index=array("cat"=>"服務分類","name"=>"服務名稱","attendant"=>"服務員姓名","intro"=>"服務簡介","attendant_intro"=>"服務員簡介","fee"=>"費用"
            ,"time"=>"服務時間","service_time"=>"服務時段","city"=>"縣市","zone"=>"行政區");
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]))
                {
                    echo '<script language="JavaScript"> alert("'.$value.'未設定");history.go(-1); //回上一頁</script>';
                    return;
                }
            }
            $insertdata= array();
            $insertdata["firm"] =  $session["uid"];
            $insertdata["cat"] =  $request["cat"];
            $insertdata["name"] =  $request["name"];
            if(!empty($_FILES["imgInp"])) {
                if ($_FILES["imgInp"]["error"] > 0) {
                    echo "Error: " . $_FILES["imgInp"]["error"];
                } else {
                    //echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                    //echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                    //echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                    //echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
                    $time = (int)microtime(true);
                    move_uploaded_file($_FILES["imgInp"]["tmp_name"],"service_img/".$time.$_FILES["imgInp"]["name"]);
                    $insertdata["img"] =  $time.$_FILES["imgInp"]["name"];
                }

            }
            if(!empty($_FILES["imgInp"])) {
                if ($_FILES["imgInp"]["error"] > 0) {
                    echo "Error: " . $_FILES["imgInp"]["error"];
                } else {
                    //echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                    //echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                    //echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                    //echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
                    $time = (int)microtime(true);
                    move_uploaded_file($_FILES["imgInp"]["tmp_name"],"service_img/".$time.$_FILES["imgInp"]["name"]);
                    $insertdata["img"] =  $time.$_FILES["imgInp"]["name"];
                }

            }
            if(!empty($_FILES["imgInp2"])) {
                if ($_FILES["imgInp2"]["error"] > 0) {
                    echo "Error: " . $_FILES["imgInp2"]["error"];
                } else {
                    //echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                    //echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                    //echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                    //echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
                    $time = (int)microtime(true);
                    move_uploaded_file($_FILES["imgInp2"]["tmp_name"],"service_img/".$time.$_FILES["imgInp2"]["name"]);
                    $insertdata["img2"] =  $time.$_FILES["imgInp2"]["name"];
                }

            }
            if(!empty($_FILES["imgInp3"])) {
                if ($_FILES["imgInp3"]["error"] > 0) {
                    echo "Error: " . $_FILES["imgInp3"]["error"];
                } else {
                    //echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                    //echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                    //echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                    //echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
                    $time = (int)microtime(true);
                    move_uploaded_file($_FILES["imgInp3"]["tmp_name"],"service_img/".$time.$_FILES["imgInp3"]["name"]);
                    $insertdata["img3"] =  $time.$_FILES["imgInp3"]["name"];
                }

            }
            if($request["way"] == 2 &&empty($request["address"]))
            {
                echo '<script language="JavaScript"> alert("選擇店內服務必須設定店址");history.go(-1); //回上一頁</script>';
                return;
            }
            $insertdata["attendant"] =  $request["attendant"];
            $insertdata["intro"] =  $request["intro"];
            $insertdata["attendant_intro"] =  $request["attendant_intro"];
            $insertdata["fee"] =  $request["fee"];
            $insertdata["special_fee"] =  $request["special_fee"];
            $insertdata["time"] =  $request["time"];
            $insertdata["service_time"] =  $request["service_time"];
            $insertdata["city"] =  $request["city"];
            $insertdata["zone"] =  $request["zone"];
            $insertdata["way"] =  $request["way"];
            $insertdata["address"] =  $request["address"];
            $this->db->where('id',$request["update"]);
            $this->db->update('service', $insertdata);
            $this->db->close();
            redirect(base_url().'index.php/firm_list', 'refresh');
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('service');
            $this->db->close();
            redirect(base_url().'index.php/firm_list', 'refresh');
        }
        $get = $this->input->get();
        //確認該服務是不是本人的
        if(!empty($get["id"]))
        {
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
                ->where('firm', $session["uid"])
                ->where('id', $get["id"])
                ->get('service');
            if(count($query->result_array()))
            {
                $service = $query->result_array();
                $data['service'] = $service[0];
            }
            if(!empty($service[0]))
            {
                $service_time = json_decode($service[0]["service_time"],true);
                $service_time_arr = array();
                for($i=1;$i<=48;$i++)
                {
                    $service_time_arr[$i] = 0;
                }
                foreach($service_time as $item)
                {
                    $service_time_arr[$item] = 1;
                }
                $data['service_time_arr'] = $service_time_arr;
            }


        }
        $this->db->close(); //database close

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function service_list($page = 'service_list')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }

        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');
        $data['url'] = $url;

        $this->load->database('default');
        $reqest = $this->input->post();
        $get = $this->input->get();
        if(!empty($get["item"]))
        {
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
                ->where('cat', $get["item"])
                ->get('service');
            $service = $query->result_array();
            $data['service'] = $service;
            $query = $this->db->select('id, name')
                ->where('id', $get["item"])
                ->get('cat');

            if(count($query->result_array()))
            {
                $cat = $query->result_array();
                $data['cat'] = $cat[0];
            }
        }


        $this->db->close(); //database close

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function service($page = 'service')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }

        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');
        $data['url'] = $url;

        $this->load->database('default');
        $reqest = $this->input->post();
        $get = $this->input->get();
        $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
            ->where('id', $get["id"])
            ->get('service');
        $service = $query->result_array();
        $data['service'] = $service;
        if(!empty($service[0]))
        {
            $service_time = json_decode($service[0]["service_time"],true);
            $service_time_arr = array();
            for($i=1;$i<=48;$i++)
            {
                $service_time_arr[$i] = 0;
            }
            foreach($service_time as $item)
            {
                $service_time_arr[$item] = 1;
            }
            $data['service_time_arr'] = $service_time_arr;
        }

        $this->db->close(); //database close

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function reservate($page = 'reservate')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }

        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');
        $data['url'] = $url;

        $this->load->database('default');
        $reqest = $this->input->post();
        $get = $this->input->get();
        $this->db->close(); //database close

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function login($page = 'login')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }
        $this->load->helper('url');
        $data['base_url'] = base_url();
        $request = $this->input->post();
        if(isset($request["reg"]) && $request["reg"] =1)
        {
            redirect(base_url().'index.php/reg', 'refresh');
        }else if(isset($request["login"]))
        {
            $this->load->database('default');
            $query = $this->db->select('id, name, check')->where('acc', $request["acc"])->where('psd', $request["psd"])->get('member_info');
            if(count($query->result_array()))
            {
                $res =  $query->result_array();
                if($res[0]["check"] ==0)
                {
                    echo '<script language="JavaScript"> alert("您的帳號已經被停權!");history.go(-1); //回上一頁</script>';
                    return;
                }
                //var_dump($res);
                $session_write= array();
                $session_write["uid"] =  $res[0]["id"];
                $session_write["name"] =  $res[0]["name"];
                $session_write["acc"] = $request["acc"];
                $session_write["login"] = '1';
                $this->session->set_userdata($session_write);
                echo '<script type="text/javascript">alert(\'登入成功。\');</script>';
                redirect(base_url().'index.php', 'refresh');
            }else
            {
                echo '<script language="JavaScript"> alert("帳號密碼錯誤!");history.go(-1); //回上一頁</script>';
                return;
            }
            $this->db->close();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function reg($page = 'reg')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
        }
        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->db->close(); //database close
        if(isset($request["send"]))
        {
            if(empty($request["tel"]))
            {
                echo '<script language="JavaScript"> alert("請輸入電話");history.go(-1); //回上一頁</script>';
                return;
            }
            $this->load->database('default');
            $query = $this->db->select('id, acc')->where('acc', $request["tel"])->get('member_info');

            if(count($query->result_array()))
            {
                echo '<script language="JavaScript"> alert("帳號已經存在");history.go(-1); //回上一頁</script>';
                return;
            }
            else{
                $data_index=array("name"=>"姓名","tel"=>"手機號碼","psd"=>"密碼","psd2"=>"確認密碼");
                foreach($data_index as $key=>$value)
                {
                    if(empty($request[$key]))
                    {
                        echo '<script language="JavaScript"> alert("'.$value.'未設定");history.go(-1); //回上一頁</script>';
                        return;
                    }
                }
                if($request["psd"] != $request["psd2"])
                {
                    echo '<script language="JavaScript"> alert("兩次密碼不同");history.go(-1); //回上一頁</script>';
                    return;
                }

                $insertdata = array();
                $insertdata["name"] =  $request["name"];
                $insertdata["acc"] =  $request["tel"];
                $insertdata["email"] =  $request["email"];
                $insertdata["psd"] =  $request["psd"];
                $insertdata["tel"] =  $request["tel"];
                $insertdata["check"] =  1;
                $this->db->insert('member_info', $insertdata);
                $id = $this->db->insert_id();

                $session_write= array();
                $session_write["uid"] =  $id;
                $session_write["name"] =  $request["name"];
                $session_write["acc"] = $request["tel"];
                $session_write["login"] = '1';
                $this->session->set_userdata($session_write);

                $this->db->close();
                echo '<script type="text/javascript">alert(\'註冊成功。\');</script>';
                redirect(base_url().'index.php', 'refresh');
                //redirect(base_url().'index.php', 'refresh');
                //var_dump($this->session->all_userdata());
            }
        }

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function firm_info($page = 'firm_info')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]) && $session["login"]==2)
        {
            $data["login"] = $session["login"];
        }else
        {
            redirect(base_url().'index.php/firm_login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');
        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(!empty($request["save"]))
        {
            $data_index=array("email"=>"電子信箱","name"=>"姓名","tel"=>"聯絡電話");
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]))
                {
                    echo '<script language="JavaScript"> alert("'.$value.'未設定");history.go(-1); //回上一頁</script>';
                    return;
                }
            }
            if(!empty($request["psd"]))
            {
                if($request["psd"] != $request["psd_check"])
                {
                    echo '<script language="JavaScript"> alert("兩次密碼不同");history.go(-1); //回上一頁</script>';
                    return;
                }
            }


            $insertdata = array();
            $insertdata["name"] =  $request["name"];
            $insertdata["acc"] =  $request["email"];
            $insertdata["email"] =  $request["email"];

            $insertdata["contact_name"] =  " ";
            $insertdata["address"] =  $request["address"];
            $insertdata["tel"] =  $request["tel"];
            $insertdata["check"] =  1;
            if(!empty($request["psd"]))
            {
                if($request["psd"] != $request["psd_check"])
                {
                    echo '<script language="JavaScript"> alert("兩次密碼不同");history.go(-1); //回上一頁</script>';
                    return;
                }
                $insertdata["psd"] =  $request["psd"];
            }
            $this->db->where('id',$request["save"]);
            $this->db->update('firm_info', $insertdata);
            $this->db->close();
            echo '<script language="JavaScript"> alert("修改成功");history.go(-1); //回上一頁</script>';
            return;
        }
        $query = $this->db->select('id, acc, name, contact_name, tel, email, identify, address')->where('id', $session["uid"])->get('firm_info');
        $data['firm'] = $query->result_array();
        $this->db->close(); //database close

        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }


}
?>