<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class FJFF_Controller extends CI_Controller{   
    
    protected $data;
    
    protected $contentView;
    
    protected $layoutView;
    
    
    protected function __contruct() {
        parent::__construct();
        
        ini_set('upload_max_filesize', '10M');
        
    } 
    public function _output($outup) {
        $field = file_exists(APPPATH.'views/'.$this->contentView.EXT) ? $this->load->view($this->contentView, $this->data, TRUE) : FALSE;  
        if($this->layoutView){
            echo $this->load->view('templates/'.$this->layoutView,array("content"=>$field),TRUE);
        }
        else{
            echo  $field; 
        }
    }
    
    public function setData($data)
    {
        $this->data = $data;
    }
    
    public function setContentView($contentView)
    {
        $this->contentView = $contentView;
    }
    
    public function setLayoutView($layoutView)
    {
        $this->layoutView = $layoutView;
    }
}