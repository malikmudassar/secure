<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 11/20/2016
 * Time: 2:37 PM
 */

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        //$this->load->library('My_PHPMailer');
    }

    public function index()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('pathways');
            //print_r($data);exit;    
            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/dashboard');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_menu()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_menu');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addMenuItem($_POST);
                    $data['success']='Congratulations! Menu Item Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_menu');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                $data['parents']=$this->admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_menu');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_admin_menu');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateMenuItem($_POST,$menuId);
                    $data['success']='Congratulations! Menu Item Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_admin_menu');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                $data['parents']=$this->admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_admin_menu');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_admin_menu()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delAdminMenu($menuId);
        redirect(base_url().'admin/manage_admin_menu');
    }
    public function manage_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAllMenuItems();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_admin_menu');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    public function isLoggedIn()
    {
        if(!empty($this->session->userdata['id'])&& $this->session->userdata['type']=='admin')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////

    // Pathway Section starts

    public function add_pathway()
    {
        if($this->isLoggedIn())
        {
            
            $data['menu']=$this->admin_model->getMenuItems();
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_pathway');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addPathway($_POST);
                    $data['success']='Congratulations! Pathway Added Successfully';
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_pathway');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_pathway');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_pathway()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getAllById('pathways',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['menu_item']=$this->admin_model->getAllById('pathways',$menuId);
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_pathway');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updatePathway($_POST,$menuId);
                    $data['success']='Congratulations! Pathway Name Updated Successfully';
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getAllById('pathways',$menuId);
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_pathway');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_pathway');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function manage_pathways()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('pathways');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_pathways');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }


    // Questions 

    public function add_questions()
    {
        if($this->isLoggedIn())
        {
            
            $data['menu']=$this->admin_model->getMenuItems();
            $data['pathways']=$this->admin_model->getAll('pathways');
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    
                    array(
                        'field' =>  'statement',
                        'label' =>  'Question Statement',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'pathway',
                        'label' =>  'Pathway',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['pathways']=$this->admin_model->getAll('pathways');
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_question');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addQuestion($_POST);
                    $data['success']='Congratulations! Question Added Successfully';
                    $data['pathways']=$this->admin_model->getAll('pathways');
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_question');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_question');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }

    public function manage_questions()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getQuestions();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_questions');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function q_view()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['question']=$this->admin_model->getAllById('questions', $menuId);
            $data['form']=$this->admin_model->getAnsForm($menuId);
            $data['menu']=$this->admin_model->getMenuItems();

            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/q_view');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    // Answers Section Starts

    public function create_answer()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();

            if($_POST)
            {
                $config=array(
                    
                    array(
                        'field' =>  'label',
                        'label' =>  'Answer Model Label',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/create_answer');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addAnsModel($_POST);
                    $data['success']='Congratulations! Answer Model Created Successfully';
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/create_answer');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/create_answer');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function assign_ans_model()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['question']=$this->admin_model->getAllById('questions', $menuId);
            $data['models']=$this->admin_model->getAll('answer_models');
            $data['menu']=$this->admin_model->getMenuItems();

            if($_POST)
            {
                $this->admin_model->assign_ans_model($_POST, $menuId);
                $data['success']='Congratulations! Answer Model Assigned Successfully';
                $data['menu']=$this->admin_model->getMenuItems();
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/assign_ans_model');
                $this->load->view('static/footer');
            }
            else
            {
                
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/assign_ans_model');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function getQByPathway()
    {
        $id=$this->uri->segment(3);
        $data['questions']=$this->admin_model->getQByPathway($id);
        $this->load->view('admin/ajax_q',$data);
    }
    public function add_answer()
    {       
        if($this->isLoggedIn())
        {
            if($_POST)
            {
                $data['menu']=$this->admin_model->getMenuItems();
                $data['title']='Pathway Builder';
                $data['ans_model']=$this->admin_model->getAMByQ($_POST['question']);
                $data['question']=$_POST['question'];

                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_answer_2');
                $this->load->view('static/footer');
            }
            else
            {
                $data['menu']=$this->admin_model->getMenuItems();
                $data['pathways']=$this->admin_model->getAll('pathways');
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_answer');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function add_answer_2()
    {
        
        if($this->isLoggedIn())
        {
            if($_POST)
            {
                $q=$this->uri->segment(3);
                $question=$this->admin_model->getAllById('questions',$q);
                $ans_model=$question['ans_model'];
                $am=$this->admin_model->getAllById('answer_models',$ans_model);
                $this->admin_model->saveAns_form($q,$am,$_POST);
                $this->session->set_flashdata('success','Answer Form Saved');
                redirect(base_url().'admin/add_answer');
            }
            
        }
        else
        {
            redirect(base_url().'');
        }
    }

    // Steps Section 

    public function add_steps()
    {
        if($this->isLoggedIn())
        {
            
            $data['menu']=$this->admin_model->getMenuItems();
            //echo '<pre>';print_r($data);exit;
            $data['pathways']=$this->admin_model->getAll('pathways');
            if($_POST)
            {
                $config=array(
                    
                    array(
                        'field' =>  'number',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['pathways']=$this->admin_model->getAll('pathways');
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_step');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addStep($_POST);
                    $data['success']='Congratulations! Step in Pathway Added Successfully';
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['pathways']=$this->admin_model->getAll('pathways');
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_step');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_step');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_step()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getAllById('pathways',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['menu_item']=$this->admin_model->getAllById('pathways',$menuId);
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_step');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updatePathway($_POST,$menuId);
                    $data['success']='Congratulations! Pathway Name Updated Successfully';
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getAllById('pathways',$menuId);
                    $data['title']='Pathway Builder';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_step');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_step');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function manage_steps()
    {
        if($this->isLoggedIn())
        {
            
            $data['steps']=$this->admin_model->getAllSteps();
            //echo '<pre>';print_r($data);exit;
            $data['menu']=$this->admin_model->getMenuItems();
            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_steps');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function add_step_content()
    {
        // get step id from url
        $id=$this->uri->segment(3);
        // get step data 
        $data['step']=$this->admin_model->getAllById('steps',$id);
        $data['steps']=$this->admin_model->getAllStepsByPathway($data['step']['pathway']);
        //echo '<pre>';print_r($data['steps']);exit;
        $data['pathway']=$this->admin_model->getAllById('pathways',$data['step']['pathway']);
        $data['menu']=$this->admin_model->getMenuItems();
        $data['title']='Pathway Builder';
        // get questions of current pathway
        if($data['step']['type']=='question' || $data['step']['type']=='info')
        {
            $data['questions']=$this->admin_model->getQByPathway($data['step']['pathway']);
        }
        if($_POST)
        {
            if($data['step']['type']=='question'|| $data['step']['type']=='info')
            {
                $this->admin_model->addStepQuestion($_POST);
                $data['success']='Question added to step';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_step_content');
                $this->load->view('static/footer');
            }
            if($data['step']['type']=='calculation')
            {
                $this->admin_model->addStepCalculation($_POST);
                $data['success']='Calculation added to step';
                
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_step_content');
                $this->load->view('static/footer');
            }
            if($data['step']['type']=='condition')
            {
                $this->admin_model->addStepCondition($_POST);
                
                $data['success']='Condition added to step';
                
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_step_content');
                $this->load->view('static/footer');
            }
            if($data['step']['type']=='age')
            {
                $this->admin_model->addStepAge($_POST);
                $data['success']='Age check added to step';
                
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_step_content');
                $this->load->view('static/footer');
            }
            if($data['step']['type']=='flag')
            {
                $this->admin_model->addStepFlag($_POST);
                $data['success']='Flag check added to step';
                
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_step_content');
                $this->load->view('static/footer');
            }
            if($data['step']['type']=='formula')
            {
                $this->admin_model->addStepFlag($_POST);
                $data['success']='Formula added to step';
                
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_step_content');
                $this->load->view('static/footer');
            }
            if($data['step']['type']=='gender')
            {
                $this->admin_model->addStepGender($_POST);
                $data['success']='Gender added to step';
                
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_step_content');
                $this->load->view('static/footer');
            }
        }
        else
        {
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/add_step_content');
            $this->load->view('static/footer');
        }
    }

    public function list_pathflows()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('pathways');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/list_pathflows');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function listPathFlowSteps()
    {
        if($this->isLoggedIn())
        {
            $id=$this->uri->segment(3);
            $data['menu']=$this->admin_model->getMenuItems();
            $data['steps']=$this->admin_model->getPathFlowSteps($id);
            //echo '<pre>';print_r($data);exit;
            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/listPathFlowSteps');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function addNextPathFlowStep()
    {
        if($this->isLoggedIn())
        {
            $Id=$this->uri->segment(3);
            $data['menu']=$this->admin_model->getMenuItems();
            $data['title']='Pathway Builder';
            $data['step']=$this->admin_model->getAllById('steps',$Id);
            //echo '<pre>';print_r($data['step']);exit;
            $data['steps']=$this->admin_model->getPathFlowSteps($data['step']['pathway']);
            $data['question']=$this->admin_model->getQuestionByStep($Id);
            
            $data['form']=$this->admin_model->getAnsForm($data['question']['id']);
            $data['pathflow']=$this->admin_model->getPathFlowByStep($data['step']['number'],$data['step']['pathway']);
            //echo '<pre>';print_r($data['pathflow']);exit;
            if($_POST)
            {
                $params=$_POST;
                //echo '<pre>';print_r($_POST);exit;
                $this->admin_model->addNextPFinDb($params);
                $data['pathflow']=$this->admin_model->getPathFlowByStep($data['step']['number'],$data['step']['pathway']);
                $data['success']='Pathflow Updated Successfully';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/addNextPathFlowStep');
                $this->load->view('static/footer'); 
            }
            else
            {
                
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/addNextPathFlowStep');
                $this->load->view('static/footer');
            }
            
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function p_view()
    {
        if($this->isLoggedIn())
        {
            $Id=$this->uri->segment(3);
            $data['question']=$this->admin_model->getFirstPathwayQuestion($Id);
            $data['form']=$this->admin_model->getAnsForm($data['question']['question']['id']);
            
            echo '<pre>';print_r($data);exit;
            $data['menu']=$this->admin_model->getMenuItems();

            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/p_view');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    public function pq_view()
    {
        if($this->isLoggedIn())
        {
            if($_POST)
            {
               $params=$_POST;
                //echo '<pre>';print_r($_POST);exit;
                
                $data['question']=$this->admin_model->getNextPathwayQuestion($params);
                $data['form']=$this->admin_model->getAnsForm($data['question']['question']['id']);
                //echo '<pre>';print_r($data);exit;
                
                $data['menu']=$this->admin_model->getMenuItems();

                $data['title']='Pathway Builder';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/p_view');
                $this->load->view('static/footer'); 
            }
            else
            {
                redirect(base_url().'admin/list_pathflows');
            }
            
        }
        else
        {
            redirect(base_url().'');
        }
    }
    public function pb_view()
    {
        if($this->isLoggedIn())
        {
            $params['pathway']=$this->uri->segment(3);
            $params['step']=$this->uri->segment(4);
            $params['next']=$this->uri->segment(5);
            //echo '<pre>';print_r($params);exit;
            $data['question']=$this->admin_model->getBackPathwayQuestion($params);
            $data['form']=$this->admin_model->getAnsForm($data['question']['question']['id']);
            //echo '<pre>';print_r($data);exit;
            
            $data['menu']=$this->admin_model->getMenuItems();

            $data['title']='Pathway Builder';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/p_view');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }




}
?>
