<?php
/**
 * controlleur localite
 * CRUD localite
 */
class Localite extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();		
        $this->load->model("service_applicatif/localite_applicatif","la");
        $this->setLayoutView("layout_main");
	}
	
    /**
     * affichage formulaire des localite
     */
	public function add($type = 'region')
	{
		$data['title'] = ucfirst($type) . ' - e-Fokonolona';
		$this->load->library('form_validation');
		//$data['content'] = $this->load->view('localite/add_' . $type, $data, true);
		if($type=="district"){
		  $data['region']=$this->la->findListRegionSA(0);
		}
		$this->setData($data);
        $this->setContentView('localite/add_' . $type);
	}
    /**
     * ajouter localite
     */
    public function saveLoad($type = 'region')
    {
        $this->load->helper(array('form', 'url'));
        $data['title'] = ucfirst($type) . ' - e-Fokonolona';
		$this->load->library('form_validation');
		$dataPost=$this->input->post();
		
        if ($type == 'district') {
            $this->form_validation->set_rules('name', 'Anarana', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                
            } else{
                $anarana=isset($dataPost['name'])?$dataPost['name']:"";
                $slogan=isset($dataPost['slogan'])?$dataPost['slogan']:"";
                $foreignkey=isset($dataPost['region'])?$dataPost['region']:0;
                $return=$this->la->addDistrict($anarana,$slogan,$foreignkey);
                $data['return']=$return;
            }
            
                $data['region']=$this->la->findListRegionSA(0);
                $this->setData($data);
                $this->setContentView('localite/add_' . $type);
        }
    }
    
    /**
     * ajouter localite ajax
     */
    public function save($type = 'region')
    {
        $this->setLayoutView("");
        $this->load->helper(array('form', 'url'));
        $data['title'] = ucfirst($type) . ' - e-Fokonolona';
		$this->load->library('form_validation');
		$dataPost=$this->input->post();
		
        if ($type == 'district') {
            $this->form_validation->set_rules('name', 'Anarana', 'trim|required|callback_district_check|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                $res['success'] = false;
                $res['message'] = validation_errors();
			    $json_decode = json_encode($res, JSON_HEX_TAG | JSON_HEX_QUOT);
			    echo $json_decode;
            } else{
                $anarana=isset($dataPost['name'])?$dataPost['name']:"";
                $slogan=isset($dataPost['slogan'])?$dataPost['slogan']:"";
                $foreignkey=isset($dataPost['region'])?$dataPost['region']:0;
                $item = $this->la->addDistrict($anarana,$slogan,$foreignkey);
                $tr = '<tr><td>';
                $tr .= $item->getAnarana();
                $tr .= '</td><td>';
                $tr .= ($item->getSlogan()!="")?$item->getSlogan():"-";
                $tr .= '</td></tr>';
                $res['item'] = $tr;
                $res['success']=true;
                $json_decode = json_encode($res, JSON_HEX_TAG | JSON_HEX_QUOT);
			    echo $json_decode;
            }            
        }
    }
    /**
     * liste local
     */
    public function listlocal($type = 'region')
    {
        $this->load->library('form_validation');
        
        $data['title'] = ucfirst($type) . ' - e-Fokonolona';
        if ($type == 'district') {
            $data['region']=$this->la->findListRegionSA(0);
            $data['district']= $this->la->findListDistrict(0,0);
        }
        $this->setData($data);
        $this->setContentView('localite/list_' . $type);     
    }
    
    public function district_check($district)
    {
        $dist = $this->la->findDistrictByName($district);
        //$user = $this->sau->findByUsernameMetier($username);
		if ($dist) { // si user existe error
			$this->form_validation->set_message('district_check', sprintf('The district <strong>"%s"</strong> already exists.', $district));
			return false;
		} else {
			return true;
		}
    }

}