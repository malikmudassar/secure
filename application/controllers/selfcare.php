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
        $data['title']='EZ Triage';
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/landing');
        $this->load->view('selfcare/includes/footer');
    }

    public function landing()
    { 
        $data['title']='EZ Triage';
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/landing');
        $this->load->view('selfcare/includes/footer');
    }

    public function category()
    { 
        $data['title']='EZ Triage';
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/category');
        $this->load->view('selfcare/includes/footer');
    }

    public function edit_question()
    {
        $q=$this->uri->segment(4);
        $p=$this->uri->segment(3);
        $data['title']='Edit Question';
        $data['question']=$this->admin_model->getAllById('questions', $q);
        if($_POST)
        {
            $this->admin_model->updateQuestion($_POST, $q);
            redirect(base_url().'selfcare/p_view/'.$p);
        }
        else
        {
            $this->load->view('selfcare/includes/head',$data);
            $this->load->view('selfcare/includes/header');
            $this->load->view('selfcare/content/edit_question');
            $this->load->view('selfcare/includes/footer');
        }
    }

    public function edit_answer()
    {
        $q=$this->uri->segment(3);
        $data['title']='Edit Question';
        $data['form']=$this->admin_model->getAnsForm($q);
        $data['question']=$this->admin_model->getAllById('questions', $q);
        // echo '<pre>';print_r($data);exit;
        if($_POST)
        {
            // echo '<pre>';print_r($_POST);exit;
            $this->admin_model->updateAnsData($_POST, $q);
            redirect(base_url().'selfcare/p_view/'.$data['question']['pathway']);
        }
        else
        {
            $this->load->view('selfcare/includes/head',$data);
            $this->load->view('selfcare/includes/header');
            $this->load->view('selfcare/content/edit_answer');
            $this->load->view('selfcare/includes/footer');
        }
    }

    public function submit_feedback()
    {
        // echo '<pre>';print_r($_POST);exit;
        $p=$this->uri->segment(3);
        $step=$this->uri->segment(4);
        $this->admin_model->submitFeedback($_POST, $step, $p);
        $this->session->set_flashdata('success', 'Feedback submitted');
        redirect(base_url().'selfcare/p_view/'.$p);
    }

    public function online()
    { 
        $data['title']='EZ Triage';
        $data['pathways']=$this->admin_model->getPublishedPathways();
        $this->load->view('selfcare/includes/head',$data);
        $this->load->view('selfcare/includes/header');
        $this->load->view('selfcare/content/pathways');
        $this->load->view('selfcare/includes/footer');
    }
    public function p_view()
    {
        $this->session->set_userdata('flag','white');
        $Id=$this->uri->segment(3);

        $user_id=1546;
        $params['gender']='male';
        $params['age']='29';
        
        $data=$this->admin_model->getFirstPathwayQuestion($Id, $user_id, $params['age']);
        $params['pathway']=$Id;
        if(!isset($params['gender']))
        {
            $params['gender']='male';
        }
        else
        {
            $params['gender']=$_REQUEST['gender'];
        }
        
        $data['form']=$this->admin_model->getAnsForm($data['question']['id'], $params);


        if(!empty($data['form']))
        {
            $data['step_type']=$data['form'][0]['type'];  
            if($Id==3)
            {
                for($i=0;$i<count($data['form']);$i++)
                {
                    $data['form'][$i]['type']='decimal';
                    $data['form'][$i]['max']=5;
                }
            }  
        }
        else
        {
            $data['step_type']='info';
            $data['form']="";
        }
        $data['user_id']=$user_id;
        if(!$data['percent'])
        {            
            $data['percent']=0;
        }
        
        $pw=$this->admin_model->getAllById('pathways', $data['pathway']);
        $data['p_name']=$pw['name'];
        if(!$data['question'])
        {
            $data['error']='No steps added against this pathway yet, Please Contact Administrator';
            $data['title']='EZ Triage';
            $this->load->view('selfcare/includes/head',$data);
            $this->load->view('selfcare/includes/header');
            $this->load->view('selfcare/content/error');
            $this->load->view('selfcare/includes/footer');
        }
        else
        {
            $data['title']='EZ Triage';
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
            $params=$_REQUEST;
        
            $params['user_id']=1546;
            if($params['step']==1)
            {
                $this->admin_model->flush_pw_results($params['user_id'],$params['pathway']);
            }
            $this->admin_model->saveResult($params);
            
            if(!$params['age'])
            {
                $params['age']=21;
            }
            if(!$params['gender'])
            {
                $params['gender']='male';
            }

            $data=$this->admin_model->getNextPathwayQuestion($params);
            // echo 'question arrived';exit;
            $data['form']=$this->admin_model->getAnsForm($data['question']['id'], $params);
            
            if(!empty($data['form']))
            {
                $data['step_type']=$data['form'][0]['type'];
            }
            else
            {
                $data['step_type']='info';
            }
                        
            if($data['next']==0)
            {
                $data['percent']=100;
                $p=array(
                    'user_id'   => $params['user_id'],
                    'pathway'   => $params['pathway']
                );
                $this->admin_model->savePercent($p);
            }

            $pw=$this->admin_model->getAllById('pathways', $data['pathway']);
            $data['p_name']=$pw['name'];
            $data['user_id']=$params['user_id'];
            $data['title']='EZ Triage';
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
        $params['user_id']=1546;
        
        $step=$this->admin_model->getStepByNumber($params['step'], $params['pathway']);

        if($step['type']!='question' && $step['type']!='info')
        {
            do {
                $path=$this->admin_model->getPathFlowByStep($step['number'], $params['pathway']);
                // print_r($path);exit;
                $step=$this->admin_model->getStepByNumber($path['back'], $params['pathway']);
                $path=$this->admin_model->getPathFlowByStep($step['number'], $params['pathway']);
            }while($step['type']!='question');
            
            $params['step']=$path['step'];
            $params['next']=$path['next'];
            
        }
        $data=$this->admin_model->getBackPathwayQuestion($params);
        if($params['pathway']==3)
        {
            $data['answer']=$this->admin_model->getStepAnswer($params);
        }
        else
        {
            $data['answer'][0]=$this->admin_model->getStepAnswer($params);
            if(!$data['answer'][0])
            {
                $data['answer'][0]=array();
            }
        }
         
        
        $data['form']=$this->admin_model->getAnsForm($data['question']['id'], $params);

        if(!empty($data['form']))
        {
            $data['step_type']=$data['form'][0]['type'];
            if($params['pathway']==3)
            {
                for($i=0;$i<count($data['form']);$i++)
                {
                    $data['form'][$i]['type']='decimal';
                }
            } 
        }
        else
        {
            $data['step_type']='info';
            $data['form']=array();
        }
        if($data['back']==0)
        {
            $data['percent']=0;
        }
        $data['user_id']=$params['user_id'];
        $pw=$this->admin_model->getAllById('pathways', $data['pathway']);
        $data['p_name']=$pw['name'];

        $data['title']='EZ Triage';
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
