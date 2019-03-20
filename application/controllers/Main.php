<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	//Page
	public function index(){
		session_start();

		// $_SESSION['ses'][0] = array(
		// 	'id'=>1,
		// 	'name'=>'Juan',
		// 	'email'=>'Juan@gmail.com',
		// 	'password'=>"uabs8yfabs",
		// 	'status'=>"active"
		// );
		//  unset($_SESSION['ses']);
		$data='';
		$this->load->view('main',$data);
	}

	public function Insert(){

		session_start();

		// $_SESSION['ses'][0] = array(
		// 	'id'=>1,
		// 	'name'=>'Juan',
		// 	'email'=>'Juan@gmail.com',
		// 	'password'=>"uabs8yfabs",
		// 	'status'=>"active"
		// );

		$data='';

		$this->load->view('insert',$data);
	}

	public function Update(){
		session_start();
		$_SESSION['ses'] = array_values($_SESSION['ses']);
	
		$data='';
		$this->load->view('update',$data);
	}

	public function Delete(){
		session_start();
		$data='';
		$this->load->view('delete',$data);
	}



	//Ajax
	public function insert_add(){	
		session_start();
		$_SESSION['ses'] = array_values($_SESSION['ses']);
		if($_SESSION){
			$data['cntses'] = count($_SESSION['ses']);

			$_SESSION['ses'][$data['cntses']+1] = array(
				'id'=>uniqid(),
				'name'=>$_POST['name'],
				'email'=>$_POST['email'],
				'password'=>$_POST['password'],
				'status'=>$_POST['status'],
				'created'=>time(),
				'updated'=>time()
			);
			// var_dump($_SESSION['ses'][$data['cntses']+1]);
			$data['test'] = 1;		
			echo json_encode($data);
		}else{
			$data['cntses'] = 0;
			$_SESSION['ses'][$data['cntses']+1] = array(
				'id'=>uniqid(),
				'name'=>$_POST['name'],
				'email'=>$_POST['email'],
				'password'=>$_POST['password'],
				'status'=>$_POST['status'],
				'created'=>time(),
				'updated'=>time()
			);
			// var_dump($_SESSION['ses'][$data['cntses']+1]);
			$data['test'] = 1;		
			echo json_encode($data);
		}
	}



	public function insert_delete(){
		session_start();
		$data['test'] = 1;		
		if($_SESSION){
			$data['cntses'] = count($_SESSION['ses']);	
			$count=0;
			foreach($_SESSION['ses'] as $result){
				if((int)$result['id']===(int)$_POST['userid']){
					$data['see']="seen";
					$_SESSION['ses'] = array_values($_SESSION['ses']);		
					$data['sessss']=$result['id'];
					unset($_SESSION['ses'][$count]);
				}
				$count++;
			}
		}

		$data['count'] =$count;
		echo json_encode($data);
		die();
	}
	public function insert_load(){
		session_start();
		
		$data['result'] ='';
		if($_SESSION){
			$count=0;
			foreach($_SESSION['ses'] as $result){			
				if((int)$result['id']===(int)$_POST['userid']){				
					$data = array(
						'id'=>$_SESSION['ses'][$count]['id'],
						 'name'=>$_SESSION['ses'][$count]['name'],
						 'email'=>$_SESSION['ses'][$count]['email'],			 
						 'status'=>$_SESSION['ses'][$count]['status'],
						 'password'=>$_SESSION['ses'][$count]['password'],
						 'sessionindex'=>$count
					 );
					$data['actual_index']=$result['id'];
					$data['found']='true';
				}
				$count++;				
			}
		}		
		echo json_encode($data);
		die();
	}

	public function insert_update(){

		session_start();		
		$_SESSION['ses'][$_POST['ses_index']]['name']=$_POST['name'] ;
		$_SESSION['ses'][$_POST['ses_index']]['email']=$_POST['email'] ;
		$_SESSION['ses'][$_POST['ses_index']]['password']=$_POST['password'] ;
		$_SESSION['ses'][$_POST['ses_index']]['status']=$_POST['status'] ;
		$_SESSION['ses'][$_POST['ses_index']]['updated']=time();		
		var_dump($_SESSION['ses']);
		$data['test']=1;
		echo json_encode($data);
	}
	public function clearset(){
		session_start();
		unset($_SESSION['ses']);
	}
}
