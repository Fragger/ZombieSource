<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

  function __construct()
  {
      parent::__construct();

      if(!$this->tank_auth->is_logged_in()){
        redirect('/auth/login');
      }
      $this->load->helper(array('form', 'url'));
      $this->load->library('security');
      $this->load->library('tank_auth');
      $this->lang->load('tank_auth');
      $this->load->model('Player_model','',TRUE);
      $this->load->library('player', null);

  }

  public function index()
  {
    //this needs to be run for everyone on the site
    // $player->save("username",$this->tank_auth->get_username());
    // $player->save("email",$this->tank_auth->get_email());
    $player = new player($this->tank_auth->get_user_id());
    if($player->waiver_is_signed()){
      $layout_data['top_bar'] = $this->load->view('layouts/logged_in_topbar','', true);
      $layout_data['content_body'] = $this->load->view('profile/profile_page', $player->data, true);
      $layout_data['footer'] = $this->load->view('layouts/footer', '', true);          
      $this->load->view('layouts/main', $layout_data);
    }
    else{
      $this->form_validation->set_rules('waiver', 'Waiver', 'trim|required|xss_clean');
      $this->form_validation->set_rules('sig', 'Signature', 'trim|required|xss_clean');
      $this->form_validation->set_rules('age', 'Age', 'integer|trim|xss_clean');
      $this->form_validation->set_rules('gender', 'Gender', 'trim|xss_clean');
      $this->form_validation->set_rules('major', 'Major', 'trim|xss_clean');
      $this->form_validation->set_rules('originalzombiepool', 'OriginalZombiePool', 'trim|xss_clean');
                  
        if ($this->form_validation->run()) {
          //store data
          $params = array('waiver_is_signed' => "TRUE",
                          'sig' => $this->input->post('sig'),
                          'age' => $this->input->post('age'),
                          'gender' => $this->input->post('gender'),
                          'major' => $this->input->post('major'),
                          'OriginalZombiePool' => $this->input->post('originalzombiepool'));

          $this->player->join_game($params);
          redirect('profile');
        }
        else{
          $layout_data['top_bar'] = $this->load->view('layouts/logged_in_topbar','', true);
          $layout_data['content_body'] = $this->load->view('auth/registration_page_two', '', true);
          $layout_data['footer'] = $this->load->view('layouts/footer', '', true);          
          $this->load->view('layouts/main', $layout_data);
        }
    }
  }

  public function edit_profile()
  {
      $playerid = $this->Player_model->getPlayerID($this->tank_auth->get_user_id(), GAME_KEY);
      $data = array();
      $data['age'] = $this->Player_model->getPlayerData($playerid, 'age');
      $data['gender'] = $this->Player_model->getPlayerData($playerid, 'gender');
      $data['major'] = $this->Player_model->getPlayerData($playerid, 'major');
      $data['gravatar_email'] = $this->Player_model->getPlayerData($playerid, 'gravatar_email');

      $this->form_validation->set_rules('age', 'Age', 'integer|trim|xss_clean');
      $this->form_validation->set_rules('gender', 'Gender', 'trim|xss_clean');
      $this->form_validation->set_rules('major', 'Major', 'trim|xss_clean');
      $this->form_validation->set_rules('gravatar_email', 'Gravatar Email', 'trim|xss_clean|valid_email'); 

      if ($this->form_validation->run()) {
        //save the data
        if($data['age'] != $this->input->post('age')){
          $this->Player_model->setPlayerData($playerid, 'age', $this->input->post('age'));
        }
        if($data['gender'] != $this->input->post('gender')){
          $this->Player_model->setPlayerData($playerid, 'gender', $this->input->post('gender'));
        }
        if($data['major'] != $this->input->post('major')){
          $this->Player_model->setPlayerData($playerid, 'major', $this->input->post('major'));
        }
        if($data['gravatar_email'] != $this->input->post('gravatar_email')){
          $this->Player_model->setPlayerData($playerid, 'gravatar_email', $this->input->post('gravatar_email'));
        }
        redirect("profile");
      }

      $layout_data['top_bar'] = $this->load->view('layouts/logged_in_topbar','', true);
      $layout_data['content_body'] = $this->load->view('profile/edit_profile_page', $data, true);
      $layout_data['footer'] = $this->load->view('layouts/footer', '', true);          
      $this->load->view('layouts/main', $layout_data);
  }


  public function public_profile()
  {

      $get = $this->uri->uri_to_assoc(1);
      $user_id = $get['user'];
      $player = new player($user_id);

      $data = array();

      $data['username'] = $player->hello();
      // $data['email'] = $this->tank_auth->get_email();
      // $data['age'] = $this->Player_model->getPlayerData($playerid, 'age');
      // $data['gender'] = $this->Player_model->getPlayerData($playerid, 'gender');
      // $data['major'] = $this->Player_model->getPlayerData($playerid, 'major');
      //get kills
      //get status
      $data['profile_pic_url'] = "http://i.imgur.com/rmX9I.png";

      $layout_data['top_bar'] = $this->load->view('layouts/logged_in_topbar','', true);
      $layout_data['content_body'] = $this->load->view('profile/public_profile', $data, true);
      $layout_data['footer'] = $this->load->view('layouts/footer', '', true);          
      $this->load->view('layouts/main', $layout_data);
  }

    public function team_public_profile()
  {
      //how many members
      //total kills
      //description
      //team gravatar

      $get = $this->uri->uri_to_assoc();
      $playerid = $get['team'];

      $data = array();
      $data['username'] = $this->tank_auth->get_username();
      $data['email'] = $this->tank_auth->get_email();
      $data['age'] = $this->Player_model->getPlayerData($playerid, 'age');
      $data['gender'] = $this->Player_model->getPlayerData($playerid, 'gender');
      $data['major'] = $this->Player_model->getPlayerData($playerid, 'major');
      $data['profile_pic_url'] = "http://i.imgur.com/rmX9I.png";

      $layout_data['top_bar'] = $this->load->view('layouts/logged_in_topbar','', true);
      $layout_data['content_body'] = $this->load->view('profile/public_profile', $data, true);
      $layout_data['footer'] = $this->load->view('layouts/footer', '', true);          
      $this->load->view('layouts/main', $layout_data);
  }

      public function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

}
