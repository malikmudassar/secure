<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 11/20/2016
 * Time: 2:37 PM
 */

class Selfcare extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    { 
        $data['title']='Dr. IQ | Dashboard';
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/landing');
        $this->load->view('selfcare/includes/footer');
    }

    public function landing()
    { 
        $data['title']='Dr. IQ | Dashboard';
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/landing');
        $this->load->view('selfcare/includes/footer');
    }

    public function online()
    { 
        $data['title']='Dr. IQ | Dashboard';
        $data['pathways']=$this->admin_model->getAll('pathways');
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/pathways');
        $this->load->view('selfcare/includes/footer');
    }
    public function p_view()
    {
        $this->session->set_userdata('flag','white');
        $Id=$this->uri->segment(3);
        $data['question']=$this->admin_model->getFirstPathwayQuestion($Id);
        //echo '<pre>';print_r($data);exit;
        if(!$data['question'])
        {
            $data['error']='No steps added against this pathway yet, Please Contact Administrator';
            $data['title']='Dr. IQ | Dashboard';
            $this->load->view('selfcare/includes/head',$data);
            $this->load->view('selfcare/includes/header');
            $this->load->view('selfcare/content/error');
            $this->load->view('selfcare/includes/footer');
        }
        else
        {
            $data['form']=$this->admin_model->getAnsForm($data['question']['question']['id']);
            
            //  echo '<pre>';print_r($data);exit;

            $data['title']='Dr. IQ | Dashboard';
            $this->load->view('selfcare/includes/head',$data);
            $this->load->view('selfcare/includes/header');
            $this->load->view('selfcare/content/pathflow');
            $this->load->view('selfcare/includes/footer');
        }
        
    }
    public function pq_view()
    {
        if($_POST)
        {
            $params=$_POST;
            $params['user_id']=$this->session->userdata['id'];
            $params['gender']=$this->session->userdata['gender'];
            // echo '<pre>';print_r($params);exit;
            $this->admin_model->saveResult($params);
            //echo '<pre>';print_r($_POST);exit;
            $data['question']=$this->admin_model->getNextPathwayQuestion($params);
            $data['form']=$this->admin_model->getAnsForm($data['question']['question']['id']);
            //echo '<pre>';print_r($data);exit;


            $data['title']='Dr. IQ | Dashboard';
            $this->load->view('selfcare/includes/head',$data);
            $this->load->view('selfcare/includes/header');
            $this->load->view('selfcare/content/pathflow');
            $this->load->view('selfcare/includes/footer');
        }
        else
        {
            redirect(base_url().'selfcare/online');
        }
    }

    public function pb_view()
    {
        $params['pathway']=$this->uri->segment(3);
        $params['step']=$this->uri->segment(4);
        $params['next']=$this->uri->segment(5);
        $params['user_id']=$this->session->userdata['id'];
        
        $step=$this->admin_model->getStepByNumber($params['step'], $params['pathway']);
        // echo '<pre>';print_r($step);exit;
        if($step['type']!='question' || $step['type']!='info')
        {
            // echo 'go 110';exit;
            do {
                $path=$this->admin_model->getPathFlowByStep($step['number'], $params['pathway']);

                $step=$this->admin_model->getStepByNumber($path['back'], $params['pathway']);
                
                $path=$this->admin_model->getPathFlowByStep($step['number'], $params['pathway']);
                // print_r($path);exit;
            }while($step['type']!='question');
            // echo '<pre>';print_r($step);exit;
            $params['step']=$path['step'];
            $params['next']=$path['next'];
        }
        // echo '<pre>';print_r($params);exit;
        $data['answer']=$this->admin_model->getStepAnswer($params);
        // echo '<pre>';print_r($data['answer']);exit;
        $data['question']=$this->admin_model->getBackPathwayQuestion($params);
        $data['form']=$this->admin_model->getAnsForm($data['question']['question']['id']);
        //echo '<pre>';print_r($data);exit;
        $data['title']='Dr. IQ | Dashboard';
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/pathflow');
        $this->load->view('selfcare/includes/footer');
    }

    public function pathway_preview()
    {
        $user_id=1;
    }


    
    

}
?>
