<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if ($this->session->userdata('logged_in') != 1 && $this->session->userdata('logintype') != 'admin') {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('setting_model');
    }


    public function resetdb(){
    	$data = array('status' => false, 'message' => '','filename' => '');
    	$result = $this->setting_model->resetdb();
    	$data['status']   = $result['status'];
    	$data['validate'] = true;
	    $data['message']  = $result['msg'];
	    $data['data']  	  = $result['detail'];
    	echo json_encode($data);
    	// exit();
    }

	public function index() {
		// $page_data['setting'] 	= $this->setting_model->getsms();
		// print_r($page_data['setting']);
		$page_data['pagetitle'] = 'Backup - Restore';
        $page_data['pagename']  = 'backup';
		$this->load->view('admin/main',$page_data);
	}

	
	public function backup(){
		$data = array('status' => false, 'message' => '','filename' => '');
		try{
			$this->load->dbutil();

			// Backup your entire database and assign it to a variable
			$prefs = array(
		        'tables'        => array(),   // Array of tables to backup.
		        'ignore'        => array(),                     // List of tables to omit from the backup
		        'format'        => 'zip',                       // gzip, zip, txt
		        'filename'      => 'visitor_management.sql',              // File name - NEEDED ONLY WITH ZIP FILES
		        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
		        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
		        'newline'       => "\n"                         // Newline character used in backup file
			);

			$backup = $this->dbutil->backup($prefs);
			// $backup = $this->dbutil->backup();
			$backup_file = date('Y_m_d_H_i_s')."_mybackup.zip"; 
			// Load the file helper and write the file to your server
			$this->load->helper('file');
			write_file('./uploads/backup/'.$backup_file, $backup);

	 		$data['status']   = true;
	        $data['filename'] = base_url().'uploads/backup/'.$backup_file;
	        $data['message']  = 'Database Successfully Backup.';
			// Load the download helper and send the file to your desktop

		} catch (Exception $e) {
	 		$data['status']   = false;
	        $data['message']  = 'Error While Backing up Database ['.$e->getMessage().'].';

		}
		echo json_encode($data);
        exit();
	}

	public function restore(){
		$data = array('status' => false, 'message' => '');
		if($_FILES['restore_file']['size'] > 0){

			$this->load->helper('file');
			$this->load->library('unzip');
			$upload_path = $this->config->item('upload_path');
            is_dir($upload_path);
			$restore_folder = $upload_path.'restore/'.date('Y_m_d_H_i_s');

			if (!is_dir($restore_folder)) {
			    mkdir($restore_folder, 0777, TRUE);
			}

			// Optional: Only take out these files, anything else is ignored
			// $this->unzip->allow(array('css', 'js', 'png', 'gif', 'jpeg', 'jpg', 'tpl', 'html', 'swf'));
			$this->unzip->allow(array('sql'));

			// or specify a destination directory
			$rtn = $this->unzip->extract($_FILES['restore_file']['tmp_name'], $restore_folder);

			if(file_exists($restore_folder."/visitor_management.sql")){
				// echo ' File restored';
				// exit;
				$backup= file_get_contents($restore_folder."/visitor_management.sql");
		        $sql_clean = '';
		        foreach (explode("\n", $backup) as $line){
		            
		            if(isset($line[0]) && $line[0] != "#"){
		                $sql_clean .= $line."\n";
		            }
		        }
		        $this->db->trans_begin();
		        //echo $sql_clean;
		        foreach (explode(";\n", $sql_clean) as $sql){
		            $sql = trim($sql);
		            //echo  $sql.'<br>============<br>';
		            if($sql) 
		            {
		            	// echo $sql."\n";
		                $this->db->query($sql);
		            } 
		        }
		        // unlink($restore_path."visitor_management.sql");
		        if ($this->db->trans_status() === FALSE){
		            $this->db->trans_rollback();
		            $data['status']   = false;
		            $data['message']  = 'Error while Restoring Database.';
		        }else{
		            $this->db->trans_commit();
		            $data['status']   = true;
		            $data['message']  = 'Database Successfully Restored.';
		        }
			}else{
				// $this->ClearFolder($restore_path);
	            $data['status']   = false;
	            $data['message']  = 'Invalid Backup File.';

			}
			delete_files($restore_folder, TRUE);
			rmdir($restore_folder);
        }else{
            $data['status']   = false;
            $data['message']  = 'Please select the Backup File';
            // echo json_encode($data);
            // exit();

        }
        echo json_encode($data);
        exit();

   	}

   	private function ClearFolder($restore_path){
   		// match any file
		$files = glob($restore_path.'*.*');

		foreach($files as $file){
		    if(is_file($file))
		        unlink($file);

		    if(is_dir($file))
		        rmdir($file);
		}
		// $path   = './upload/Peniyal'; 
		// rmdir($path);
   	}
	
}
