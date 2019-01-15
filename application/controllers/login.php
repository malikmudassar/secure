<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 11/22/2016
 * Time: 1:10 PM
 */

class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    {
        
        if(!$this->isLoggedIn())
        {
            $data['title']='Pathway Builder';
            if($_POST)
            {
                $config=array(
                    array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email',
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required',
                    ),
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Dr. IQ | Dashboard';
                    $this->load->view('selfcare/includes/head',$data);
                    $this->load->view('selfcare/includes/header');
                    $this->load->view('selfcare/content/login');
                    $this->load->view('selfcare/includes/footer');
                }
                else
                {
                    $user=$this->admin_model->checkUser($_POST);
                    if(!empty($user))
                    {
                        
                        $this->session->set_userdata($user);
                        redirect(base_url().'selfcare/');
                    }
                    else
                    {
                        $data['errors']='The credentials you have provided are incorrect or your account has not been approved yet.';
                        $data['title']='Dr. IQ | Dashboard';
                        $this->load->view('selfcare/includes/head',$data);
                        $this->load->view('selfcare/includes/header');
                        $this->load->view('selfcare/content/login');
                        $this->load->view('selfcare/includes/footer');
                    }
                }
            }
            else
            {
                $data['title']='Dr. IQ | Dashboard';
                $this->load->view('selfcare/includes/head',$data);
                $this->load->view('selfcare/includes/header');
                $this->load->view('selfcare/content/login');
                $this->load->view('selfcare/includes/footer');
            }
        }
        else
        {
            redirect(base_url().$this->session->userdata['type']);
        }

    }

    public function isLoggedIn()
    {
        if(!empty($this->session->userdata['id'])&& !empty($this->session->userdata['type']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}