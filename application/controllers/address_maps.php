<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address_Maps extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function index()
	{
		// Load the library
		//$this->load->library('googlemaps');
		// Initialize our map. Here you can also pass in additional parameters for customising the map (see below)
		//$this->googlemaps->initialize();
		// Create the map. This will return the Javascript to be included in our pages <head></head> section and the HTML code to be
		// placed where we want the map to appear.
		//$data['map'] = $this->googlemaps->create_map();
		// Load our view, passing the map data that has just been created
		//$this->load->view('maps_page', $data);
		$this->load->helper('url');

		$this->load->helper('date');
		$time = time();
		$base_url = base_url();
		
		$key=$_GET["key"];
		
		$this->load->database();
		
		$this->db->select('first_name, last_name, roll_no, address, email');
		$this->db->from('student_info');
		$this->db->where('random',$key);
		
		$query=$this->db->get();
		
		if($query->num_rows == 1)
		{
		
		}
		else
		{
		
		}
		
		
		
		date_default_timezone_set('Asia/Calcutta');
		
		$format = 'DATE_RFC822';
		$datestring = standard_date($format,$time);
		$data['date']=$datestring;
		$navigation_data['navTab']='home';
		$navigation_data['base_url']=$base_url;
		$cssfiles[]="styles.css";
		$data['scripts']=Array('jquery.js');
		
		
		
		$data['css']=$cssfiles;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		//$this->load->view('maps_page',$data);
		
		$this->load->library('googlemaps');
		$config['center'] = 'Indraprastha Institute of Information Technology, Delhi';
		$config['zoom']=10;
		$config['directions'] = TRUE;
		$config['directionsStart'] = '1059 Vikas Kunj Vikaspuri New Delhi';
		$config['directionsEnd'] = 'Indraprastha Institute of Information Technology, Delhi';
		$config['directionsDivID'] = 'directionsDiv';
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = 'Indraprastha Institute of Information Technology, Delhi';
		$marker['title']='Indraprastha Institute of Information Technology, Delhi';
		
		$marker['infowindow_content'] = 'Insitute : IIIT-D Okhla';
		$this->googlemaps->add_marker($marker);
		
		$marker = array();
		$marker['position'] = '1059 Vikas Kunj Vikaspuri New Delhi';
		$marker['animation'] = 'DROP';
		$marker['draggable'] = TRUE;
		$marker['title']='Vikas Kunj';
		$marker['infowindow_content'] = 'Your Address:1059, Vikas Kunj, Vikas Puri';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		$this->googlemaps->add_marker($marker);
		
		
		
		// 30km radius
		$circle = array();
		$circle['center'] = 'Indraprastha Institute of Information Technology, Delhi';
		$circle['radius'] = '30000';
		$this->googlemaps->add_circle($circle);
		
		$circle = array();
		$circle['center'] = '1059 Vikas Kunj Vikaspuri New Delhi';
		$circle['radius'] = '1000';
		$circle['fillColor']='blue';
		$this->googlemaps->add_circle($circle);
		
		
		
		$data['map'] = $this->googlemaps->create_map();
		// Load our view, passing the map data that has just been created
		$this->load->view('address_maps_page', $data);
		

	}
	
}