<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_user extends CI_Controller {
	public function index(){
		$this->load->library('email');
		$this->load->library('session');
		
		$name = $_POST['fname'];
		$roll = $_POST['roll'];
		$email = $_POST['email'];
		$location=$_POST['location'];
		$gender=$_POST['gender'];
		$program = $_POST['program1'];  // student course as in(mtech,btech)
		
		$key = '';
		$length=30;
		list($usec, $sec) = explode(' ', microtime());
		mt_srand((float) $sec + ((float) $usec * 100000));
		
		$inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));

		for($i=0; $i<$length; $i++)
		{
			$key .= $inputs{mt_rand(0,61)};
		}
		
		echo $key."  --- ".$roll;
		$this->email->from('hosteliiitd@gmail.com'); // change it to yours

		$this->email->to('praneet10061@iiitd.ac.in'); // change it to yours

		$student_data=$this->session->all_userdata();
		$emailTo=$student_data['email'];
		$this->email->to($emailTo); // change it to yours

		$this->email->subject('Hostel Application Form Verification');
		$this->email->message('Verify your hostel application by clicking on this link:-
		http://localhost/cse300-group10/index.php/address_maps'.$key);
 
		if($this->email->send())
		{
			echo $key.'<html> <body><h1>Email sent. Follow the link in the email to proceed (Please check the SPAM folder as well)</h1>
			Mail Link : <a href="http://mail.iiitd.ac.in">IIITD:Webmail</a>
			</body> </html>';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}