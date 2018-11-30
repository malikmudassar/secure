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
            // echo '<pre>';print_r($_POST);exit;
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
        //echo '<pre>';print_r($params);exit;
        $step=$this->admin_model->getStepByNumber($params['step']);
        //echo '<pre>';print_r($getStepAnswer);exit;
        if($step['type']!='question')
        {
            $path=$this->admin_model->getPathFlowByStep($step['number']);
            redirect(base_url().'selfcare/pb_view/'.$path['pathway'].'/'.$path['back'].'/'.$path['step']);
        }
        $data['answer']=$this->admin_model->getStepAnswer($params['step']);
        $data['question']=$this->admin_model->getBackPathwayQuestion($params);
        $data['form']=$this->admin_model->getAnsForm($data['question']['question']['id']);
        //echo '<pre>';print_r($data);exit;
        $data['title']='Dr. IQ | Dashboard';
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/pathflow');
        $this->load->view('selfcare/includes/footer');
    }


    
    

}
?>
