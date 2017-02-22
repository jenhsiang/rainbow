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
        if(isset($session["login"]) && $session["login"]==2)
        {
            $data["suid"] = $session["uid"];
        }else
        {
            $data["suid"] = 0;
        }

        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');
        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["fav"]))
        {
            if(empty($session["login"]))
            {
                echo '<script language="JavaScript"> alert("請登入會員");history.go(-1); //回上一頁</script>';
            }elseif($session["login"] = 2)
            {
                echo '<script language="JavaScript"> alert("請登入一般會員帳號");history.go(-1); //回上一頁</script>';
            }
            $insertdata = array();
            $insertdata["name"] =  $request["name"];
            $insertdata["service_id"] =  $request["fav"];
            $insertdata["user_id"] =  $session["email"];
            $this->db->insert('favorite', $insertdata);
            $this->db->close();
            echo '<script language="JavaScript"> history.go(-1); //回上一頁</script>';
            return;
        }else if(isset($request["search"]))
        {
            redirect(base_url().'index.php/service_search?cat='.$request["cat"].'&way='.$request["way"], 'refresh');
        }
        if(!empty($get["area"]))
        {
            /*
            for($i=1; $i<=5;$i++)
            {
                $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
                    ->where('cat', $i)
                    ->where("way = '1' OR (way='2' AND zone='".$get["area"]."')")
                    ->get('service');
                $service = $query->result_array();
                $data['service'.$i] = $service;
            }
            */
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
                ->where("way = '1' OR (way='2' AND zone='".$get["area"]."')")
                ->where('ready', 1)
                ->get('service');
            $service = $query->result_array();
            $data['service'] = $service;
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address, eva ')
            ->where("way = '1' OR (way='2' AND zone='".$get["area"]."')")
            ->where('ready', 1)
            ->order_by("eva","desc")
            ->get('service',10);
            $service = $query->result_array();
            $data['service2'] = $service;
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address, fav ')
                ->where("way = '1' OR (way='2' AND zone='".$get["area"]."')")
                ->where('ready', 1)
                ->order_by("fav","desc")
                ->get('service',10);
            $service = $query->result_array();
            $data['service3'] = $service;
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address, buy ')
                ->where("way = '1' OR (way='2' AND zone='".$get["area"]."')")
                ->where('ready', 1)
                ->order_by("buy","desc")
                ->get('service',10);
            $service = $query->result_array();
            $data['service4'] = $service;
        }
        else
        {
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
                ->where('ready', 1)
                ->get('service');
            $service = $query->result_array();
            $data['service'] = $service;
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address, eva ')
                ->where('ready', 1)
                ->order_by("eva","desc")
                ->get('service',10);
            $service2 = $query->result_array();
            $data['service2'] = $service2;
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address, fav ')
                ->where('ready', 1)
                ->order_by("fav","desc")
                ->get('service',10);
            $service = $query->result_array();
            $data['service3'] = $service;
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address, buy ')
                ->where('ready', 1)
                ->order_by("buy","desc")
                ->get('service',10);
            $service = $query->result_array();
            $data['service4'] = $service;
        }

        $this->db->select('special_item.id, service.id as s_id, service.name, 	special_item.type, service.img, service.fee, service.special_fee, service.intro');
        $this->db->from('special_item');
        $this->db->join('service', 'service.id = special_item.service_id');
        $query = $this->db->get();
        $data['special_item'] = $query->result_array();

        $query = $this->db->select('id, area')->where('city','基隆市')->get('zipcode');
        $data['area'] = $query->result_array();
        $query = $this->db->select('id, city')->get('city');
        $data['city'] = $query->result_array();

        $query = $this->db->select('id, name')->get('cat');
        $data['cat'] = $query->result_array();

        $data = $this->default_set($data);
        $this->db->close(); //database close



        $data['base_url'] = base_url();
        $this->load->view('templates/header_index', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer_index', $data);
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

        if(isset($request["send"]))
        {
            if(empty($request["allow"]))
            {
                echo '<script language="JavaScript"> alert("請勾選服務條款");history.go(-1); //回上一頁</script>';
                return;
            }
            $this->load->database('default');
            $query = $this->db->select('id, acc')->where('acc', $request["tel"])->get('firm_info');
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
                $data_index=array("name"=>"姓名","tel"=>"聯絡電話","bank"=>"銀行名稱","bank_sub"=>"分行名稱","bank_acc"=>"銀行帳號","psd"=>"密碼","psd_check"=>"確認密碼");
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

                $this->db->from('firm_info');
                $cnt = $this->db->count_all_results();
                $cnt = $cnt + 5288;
                if($cnt < 10000)
                {
                    $code = "F00".$cnt;
                }else if($cnt < 100000)
                {
                    $code = "F0".$cnt;
                }else
                {
                    $code = "F".$cnt;
                }
                $insertdata = array();
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
                        $insertdata["bank_img"] =  $time.$_FILES["imgInp"]["name"];
                    }

                }
                $insertdata["name"] =  $request["name"];
                $insertdata["acc"] =  $request["tel"];
                $insertdata["email"] =  $request["email"];
                $insertdata["psd"] =  $request["psd"];
                $insertdata["ref"] =  $request["ref"];
                $insertdata["bank"] =  $request["bank"];
                $insertdata["bank_sub"] =  $request["bank_sub"];
                $insertdata["bank_acc"] =  $request["bank_acc"];
                $insertdata["code"] =  $code;
                $insertdata["contact_name"] =  " ";
                //$insertdata["identify"] =  $request["identify"];
                $insertdata["tel"] =  $request["tel"];
                $insertdata["check_state"] =  1;
                $insertdata["phone_check_code"] = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
                $this->db->insert('firm_info', $insertdata);
                $id = $this->db->insert_id();
                $this->db->from('member_info');
                $cnt = $this->db->count_all_results();
                $cnt = $cnt + 5288;
                if($cnt < 10000)
                {
                    $code = "M00".$cnt;
                }else if($cnt < 100000)
                {
                    $code = "M0".$cnt;
                }else
                {
                    $code = "M".$cnt;
                }
                $phone_check_code = $insertdata["phone_check_code"];
                $insertdata = array();
                $insertdata["name"] =  $request["name"];
                $insertdata["acc"] =  $request["tel"];
                $insertdata["email"] =  $request["email"];
                $insertdata["psd"] =  $request["psd"];
                $insertdata["tel"] =  $request["tel"];
                $insertdata["ref"] =  $request["ref"];
                $insertdata["code"] =  $code;
                $insertdata["check"] =  1;
                $insertdata["phone_check_code"] = $phone_check_code;
                $this->db->insert('member_info', $insertdata);
                //$this->give_gold2($request["ref"]);
                $this->db->close();

                $session_write= array();
                $session_write["uid"] =  $id;
                $session_write["name"] =  $request["name"];
                $session_write["acc"] = $request["email"];
                $session_write["login"] = '2';
                $this->session->set_userdata($session_write);
                echo '<script type="text/javascript">alert(\'註冊成功。\');</script>';
                $url = urlencode('https://api.kotsms.com.tw/kotsmsapi-1.php?username=kennyshen&password=1234qwer&dstaddr='.$request["tel"].'&smbody='.$insertdata["phone_check_code"]);

                redirect(base_url().'index.php/phone_check?url='.$url, 'refresh');
                //var_dump($this->session->all_userdata());
            }
        }
        if(isset($get["recommend"]))
        {
            $data["recommend"] = $get["recommend"];
        }
        $query = $this->db->select('id, name, code')
            ->get('bank');
        $service = $query->result_array();
        $data['bank'] = $service;

        $data = $this->default_set($data);
        $this->db->close(); //database close
        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    private function give_gold2($code)
    {
        if(isset($code) && substr($code,0,1) == "M")
        {
            $this->db->set('gold2', 'gold2+100', FALSE);
            $this->db->where('code',$code);
            $this->db->update('member_info');
        }
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
            $query = $this->db->select('id, name, check_state')->where('acc', $request["acc"])->where('psd', $request["psd"])->get('firm_info');
            if(count($query->result_array()))
            {
                $res =  $query->result_array();
                if($res[0]["check_state"] ==0)
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

        $data = $this->default_set($data);
        $data['base_url'] = base_url();
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
            $this->session->unset_userdata('back_url');
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

        if(isset($get["cat"]))
        {
            $query = $this->db->select('id, cat, name, img, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, ready ')->where('firm', $session["uid"])->where('cat', $get["cat"])->get('service');
        }else
        {
            $query = $this->db->select('id, cat, name, img, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, ready ')->where('firm', $session["uid"])->get('service');
        }

        $data['service_list'] = $query->result_array();

        $query = $this->db->select('id, name')->get('cat');
        $data['cat'] = $query->result_array();

        $data = $this->default_set($data);
        $this->db->close(); //database close
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
            $ready = 1;
            $data_index=array("cat"=>"服務分類","name"=>"服務名稱","attendant"=>"服務員姓名","intro"=>"服務簡介","attendant_intro"=>"服務員簡介","fee"=>"費用","special_fee"=>"彩虹價格");
            $insertdata= array();
            $alert_string = "";
            $ready = 0;
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]) || $request[$key] =="")
                {
                    $ready =1;
                    $alert_string =  $alert_string.$value." ";
                }

            }
            echo $alert_string;
            if($ready == 0)
            {
                $ready =  $request["ready"];
            }else
            {
                $ready = 0;
            }
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
            for($i=1;$i<=7;$i++)
            {
                $insertdata["service_time_".$i] =  $request["service_time_".$i];
                //var_dump($insertdata["service_time_".$i]);
                //echo "<br>";
            }
            $insertdata["city"] =  $request["city"];
            $insertdata["zone"] =  $request["zone"];
            $insertdata["way"] =  $request["way"];
            $insertdata["address"] =  $request["address"];
            $insertdata["ready"] =  $ready;
            $this->db->insert('service', $insertdata);
            $id = $this->db->insert_id();
            $this->db->close();
            if(!$ready)
            {
                echo '<script language="JavaScript">alert("'.$alert_string.'資料尚未正確填寫。提醒您資料未填寫完整，服務無法正常上架。")</script>';
                redirect(base_url().'index.php/service_managment?id='.$id, 'refresh');
                return;
            }
            redirect(base_url().'index.php/service?id='.$id , 'refresh');
        }elseif(!empty($request["back"]))
        {
            redirect(base_url().'index.php/firm_list', 'refresh');
        }elseif(!empty($request["update"]))
        {
            $ready =1;
            $insertdata= array();
            $data_index=array("cat"=>"服務分類","name"=>"服務名稱","attendant"=>"服務員姓名","intro"=>"服務簡介","attendant_intro"=>"服務員簡介","fee"=>"費用","special_fee"=>"彩虹價格");
            $alert_string = "";
            $ready = 0;
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]) || $request[$key] =="")
                {
                    $ready =1;
                    $alert_string =  $alert_string.$value." ";
                }

            }
            echo $alert_string;
            if($ready == 0)
            {
                $ready =  $request["ready"];
            }else
            {
                $ready = 0;
            }

            $insertdata["firm"] =  $session["uid"];
            $insertdata["cat"] =  $request["cat"];
            $insertdata["name"] =  $request["name"];
            if(!empty($_FILES["imgInp"])) {
                if ($_FILES["imgInp"]["error"] > 0) {
                    //echo "Error: " . $_FILES["imgInp"]["error"];
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
                    //echo "Error: " . $_FILES["imgInp"]["error"];
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
                    //echo "Error: " . $_FILES["imgInp2"]["error"];
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
                    //echo "Error: " . $_FILES["imgInp3"]["error"];
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
            for($i=1;$i<=7;$i++)
            {
                $insertdata["service_time_".$i] =  $request["service_time_".$i];
                //var_dump($insertdata["service_time_".$i]);
                //echo "<br>";
            }
            $insertdata["city"] =  $request["city"];
            $insertdata["zone"] =  $request["zone"];
            $insertdata["way"] =  $request["way"];
            $insertdata["address"] =  $request["address"];
            $insertdata["ready"] =  $ready;
            $this->db->where('id',$request["update"]);
            $this->db->update('service', $insertdata);
            $this->db->close();
            if(!$ready)
            {
                echo '<script language="JavaScript">alert("'.$alert_string.'資料尚未正確填寫。提醒您資料未填寫完整，服務無法正常上架。")</script>';
                redirect(base_url().'index.php/service_managment?id='.$request["update"], 'refresh');
                return;
            }
            redirect(base_url().'index.php/service?id='.$request["update"] , 'refresh');
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
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time_1, service_time_2, service_time_3, service_time_4, service_time_5, service_time_6, service_time_7, city, zone, way, address, ready ')
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
                for($i=1; $i<=7; $i++)
                {
                    $service_time = json_decode($service[0]["service_time_".$i],true);
                    $service_time_arr = array();
                    for($x=1;$x<=48;$x++)
                    {
                        $service_time_arr[$x] = 0;
                    }
                    if(!empty($service_time))
                    {
                        foreach($service_time as $item)
                        {
                            $service_time_arr[$item] = 1;
                        }
                    }

                    $data['service_time_arr_'.$i] = $service_time_arr;
                    /*
                    echo "i=".$i;
                    var_dump($service_time);
                    echo "<br>";
                    var_dump($data['service_time_arr_'.$i]);
                    echo "<br>";
                    */
                }
                //die();
                $this->db->select('zipcode.id, zipcode.area');
                $this->db->from('zipcode');
                $this->db->join('city', 'city.city = zipcode.city');
                $this->db->where('city.id',$service[0]["city"]);
                $query = $this->db->get();
                $data['area'] = $query->result_array();
            }
        }else
        {
            $query = $this->db->select('id, area')->where('city','基隆市')->get('zipcode');
            $data['area'] = $query->result_array();
            $this->db->select('id, service_time_1, service_time_2, service_time_3, service_time_4, service_time_5, service_time_6, service_time_7');
            $this->db->from('firm_service_time');
            $this->db->where('firm',$session["uid"]);
            $query = $this->db->get();
            $service =$query->result_array();
            if(!empty($service[0])) {
                for ($i = 1; $i <= 7; $i++) {
                    $service_time = json_decode($service[0]["service_time_" . $i], true);
                    $service_time_arr = array();
                    for ($x = 1; $x <= 48; $x++) {
                        $service_time_arr[$x] = 0;
                    }
                    if (!empty($service_time)) {
                        foreach ($service_time as $item) {
                            $service_time_arr[$item] = 1;
                        }
                    }

                    $data['service_time_arr_' . $i] = $service_time_arr;
                    /*
                    echo "i=".$i;
                    var_dump($service_time);
                    echo "<br>";
                    var_dump($data['service_time_arr_'.$i]);
                    echo "<br>";
                    */
                }
            }
        }
        $query = $this->db->select('id, city')->get('city');
        $data['city'] = $query->result_array();

        $query = $this->db->select('id, name')->get('cat');
        $data['cat'] = $query->result_array();




        $data = $this->default_set($data);
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
                ->where('ready', 1)
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




        $data = $this->default_set($data);
        $this->db->close(); //database close
        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function service_search($page = 'service_search')
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
        if(!empty($get["cat"]))
        {
            $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone, way, address ')
                ->where('cat', $get["cat"])
                ->where('way', $get["way"])
                ->where('ready', 1)
                ->get('service');
            $service = $query->result_array();
            $data['service'] = $service;
            $query = $this->db->select('id, name')
                ->where('id', $get["cat"])
                ->get('cat');

            if(count($query->result_array()))
            {
                $cat = $query->result_array();
                $data['cat'] = $cat[0];
            }
        }




        $data = $this->default_set($data);
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
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["rev"]))
        {
            if(!isset($session["login"]) || $session["login"] != 1)
            {
                echo '<script language="JavaScript"> alert("請登入帳號後再預約。");history.go(-1); //回上一頁</script>';
                return;
            }
            $query = $this->db->select('id')
                ->where('state', 0)
                ->where('pay_check', 1)
                ->where('user_id', $session["uid"])
                ->get('o_info');
            $order = $query->result_array();
            if(count($order))
            {
                echo '<script language="JavaScript"> alert("您上有未完成評價的服務，請完成評價後再預約。");history.go(-1); //回上一頁</script>';
                return;
            }
            if(empty($request["re_time"]))
            {
                echo '<script language="JavaScript"> alert("請選擇預約時段");history.go(-1); //回上一頁</script>';
                return;
            }
            $today = explode("/",date(("m/d/Y"))) ;
            $revday = explode("/",$request["re_date"]) ;
            if(($today[0]*30+ $today[1]+ $today[2]*365)> ($revday[0]*30+ $revday[1]+ $revday[2]*365))
            {
                echo '<script language="JavaScript"> alert("請勿選擇過去的日期");history.go(-1); //回上一頁</script>';
                return;
            }else if(($today[0]*365+ $today[1]*30+ $today[2]) == ($revday[0]*365+ $revday[1]*30+ $revday[2]))
            {
                $now = explode("/",date(("h/i"))) ;
                $re_time_x = explode("-",$request["re_time"]);
                $rev_hour = explode(":",$re_time_x[0]) ;
                if(floor($rev_hour[0]) < (floor($now[0])+2))
                {
                    echo '<script language="JavaScript"> alert("請預約兩小時後的時段");history.go(-1); //回上一頁</script>';
                    return;
                }
            }
            $session_write= array();
            $session_write["re_date"] =  $request["re_date"];
            $session_write["re_time"] =  $request["re_time"];
            $session_write["re_service_id"] =  $request["rev"];
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/reservate', 'refresh');
        }elseif(!empty($request["ask"]))
        {
            redirect(base_url().'index.php/ask?id='.$request["ask"], 'refresh');
        }elseif(!empty($request["fav"]))
        {
            if(!empty($session["login"]) && $session["login"] == 1)
            {
                $query = $this->db->select('id')
                    ->where('service_id', $request["fav"])
                    ->where('user_id', $session["uid"])
                    ->get('favorite');
                $fav = $query->result_array();
                if(empty($fav[0]))
                {
                    $insertdata = array();
                    $insertdata["service_id"] =  $request["fav"];
                    $insertdata["user_id"] =  $session["uid"];
                    $this->db->insert('favorite', $insertdata);
                    $this->db->set('fav', 'fav+1', FALSE);
                    $this->db->where('id',$request["fav"]);
                    $this->db->update('service');
                }

                echo '<script language="JavaScript"> alert("加入成功");history.go(-1); //回上一頁</script>';
                return;
            }else
            {
                echo '<script language="JavaScript"> alert("請先登入會員");history.go(-1); //回上一頁</script>';
                return;
            }

        }

        $query = $this->db->select('id, cat, name, img, img2, img3, attendant, intro, attendant_intro, fee, special_fee, time, service_time, city, zone,
        way, address, firm, eva, service_time_1, service_time_2, service_time_3, service_time_4, service_time_5, service_time_6, service_time_7 ')
            ->where('id', $get["id"])
            ->get('service');
        $service = $query->result_array();
        $data['service'] = $service;
        if(!empty($service[0]))
        {
            $service_time = json_decode($service[0]["service_time"],true);
            $today = explode("/",date(("Y/m/d"))) ;
            $able_time = array();
            $able_date = array();
            for($i=0; $i<7; $i++)
            {
                for($x=0;$x<count($service_time); $x++)
                {
                    $hour = floor($service_time[$x]/2);
                    $hour_end = $hour+$service[0]["time"];
                    if($hour_end > 24)
                    {
                        $hour_end = $hour_end-24;
                    }
                    if($service_time[$x]%2)
                    {
                        $min="30";
                    }else
                    {
                        $min="00";
                    }
                    $able_time[$i][$x] = $hour.":".$min."-".$hour_end.":".$min;
                }
                $able_date[$i] = $today[0]."/".$today[1]."/".($today[2]+$i);
            }
            $data["able_time"]= $able_time;
            $data["able_time_json"]= json_encode($able_time);
            $data["able_date"]= $able_date;

            $next7 = array();
            for($i=1;$i<=7; $i++)
            {
                $next7[$i]["day"] = date("d",strtotime("+".$i." day"));
                $week =date("w",strtotime("+".$i." day"));
                if($week == 0)
                {
                    $week = 7;
                }
                if(count(json_decode($service[0]["service_time_".$week],true)))
                {
                    $next7[$i]["ok"] = true;
                }else
                {
                    $next7[$i]["ok"] = false;
                }

            }

            $data["next7"]= $next7;


            $query = $this->db->select('id, code')->where('id', $data['service'][0]['firm'])->get('firm_info');
            $firm = $query->result_array();
            $data["share_url"] = base_url().'index.php/reg?recommend='.$firm[0]["code"];
            /*
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
            */

        }



        $data = $this->default_set($data);
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
        $url = "";
        $this->load->helper('url');
        if(isset($session["login"]) && $session["login"] == 1)
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "reservate";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/login', 'refresh');
        }

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["confirm"]))
        {
            $data_index=array("name"=>"聯絡人","tel"=>"聯絡電話","address"=>"地址");
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]))
                {
                    echo '<script language="JavaScript"> alert("'.$value.'未填寫");history.go(-1); //回上一頁</script>';
                    return;
                }
            }
            $order_id =  $this->save_order();
            /*
            $ch = curl_init();
            $mn = (int)microtime(true);
            curl_setopt($ch, CURLOPT_URL, "\" https://test.esafe.com.tw/Service/Etopm.aspx\"");
            curl_setopt($ch, CURLOPT_POST, true); // 啟用POST
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array( "web"=>urlencode("S1604270403"),
                "MN"=>urlencode($request["gold"] - $request["fee"]),
                "OrderInfo"=>urlencode("美妝服務"),
                "Td"=> urlencode($mn),
                "sna"=>urlencode($request["name"]),
                "sdt"=>urlencode($request["tel"]),
                "ChkValue"=>urlencode($mn.($request["gold"] - $request["fee"]))
                ) ));
            curl_exec($ch);
            curl_close($ch);
            */
            echo '<script language="JavaScript"> alert("預約完成");</script>';
            //redirect(base_url().'index.php/to_pay?order='.$order_id, 'refresh');
            redirect(base_url().'index.php', 'refresh');
        }
        if( empty($session["re_date"]) && empty($session["re_time"]) && empty($session["re_service_id"]))
        {
            echo '<script language="JavaScript"> alert("請從服務畫面進行預約!");history.go(-1); //回上一頁</script>';
        }else
        {
            $query = $this->db->select('id, time, service_time, city, zone, way, address, fee, special_fee')
                ->where('id', $session["re_service_id"])
                ->get('service');
            $service = $query->result_array();
            $data['service'] = $service;
            if(!empty($service[0]))
            {
                if(!empty($service[0]["special_fee"]))
                {
                    $data["fee"] = $service[0]["special_fee"];
                }else
                {
                    $data["fee"] = $service[0]["fee"];
                }
                /*
                $service_time = json_decode($service[0]["service_time"],true);
                $today = explode("/",date(("Y/m/d"))) ;
                $able_time = array();
                $able_date = array();
                for($i=0; $i<7; $i++)
                {
                    for($x=0;$x<count($service_time); $x++)
                    {
                        $hour = floor($service_time[$x]/2);
                        $hour_end = $hour+$service[0]["time"];
                        if($hour_end > 24)
                        {
                            $hour_end = $hour_end-24;
                        }
                        if($service_time[$x]%2)
                        {
                            $min="30";
                        }else
                        {
                            $min="00";
                        }
                        $able_time[$i][$x] = $hour.":".$min."-".$hour_end.":".$min;
                    }
                    $able_date[$i] = $today[0]."/".$today[1]."/".($today[2]+$i);
                }

                $data["able_time"]= $able_time;
                $data["able_time_json"]= json_encode($able_time);
                $data["able_date"]= $able_date;
                */
                $data["service"] = $service[0];
                $re_date = $today = explode("/",$session["re_date"]) ;
                $data["re_date"]= $re_date[2].'/'.$re_date[0].'/'.$re_date[1];
                $data["re_time"]= $session["re_time"];
                $query = $this->db->select('id, tel, name, gold, gold2')
                    ->where('id', $session["uid"])
                    ->get('member_info');
                $member = $query->result_array();
                if(!empty($member[0]))
                {
                    $data["member"] = $member[0];
                }
            }
        }



        $data = $this->default_set($data);
        $this->db->close(); //database close
        $data['base_url'] = base_url();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }


    private function save_order()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $session = $this->session->all_userdata();
        $request = $this->input->post();
        $insertdata = array();
        $insertdata["service_id"] =  $session["re_service_id"];
        $insertdata["user_id"] =  $session["uid"];
        $insertdata["fee"] =  $request["fee"];
        $this->db->set('buy', 'buy+1', FALSE);
        $this->db->where('id',$session["re_service_id"]);
        $this->db->update('service');
        /*
        if($request["gold_type"] == 1)
        {
            $insertdata["gold"] =  0;
            $insertdata["gold2"] =  $request["gold2"];
        }else
        {
            $insertdata["gold"] =  $request["gold"];
            $insertdata["gold2"] =  0;
        }
        */

        $insertdata["gold2"] =  $request["gold2"];
        $insertdata["gold"] =  $request["gold"];

        //$re_date = explode("/",$request["re_date"]) ;
        $insertdata["re_date"] =  $request["re_date"];
        $re_time = explode("-",$request["re_time"]) ;
        $re_time = explode(":",$re_time[0]) ;
        if($re_time[1] == "00")
        {
            $re_time_temp = $re_time[0]*2;
        }else
        {
            $re_time_temp = $re_time[0]*2+1;
        }
        $insertdata["re_time"] =  $re_time_temp;
        $insertdata["name"] =  $request["name"];
        $insertdata["tel"] =  $request["tel"];
        $insertdata["remark"] =  $request["remark"];
        $insertdata["pay_check"] =  1;
        if(!empty($request["address"]))
        {
            $insertdata["address"] =  $request["address"];
        }
        $this->db->insert('o_info', $insertdata);
        $id = $this->db->insert_id();
        $update = array();
        $update["gold"] =  $request["gold_to_use"] - $request["gold"];
        $this->db->where('id', $session["uid"]);
        $this->db->update('member_info', $update);

        return $id;

    }

    public function to_pay($page = 'to_pay')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        $url = "";
        $this->load->helper('url');
        if(isset($session["login"]) && $session["login"] == 1)
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/login', 'refresh');
        }

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(isset($request["errcode"]))
        {
            if($request["errcode"] == "00")
            {
                $update = array();
                $update["pay_check"] =  1;
                $this->db->where('id', $request["Td"]);
                $this->db->update('o_info', $update);
                $this->db->close(); //database close
                echo '<script language="JavaScript"> alert("預約成功!"); //回上一頁</script>';
                redirect(base_url().'index.php', 'refresh');
            }else
            {
                echo '<script language="JavaScript"> alert("付款失敗!"); //回上一頁</script>';
                redirect(base_url().'index.php', 'refresh');
            }
        }

        if( !empty($get["order"]))
        {
            $query = $this->db->select('id, service_id, user_id, re_date, re_time, name, tel, fee, remark, gold, gold2, pay_check, address')
                ->where('id', $get["order"])
                ->get('o_info');
            $order = $query->result_array();
            if(count($order))
            {
                $hour = floor($order[0]["re_time"]/2);
                $hour_end = $hour+$order[0]["re_time"];
                if($hour_end > 24)
                {
                    $hour_end = $hour_end-24;
                }
                if($order[0]%2)
                {
                    $min="30";
                }else
                {
                    $min="00";
                }
                $order[0]["re_time"] = $hour.":".$min."-".$hour_end.":".$min;
            }else
            {
                echo '<script language="JavaScript"> alert("訂單不存在無法進行付款!");history.go(-1); //回上一頁</script>';
            }
            $data['order'] = $order[0];
            $ChkValue=sha1('S1609299019'.'b25140176'.($order[0]["fee"]-$order[0]["gold"]));
            $data['chkvalue']=strtoupper($ChkValue); //轉換為全部大寫
        }



        $data = $this->default_set($data);
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
            $query = $this->db->select('id, name, check, gold2')->where('acc', $request["acc"])->where('psd', $request["psd"])->get('member_info');
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
                $session_write["gold"] = $res[0]["gold2"];
                $session_write["login"] = '1';
                $this->session->set_userdata($session_write);
                echo '<script type="text/javascript">alert(\'登入成功。\');</script>';
                if(!empty($session["back_url"]))
                {
                    $back = $session["back_url"];
                    $this->session->unset_userdata('back_url');
                    redirect(base_url().'index.php/'.$back, 'refresh');
                }
                redirect(base_url().'index.php', 'refresh');
            }else
            {
                echo '<script language="JavaScript"> alert("帳號密碼錯誤!");history.go(-1); //回上一頁</script>';
                return;
            }
            $this->db->close();
        }

        //$data = $this->default_set($data);
        //$this->db->close(); //database close
        $data['base_url'] = base_url();
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

        if(isset($request["send"]))
        {

            if(empty($request["allow"]))
            {
                echo '<script language="JavaScript"> alert("請同意服務條款");history.go(-1); //回上一頁</script>';
                return;
            }
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
                $this->db->from('member_info');
                $cnt = $this->db->count_all_results();
                $cnt = $cnt + 5288;
                if($cnt < 10000)
                {
                    $code = "M00".$cnt;
                }else if($cnt < 100000)
                {
                    $code = "M0".$cnt;
                }else
                {
                    $code = "M".$cnt;
                }
                $insertdata = array();
                $insertdata["name"] =  $request["name"];
                $insertdata["acc"] =  $request["tel"];
                $insertdata["email"] =  $request["email"];
                $insertdata["psd"] =  $request["psd"];
                $insertdata["tel"] =  $request["tel"];
                $insertdata["ref"] =  $request["ref"];
                $insertdata["code"] =  $code;
                $insertdata["check"] =  1;
                $insertdata["phone_check_code"] = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
                $this->db->insert('member_info', $insertdata);
                $id = $this->db->insert_id();
                $this->give_gold2($request["ref"]);
                $session_write= array();
                $session_write["uid"] =  $id;
                $session_write["name"] =  $request["name"];
                $session_write["acc"] = $request["tel"];
                $session_write["gold2"] = 100;
                $session_write["login"] = '1';
                $this->session->set_userdata($session_write);

                $this->db->close();
                echo '<script type="text/javascript">alert(\'註冊成功。\');</script>';
                $url = urlencode('https://api.kotsms.com.tw/kotsmsapi-1.php?username=kennyshen&password=1234qwer&dstaddr='.$request["tel"].'&smbody='.$insertdata["phone_check_code"]);
                redirect(base_url().'index.php/phone_check?url='.$url, 'refresh');
                //redirect(base_url().'index.php', 'refresh');
                //var_dump($this->session->all_userdata());
            }
        }else if(isset($request["firm"]))
        {
            redirect(base_url().'index.php/firm_reg?recommend='.$request["ref"], 'refresh');
        }

        if(isset($get["recommend"]))
        {
            $data["recommend"] = $get["recommend"];
        }

        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
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
        $this->load->helper('url');
        if(isset($session["login"]) && $session["login"]==2)
        {
            $data["login"] = $session["login"];
        }else
        {
            redirect(base_url().'index.php/firm_login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(!empty($request["save"]))
        {
            $data_index=array("email"=>"電子信箱","name"=>"姓名","tel"=>"聯絡電話","bank"=>"銀行名稱","bank_sub"=>"分行名稱","bank_acc"=>"銀行帳號");
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
                    $insertdata["bank_img"] =  $time.$_FILES["imgInp"]["name"];
                }

            }
            $insertdata["name"] =  $request["name"];
            $insertdata["email"] =  $request["email"];
            $insertdata["bank"] =  $request["bank"];
            $insertdata["bank_sub"] =  $request["bank_sub"];
            $insertdata["bank_acc"] =  $request["bank_acc"];
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
        $query = $this->db->select('id, acc, name, contact_name, tel, email, identify, address, code, bank, bank_sub, bank_acc, bank_img')->where('id', $session["uid"])->get('firm_info');
        $data['firm'] = $query->result_array();
        $data["reg_qr_img"]= $this->generateQRwithGoogle(base_url()."index.php/reg?recommend=".$data['firm'][0]["code"]);
        $data["firm_reg_qr_img"] = $this->generateQRwithGoogle(base_url()."index.php/firm_reg?recommend=".$data['firm'][0]["code"]);
        $query = $this->db->select('id, name, code')
            ->get('bank');
        $service = $query->result_array();
        $data['bank'] = $service;

        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function firm_forget($page = 'firm_forget')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(!empty($request["send"]))
        {
            $data_index=array("acc"=>"帳號");
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]))
                {
                    echo '<script language="JavaScript"> alert("'.$value.'未填寫");history.go(-1); //回上一頁</script>';
                    return;
                }
            }
            $query = $this->db->select('id, acc, name,tel, email, psd')->where('acc', $request["acc"])->get('firm_info');
            $firm = $query->result_array();
            if(count($firm))
            {
                $ci = get_instance();
                $ci->load->library('email');
                $config['protocol'] = "smtp";
                $config['smtp_host'] = "ssl://smtp.gmail.com";
                $config['smtp_port'] = "465";
                $config['smtp_user'] = "nssandhlm@gmail.com";
                $config['smtp_pass'] = "nss123456";
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";

                $ci->email->initialize($config);

                $ci->email->from('service@rinbow.com', '彩虹橋管理員');
                $list = array($firm[0]["email"]);
                $ci->email->to($list);
                $this->email->reply_to('service@rinbow.com', 'Explendid Videos');
                $ci->email->subject("帳號".$firm[0]["acc"].'的密碼通知');
                $message_content = '您好：<br>您的密碼如下。<br>密碼：'.$firm[0]["psd"];
                //echo $message_content;
                //die();
                $ci->email->message($message_content);
                $ci->email->send();
            }else
            {
                echo '<script language="JavaScript"> alert("您所輸入的帳號不存在");history.go(-1); //回上一頁</script>';
                $this->db->close();
                return;
            }
            $this->db->close();
            echo '<script language="JavaScript"> alert("您的密碼已經重新寄送到您的信箱");</script>';
            redirect(base_url().'index.php/firm_login', 'refresh');
        }



        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function forget($page = 'firm_forget')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(!empty($request["send"]))
        {
            $data_index=array("acc"=>"帳號");
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]))
                {
                    echo '<script language="JavaScript"> alert("'.$value.'未填寫");history.go(-1); //回上一頁</script>';
                    return;
                }
            }
            $query = $this->db->select('id, acc, name,tel, email, psd')->where('acc', $request["acc"])->get('member_info');
            $member = $query->result_array();
            if(count($member))
            {
                $ci = get_instance();
                $ci->load->library('email');
                $config['protocol'] = "smtp";
                $config['smtp_host'] = "ssl://smtp.gmail.com";
                $config['smtp_port'] = "465";
                $config['smtp_user'] = "nssandhlm@gmail.com";
                $config['smtp_pass'] = "nss123456";
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";

                $ci->email->initialize($config);

                $ci->email->from('service@rinbow.com', '彩虹橋管理員');
                $list = array($member[0]["email"]);
                $ci->email->to($list);
                $this->email->reply_to('service@rinbow.com', 'Explendid Videos');
                $ci->email->subject("帳號".$member[0]["acc"].'的密碼通知');
                $message_content = '您好：<br>您的密碼如下。<br>密碼：'.$member[0]["psd"];
                //echo $message_content;
                //die();
                $ci->email->message($message_content);
                $ci->email->send();
            }else
            {
                echo '<script language="JavaScript"> alert("您所輸入的帳號不存在");history.go(-1); //回上一頁</script>';
                $this->db->close();
                return;
            }
            $this->db->close();
            echo '<script language="JavaScript"> alert("您的密碼已經重新寄送到您的信箱");</script>';
            redirect(base_url().'index.php/login', 'refresh');
        }



        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function member_info($page = 'member_info')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(isset($session["login"]) && $session["login"]==1)
        {
            $data["login"] = $session["login"];
        }else
        {
            redirect(base_url().'index.php/login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;


        if(!empty($request["save"]))
        {
            $data_index=array("name"=>"姓名","tel"=>"聯絡電話");
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
            $insertdata["email"] =  $request["email"];
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
            $this->db->update('member_info', $insertdata);
            $this->db->close();
            echo '<script language="JavaScript"> alert("修改成功");history.go(-1); //回上一頁</script>';
            return;
        }
        $query = $this->db->select('id, acc, name, tel, email, code')->where('id', $session["uid"])->get('member_info');
        $data['member_info'] = $query->result_array();
        $data["reg_qr_img"]= $this->generateQRwithGoogle(base_url()."index.php/reg?recommend=".$data['member_info'][0]["code"]);
        $data["firm_reg_qr_img"] = $this->generateQRwithGoogle(base_url()."index.php/firm_reg?recommend=".$data['member_info'][0]["code"]);

        $data["locate"] = 5;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function myshare($page = 'myshare')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(isset($session["login"]) )
        {
            $data["login"] = $session["login"];
        }else
        {
            if(isset($get["ur"]))
            {
                $query = $this->db->select('id, code')->where('id', $get["ur"])->get('member_info');
                $member = $query->result_array();
                if(count($member))
                {
                    redirect(base_url().'index.php/reg?recommend='.$member[0]["code"], 'refresh');
                }
            }
            redirect(base_url().'index.php/login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        if($session["login"] == 1)
        {
            $query = $this->db->select('id, code')->where('id', $session["uid"])->get('member_info');
            $data['member_info'] = $query->result_array();
            $code = $data['member_info'][0]["code"];
        }else
        {
            $query = $this->db->select('id, code')->where('id', $session["uid"])->get('firm_info');
            $data['firm_info'] = $query->result_array();
            $code = $data['firm_info'][0]["code"];
        }

        $data["reg_qr_img"]= $this->generateQRwithGoogle(base_url()."index.php/reg?recommend=".$code);
        $data["firm_reg_qr_img"] = $this->generateQRwithGoogle(base_url()."index.php/firm_reg?recommend=".$code);

        $data["fb_word"] = urlencode(base_url()."index.php/reg?recommend=".$code);
        $data["line_word"] = "歡迎一起來使用彩虹橋平台 ".urlencode(base_url()."index.php/reg?recommend=".$code);
        $data["fb_word2"] = urlencode(base_url()."index.php/firm_reg?recommend=".$code);
        $data["line_word2"] = "歡迎一起來使用彩虹橋平台 ".urlencode(base_url()."index.php/firm_reg?recommend=".$code);
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function reservatelist($page = 'reservatelist')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $this->load->helper('url');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]) && $session["login"] == 1)
        {
            $data["login"] = $session["login"];
        }else if(isset($session["login"]) && $session["login"] == 2)
        {
            redirect(base_url().'index.php/reservatelist_firm', 'refresh');
        }
        else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "reservate";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $reqest = $this->input->post();
        $get = $this->input->get();
        $this->db->select('o_info.id, service.name, service.img, o_info.re_date, o_info.re_time, o_info.fee, service.city, zone, service.way, o_info.address, o_info.state ');
        $this->db->from('service');
        $this->db->join('o_info', 'service.id = o_info.service_id');
        $this->db->where('o_info.user_id',$session["uid"]);
        $this->db->order_by("o_info.id","desc");
        $this->db->where('o_info.pay_check',1);
        $query = $this->db->get();
        $data['service'] = $query->result_array();
        for($i=0; $i<count($data["service"]); $i++)
        {
            $hour = floor($data["service"][$i]["re_time"]/2);
            $min = $data["service"][$i]["re_time"]%2;
            if($min == 1)
            {
                $min = "30";
            }else
            {
                $min = "00";
            }
            $data["service"][$i]["re_time"] =  $hour.":".$min;
        }
        $data_state=array("0"=>"未完成","1"=>"取消預約","2"=>"完成服務","3"=>"完成服務","4"=>"爭議訂單","5"=>"爭議處理完成");
        for($i=0; $i<count($data['service']); $i++)
        {
            $data['service'][$i]["state_name"] = $data_state[$data['service'][$i]["state"]];
        }

        $data["locate"] = 3;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function reservation($page = 'reservation')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $this->load->helper('url');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]) && $session["login"] == 1)
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "reservatelist";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["cancel"]))
        {

            $update = array();
            $update["result_c"] =  3;
            $update["state"] =  1;
            $this->db->where('id',$request["cancel"]);
            $this->db->update('o_info', $update);
            $this->db->close();
            redirect(base_url().'index.php/reservatelist', 'refresh');
        }elseif(!empty($request["special"]))
        {
            $update = array();
            $update["state"] =  4;
            $this->db->where('id',$request["special"]);
            $this->db->update('o_info', $update);
            $this->db->close();
            redirect(base_url().'index.php/reservatelist', 'refresh');
        }elseif(!empty($request["eva"]))
        {
            redirect(base_url().'index.php/score?id='.$request["eva"], 'refresh');
        }
        if(!empty($get["id"]))
        {
            $this->db->select('o_info.id, service.name, service.img, o_info.re_date, o_info.re_time, o_info.fee, service.city, zone, service.way, service.address,
             service.attendant, service.intro, service.attendant_intro, o_info.result_b, o_info.result_c, service.time, o_info.result_c, firm_info.tel, firm_info.id as f_id, o_info.state');
            $this->db->from('service');
            $this->db->join('o_info', 'service.id = o_info.service_id');
            $this->db->join('firm_info', 'firm_info.id = service.firm');
            $this->db->where('o_info.id',$get["id"]);
            $query = $this->db->get();
            $data['service'] = $query->result_array();
            if(count($data["service"])==0)
            {
                echo '<script language="JavaScript"> alert("錯誤資訊，服務不存在。");history.go(-1); //回上一頁</script>';
            }else
            {
                $hour = floor($data["service"][0]["re_time"]/2);
                $min = $data["service"][0]["re_time"]%2;
                if($min == 1)
                {
                    $min = "30";
                }else
                {
                    $min = "00";
                }
                $data["service"][0]["re_time"] =  $hour.":".$min;
                $hour2 = $hour+$data["service"][0]["time"];
                if($hour2 > 24)
                {
                    $hour2 = $hour2 - 24;
                }
                $data["service"][0]["re_time2"] =  $hour2.":".$min;
                $now = time();
                $re_date_in_s = strtotime($data["service"][0]["re_date"]) + $data["service"][0]["re_time"]*30*60;

                $expire = 0;
                if($now>$re_date_in_s)
                {
                    $expire = 1;
                }
                $data["expire"] = $expire;
            }


        }else
        {
            echo '<script language="JavaScript"> alert("錯誤資訊，服務不存在。");history.go(-1); //回上一頁</script>';
        }



        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function score($page = 'score')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $this->load->helper('url');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]) && $session["login"] == 1)
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "reservatelist";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["save"]))
        {

            $insertdata = array();
            $insertdata["order_id"] =  $request["save"];
            $insertdata["score"] =  $request["score"];
            $insertdata["content"] =  $request["content"];
            $this->db->insert('score', $insertdata);
            $this->eva($request["save"]);
            $update = array();
            $update["state"] =  2;
            $update["finish_date"] =  date("Y/m/d");
            $this->db->where('id',$request["save"]);
            $this->db->update('o_info', $update);
            $this->db->close();
            redirect(base_url().'index.php/reservatelist', 'refresh');
        }
        if(!empty($request["update"]))
        {

            $insertdata = array();
            $insertdata["score"] =  $request["score"];
            $insertdata["content"] =  $request["content"];
            $this->db->where('order_id',$request["update"]);
            $this->db->update('score', $insertdata);
            $this->eva($request["update"]);
            $this->db->close();

            redirect(base_url().'index.php/reservatelist', 'refresh');
        }
        if(empty($get["id"]))
        {
            echo '<script language="JavaScript"> alert("錯誤資訊，服務不存在。");history.go(-1); //回上一頁</script>';
        }
        else
        {
            $data["id"] = $get["id"];
            $this->db->select('score.id, score.order_id, score.score, score.content');
            $this->db->from('score');
            $this->db->where('score.order_id',$get["id"]);
            $query = $this->db->get();
            $data['score'] = $query->result_array();

        }



        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    private function eva($order_id)
    {
        $this->db->select('service_id');
        $this->db->from('o_info');
        $this->db->where('id',$order_id);
        $query = $this->db->get();
        $order = $query->result_array();

        $this->db->select('score.id, score.score');
        $this->db->from('score');
        $this->db->join('o_info', 'o_info.id = score.order_id');
        $this->db->where('o_info.service_id',$order[0]["service_id"]);
        $query = $this->db->get();
        $score = $query->result_array();

        if(count($score))
        {
            $eva_value = 3;
            foreach($score as $item)
            {
                $eva_value= $eva_value+$item["score"];
            }
            $insertdata = array();
            $insertdata["eva"] =   ceil($eva_value/(count($score)+1));
            $this->db->where('id',$order[0]["service_id"]);
            $this->db->update('service', $insertdata);
            return ;
        }else
        {
            return ;
        }
    }
    public function reservatelist_firm($page = 'reservatelist_firm')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $this->load->helper('url');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]) && $session["login"] == 2)
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "reservatelist_firm";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/firm_login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $reqest = $this->input->post();
        $get = $this->input->get();
        $this->db->select('o_info.id, service.name, service.img, o_info.re_date, o_info.re_time, o_info.fee, service.city, zone, service.way, service.address, o_info.name as user_name, o_info.tel, o_info.state ');
        $this->db->from('service');
        $this->db->join('o_info', 'service.id = o_info.service_id');
        $this->db->where('service.firm',$session["uid"]);
        $this->db->where('o_info.pay_check',1);
        $this->db->order_by("o_info.id","desc");
        $query = $this->db->get();
        $data['service'] = $query->result_array();
        $data_state=array("0"=>"未完成","1"=>"取消預約","2"=>"完成服務","3"=>"已收款","4"=>"爭議訂單","5"=>"爭議處理完成");
        for($i=0; $i<count($data['service']); $i++)
        {
            $data['service'][$i]["state_name"] = $data_state[$data['service'][$i]["state"]];
        }
        for($i=0; $i<count($data["service"]); $i++)
        {
            $hour = floor($data["service"][$i]["re_time"]/2);
            $min = $data["service"][$i]["re_time"]%2;
            if($min == 1)
            {
                $min = "30";
            }else
            {
                $min = "00";
            }
            $data["service"][$i]["re_time"] =  floor($hour).":".$min;
        }


        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function reservation_firm($page = 'reservation_firm')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $this->load->helper('url');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]) && $session["login"] == 2)
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "reservatelist_firm";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/firm_login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["cancel"]))
        {

            $update = array();
            $update["result_c"] =  3;
            $this->db->where('id',$request["cancel"]);
            $this->db->update('o_info', $update);
            $this->db->close();
            redirect(base_url().'index.php/reservatelist', 'refresh');
        }elseif(!empty($request["eva"]))
        {
            redirect(base_url().'index.php/score_firm?id='.$request["eva"], 'refresh');
        }elseif(!empty($request["update"]))
        {
            $update = array();
            $update["re_date"] =  $request["re_date"];
            $this->db->where('id',$request["update"]);
            $this->db->update('o_info', $update);
        }elseif(!empty($request["talk"]))
        {
            $this->db->select('o_info.id, o_info.user_id, o_info.service_id ');
            $this->db->from('o_info');
            $this->db->where('o_info.id',$request["talk"]);
            $query = $this->db->get();
            $service = $query->result_array();
            redirect(base_url().'index.php/ask?id='.$service[0]["service_id"].'&uid='.$service[0]["user_id"], 'refresh');
        }
        if(!empty($get["id"]))
        {
            $this->db->select('o_info.id, service.name, service.img, o_info.re_date, o_info.re_time, o_info.fee, service.city, zone, service.way, service.address,
             service.attendant, service.intro, service.attendant_intro, o_info.result_b, o_info.result_c, service.time, o_info.result_c, o_info.name as user_name, o_info.tel, o_info.state ');
            $this->db->from('service');
            $this->db->join('o_info', 'service.id = o_info.service_id');
            $this->db->where('o_info.id',$get["id"]);
            $query = $this->db->get();
            $data['service'] = $query->result_array();
            if(count($data["service"])==0)
            {
                echo '<script language="JavaScript"> alert("錯誤資訊，服務不存在。");history.go(-1); //回上一頁</script>';
            }else
            {
                $hour = floor($data["service"][0]["re_time"]/2);
                $min = $data["service"][0]["re_time"]%2;
                if($min == 1)
                {
                    $min = "30";
                }else
                {
                    $min = "00";
                }
                $data["service"][0]["re_time"] =  floor($hour).":".$min;
                $hour2 = $hour+$data["service"][0]["time"];
                if($hour2 > 24)
                {
                    $hour2 = $hour2 - 24;
                }
                if(floor($hour2) == floor($hour))
                {
                    $min = 30;
                }
                $data["service"][0]["re_time2"] =  floor($hour2).":".$min;
                $now = time();
                $re_date_in_s = strtotime($data["service"][0]["re_date"]) + $data["service"][0]["re_time"]*30*60;

                $expire = 0;
                if($now>$re_date_in_s)
                {
                    $expire = 1;
                }
                $data["expire"] = $expire;
            }

        }else
        {
            echo '<script language="JavaScript"> alert("錯誤資訊，服務不存在。");history.go(-1); //回上一頁</script>';
        }



        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function score_firm($page = 'score_firm')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        $this->load->helper('url');
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]) && $session["login"] == 2)
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "reservatelist";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/firm_login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["save"]))
        {

            $insertdata = array();
            $insertdata["order_id"] =  $request["save"];
            $insertdata["score"] =  $request["score"];
            $insertdata["content"] =  $request["content"];
            $this->db->insert('score_user', $insertdata);
            $this->db->close();
            redirect(base_url().'index.php/reservatelist_firm', 'refresh');
        }
        if(!empty($request["update"]))
        {

            $insertdata = array();
            $insertdata["score"] =  $request["score"];
            $insertdata["content"] =  $request["content"];
            $this->db->where('order_id',$request["update"]);
            $this->db->update('score_user', $insertdata);
            $this->db->close();
            redirect(base_url().'index.php/reservatelist_firm', 'refresh');
        }
        if(empty($get["id"]))
        {
            echo '<script language="JavaScript"> alert("錯誤資訊，服務不存在。");history.go(-1); //回上一頁</script>';
        }
        else
        {
            $data["id"] = $get["id"];
            $this->db->select('score_user.id, score_user.order_id, score_user.score, score_user.content');
            $this->db->from('score_user');
            $this->db->where('score_user.order_id',$get["id"]);
            $query = $this->db->get();
            $data['score'] = $query->result_array();

        }



        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function score_list($page = 'score_list')
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
        if(!empty($get["id"]))
        {
            $data["id"] = $get["id"];
            $this->db->select('score.id, score.order_id, score.score, score.content, score.time');
            $this->db->from('score');
            $this->db->join('o_info', 'o_info.id = score.order_id');
            $this->db->where('o_info.service_id',$get["id"]);
            $query = $this->db->get();
            $data['score'] = $query->result_array();
        }




        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function ask($page = 'ask')
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

        if(!empty($request["message"]))
        {
            $insertdata = array();
            $insertdata["content"] =  $request["message"];
            $insertdata["service_id"] =  $request["id"];
            $insertdata["user_id"] =  $request["uid"];
            $insertdata["user_type"] =  $session["login"];
            $this->db->insert('message', $insertdata);
        }
        if($session["login"] == 1)
        {
            $data["uid"] = $session["uid"];
        }else
        {
            if(!empty($get["uid"]))
            {
                $data["uid"] = $get["uid"];
            }elseif($request["uid"])
            {
                $data["uid"] = $request["uid"];
            }else
            {
                redirect(base_url().'index.php/ask_list', 'refresh');
            }
        }
        if(!empty($get["id"]))
        {
            $data["id"] = $get["id"];
        }
        elseif(!empty($request["id"]))
        {
            $data["id"] = $request["id"];
        }

        if($session["login"] == 1)
        {
            $this->db->select('firm_info.id, firm_info.name');
            $this->db->from('service');
            $this->db->join('firm_info', 'firm_info.id = service.firm');
            $this->db->where('service.id',$data["id"]);
            $query = $this->db->get();
            $firm = $query->result_array();
            if(count($firm))
            {
                $data["to"] = $firm[0]["name"];
            }
            $this->db->select('message.id, message.service_id, message.content, message.post_time, message.read, message.user_type');
            $this->db->from('message');
            $this->db->where('message.service_id',$data["id"]);
            $this->db->where('message.user_id',$data["uid"]);
            $this->db->where('message.read',1);
            $this->db->order_by("message.time","asc");
            $query = $this->db->get();
            $data["message"] = $query->result_array();
            $this->db->select('message.id, message.service_id, message.content, message.post_time, message.read, message.user_type');
            $this->db->from('message');
            $this->db->where('message.service_id',$data["id"]);
            $this->db->where('message.user_id',$data["uid"]);
            $this->db->where('message.read',0);
            $this->db->order_by("message.time","asc");
            $query = $this->db->get();
            $data["message_unread"] = $query->result_array();
            $update = array();
            $update["read"] =  "1";
            $this->db->where('message.service_id',$data["id"]);
            $this->db->where('message.user_id',$data["uid"]);
            $this->db->where('message.user_type',2);
            $this->db->update('message', $update);
        }elseif($session["login"] == 2)
        {
            $this->db->select('member_info.id, member_info.name');
            $this->db->from('member_info');
            $this->db->where('member_info.id',$data["uid"]);
            $query = $this->db->get();
            $member = $query->result_array();
            if(count($member))
            {
                $data["to"] = $member[0]["name"];
            }
            $this->db->select('message.id, message.service_id, message.content, message.post_time, message.read, message.user_type');
            $this->db->from('message');
            $this->db->where('message.service_id',$data["id"]);
            $this->db->where('message.user_id',$data["uid"]);
            $this->db->where('message.read',1);
            $this->db->order_by("message.time","asc");
            $query = $this->db->get();
            $data["message"] = $query->result_array();
            $this->db->select('message.id, message.service_id, message.content, message.post_time, message.read, message.user_type');
            $this->db->from('message');
            $this->db->where('message.service_id',$data["id"]);
            $this->db->where('message.user_id',$data["uid"]);
            $this->db->where('message.read',0);
            $this->db->order_by("message.time","asc");
            $query = $this->db->get();
            $data["message_unread"] = $query->result_array();
            $update = array();
            $update["read"] =  "1";
            $this->db->where('message.service_id',$data["id"]);
            $this->db->where('message.user_id',$data["uid"]);
            $this->db->where('message.user_type',1);
            $this->db->update('message', $update);
        }
        $data["login"] = $session["login"];

        $this->db->close(); //database close

        $data['base_url'] = base_url();
        //$this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        //$this->load->view('templates/footer', $data);
    }

    public function ask_list($page = 'ask_list')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        if(isset($session["login"]) && ($session["login"] == 1 ||$session["login"] == 2))
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "ask_list";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/login', 'refresh');
        }


        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $reqest = $this->input->post();
        $get = $this->input->get();
        if($session["login"] ==2 )
        {
            $this->db->distinct();
            $this->db->select('message.service_id, message.user_id');
            $this->db->from('message');
            $this->db->join('service', 'message.service_id = service.id');
            $this->db->where('service.firm', $session["uid"]);
            $query = $this->db->get();
            $service = $query->result_array();
            $data["pair"] = $service;
            $service_id_temp = array();
            $user_id = array();
            foreach ($service as $item) {
                $service_id_temp[] = $item["service_id"];
                $user_id[] =  $item["user_id"];
            }
            $service_id = array();
            if(count($service_id_temp))
            {
                $this->db->select('service.id, service.name, service.img');
                $this->db->from('service');
                $this->db->where_in('service.id', $service_id_temp);
                $query = $this->db->get();
                $service_id = $query->result_array();
            }
            $data["service"] = array();
            foreach($service_id as $item)
            {
                $data["service"][$item["id"]] = $item;
            }
            $user =array();
            if(count($user_id)) {
                $this->db->select('member_info.id, member_info.name');
                $this->db->from('member_info');
                $this->db->where_in('member_info.id', $user_id);
                $query = $this->db->get();
                $user = $query->result_array();
            }
            $data["user"] = array();
            foreach($user as $item)
            {
                $data["user"][$item["id"]] = $item["name"];
            }

            $this->db->select('message.service_id, message.user_id');
            $this->db->from('message');
            $this->db->where('message.user_type', 1);
            $this->db->where('message.read', 0);
            $this->db->join('service', 'message.service_id = service.id');
            $this->db->where('service.firm', $session["uid"]);
            $query = $this->db->get();
            $message_unread = $query->result_array();

        }
        else if($session["login"] ==1 )
        {
            $this->db->distinct();
            $this->db->select('message.service_id, message.user_id');
            $this->db->from('message');
            $this->db->join('service', 'message.service_id = service.id');
            $this->db->where('message.user_id', $session["uid"]);
            $query = $this->db->get();
            $service = $query->result_array();
            $data["pair"] = $service;
            $service_id_temp = array();
            foreach ($service as $item) {
                $service_id_temp[] = $item["service_id"];
            }
            $service_id = array();
            if(count($service_id_temp))
            {
                $this->db->select('service.id, service.name, service.img');
                $this->db->from('service');
                $this->db->where_in('service.id', $service_id_temp);
                $query = $this->db->get();
                $service_id = $query->result_array();
            }

            $data["service"] = array();
            foreach($service_id as $item)
            {
                $data["service"][$item["id"]] = $item;
            }
            $this->db->select('member_info.id, member_info.name');
            $this->db->from('member_info');
            $this->db->where('member_info.id', $session["uid"]);
            $query = $this->db->get();
            $user = $query->result_array();
            $data["user"] = array();
            foreach($user as $item)
            {
                $data["user"][$item["id"]] = $item["name"];
            }


            $this->db->select('message.service_id, message.user_id');
            $this->db->from('message');
            $this->db->where('message.user_type', 2);
            $this->db->where('message.read', 0);
            $this->db->where('message.user_id', $session["uid"]);
            $query = $this->db->get();
            $message_unread = $query->result_array();
        }

        $message_unread_count = array();
        foreach($data["pair"] as $item)
        {
            $message_unread_count[$item["user_id"]."_".$item["service_id"]] = 0;
        }

        foreach($message_unread as $item)
        {
            $message_unread_count[$item["user_id"]."_".$item["service_id"]]++;
        }
        $data["unread"] = $message_unread_count;

        $data["locate"] = 4;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function fav($page = 'fav')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        $this->load->helper('url');
        if(isset($session["login"]) && $session["login"] == 1)
        {
            $data["login"] = $session["login"];
        }
        else if(isset($session["login"]) && $session["login"] == 2)
        {
            echo '<script language="JavaScript"> alert("廠商帳號不支援我在最愛功能，請改用一般會員帳號登入。");history.go(-1); //回上一頁</script>';
            return;
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "fav";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/login', 'refresh');
        }

        $url = "";
        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(!empty($request["remove"]))
        {
            $this->db->where('service_id',$request["remove"]);
            $this->db->where('user_id',$session["uid"]);
            $this->db->delete('favorite');
            $this->db->set('fav', 'fav-1', FALSE);
            $this->db->where('id',$request["remove"]);
            $this->db->update('service');
            $this->db->close();
            redirect(base_url().'index.php/fav', 'refresh');
        }
        if(isset($get["cat"]))
        {
            $this->db->select('service.id, service.name, service.img, service.fee, service.special_fee');
            $this->db->from('service');
            $this->db->join('favorite', 'service.id = favorite.service_id');
            $this->db->where('service.ready', 1);
            $this->db->where('service.cat',$get["cat"]);
            $this->db->where('favorite.user_id',$session["uid"]);
            $query = $this->db->get();
            $data['service'] = $query->result_array();
            $data['cat_select'] = $get["cat"];
        }else
        {
            $this->db->select('service.id, service.name, service.img, service.fee, service.special_fee');
            $this->db->from('service');
            $this->db->join('favorite', 'service.id = favorite.service_id');
            $this->db->where('service.ready', 1);
            $this->db->where('favorite.user_id',$session["uid"]);
            $query = $this->db->get();
            $data['service'] = $query->result_array();
        }


        $query = $this->db->select('id, name')->get('cat');
        $data['cat'] = $query->result_array();

        $data["locate"] = 2;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function firm_about($page = 'firm_about')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        if(isset($session["login"]) && $session["login"]==2)
        {
            $data["login"] = $session["login"];
        }else
        {
            redirect(base_url().'index.php/firm_login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(!empty($request["save"]))
        {

            $insertdata = array();
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
                    $insertdata["img1"] =  $time.$_FILES["imgInp"]["name"];
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
            $insertdata["about"] =  $request["about"];
            $this->db->where('id',$session["uid"]);
            $this->db->update('firm_info', $insertdata);
            $this->db->close();
            echo '<script language="JavaScript"> alert("修改成功");history.go(-1); //回上一頁</script>';
            return;
        }
        $query = $this->db->select('id, about, img1, img2, img3')->where('id', $session["uid"])->get('firm_info');
        $data['firm'] = $query->result_array();


        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function firm_photo($page = 'firm_photo')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        if(isset($session["login"]) && $session["login"]==2)
        {
            $data["login"] = $session["login"];
        }else
        {
            redirect(base_url().'index.php/firm_login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(!empty($request["save"]))
        {

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

            $insertdata["cat"] =  $request["cat"];
            $insertdata["intro"] =  $request["intro"];
            $insertdata["firm_id"] =  $session["uid"];
            $this->db->insert('firm_photo', $insertdata);
        }elseif(!empty($request["remove"]))
        {
            $this->db->where('id',$request["remove"]);
            $this->db->delete('firm_photo');
        }elseif(!empty($request["update"]))
        {
            $insertdata = array();
            $insertdata["intro"] = $request[$request["update"]];
            $this->db->where('id',$request["update"]);
            $this->db->update('firm_photo', $insertdata);
        }
        $query = $this->db->select('id, name')->get('cat');
        $data['cat'] = $query->result_array();

        $query = $this->db->select('id, img, cat, intro')->where('firm_id', $session["uid"])->get('firm_photo');
        $data['photo'] = $query->result_array();


        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function phone_check($page = 'phone_check')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        if(isset($get["url"]))
        {
            $data["url"]=urldecode($get["url"]);
        }
        if(!empty($request["check"]))
        {
            if(isset($session["login"]) && $session["login"]  == 2 )
            {
                $query = $this->db->select('id, acc, phone_check_code')->where('id', $session["uid"])->get('firm_info');
                $member = $query->result_array();
                if(count($member))
                {
                    if($member[0]["phone_check_code"] == $request["code"])
                    {
                        $insertdata = array();
                        $insertdata["phone_check"] =  1;
                        $this->db->where('id',$session["uid"]);
                        $this->db->update('firm_info', $insertdata);
                        echo '<script type="text/javascript">alert(\'驗證完成。\');</script>';
                        redirect(base_url().'index.php/firm_info', 'refresh');
                    }else
                    {
                        echo '<script type="text/javascript">alert(\'認證碼錯誤。\');</script>';
                        redirect(base_url().'index.php/phone_check', 'refresh');
                    }
                }else{
                    echo '<script type="text/javascript">alert(\'您尚未登入。\');</script>';
                    redirect(base_url().'index.php', 'refresh');
                }
            }elseif(isset($session["login"]) && $session["login"]  == 1)
            {
                $query = $this->db->select('id, acc, phone_check_code')->where('id', $session["uid"])->get('member_info');
                $member = $query->result_array();
                if(count($member))
                {
                    if($member[0]["phone_check_code"] == $request["code"])
                    {
                        $insertdata = array();
                        $insertdata["phone_check"] =  1;
                        $this->db->where('id',$session["uid"]);
                        $this->db->update('member_info', $insertdata);
                        echo '<script type="text/javascript">alert(\'驗證完成。\');</script>';
                        redirect(base_url().'index.php/member_info', 'refresh');
                    }else
                    {
                        echo '<script type="text/javascript">alert(\'認證碼錯誤。\');</script>';
                        redirect(base_url().'index.php/phone_check', 'refresh');
                    }
                }else{
                    echo '<script type="text/javascript">alert(\'您尚未登入。\');</script>';
                    redirect(base_url().'index.php', 'refresh');
                }

            }

        }elseif(!empty($request["remove"]))
        {
            $this->db->where('id',$request["remove"]);
            $this->db->delete('firm_photo');
        }

        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function about($page = 'about')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        $this->load->helper('url');
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }
        $url = "";
        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();

        if(isset($get["id"]))
        {
            $query = $this->db->select('id, about, img1, img2, img3')->where('id', $get["id"])->get('firm_info');
            $data['firm'] = $query->result_array();

            $this->db->select('service.id, service.name, service.img, service.fee, service.special_fee');
            $this->db->from('service');
            $this->db->where('service.ready', 1);
            $this->db->where('service.firm', $get["id"]);
            $query = $this->db->get();
            $data['service'] = $query->result_array();

            $query = $this->db->select('id, img, cat, intro')->where('firm_id', $get["id"])->get('firm_photo');
            $data['photo'] = $query->result_array();
        }






        $data["locate"] = 2;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function about_photo($page = 'about_photo')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        $this->load->helper('url');
        if(isset($session["login"]))
        {
            $data["login"] = $session["login"];
        }
        $url = "";
        $data['url'] = $url;

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();

        if(isset($request["last"]))
        {
            redirect(base_url().'index.php/about_photo?id='.$request["last"], 'refresh');
        }else if(isset($request["next"]))
        {
            redirect(base_url().'index.php/about_photo?id='.$request["next"], 'refresh');
        }else if(isset($request["back"]))
        {
            redirect(base_url().'index.php/about?id='.$request["firm_id"], 'refresh');
        }
        if(isset($get["id"]))
        {

            $query = $this->db->select('id, img, cat, intro,firm_id')->where('id', $get["id"])->get('firm_photo');
            $data['photo'] = $query->result_array();

            $query = $this->db->select('id, img, cat, intro,firm_id')->where('firm_id', $data['photo'][0]["firm_id"])->get('firm_photo');
            $firm_photo = $query->result_array();
            for($i=0; $i<count($firm_photo); $i++)
            {
                if($firm_photo[$i]["id"] == $get["id"])
                {
                    if($i==0)
                    {
                        $data["last"] = $firm_photo[count($firm_photo)-1]["id"];
                    }else
                    {
                        $data["last"] = $firm_photo[$i-1]["id"];
                    }

                    if($i== (count($firm_photo)-1))
                    {
                        $data["next"] = $firm_photo[0]["id"];
                    }else
                    {
                        $data["next"] = $firm_photo[$i+1]["id"];
                    }
                }
            }

        }


        $data["locate"] = 2;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function wallet($page = 'wallet')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $this->load->helper('url');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        if(isset($session["login"]) && $session["login"] == 1)
        {
            $data["login"] = $session["login"];
        }else
        {
            $data["login"] = 0;
            $session_write= array();
            $session_write["back_url"] =  "reservate";
            $this->session->set_userdata($session_write);
            redirect(base_url().'index.php/login', 'refresh');
        }

        $session = $this->session->all_userdata();
        $url = "";

        $data['url'] = $url;

        $this->load->database('default');
        $reqest = $this->input->post();
        $get = $this->input->get();
        $this->db->select('id, gold, gold2, code');
        $this->db->from('member_info');
        $this->db->where('id',$session["uid"]);
        $query = $this->db->get();
        $data['member'] = $query->result_array();
        if(!count($data['member']))
        {
            echo '<script language="JavaScript"> alert("帳號不存在");history.go(-1); //回上一頁</script>';
            redirect(base_url().'index.php', 'refresh');
        }
        $this->db->select('o_info.id, service.name, service.img, o_info.re_date, o_info.re_time, o_info.fee, service.city, zone, service.way, service.address, o_info.gold, o_info.gold2 ');
        $this->db->from('service');
        $this->db->join('o_info', 'service.id = o_info.service_id');
        $this->db->where('o_info.user_id',$session["uid"]);
        $this->db->where('o_info.pay_check',1);
        $query = $this->db->get();
        $data['service'] = $query->result_array();
        for($i=0; $i<count($data["service"]); $i++)
        {
            $hour = floor($data["service"][$i]["re_time"]/2);
            $min = $data["service"][$i]["re_time"]%2;
            if($min == 1)
            {
                $min = "30";
            }else
            {
                $min = "00";
            }
            $data["service"][$i]["re_time"] =  $hour.":".$min;
        }
        $this->db->select('id, name, join_time');
        $this->db->from('member_info');
        $this->db->where('member_info.ref',$data['member'][0]["code"]);
        $query = $this->db->get();
        $data['member_list'] = $query->result_array();
        for($i=0; $i<count($data["member_list"]); $i++)
        {
            $join_time = explode(" ",$data["member_list"][$i]["join_time"]);
            $data["member_list"][$i]["join_time"] =  $join_time[0];
        }

        $data["locate"] = 3;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    function get_city()
    {
        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if(isset($request["city"]))
        {
            $this->db->select('zipcode.id, zipcode.area');
            $this->db->from('zipcode');
            $this->db->join('city', 'city.city = zipcode.city');
            $this->db->where('city.id',$request["city"]);
            $query = $this->db->get();
            $zipcode = $query->result_array();
            //echo json_encode($zipcode);
            $name = "";
            $id = "";
            foreach($zipcode as $item)
            {
                $name = $name.$item["area"].',';
                $id = $id.$item["id"].',';
            }
            $name = substr( $name , 0 , (strlen($name)-1) );
            $id = substr( $id , 0 , (strlen($id)-1) );
            echo $name."-".$id;
        }

    }

    public function provision($page = 'provision')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        $session = $this->session->all_userdata();
        $url = "";
        $data['url'] = $url;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function firm_service_time($page = 'firm_service_time')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        if(isset($session["login"]) && $session["login"]==2)
        {
            $data["login"] = $session["login"];
        }else
        {
            redirect(base_url().'index.php/firm_login', 'refresh');
        }
        $url = "";

        $data['url'] = $url;
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        $session = $this->session->all_userdata();
        if(isset($request["save"]))
        {
            $insertdata = array();
            for($i=1; $i<=7; $i++)
            {
                $time =array();
                if(!isset($request["wr".$i]))
                {
                   // echo $request["ws".$i]."<br>";
                    //echo $request["we".$i]."<br>";
                    if($request["ws".$i] != $request["we".$i])
                    {
                        for($x=$request["ws".$i]; $x<=$request["we".$i]; $x++)
                        {
                            $time[] = $x;
                        }
                    }

                    $insertdata["service_time_".$i] = json_encode($time);
                }

            }
            $insertdata["firm"] = $session["uid"];
            $this->db->select('id');
            $this->db->from('firm_service_time');
            $this->db->where('firm',$session["uid"]);
            $query = $this->db->get();
            if(count($query->result_array()))
            {
                $this->db->where('firm',$session["uid"]);
                $this->db->update('firm_service_time', $insertdata);
            }else
            {
                $this->db->insert('firm_service_time', $insertdata);
            }
         }
        $time_line =array();
        for($i=0; $i<=48; $i++)
        {
            if($i%2 == 1)
            {
                $time_line[$i] = floor($i/2).":30";
            }else
            {
                $time_line[$i] = floor($i/2).":00";
            }
        }
        $data["time_line"]= $time_line;
        $this->db->select('id, service_time_1, service_time_2, service_time_3, service_time_4, service_time_5, service_time_6, service_time_7');
        $this->db->from('firm_service_time');
        $this->db->where('firm',$session["uid"]);
        $query = $this->db->get();
        $data["service_time"]=$query->result_array();
        for($i=1; $i<=7; $i++)
        {
            if(empty($data["service_time"][0]["service_time_".$i]))
            {
                $time_arr = [];
            }else
            {
                $time_arr = json_decode($data["service_time"][0]["service_time_".$i]);
            }

            if(count($time_arr))
            {
                $data["service_time"][0]["service_time_".$i."s"] = $time_arr[0];
                $data["service_time"][0]["service_time_".$i."e"] = $time_arr[(count($time_arr)-1)];
            }else
            {
                $data["service_time"][0]["service_time_".$i."s"] = 0;
                $data["service_time"][0]["service_time_".$i."e"] = 0;
            }
        }
        $url = "";
        $data['url'] = $url;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    private function generateQRwithGoogle($url,$widthHeight ='350',$EC_level='L',$margin='0') {
        $url = urlencode($url);
        return 'http://chart.apis.google.com/chart?chs='.$widthHeight.'x'.$widthHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$url;
    }

    function get_service_time()
    {

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        $weekday = date('w', strtotime($request["date"]));
        if($weekday == 0)
        {
            $weekday = 7;
        }
        $data = array();

        $query = $this->db->select('id, time, service_time_'.$weekday)
            ->where('id', $request["id"])
            ->get('service');
        $service = $query->result_array();
        $data['service'] = $service;
        if(!empty($service[0]))
        {
            $service_time = json_decode($service[0]["service_time_".$weekday],true);
            $today = explode("/",date(("Y/m/d"))) ;
            $able_time = array();
            $able_date = array();
            for($x=0;$x<count($service_time); $x++)
            {
                $hour = floor($service_time[$x]/2);
                $hour_end = $hour+$service[0]["time"];
                if($hour_end > 24)
                {
                    $hour_end = $hour_end-24;
                }
                if($service_time[$x]%2)
                {
                    $min="30";
                }else
                {
                    $min="00";
                }
                if(is_int($service[0]["time"]))
                {
                    $able_time[$x] = $hour.":".$min."-".$hour_end.":".$min;
                }else
                {
                    if($min == "30")
                    {
                        $able_time[$x] = $hour.":".$min."-".($hour+1).":00";
                    }else
                    {
                        $able_time[$x] = $hour.":".$min."-".$hour.":30";
                    }

                }

            }
            //$data["able_time"]= $able_time;
            //$data["able_time_json"]= json_encode($able_time);
            echo json_encode($able_time);

            /*
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
            */

        }
    }

    function get_firm_position()
    {

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();

        $query = $this->db->select('id, contact_name, loc')
            ->get('firm_info');
        $firm = $query->result_array();
        $firm_loc = array();
        foreach($firm as $item)
        {
            if(!empty($item["loc"]))
            {
                $firm_loc[] = $item;
            }
        }

        echo json_encode($firm_loc);

    }

    function save_firm_position()
    {

        $this->load->database('default');
        $request = $this->input->post();
        $get = $this->input->get();
        if($request["suid"] != 0)
        {
            $loc = $request["lat"].", ".$request["lng"];
            $insertdata = array();
            $insertdata["loc"] =  $loc;
            $this->db->where('id', $request["suid"]);
            $this->db->update('firm_info', $insertdata);
        }
        $this->db->close();

    }

    private function default_set($data)
    {
        $session = $this->session->all_userdata();
        if(isset($session["login"]) && $session["login"] == 1)
        {
            $data["uid"] = $session["uid"];
            $query = $this->db->select('gold, gold2')->where('id', $session["uid"])->get('member_info');
            if(count($query->result_array()))
            {
                $res =  $query->result_array();
                $session_write= array();
                $session_write["gold"] = $res[0]["gold"];
                $session_write["gold2"] = $res[0]["gold2"];
                $this->session->set_userdata($session_write);
                $data["gold"] = $res[0]["gold"];
                $data["gold2"] = $res[0]["gold2"];
            }
        }



        return $data;
    }

    public function detail1($page = 'detail1')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        $session = $this->session->all_userdata();
        $url = "";
        $data['url'] = $url;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail2($page = 'detail2')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        $session = $this->session->all_userdata();
        $url = "";
        $data['url'] = $url;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail3($page = 'detail3')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->library('session');
        $session = $this->session->all_userdata();
        //var_dump($this->session->all_userdata());
        $this->load->helper('url');
        $request = $this->input->post();
        $get = $this->input->get();
        $this->load->database('default');
        $session = $this->session->all_userdata();
        $url = "";
        $data['url'] = $url;
        $data['base_url'] = base_url();
        $data = $this->default_set($data);
        $this->db->close(); //database close
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    private function set_back()
    {
        $session_write= array();
        $session_write["set_back"] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        $this->session->set_userdata($session_write);
    }


}
?>