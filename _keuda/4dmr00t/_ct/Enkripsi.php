<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Enkripsi extends CI_Controller {
 
    /**
     * Enkripsi Page for this controller.
     *
     * digunakan untuk membuat library enkripsi codeigniter
     */
 
    public function __construct() {
        parent::__construct();
        $this->load->library('encryption');

        $this->encryption->initialize(
        array(
                //'driver' => 'openssl',
                'cipher' => 'ARCFour',
                'mode' => 'Stream',
                'key' => 'b0c4hl1nux.c0m'
            )
        );
    }
 
 
    public function index()
    {
        //sebuah string yang akan kita enkripsi
        $string = "adm";
        
        $encript =  $this->encryption->encrypt($string);
        $dencript =  $this->encryption->decrypt($encript);
        
 
        //tampilkan hasilnya
        echo $encript;
        echo "<br>";
        echo $dencript;
        echo "<br>";
        echo strlen($encript);

        
    }
}