<?php
/**
 * Created by PhpStorm.
 * User: Khani
 * Date: 11/20/2016
 * Time: 2:37 PM
 */

class Selfcare extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        if(!$this->session->userdata['id'])
        {
            redirect(base_url().'login');
        }
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
        $this->load->view('selfcare/includes/header',$data);
        $this->load->view('selfcare/content/category');
        $this->load->view('selfcare/includes/footer');
    }

    public function edit_question()
    {
        $q=$this->uri->segment(4);
        $p=$this->uri->segment(3);
        $user=$this->session->userdata['id'];
        $data['title']='Edit Question';
        $data['question']=$this->admin_model->getAllById('questions', $q);
        if($_POST)
        {
            $this->admin_model->updateQuestion($_POST, $q, $user);
            redirect(base_url().'selfcare/p_view/'.$p);
        }
        else
        {
            $this->load->view('selfcare/includes/header',$data);
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
            $this->load->view('selfcare/includes/header',$data);
            $this->load->view('selfcare/content/edit_answer');
            $this->load->view('selfcare/includes/footer');
        }
    }

    public function submit_feedback()
    {
        // echo '<pre>';print_r($_POST);exit;
        if($this->session->userdata['id'])
        {
            $p=$this->uri->segment(3);
            $step=$this->uri->segment(4);
            $user=$this->session->userdata['id'];
            $this->admin_model->submitFeedback($_POST, $step, $p, $user);
            $this->session->set_flashdata('success', 'Feedback submitted');
            redirect(base_url().'selfcare/p_view/'.$p);
        }
        else
        {
            return false;
        }        
    }

    public function online()
    { 
        $data['title']='EZ Triage';
        $data['pathways']=$this->admin_model->getPublishedPathways();
        $this->load->view('selfcare/includes/header', $data);
        $this->load->view('selfcare/content/pathways');
        $this->load->view('selfcare/includes/footer');
    }

    public function consultations()
    { 
        $data['title']='EZ Triage';
        $data['pathways']=$this->admin_model->getPublishedPathways();
        $this->load->view('selfcare/includes/header', $data);
        $this->load->view('selfcare/content/consultations');
        $this->load->view('selfcare/includes/footer');
    }
    public function p_view()
    {
        $this->session->set_userdata('flag','white');
        $Id=$this->uri->segment(3);

        $user_id=$this->session->userdata['id'];
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
        $data['feedback']=$this->admin_model->getFeedbackByStep($data['step'], $data['pathway']);
        // echo '<pre>';print_r($data);exit;
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
            $this->load->view('selfcare/includes/header',$data);
            $this->load->view('selfcare/content/pathflow');
            $this->load->view('selfcare/includes/footer');
        }
        
    }
    public function pq_view()
    {
        if($_POST)
        {
            // echo '<pre>';print_r($_POST);exit;
            $params=$_REQUEST;
        
            $params['user_id']=$this->session->userdata['id'];
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
            $data['feedback']=$this->admin_model->getFeedbackByStep($data['step'], $data['pathway']);
            $this->load->view('selfcare/includes/header',$data);
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
        echo '<pre>';print_r($params);exit;
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
        $data['feedback']=$this->admin_model->getFeedbackByStep($data['step'], $data['pathway']);
        // echo '<pre>';print_r($data);exit;
        $data['title']='EZ Triage';
        $this->load->view('selfcare/includes/header',$data);
        $this->load->view('selfcare/content/pathflow');
        $this->load->view('selfcare/includes/footer');
    }
    public function pb1_view()
    {
        $params['pathway']=$this->uri->segment(3);
        $params['step']=$this->uri->segment(4);
        $params['next']=$this->uri->segment(5);
        $params['user_id']=$this->session->userdata['id'];
        // echo '<pre>';print_r($params);exit;
        //$step=$this->admin_model->getStepByNumber($params['step'], $params['pathway']);
        $step=$this->admin_model->getBackStepByFlow($params);
        // echo '<pre>';print_r($step);exit;
        $this->admin_model->removeFlowStep($step['number'], $params['pathway'], $params['user_id']);
        $params['step']=$step['number'];
        
        $data=$this->admin_model->getBackPathwayQuestion1($params);
        // echo '<pre>';print_r($data);exit;
        $data['answer']=$this->admin_model->getStepAnswer($params);         
        if($params['pathway']==21 && $step['number']==11)
        {
            $data['answer']=array_reverse($data['answer']);
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
        // echo '<pre>';print_r($data);exit;
        $data['user_id']=$params['user_id'];
        $pw=$this->admin_model->getAllById('pathways', $data['pathway']);
        $data['p_name']=$pw['name'];
        $data['feedback']=$this->admin_model->getFeedbackByStep($data['step'], $data['pathway']);
        // echo '<pre>';print_r($data);exit;
        $data['title']='EZ Triage';
        $this->load->view('selfcare/includes/header',$data);
        $this->load->view('selfcare/content/pathflow');
        $this->load->view('selfcare/includes/footer');
    }

    public function pathway_preview()
    {
        $user_id=1;
    }

    public function profile()
    {
        if($this->session->userdata['id'])
        {
            $id=$this->session->userdata['id'];
            $data['user']=$this->admin_model->getAllById('users', $id);
            $data['title']='EZ Triage';
            // echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                // echo '<pre>';print_r($_POST);exit;
                $this->admin_model->updateProfile($_POST, $id);
                $data['success']='Profile Updated Successfully';
                $data['user']=$this->admin_model->getAllById('users', $id);
                $this->load->view('selfcare/includes/header',$data);
                $this->load->view('selfcare/content/profile');
                $this->load->view('selfcare/includes/footer');
            }
            else
            {
                $this->load->view('selfcare/includes/header',$data);
                $this->load->view('selfcare/content/profile');
                $this->load->view('selfcare/includes/footer');
            }
            
        }
        else
        {
            redirect(base_url().'admin/logout');
        }
    }

    public function bmi()
    {
        $data['title']='EZ Triage';
        if($_POST)
        {
            if($_POST['feet']>0)
            {
                $height=($_POST['feet']*30)+($_POST['inches']*2.54);
            }
            if($_POST['cm']>0)
            {
                $height=$_POST['cm'];
            }
            if($_POST['stone']>0)
            {
                $weight=($_POST['stones']*6.35)+($_POST['pounds']*0.45);
            }
            if($_POST['kg']>0)
            {
                $weight=$_POST['kg'];
            }
            $data['bmi']=(($weight)/(($height*$height)/10000));
            if($data['bmi']<15)
            {
                $data['category']='very severely underweight';
            }
            elseif($data['bmi'] >=15 && $data['bmi'] <=15.99)
            {
                $data['category']='severely underweight';
            }     
            elseif($data['bmi'] >=16 && $data['bmi'] <=18.50)
            {
                $data['category']='underweight';
            } 
            elseif($data['bmi'] >= 18.50 && $data['bmi'] <=25)
            {
                $data['category']='normal (healthy weight)';
            } 
            elseif($data['bmi'] >25 && $data['bmi'] <=30)
            {
                $data['category']='overweight';
            } 
            elseif($data['bmi'] > 30 && $data['bmi'] <=35)
            {
                $data['category']='moderately obese';
            } 
            elseif($data['bmi'] >35 && $data['bmi'] <=40)
            {
                $data['category']='severely obese';
            } 
            elseif($data['bmi'] > 40)
            {
                $data['category']='very severely obese';
            } 
            
            // echo $data['bmi']; exit;
            $this->load->view('selfcare/includes/header',$data);
            $this->load->view('selfcare/content/bmi');
            $this->load->view('selfcare/includes/footer');
        }
        else
        {
            $this->load->view('selfcare/includes/header',$data);
            $this->load->view('selfcare/content/bmi');
            $this->load->view('selfcare/includes/footer');
        }
        
    }

    public function password()
    {
        $id=$this->session->userdata['id'];
        $data['user']=$this->admin_model->getAllById('users', $id);
        $data['title']='EZ Triage';
        if($_POST)
        {
            
            $config=array(
                array(
                    'field' =>  'password',
                    'label' =>  'Password',
                    'rules' =>  'trim|required'
                ),
                array(
                    'field' =>  'conf_password',
                    'label' =>  'Confirm Password',
                    'rules' =>  'trim|required|matches[password]'
                )
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run()==false)
            {
                $data['errors']=validation_errors();
                $data['user']=$this->admin_model->getAllById('users', $id);
                $this->load->view('selfcare/includes/header',$data);
                $this->load->view('selfcare/content/password');
                $this->load->view('selfcare/includes/footer');
            }
            else
            {
                $this->admin_model->updatePassword($_POST, $id);
                $data['success']='Password Updated Successfully';
                $data['user']=$this->admin_model->getAllById('users', $id);
                $this->load->view('selfcare/includes/header',$data);
                $this->load->view('selfcare/content/password');
                $this->load->view('selfcare/includes/footer');
            }
           
            
        }
        else
        {
            $this->load->view('selfcare/includes/header',$data);
            $this->load->view('selfcare/content/password');
            $this->load->view('selfcare/includes/footer');
        }
            
    }

    public function finish_pw()
    {
        $pw=$this->uri->segment(3);
        $user_id=$this->uri->segment(4);
        $this->admin_model->finish_pw($pw, $user_id);
        redirect(base_url().'selfcare/category');
    }

    
    
    

}
?>
