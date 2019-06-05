<?php
class AdminController extends CI_Controller
{
  function __construct(){
    parent::__construct();
      $this->load->model('Model');
      $this->load->library('session');
      $this->load->library('email');
  }

  function admin_dash(){
      $result[ 'list' ] = $this->Model->homelist();
      $this->load->view('admin/home', $result);
  }

  function app_srvc(){
      $result[ 'list' ] = $this->Model->approval_list();
      $result[ 'approved' ] = $this->Model->approval_list_approved();

      $this->load->view('admin/approve_service', $result);
  }

  function appsrvc_action(){
    $email = $this->input->post('email');
    $app = $this->input->post('app');
    if( $app == 'Approve'){
      $action = 0;
      $this->Model->updateapproval( $email, $action );

      $from_email = "admin@roady.com";
      $this->load->library('email');

      $this->email->from($from_email, 'Roady - Travel Companion');
      $this->email->to($email);
      $this->email->subject('Approval Success');
      $this->email->message('We are happy to inform you that you are now a member of Roady - Travel Companion. You are approved and can provide service to your customers. You will be directed to your profile and requested to enter valid data.');

      if($this->email->send())
      {
        $this->session->set_flashdata("msg","Mail was sent successfully.");
      }
      else
      $this->session->set_flashdata("msg","Error while sending Email.");

      $this->app_srvc();
    }
    else{
      $action = 2;
      $mail_body = $this->input->post('message');

      $this->Model->updateapproval( $email, $action );

      $from_email = "admin@roady.com";
      $this->load->library('email');

      $this->email->from($from_email, 'Roady - Travel Companion');
      $this->email->to($email);
      $this->email->subject('Approval Rejected');
      $this->email->message($mail_body);

      if($this->email->send())
      {
        $this->session->set_flashdata("msg","Mail was sent successfully.");
      }
      else
      $this->session->set_flashdata("msg","Error while sending Email.");

      $this->app_srvc();
    }
  }

  function remainder() {
    $email = $this->input->post('email');
    $from_email = "admin@roady.com";
    $this->load->library('email');

    $this->email->from($from_email, 'Roady - Travel Companion');
    $this->email->to($email);
    $this->email->subject('Approval Success');
    $this->email->message('We are happy to inform you that you are now a member of Roady - Travel Companion. Your Profile is not updated till now, we rquest you to login once for completion of the profile');

    if($this->email->send())
    {
      $this->session->set_flashdata("mail","Mail was sent successfully.");
    }
    else
    $this->session->set_flashdata("mail","Error while sending Email.");
  }

  function mng_srvc(){
      $result[ 'list' ] = $this->Model->servicelist();
      $this->load->view('admin/manage_service', $result);
  }

  function mngsrvc_action(){
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

  function mng_usr(){
      $result[ 'list' ] = $this->Model->userlist();
      $this->load->view('admin/manage_user', $result);
  }

  function mngusr_action(){
      $email = $this->input->post('email');
		  $status = $this->input->post('status');
      if( $status == 0 )
      {
        $action = 1;
        $this->Model->updateblock( $email, $action );
        $this->mng_usr();
      }
      else
      {
        $action = 0;
        $this->Model->updateblock( $email, $action );
        $this->mng_usr();
      }
  }

  function valid_session(){
      $email = $this->session->userdata('email');
      $passwd = $this->session->userdata('passwd');

      $loginres['res'] = $this->Model->login($email,$passwd);

      if( $loginres['res'])
      {
        return(1);
      }
      else
      {
        return(0);
      }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('MainController/index');
  }

}
