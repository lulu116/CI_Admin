<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class shoppaddcontent extends CI_Controller {


   /*<? php echo base_url() ?>   去根目录里面开始找资源文件  自己加的代码*/
	function shoppaddcontent(){
		parent::__construct();
		$this->load->helper('url');  //实现页面的跳转
//		$this->load->model('SingerModel');
	}
	public function index()
	{
		$this->load->view('pages/shoppaddcontent');

		/*$singers = $this->SingerModel->getSinger();
		$data['singers'] = $singers;*/

	}
}
