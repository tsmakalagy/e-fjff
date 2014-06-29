<?php

class FJFF_Form_validation extends CI_Form_validation {

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        if (count($_POST) > 0 OR count($_FILES) > 0)
        {
            $CI->session->set_flashdata('prg', array(
                'date'  => time()+ini_get('max_execution_time'),
                'post'  => $_POST,
                'files' => $_FILES
            ));
            redirect(current_url(), 'location', 302);
        }
        else{
            $prg = $CI->session->flashdata('prg');
            if($prg==TRUE){
                if($prg['date']>time()){
                    $_POST  = $prg['post'];
                    $_FILES = $prg['files'];
                }
            }
        }

        parent::__construct();
    }
} 