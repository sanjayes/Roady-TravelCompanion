<?php
class Model extends CI_Model
{
  function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  function fetch_data($query)
  {
    // $this->db->like('dt', $query);
    $query = $this->db->get('tbl_dt');
    if($query->num_rows() > 0)
    {
      foreach($query->result_array() as $row)
      {
        $output[] = array(
          'name'  => $row["dt"],
          'image'  => $row["image"]
        );
      }
      echo json_encode($output);
    }
  }

  function homelist(){
    $this->db->where("u_type !=", 'admin' );
    $q = $this->db->get('tbl_login');
    return $q->result();
  }

  function districts()
  {
    $querys=$this->db->get('tbl_dt');
    return $querys->result();
  }
  function states()
  {
    $querys=$this->db->get('tbl_state');
    return $querys->result();
  }

  function districtselect($sid)
  {
    // $this->db->order_by("dt", "asc");
    $querys=$this->db->get_where('tbl_dt',array('st_id'=>$sid));
    return $querys->result();
  }

  function login( $email, $passwd )
  {
    $query = $this->db->get_where('tbl_login', array('u_email' => $email,'passwd' => $passwd ));
    return $query->result();
  }

  function profile_check( $email, $passwd )
  {
    $this->db->join('tbl_srvc_details','tbl_login.u_id = tbl_srvc_details.u_id', 'inner');
    $query = $this->db->get_where('tbl_login', array('u_email' => $email,'passwd' => $passwd ));

    return $query->result();
  }

	function register( $data )
	{
	  $this->db->insert('tbl_login', $data);
	}

  function usr_detail( $data ){
    $this->db->insert('tbl_user_details', $data);
  }

  function srvc_reg( $srvc_data )
  {
      $this->db->insert('tbl_srvc_data', $srvc_data);
  }

  function srvc_details( $svcdetails ){
      $this->db->insert('tbl_srvc_details', $svcdetails);
  }

  function checkreguser( $email )
  {
    $querys = $this->db->get_where('tbl_login',array('u_email'=>$email));
    return $querys->result();
  }

  function user_data( $email )
	{
		$querys=$this->db->get_where('tbl_details',array('u_email'=>$email));
		return $querys->result();
	}

  function userlist()
  {
    $query = $this->db->get_where('tbl_login',array('u_type' => 'user' ));
    return $query->result();
  }

  function updateblock( $email, $block )
	{
		$this->db->where('u_email', $email);
		$this->db->update('tbl_login', array('status'=> $block));
	}

  function approval_list(){
    $this->db
      ->select('*')
      ->from('tbl_login')
      ->join('tbl_srvc_data', 'tbl_srvc_data.l_id = tbl_login.u_id AND tbl_login.approval_status = 1');
    $query = $this->db->get();
    return $query->result();
  }

  function approval_list_approved(){
    $this->db->join('tbl_srvc_data','tbl_login.u_id = tbl_srvc_data.l_id', 'inner');
    $this->db->join('tbl_srvc_details','tbl_login.u_id = tbl_srvc_details.u_id', 'inner');

    $query = $this->db->get_where('tbl_login', array('approval_status' => 0, 'profile_status' => 0 ));

    return $query->result();
  }

  function updateapproval( $email, $app )
  {
    $this->db->where('u_email', $email);
    if ($app == 0){
      $this->db->update('tbl_login', array('approval_status'=> $app ));
    }
    else{
      $this->db->delete('tbl_login');
    }
  }

  function servicelist(){

    $this->db->join('tbl_srvc_data','tbl_login.u_id = tbl_srvc_data.l_id', 'inner');
    $this->db->join('tbl_srvc_details','tbl_login.u_id = tbl_srvc_details.u_id', 'inner');

    $query = $this->db->get_where('tbl_login', array('approval_status' => 0, 'profile_status'=> 1));

    return $query->result();
  }

  function service_profile( $email ){
    $this->db->join('tbl_srvc_details','tbl_login.u_id = tbl_srvc_details.u_id', 'inner');
    $query = $this->db->get_where('tbl_login', array('u_email' => $email ));

    return $query->result();
  }

  function svc_initp( $id, $data ){
    $this->db->where( 'u_id', $id );
    $this->db->update('tbl_srvc_details', $data);
  }

  function svc_booking(){
    $this->db->join('tbl_login','tbl_booking.u_id = tbl_login.u_id ', 'inner');
    $this->db->order_by("date", "asc");
    $query = $this->db->get('tbl_booking');
    return $query->result();
  }

  function forgotpasswordemailcheck( $email )
  {
    $querys=$this->db->get_where('tbl_login',array('u_email'=>$email));
    return $querys->result();
  }

  function forgotpasswordnmrinsert( $email, $otp )
  {
    $this->db->where(array('email'=>$email));
    $this->db->delete('tbl_otp');
    $this->db->insert('tbl_otp',array('email'=>$email,'otp'=>$otp));
    $querys=$this->db->get_where('tbl_otp',array('email'=>$email));
    return $querys->result();
  }

  function otpcheck( $emaildb, $otp )
  {
    $querys=$this->db->get_where('tbl_otp',array('email'=>$emaildb,'otp'=>$otp));
    //$c=$querys->num_rows();
    //return $c;
    return $querys->result();
  }

  function otplimit( $email )
  {
    $this->db->where(array('email'=>$email));
    $this->db->delete('tbl_otp');
  }

  function updatepassword( $email, $password )
  {
    $pass=md5($password);
    $this->db->where('u_email',$email);
    $this->db->update('tbl_login',array('passwd'=>$pass));
  }
}
