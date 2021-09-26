<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('serpapi');
		$this->load->model('food_m');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function action(){
		$query = $this->input->post('query');
		$hasil = serpapi($query);
		$data = [
			'hasil' => $hasil
		];
		// echo "<pre>";
		// print_r($hasil);
		$this->load->view('result',$data);
	}

	public function test(){
		echo "<pre>";
		$food = $this->food_m->read_limit(5)->result_array();
		$gambar = [];
		foreach($food as $item){
			$hasil = serpapi($item['name']);
			print_r($hasil);
			$gambar_item = $hasil->inline_images[0]->thumbnail ?? $hasil->recipes_results[0]->thumbnail;
			array_push($gambar,$gambar_item);
		}
		print_r($gambar_item);
	}
}
