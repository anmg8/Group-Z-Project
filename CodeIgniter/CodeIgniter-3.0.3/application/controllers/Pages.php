<?php

class Pages extends CI_Controller {

    public function view($page = 'home')
	{
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
		echo"404 error";
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $data['title'] = ucfirst($page); // Capitalize the first letter

	
		
		
        $this->load->view('templates/header', $data);
		if($page != "login")
		{
			$this->load->view('templates/welcome', $data);
		}
		if($page == "myzou3" || $page == "view_forms" || $page == "myzou_success") {
			$this->load->view('templates/back_home', $data);
		}
		$this->load->view('templates/error.php', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
}


?>
