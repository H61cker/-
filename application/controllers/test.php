<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
//        $this->load->model('board_m');
        $this->load->helper(array('url','date'));
    }

    public function index()
    {
        $this->test();
    }

    public function _remap($method)
    {
        // 헤더 include
        $this->load->view('header_v');

        if ( method_exists($this, $method))
        {
            $this->{"{$method}"}();
        }

        // 푸터 include
        $this->load->view('footer_v');
    }

    public function test()
    {

    }

}

?>