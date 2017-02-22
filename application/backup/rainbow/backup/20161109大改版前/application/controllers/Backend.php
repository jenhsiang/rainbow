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
        if(!empty($reqest["view"]))
        {
            redirect(base_url().'index.php/t_view_class?class='.$reqest["view"], 'refresh');
        }
        $this->load->database('default');

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        //$this->load->view('templates/teacher_header', $data);
        $this->load->view('backend/' . $page, $data);
        //$this->load->view('templates/teacher_footer', $data);
    }

    public function home($page = 'home')
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
        if(!empty($reqest["view"]))
        {
            redirect(base_url().'index.php/t_view_class?class='.$reqest["view"], 'refresh');
        }
        $this->load->database('default');

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        $this->load->view('templates/backend_header', $data);
        $this->load->view('templates/backend_left_admin', $data);
        $this->load->view('backend/' . $page, $data);
        $this->load->view('templates/backend_footer', $data);
    }

    public function new_firm($page = 'new_firm')
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
        if(!empty($reqest["view"]))
        {
            redirect(base_url().'index.php/t_view_class?class='.$reqest["view"], 'refresh');
        }
        $this->load->database('default');
        if(!empty($request["save"]))
        {
            $data_index=array("name"=>"廠商名稱","tel"=>"廠商電話");
            foreach($data_index as $key=>$value)
            {
                if(empty($request[$key]))
                {

                    echo '<script language="JavaScript"> alert("'.$value.'未設定");history.go(-1); //回上一頁</script>';
                    return;
                }
            }
            $insertdata = array();
            $insertdata["name"] =  $request["name"];
            $insertdata["tel"] =  $request["tel"];
            $insertdata["other"] =  $request["other"];
            $this->db->insert('firm', $insertdata);
            $this->db->close();
            redirect(base_url().'index.php/firm_list', 'refresh');
        }elseif(!empty($request["back"]))
        {
            redirect(base_url().'index.php/firm_list', 'refresh');
        }

        $data["choose"] = "1";

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        $this->load->view('templates/backend_header', $data);
        $this->load->view('templates/backend_left_firm', $data);
        $this->load->view('backend/' . $page, $data);
        $this->load->view('templates/backend_footer', $data);
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
        if(!empty($request["edit"]))
        {
            redirect(base_url().'index.php/edit_firm?id='.$request["edit"], 'refresh');
        }elseif(!empty($request["del"]))
        {
            $this->db->where('id',$request["del"]);
            $this->db->delete('firm');
        }elseif(!empty($request["new"]))
        {
            redirect(base_url().'index.php/new_firm', 'refresh');
        }elseif(!empty($request["check"]))
        {
            $userdata = array();
            $userdata["check_org"] = 1;
            $this->db->where('id', $request["check"]);
            $this->db->update('org', $userdata);
            redirect(base_url().'index.php/firm_list', 'refresh');
        }
        $this->load->database('default');
        $this->db->select('org.id,org.name,org.tel,org.contact,');
        $this->db->from('org');
        $this->db->where('org.check_org','0');
        //$this->db->join('org_to_stud', 'org_to_stud.student = student_info.id');
        //$this->db->where('org_to_stud.org', $org_id);
        $query = $this->db->get();
        $data["firm"] = $query->result_array();
        $data["choose"] = "1";

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        $this->load->view('templates/backend_header', $data);
        $this->load->view('templates/backend_left_firm', $data);
        $this->load->view('backend/' . $page, $data);
        $this->load->view('templates/backend_footer', $data);
    }

    public function edit_firm($page = 'new_firm')
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
            $userdata = array();
            $userdata["name"] = $request["name"];
            $userdata["tel"] = $request["tel"];
            $userdata["other"] = $request["other"];
            $this->db->where('id', $request["save"]);
            $this->db->update('firm', $userdata);
            redirect(base_url().'index.php/firm_list', 'refresh');
        }elseif(empty($get["id"]))
        {
            redirect(base_url().'index.php/firm_list', 'refresh');
        }
        $this->load->database('default');
        $this->db->select('firm.id,firm.name,firm.tel,firm.other');
        $this->db->from('firm');
        //$this->db->join('org_to_stud', 'org_to_stud.student = student_info.id');
        $this->db->where('firm.id', $get["id"]);
        $query = $this->db->get();
        $data["firm"] = $query->result_array();
        $data["choose"] = "2";

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        $this->load->view('templates/backend_header', $data);
        $this->load->view('templates/backend_left_firm', $data);
        $this->load->view('backend/' . $page, $data);
        $this->load->view('templates/backend_footer', $data);
    }

    public function import_fee($page = 'import_fee')
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
        if(!empty($_FILES["file"]))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Error: " . $_FILES["file"]["error"];
            }else
            {
                echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
                echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
                echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
                echo "暫存名稱: " . $_FILES["file"]["tmp_name"];

                move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
                $dbname="upload/".$_FILES["file"]["name"];
                if ( !$fp = fopen($dbname,"r") ) {
                    echo "Cannot open $dbname\n";
                    exit;
                }else{

                    $size = filesize($dbname)+1;
                    $row=0;
                    //$temp=fgetcsv($fp,$size,",");
                    $index = 1;
                    $error = array();
                    $error_item = 0;
                    while($temp=$this->__fgetcsv($fp,$size,",")){
                        if ($row>0){
                            //echo $temp[0]." ".$temp[1]." ".$temp[2]." ".iconv("big5","UTF-8",$temp[3])." ".iconv("big5","UTF-8",$temp[4])."<br>";
                            $insertdata = array();
                            if(!empty($temp[0]))
                            {
                                $insertdata["firm"] =  $temp[0];
                            }
                            if(!empty($temp[1]))
                            {
                                $insertdata["telcom"] =  $temp[1];
                            }
                            if(!empty($temp[2]))
                            {
                                $this->db->select('program.id,program.name');
                                $this->db->from('program');
                                //$this->db->join('org_to_stud', 'org_to_stud.student = student_info.id');
                                $this->db->where('program.name', $temp[2]);
                                $query = $this->db->get();
                                $program = $query->result_array();
                                if(count($program))
                                {
                                    $insertdata["program"] =  $program[0]["id"];
                                }else
                                {
                                    $insertdata = array();
                                    $insertdata["name"] =  $temp[2];
                                    $this->db->insert('program', $insertdata);
                                    $id = $this->db->insert_id();
                                    $insertdata["program"] = $id;
                                }

                            }
                            if(!empty($temp[3]) || $temp[3]!="x" || $temp[3]!="X" || $temp[3]!="#VALUE!")
                            {
                                $insertdata["contract"] =  $temp[3];
                            }
                            if(!empty($temp[4]) || $temp[4]!="x" || $temp[4]!="X" || $temp[4]!="#VALUE!")
                            {
                                $insertdata["contract_fee"] =  $temp[4];
                            }

                            if(!empty($temp[5]) || $temp[5]!="x" || $temp[5]!="X" || $temp[5]!="#VALUE!")
                            {
                                $insertdata["new_pre"] =  $temp[5];
                            }
                            if(!empty($temp[6]) || $temp[6]!="x" || $temp[6]!="X" || $temp[6]!="#VALUE!")
                            {
                                $insertdata["new_pre"] =  $temp[6];
                            }
                            if(!empty($temp[7]) || $temp[7]!="x" || $temp[7]!="X" || $temp[7]!="#VALUE!")
                            {
                                $insertdata["np"] =  $temp[7];
                            }
                            if(!empty($temp[8]) || $temp[8]!="x" || $temp[8]!="X" || $temp[8]!="#VALUE!")
                            {
                                $insertdata["renewal_pre"] = $temp[8];
                            }
                            if(!empty($temp[9]) || $temp[9]!="x" || $temp[9]!="X" || $temp[9]!="#VALUE!")
                            {
                                $insertdata["renewal"] =  $temp[9];
                            }
                            if(!empty($temp[10]) || $temp[10]!="x" || $temp[10]!="X" || $temp[10]!="#VALUE!")
                            {
                                $insertdata["new_phone"] =  $temp[10];
                            }
                            if(!empty($temp[11]) || $temp[11]!="x" || $temp[11]!="X" || $temp[11]!="#VALUE!")
                            {
                                $insertdata["np_phone"] =  $temp[11];
                            }
                            if(!empty($temp[12]) || $temp[12]!="x" || $temp[12]!="X" || $temp[12]!="#VALUE!")
                            {
                                $insertdata["renewal_phone"] =  $temp[12];
                            }
                            if(!empty($temp[13]) || $temp[13]!="x" || $temp[13]!="X" || $temp[13]!="#VALUE!")
                            {
                                //$insertdata["new_add"] = $this->fee_convert($temp[13]);
                            }
                            if(!empty($temp[14]) || $temp[14]!="x" || $temp[14]!="X" || $temp[14]!="#VALUE!")
                            {
                                $insertdata["new_total"] =  $temp[14];
                            }
                            if(!empty($temp[15]) || $temp[15]!="x" || $temp[15]!="X" || $temp[15]!="#VALUE!")
                            {
                                //$insertdata["np_add"] =  $this->fee_convert($temp[15]);
                            }
                            if(!empty($temp[16]) || $temp[16]!="x" || $temp[16]!="X" || $temp[16]!="#VALUE!")
                            {
                                $insertdata["special_add"] =  $temp[16];
                            }
                            if(!empty($temp[17]))
                            {
                                $insertdata["special_name"] =  iconv("big5","UTF-8",$temp[17]);
                            }
                            if(!empty($temp[18]) || $temp[18]!="x" || $temp[18]!="X" || $temp[18]!="#VALUE!")
                            {
                                $insertdata["np_add_total"] =  $temp[18];
                            }
                            if(!empty($temp[19]) || $temp[19]!="x" || $temp[19]!="X" || $temp[19]!="#VALUE!")
                            {
                                $insertdata["renewal_add"] =  $temp[19];
                            }
                            if(!empty($temp[20]) || $temp[20]!="x" || $temp[20]!="X" || $temp[20]!="#VALUE!")
                            {
                                $insertdata["new_phone_add"] =  $temp[20];
                            }
                            if(!empty($temp[21]) || $temp[21]!="x" || $temp[21]!="X" || $temp[21]!="#VALUE!")
                            {
                                $insertdata["new_phone_total"] =  $temp[21];
                            }
                            if(!empty($temp[22]) || $temp[22]!="x" || $temp[22]!="X" || $temp[22]!="#VALUE!")
                            {
                                $insertdata["np_phone_add"] =  $temp[22];
                            }
                            if(!empty($temp[23]) || $temp[23]!="x" || $temp[23]!="X" || $temp[23]!="#VALUE!")
                            {
                                $insertdata["np_phone_total"] =  $temp[23];
                            }
                            if(!empty($temp[24]) || $temp[24]!="x" || $temp[24]!="X" || $temp[24]!="#VALUE!")
                            {
                                $insertdata["pre_merge"] =  $temp[24];
                            }

                            var_dump($insertdata);
                            if(empty($insertdata["firm"]))
                            {
                                $error[$index] = "第".$index."欄位未填寫廠商";
                                $error_item = 1;
                            }
                            elseif(empty($insertdata["program"]))
                            {
                                $error[$index] = "第".$index."欄位未填寫方案";
                                $error_item = 1;
                            }elseif(empty($insertdata["telcom"]))
                            {
                                $error[$index] = "第".$index."欄位未填寫電信商";
                                $error_item = 1;
                            }
                            var_dump($error);

                            if($error_item == 0)
                            {
                                $this->db->insert('fee', $insertdata);
                            }
                            $error_item = 0;
                            $success = 1;
                            $data["success"] = 1;
                            $index++;
                        }
                        $row=$row+1;
                    }
                    $this->db->close();
                    fclose($fp);
                    $data["error"] = $error;

                }
            }
        }

        $data["choose"] = "1";

        $this->db->close(); //database close
        $data['base_url'] = base_url();
        $this->load->view('templates/backend_header', $data);
        $this->load->view('templates/backend_left_fee', $data);
        $this->load->view('backend/' . $page, $data);
        $this->load->view('templates/backend_footer', $data);
    }

    function __fgetcsv(&$handle, $length = null, $d = ",", $e = '"') {
        $d = preg_quote($d);
        $e = preg_quote($e);
        $_line = "";
        $eof=false;
        while ($eof != true) {
            $_line .= (empty ($length) ? fgets($handle) : fgets($handle, $length));
            $itemcnt = preg_match_all('/' . $e . '/', $_line, $dummy);
            if ($itemcnt % 2 == 0){
                $eof = true;
            }
        }

        $_csv_line = preg_replace('/(?: |[ ])?$/', $d, trim($_line));

        $_csv_pattern = '/(' . $e . '[^' . $e . ']*(?:' . $e . $e . '[^' . $e . ']*)*' . $e . '|[^' . $d . ']*)' . $d . '/';
        preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
        $_csv_data = $_csv_matches[1];

        for ($_csv_i = 0; $_csv_i < count($_csv_data); $_csv_i++) {
            $_csv_data[$_csv_i] = preg_replace("/^" . $e . "(.*)" . $e . "$/s", "$1", $_csv_data[$_csv_i]);
            $_csv_data[$_csv_i] = str_replace($e . $e, $e, $_csv_data[$_csv_i]);
        }

        return empty ($_line) ? false : $_csv_data;
    }

    function fee_convert($fee)
    {
        $start = 0;
        $e500 = 0;
        $e1000 = 0;
        $start = strpos($fee,"+",0);
        while($start)
        {
            $e500++;
            $start = strpos($fee,"+",$start);
        }
        $start = strpos($fee,"*",0);
        while($start)
        {
            $e1000++;
            $start = strpos($fee,"*",$start);
        }
        if($start = strpos($fee,"+",0))
        {
            $real_fee = substr($fee,0,$start);
            $real_fee = (int)$real_fee + 500*$e500 + 1000*$e1000;
        }elseif($start = strpos($fee,"*",0))
        {
            $real_fee = substr($fee,0,$start);
            $real_fee = (int)$real_fee + 500*$e500 + 1000*$e1000;
        }else
        {
            $real_fee = $fee;
        }

        return $real_fee;
    }
}