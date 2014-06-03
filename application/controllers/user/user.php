<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class User extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('doctrine');
		$this->em = $this->doctrine->em;
		$this->setLayoutView("layout_user");
		$this->load->library('acl_auth');
	}

	
	public function login()
	{
		$data['title'] = 'Login';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('identity', 'Identifiant', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
			
		} else {
			$identity = set_value('identity');
			$password = set_value('password');
			$post = $this->input->post();
			$remember_me = FALSE;
			if (array_key_exists('remember_me', $post)) {
				$remember_me = TRUE;
			}
			if ($this->acl_auth->login($identity, $password, $remember_me)) {
				redirect('/');
			}
		}
		$this->setData($data);
        $this->setContentView('user/login');
	}
	
	public function loadLoginForm()
	{
		$this->load->library('form_validation');
		$login_form = $this->load->view('user/login', array(), true);
		$register_form = $this->load->view('user/register', array(), true);
		$res['form'] = $login_form . $register_form;
		$json_decode = json_encode($res, JSON_HEX_TAG | JSON_HEX_QUOT);
		echo $json_decode;
	}
	
	public function register()
	{
		$data['title'] = 'Register';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('passwordVerify', 'Password Confirmation', 'trim|required|matches[password]|');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
		} else {
			$post = array();
			$post['name'] = set_value('name');
			$post['email'] = set_value('email');
			$post['password'] = set_value('password');
			if ($this->acl_auth->register($post)) {
				redirect('home');
			}
			
		}
		
		$this->setData($data);
        $this->setContentView('user/register');
		
				
	}
	
	function logout()
 	{
 		if ($this->acl_auth->logout()) {
			redirect('/');
		}
 	}
	
	public function validation_check()
	{		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$res = array();
		
		
        
        $username = $this->input->post('username');
		if (isset($username) && strlen($username)) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]|callback_username_check|xss_clean');
			if ($this->form_validation->run('username') == FALSE) {
				$res['success'] = false;
				$res['error_msg'] = form_error('username', '<div class="help-block">', '</div>'); 
			} else {
				$res['success'] = true;
			}
		}
				
		$password = $this->input->post('password');
		if (isset($password) && strlen($password)) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			if ($this->form_validation->run('password') == FALSE) {
				$res['success'] = false;
				$res['error_msg'] = form_error('password', '<div class="help-block">', '</div>'); 
			} else {
				$res['success'] = true;
			}
		}
		
		$passwordVerify = $this->input->post('passwordVerify');
		if (isset($passwordVerify) && strlen($passwordVerify)) {
            $this->form_validation->set_rules('passwordVerify', 'Password Confirmation', 'trim|required|matches[password]');			
			if ($this->form_validation->run('passwordVerify') == FALSE) {
				$res['success'] = false;
				$res['error_msg'] = form_error('passwordVerify', '<div class="help-block">', '</div>'); 
			} else {
				$res['success'] = true;
			}
		}
		
		echo json_encode($res);
	}
    
    public function my_validation_check()
    {
        
    }
	
    /**
     * Callback qui verifie si username existe deja
     */
	public function username_check($username)
	{
		$user = $this->em->getRepository('Entities\User')->findByUsername($username);
        //$user = $this->sau->findByUsernameMetier($username);
		if ($user) { // si user existe error
			$this->form_validation->set_message('username_check', sprintf('The username <strong>"%s"</strong> already exists.', $username));
			return false;
		} else {
			return true;
		}
	}
	
	public function user_check($password)
	{
		$username = $this->input->post('identity');
		$users = $this->em->getRepository('Entities\User')->findByUsernameAndPassword($username, $password);
		if ($users) {
			$sess_array = array();
     		foreach($users as $user) {
       			$sess_array = array(
         			'id' => $user->getId(),
         			'username' => $user->getUsername()
       			);
       			$this->session->set_userdata('logged_in', $sess_array);
       			$user->setLastLogin(new \DateTime());
       			$this->em->persist($user);
				$this->em->flush();
     		}
			return true;
		} else {
			$this->form_validation->set_message('user_check', 'Invalid username or password');
			return false;
		}
	}
}