  <?php
class MainController extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
      $this->load->model('Model');
      $this->load->library('session');
      $this->load->library('email');
  }

  function fetch()
  {
    echo $this->Model->fetch_data($this->uri->segment(3));
  }

  function index()
  {
      $this->load->view('login');
  }

  function form_login()
  {
      $email = $this->input->post('email');
      $passwd = $this->input->post('passwd');

      $res['id'] = $this->Model->login($email,md5($passwd));
      if(!$res['id'])
      {
        $this->session->set_flashdata('ack','Invalid Credentials');
        $this->index();
      }
      else
      {
        foreach ($res['id'] as $row)
        {
          $name = $row->u_name;
          $email = $row->u_email;
          $fon = $row->phno;
          $password = $row->passwd;
          $utype = $row->u_type;
          $status = $row->status;
          $app_status = $row->approval_status;
          $u_id = $row->u_id;

          if ( $status == 1 ){
              $this->session->set_flashdata('ack','BLOCKED ACCOUNT');
              $this->index();
          }
          else{
            if ($utype == 'user') {
              $this->session->set_flashdata('ack','Users must use the Mobile client');
              $this->index();
            }
            elseif ( $utype == 'service'){
              if ($app_status == 1) {
                $this->session->set_flashdata('ack','Not Yet Approved');
                $this->index();
              } else {
                $this->session->set_userdata(array('name' => $name,'email' => $email, 'passwd' => $password, 'id'=> $u_id ));

                redirect('ServiceController/service_home');
              }
            }
            elseif ( $utype == 'admin' ){
              $this->session->set_userdata(array('name' => $name, 'email' => $email, 'passwd' => $password));
              redirect('AdminController/admin_dash');
            }
          }
        }
      }
  }

  function signup()
  {
    $this->load->view('signup');
  }

  function form_signup()
  {
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $phno = $this->input->post('phno');
    $passwd = $this->input->post('passwd');

    $result['id'] = $this->Model->checkreguser( $email );
    if(!$result['id']){
      $data = array('u_name'=> $name, 'u_email'=> $email, 'phno'=> $phno, 'passwd'=> md5($passwd), 'u_type'=> 'user','status'=> 0);
      $this->Model->register($data);
      $last_id = $this->db->insert_id();
      $usr_data = array('u_id'=> $last_id);
      $this->Model->usr_detail( $usr_data);
      $this->session->set_flashdata('ack','Registration Successful');

      $from_email = "admin@roady.com";
      $this->load->library('email');

      $this->email->from($from_email, 'Roady - Travel Companion');
      $this->email->to($email);
      $this->email->subject('Approval Success');
      $this->email->message('Welcome to Roady. You will be able to login after approval of your account.');

      if($this->email->send())
      {
        $this->session->set_flashdata("msg","Mail was sent successfully.");
      }

      $this->index();
    }
    else {
      $this->session->set_flashdata('warn','User Already Exists');
      $this->signup();
    }
  }

  function signup_srvc()
  {
      $this->load->view('signup_srvc');
  }

  function form_signup_srvc()
  {
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $passwd = $this->input->post('passwd');
      $phno = $this->input->post('phno');
      $loc = $this->input->post('loc');

      $doc = $_FILES['img']['name'];
      $path = 'X:/Workspace/Project/Travel_Companion/uploads/srvc_data/';
      move_uploaded_file($_FILES['img']['tmp_name'],$path.$doc);

      $result['id'] = $this->Model->checkreguser( $email );
      if(!$result['id']){
        $data = array('u_name'=> $name, 'u_email'=> $email, 'phno'=> $phno, 'passwd'=> md5($passwd), 'u_type'=> 'service', 'approval_status'=> 1);
        $this->Model->register( $data );
        $last_id = $this->db->insert_id();
        $srvc_data = array('l_id'=> $last_id, 'loc'=> $loc, 'file'=> $doc);
        $this->Model->srvc_reg( $srvc_data );
        $svcdetails = array('profile_status'=> 0,  'u_id'=> $last_id);
        $this->Model->srvc_details( $svcdetails );
        $this->session->set_flashdata('ack','Your account will be unlocked after approval');
        $this->index();
      }
      else {
        $this->session->set_flashdata('warn','User Already Exists');
        $this->signup();
      }
  }

  function lostpasswd()
  {
    $result['email']="";
    $this->load->view('lost-passwd',$result);
  }

  function forgotpasswordemailcheck()
  {
  	$email=$this->input->post('email');
  	$result['id']=$this->Model->forgotpasswordemailcheck($email);
  	if(!$result['id'])
  	{
  		$this->session->set_userdata('msg','Email not Registered');
  		$this->lostpasswd();
  	}
  	else
  	{
  		$otp = rand(111111,999999);
  		$from_email = "admin@roady.com";
  		$this->load->library('email');

  				$this->email->from($from_email, 'Roady - Travel Companion');
          $this->email->to($email);
          $this->email->subject('Reset password');
          $this->email->message('We received a request to reset your password. Enter the following password reset code:  '. $otp);

  				if($this->email->send())
  				{
      				$this->session->set_userdata('email',$email);
      				$result['email']=$this->Model->forgotpasswordnmrinsert($email,$otp);
              $this->session->set_flashdata("msg","OTP has been sent to your email.");
      				$this->session->set_userdata('count',0);
      				$this->load->view('lost-passwd',$result);
  			  }
          else
           $this->session->set_flashdata("msg","Error while sending Email.");
           $this->lostpasswd();
  	}
  }

  function otpcheck()
  {
  	$emaildb=$this->session->userdata('email');
  	$otp=$this->input->post('otp');
  	$result['email']=$this->Model->otpcheck( $emaildb, $otp );
  	if($result['email'])
  	{
  		$this->session->set_userdata('otp',123);
  		$this->load->view('Resetpassword');
  	}
  	else
  	{
  		$count=$this->session->userdata('count');
  		if($count==3)
  		{
  			$this->Model->otplimit($emaildb);
  			$count=0;
  			$this->session->set_flashdata("msg","Process failed");
  			$this->forgotpassword();
  		}
  		$count++;
  		$this->session->set_userdata('count',$count);
  		$this->session->set_flashdata("msg","Invalid OTP ");
  		$result['email']="hi";
  		$this->load->view('lost-passwd',$result);
  	}
  }

  function resetpassword()
  {
  	$email=$this->session->userdata('email');
  	$password=$this->input->post('password1');

  	$this->Model->updatepassword($email,$password);
  	$this->session->sess_destroy();
  	$this->session->set_flashdata("ack","Password reset Successful");
  	$this->index();
  }

  function logout()
  {
      $this->session->sess_destroy();
      redirect('MainController/index');
  }
}

 ?>
