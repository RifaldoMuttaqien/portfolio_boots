<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->model('M_unpas');
		$this->load->library('session');
	}

	public function index()
	{
		$data['about'] = $this->M_unpas->getAboutData();
		$data['blog'] = $this->M_unpas->getBlogData();

		// Fetch the jumbotron image path from the database and assign it to $data['cover_profile']
		$jumbotronImage = $this->M_unpas->getJumbotronImage();
		$data['cover_profile'] = $jumbotronImage ? base_url('uploads/' . $jumbotronImage) : base_url('path_to_default_image.jpg');

		$this->load->view('welcome_message', $data);
	}
}
