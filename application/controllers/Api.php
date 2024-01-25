<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function get()
	{
		$data = array('name' => 'John', 'age' => 30);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		// Set content type to JSON
		header("Access-Control-Allow-Origin: *");
	}

}
