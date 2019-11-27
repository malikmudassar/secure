<?php
/**
 * Created by PhpStorm.
 * User: Khani
 * Date: 11/20/2016
 * Time: 2:37 PM
 */

class Activity extends CI_Controller {
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
        $data['pathways']=$this->admin_model->getPublishedPathways();
        $this->load->view('selfcare/includes/header', $data);
        $this->load->view('selfcare/content/activity');
        $this->load->view('selfcare/includes/footer');
    }

    public function lifestyle()
    { 
        $data['title']='EZ Triage';
        $data['pathways']=$this->admin_model->getPublishedPathways();
        $this->load->view('selfcare/includes/header', $data);
        $this->load->view('selfcare/content/lifestyles');
        $this->load->view('selfcare/includes/footer');
    }

    public function consultations()
    { 
        $data['title']='EZ Triage';
        $data['pathways']=$this->admin_model->getPublishedPathways();
        $this->load->view('selfcare/includes/header', $data);
        $this->load->view('selfcare/content/online-consultations');
        $this->load->view('selfcare/includes/footer');
    }

    public function p_view()
    {
        $id=$this->uri->segment(3);
        $data['feedbacks']=$this->admin_model->getFeedbacksById($id);
        $this->load->view('selfcare/includes/header', $data);
        $this->load->view('selfcare/content/feedbacks');
        $this->load->view('selfcare/includes/footer');
    }

    public function getFeedbacksByType()
    {
        $id=$this->uri->segment(3);
        $pw=$this->uri->segment(4);
        $data['feedbacks']=$this->admin_model->getFeedbackByType($id, $pw);
        // print_r($data);
        return $this->load->view('selfcare/content/type_feedback', $data);
    }

    
}
?>
