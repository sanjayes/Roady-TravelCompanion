<?php
class ServiceController extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Model');
    $this->load->library('session');
    $this->load->library('email');
  }

  function districtselect()
  {
    $distt= array();
    $i=0;
    $sid=$this->input->post('sid');
    $dist['dis']=$this->Model->districtselect($sid);
    foreach($dist['dis'] as $row)
    {
      $did=$row->dt_id;
      $dname=$row->dt;
      $distt[$i]['id']=$did;
      $distt[$i]['value']=$dname;

      $i++;
    }
    echo json_encode($distt);
  }

  function service_home(){
    $this->load->view('services/home');
  }

  function profile_check(){
    $email = $this->session->userdata('email');
    $passwd = $this->session->userdata('passwd');
    $result['data'] = $this->Model->profile_check( $email, $passwd );
    return($result['data']);
  }

  function init_profile(){
    $email = $this->session->userdata('email');
    $result['data'] = $this->Model->service_profile($email);
    $result['dis']=$this->Model->states();

    $this->load->view('services/init_profile', $result);
  }


  function insert_initp(){
    $owner = $this->input->post('owner');
    $reg = $this->input->post('reg_no');
    $lic = $this->input->post('lic_no');
    $street = $this->input->post('street');
    $city = $this->input->post('city');
    $dt = $this->input->post('district');
    $st = $this->input->post('state');
    $pin = $this->input->post('pin');
    $infra = $this->input->post('infra');
    $scount = $this->input->post('s_count');
    $h_svc = $this->input->post('home_service');
    $van = $this->input->post('van');

    // $doc = $_FILES['img']['name'];
    // $path = 'X:/Workspace/Project/Travel_Companion/uploads/srvc_details/';
    // move_uploaded_file($_FILES['img']['tmp_name'],$path.$doc);

    $id = $this->session->userdata('id');
    $data = array('profile_status' => 1, 'owner_name' => $owner, 'reg_id' => $reg, 'lic_no' => $lic, 'street' => $street,'city' => $city,
     'district'=> $dt, 'state'=> $st, 'pin'=> $pin,'infrastructure' => $infra,'s_count' => $scount, 'h_svc' => $h_svc, 'van' => $van );

    $this->Model->svc_initp( $id, $data );

    redirect('ServiceController/service_home');
  }

  function init_service(){
    $id = $this->session->userdata('email');
    $result['data'] = $this->Model->service_profile($id);

    $this->load->view('services/init_service', $result);
  }

  function insert_inits(){

    $id = $this->session->userdata('id');
    $data = array(  );

    $this->Model->svc_initp( $id, $data );

    redirect('ServiceController/service_home');
  }

  function profile(){
    $email = $this->session->userdata('email');
    $result['data'] = $this->Model->service_profile($email);

    $this->load->view('services/profile_service', $result);
  }

  function profile_basic(){
    $email = $this->session->userdata('email');
    $result['data'] = $this->Model->service_profile($email);

    $this->load->view('services/profile_basic', $result);
  }

  function booking(){
    $result['list'] = $this->Model->svc_booking();
    $this->load->view('services/booking', $result);
  }

  function mng_booking(){
    $email = $this->input->post('email');
    $status = $this->input->post('status');
    if( $status == 0 )
    {
      $action = 1;
      $this->Model->updateblock( $email, $action );
      $this->mng_srvc();
    }
    else
    {
      $action = 0;
      $this->Model->updateblock( $email, $action );
      $this->mng_srvc();
    }

  }

  function valid_session(){
    $email = $this->session->userdata('email');
    $passwd = $this->session->userdata('passwd');

    $loginres['res'] = $this->Model->login($email,$passwd);

    if( $loginres['res']){
      return(1);
    }
    else{
      return(0);
    }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect('MainController/index');
  }
}
?>
