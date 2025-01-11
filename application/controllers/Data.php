<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{


    public function Index()
    {
        $this->load->view('data/index');
    }
    public function GetData()
    {
        $this->curl->create('https://recruitment.fastprint.co.id/tes/api_tes_programmer');

        $post = array(
            'username' => 'tesprogrammer110125C21',
            'password' => '4ac0087b411a38bad7c428dd1add9a8b'
        );
        $this->curl->post($post);

        $vars = array('foo' => 'bar');
        $this->curl->set_cookies($vars);



        echo $this->curl->execute();


        $this->curl->error_code;
        $this->curl->error_string;


        $this->curl->info;
    }
}
