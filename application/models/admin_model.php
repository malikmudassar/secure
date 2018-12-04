<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 8/2/2016
 * Time: 3:48 PM
 */
class Admin_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    public function checkUser($data)
    {
        $st=$this->db->select('*')->from('users')
            ->WHERE('email',$data['email'])
            ->WHERE('password',md5(sha1($data['password'])))
            ->get()->result_array();
        if(count($st)>0)
        {
            return $st[0];
        }
        else
        {
            return false;
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function getMenuParents()
    {
        return $this->db->select('*')->from('admin_menu')->where('parent',0)->get()->result_array();
    }
    public function addMenuItem($data)
    {
        $item=array(
            'parent'=>$data['parent'],
            'name'=>$data['name'],
            'class'=>$data['class'],
            'url'=>$data['url']
        );

        $this->db->insert('admin_menu',$item);
    }
    public function updateMenuItem($data,$menuId)
    {
        $item=array(
            'parent'=>$data['parent'],
            'name'=>$data['name'],
            'class'=>$data['class'],
            'url'=>$data['url']
        );

        $this->db->WHERE('id',$menuId)->update('admin_menu',$item);
    }
    public function getMenuItems()
    {
        $st=$this->db->select('*')->from('admin_menu')->where('parent',0)->get()->result_array();
        if(count($st)>0)
        {
            for($i=0;$i<count($st);$i++)
            {
                $st[$i]['child']=$this->db->select('*')->from('admin_menu')->where('parent',$st[$i]['id'])->get()->result_array();
            }
            return $st;
        }
        else
        {
            return false;
        }

    }
    public function getAllMenuItems()
    {
        return $this->db->query('SELECT admin_menu.*, a.name as parent from admin_menu left join admin_menu a on a.id=admin_menu.parent')->result_array();
    }
    public function getMenuItemDetail($menuId)
    {
        $st=$this->db->select('*')->from('admin_menu')->WHERE('id',$menuId)->get()->result_array();
        return $st[0];
    }
    public function delAdminMenu($id)
    {
        $this->db->query('DELETE from admin_menu WHERE id='.$id);
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////
    public function getAll($table)
    {
        return $this->db->select('*')->from($table)->get()->result_array();
    }
    public function getAllById($table,$id)
    {
        $st= $this->db->select('*')->from($table)->WHERE('id',$id)->get()->result_array();
        return $st[0];
    }

    // Pathway Starts

    public function addPathway($data)
    {
        $item=array(
            'name'=>$data['name']
        );

        $this->db->insert('pathways',$item);
        return true;
    }
    public function updatePathway($data,$menuId)
    {
        $item=array(
            'name'=>$data['name']
        );

        $this->db->WHERE('id',$menuId)->update('pathways',$item);
    }


    public function addQuestion($data)
    {
        $item=array(
            'statement' =>  $data['statement'],
            'pathway'   =>  $data['pathway'],
            'type'      =>  $data['type']
        );

        $this->db->insert('questions',$item);
        return true;
    }

    public function getQuestions()
    {
        $st=$this->db->query('SELECT questions.*, pathways.name as pathwayName from questions inner join pathways
            on 
            pathways.id=questions.pathway')->result_array();
        return $st;
    }

    public function getQuestionByStep($id)
    {
        $st=$this->db->query('SELECT questions.* from questions inner join step_questions sq
                        on sq.question=questions.id where sq.step='.$id)->result_array();
        return $st[0];
    }
    public function addAnsModel($data)
    {
        $item=array(
            'label' =>  $data['label'],
            'text' =>  $data['textboxes'],
            'radio' =>  $data['radioboxes'],
            'checkbox' =>  $data['checkboxes'],
            'textarea' =>  $data['textarea'],
            'selectbox'    => $data['dropdown']
        );

        $this->db->insert('answer_models',$item);
        return true;
    }

    public function getAnsForm($qId)
    {
        return $this->db->select('*')->from('ans_form')->where('question',$qId)->get()->result_array();
    }

    public function assign_ans_model($data, $id)
    {
        $item=array(
            'ans_model' =>  $data['ans_model']
        );

        $this->db->where('id',$id)->update('questions',$item);
        return true;
    }

    public function addStep($data)
    {
        $item=array(
            'number' =>  $data['number'],
            'pathway'   =>  $data['pathway'],
            'type'   =>  $data['type']
        );

        $this->db->insert('steps',$item);
        return true;
    }

    public function addStepQuestion($data)
    {
        $item=array(
            'step'      =>  $data['step'],
            'question'  =>  $data['question']
        );
        $this->db->insert('step_questions',$item);
    }
    public function addStepCalculation($data)
    {
        $item=array(
            'step'      =>  $data['step'],
            'from_step'  =>  $data['from_step'],
            'to_step'  =>  $data['to_step']
        );
        $this->db->insert('step_calculation',$item);
    }

    public function addStepCondition($data)
    {
        $item=array(
            'step'      =>  $data['step'],
            'step_result'  =>  $data['step_result'],
            'operator'  =>  $data['operator'],
            'value'  =>  $data['value'],
            'if_next_step'  =>  $data['if_next_step'],
            'else_next_step'  =>  $data['else_next_step']
        );
        $this->db->insert('step_condition',$item);
    }

    public function addStepAge($data)
    {
        $item=array(
            'step'      =>  $data['step'],
            'operator'  =>  $data['operator'],
            'value'  =>  $data['value'],
            'if_next_step'  =>  $data['if_next_step'],
            'else_next_step'  =>  $data['else_next_step']
        );
        $this->db->insert('step_age',$item);
    }

    public function addStepFlag($data)
    {
        $item=array(
            'step'      =>  $data['step'],
            'if_next_step'  =>  $data['if_next_step'],
            'else_next_step'  =>  $data['else_next_step']
        );
        $this->db->insert('step_flag',$item);
    }

    public function addNextPFinDb($data)
    {
        $st=$this->db->query('select * from pathflow where step='.$data['step'])->result_array();
        if(count($st)>0)
        {
            $item=array(
            'pathway'   =>      $data['pathway'],
            'step'      =>      $data['step'],
            'next'      =>      $data['next'],
            'back'      =>      $data['back']
            );
            $this->db->where('step',$item['step'])->update('pathflow',$item);
        }
        else
        {
            $item=array(
            'pathway'   =>      $data['pathway'],
            'step'      =>      $data['step'],
            'next'      =>      $data['next'],
            'back'      =>      $data['back']
            );
            $this->db->insert('pathflow',$item);
        }
        
    }

    public function getAllSteps()
    {
        return $this->db->query('SELECT steps.*, pathways.name as pathway from steps inner join pathways on pathways.id=steps.pathway ')->result_array();
    }

    public function getPathFlowSteps($id)
    {
        return $this->db->query('SELECT steps.*, pathways.name as pathway from steps inner join pathways on pathways.id=steps.pathway  where steps.pathway='.$id)->result_array();
    }

    public function getPathFlowByStep($id)
    {
        $st=$this->db->select('*')->from('pathflow')->where('step',$id)->get()
        ->result_array();
        return $st[0];
    }

    public function getStepByNumber($id)
    {
        $st=$this->db->select('*')->from('steps')->where('number',$id)->get()->result_array();
        return $st[0];
    }

    public function getQByPathway($id)
    {
        return $this->db->select('*')->from('questions')->where('pathway',$id)->get()->result_array();
    }

    public function getAMByQ($id)
    {
        $st= $this->db->query('SELECT * from answer_models inner join questions on questions.ans_model=answer_models.id where questions.id='.$id)->result_array();
        return $st[0];
    }

    public function saveAns_form($q,$am,$data)
    {
        if($am['text']>0){
            $type='text';
        }
        if($am['radio']>0){
            $type='radio';
            for($i=0;$i<$am['radio'];$i++)
            {
                $item=array(
                    'question'  => $q,
                    'name' => $data['name'],
                    'type'  => $type,
                    'value' =>$data['radio'.($i+1)],
                    'caption'=>$data['radioTxt'.($i+1)] 
                );
                $this->db->insert('ans_form',$item);
            }
        }
        if($am['checkbox']>0){
            $type='checkbox';
        }
        if($am['selectbox']>0){
            $type='select';
        }
        if($_POST['flag'])
        {
            $this->session->set_userdata('flag',$_POST['flag']);
        }

    }

    public function getFirstPathwayQuestion($id)
    {
        $st=$this->db->select('*')->from('pathflow')->where('pathway',$id)->where('back',0)->get()->result_array();
        //echo '<pre>';print_r($st);exit;
        if(!count($st)>0)
        {
            return false;
        }
        $data=$st[0];
        $st=$this->db->query('select questions.* from questions inner join step_questions on step_questions.question=questions.id where step='.$data['step'])->result_array();
        $data['question']=$st[0];
        return $data;
    }

    public function getNextPathwayQuestion($params)
    {
        $st=$this->db->select('*')->from('pathflow')
                ->where('pathway',$params['pathway'])
                ->where('step',$params['next'])
                ->get()->result_array();
        $data=$st[0];
        //echo '<pre>';print_r($params);exit;
        $step=$this->getStepByNumber($data['step']);
        
        $result=0;
        
        if($step['type']=='calculation')
        {   //echo '<pre>';print_r($step);exit;
            // Get range of questions whose answers needs to be calculated
            
            $st=$this->db->query('select * from step_calculation where step='.$step['number'])->result_array();
            $stepCalcData=$st[0];
            // Get list of answers from answers table against the range above
            $st=$this->db->query('select * from step_answers where step BETWEEN '.$stepCalcData['from_step'].' and '.$stepCalcData['to_step'].'')->result_array();
            //echo '<pre>';print_r($st); exit;
            if(count($st)>0)
            {
                for($i=0;$i<count($st);$i++)
                {
                    $result+=$st[$i]['value'];
                }
            }
            // Get the next step number of the calculation step from pathflow
            $next=$this->db->query('select * from pathflow where step='.$step['id'])->result_array();
            $step=$this->getStepByNumber($next[0]['next']);
            //echo '<pre>';print_r($step); exit;
            if($step['type']=='question' || $step['type']=='info')
            {
                $data['step']=$step['number'];
            }
            elseif($step['type']=='condition')
            {
                //echo '2';exit;
                //echo '<pre>';print_r($step); exit;
                $st=$this->db->query('select * from step_condition where step='.$step['number'])->result_array();
                $condition=$st[0];
                if(count($st)>0)
                {
                    switch($condition['operator'])
                    {
                        case '>':
                            if($result > $condition['value'])
                            {
                                $data['step']=$condition['if_next_step'];
                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                $path=$st[0];
                                $data['back']=$step['number'];
                                $data['next']=$path['next'];
                                $step=$this->getStepByNumber($path['next']);
                                if($step['type']=='age')
                                {
                                    $result=$this->session->userdata['age'];
                                    $st=$this->db->query('select * from step_age where step='.$step['number'])->result_array();
                                    $condition=$st[0];
                                    switch($condition['operator'])
                                    {
                                        case '>':
                                            if($result > $condition['value'])
                                            {
                                                $data['step']=$condition['if_next_step'];
                                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number'];
                                                $data['next']=$path['next'];
                                                
                                            }
                                            else
                                            {
                                                $data['step']=$condition['else_next_step'];  
                                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number']; 
                                                $data['next']=$path['next'];
                                                //echo '<pre>';print_r($path);exit;
                                            }
                                        break;
                                        case '<':
                                            if($condition['value'] < $result)
                                            {
                                                $data['step']=$condition['if_next_step'];
                                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number'];
                                                $data['next']=$path['next'];
                                            }
                                            else
                                            {
                                                $data['step']=$condition['else_next_step'];  
                                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number']; 
                                                $data['next']=$path['next'];
                                            }
                                        break;
                                        case '=':
                                            if($result == $condition['value'])
                                            {
                                                $data['step']=$condition['if_next_step'];
                                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number'];
                                                $data['next']=$path['next'];
                                            }
                                            else
                                            {
                                                $data['step']=$condition['else_next_step'];  
                                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number']; 
                                                $data['next']=$path['next'];
                                            }
                                        break;
                                    }
                                    
                                }
                                
                            }
                            else
                            {
                                $data['step']=$condition['else_next_step'];  
                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                $path=$st[0];
                                $data['back']=$step['number']; 
                                $data['next']=$path['next'];
                                $step=$this->getStepByNumber($path['next']);
                                //echo '<pre>';print_r($step); exit;
                                if($step['type']=='age')
                                {
                                    $result=$this->session->userdata['age'];
                                    $st=$this->db->query('select * from step_age where step='.$step['number'])->result_array();
                                    $condition=$st[0];
                                    //echo '3';exit;
                                    //echo '<pre>';print_r($condition);exit;
                                    switch($condition['operator'])
                                    {
                                        case '>':
                                            if($result > $condition['value'])
                                            {
                                                $data['step']=$condition['if_next_step'];
                                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number'];
                                                $data['next']=$path['next'];
                                                
                                            }
                                            else
                                            {
                                                $data['step']=$condition['else_next_step'];  
                                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number']; 
                                                $data['next']=$path['next'];
                                                //echo '<pre>';print_r($path);exit;
                                            }
                                        break;
                                        case '<':
                                            if($condition['value'] < $result)
                                            {
                                                $data['step']=$condition['if_next_step'];
                                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number'];
                                                $data['next']=$path['next'];
                                            }
                                            else
                                            {
                                                $data['step']=$condition['else_next_step'];  
                                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number']; 
                                                $data['next']=$path['next'];
                                            }
                                        break;
                                        case '=':
                                            if($result == $condition['value'])
                                            {
                                                $data['step']=$condition['if_next_step'];
                                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number'];
                                                $data['next']=$path['next'];
                                            }
                                            else
                                            {
                                                $data['step']=$condition['else_next_step'];  
                                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                $path=$st[0];
                                                $data['back']=$step['number']; 
                                                $data['next']=$path['next'];
                                            }
                                        break;
                                    }
                                    
                                }
                            }
                        break;
                        case '<':
                            if($result < $condition['value'])
                            {
                                $data['step']=$condition['if_next_step'];
                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                $path=$st[0];
                                $data['back']=$step['number'];
                                $data['next']=$path['next'];
                            }
                            else
                            {
                                $data['step']=$condition['else_next_step'];  
                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                $path=$st[0];
                                $data['back']=$step['number']; 
                                $data['next']=$path['next'];
                            }
                        break;
                        case '=':
                            if($result == $condition['value'])
                            {
                                $data['step']=$condition['if_next_step'];
                                $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                $path=$st[0];
                                $data['back']=$step['number'];
                                $data['next']=$path['next'];
                            }
                            else
                            {
                                $data['step']=$condition['else_next_step'];  
                                $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                $path=$st[0];
                                $data['back']=$step['number']; 
                                $data['next']=$path['next'];
                            }
                        break;
                    }
                }
                else
                {
                    echo '<pre>';print_r('Condition data not present'); print_r($step);exit;
                }
                
                
                
            }
            elseif($step['type']=='age')
            {
                $result=$this->session->userdata['age'];
                $st=$this->db->query('select * from step_age where step='.$step['number'])->result_array();
                $condition=$st[0];
                //echo '3';exit;
                //echo '<pre>';print_r($condition);exit;
                switch($condition['operator'])
                {
                    case '>':
                        if($result > $condition['value'])
                        {
                            $data['step']=$condition['if_next_step'];
                            $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                            $path=$st[0];
                            $data['back']=$step['number'];
                            $data['next']=$path['next'];
                            
                        }
                        else
                        {
                            $data['step']=$condition['else_next_step'];  
                            $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                            $path=$st[0];
                            $data['back']=$step['number']; 
                            $data['next']=$path['next'];
                            //echo '<pre>';print_r($path);exit;
                        }
                    break;
                    case '<':
                        if($condition['value'] < $result)
                        {
                            $data['step']=$condition['if_next_step'];
                            $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                            $path=$st[0];
                            $data['back']=$step['number'];
                            $data['next']=$path['next'];
                        }
                        else
                        {
                            $data['step']=$condition['else_next_step'];  
                            $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                            $path=$st[0];
                            $data['back']=$step['number']; 
                            $data['next']=$path['next'];
                        }
                    break;
                    case '=':
                        if($result == $condition['value'])
                        {
                            $data['step']=$condition['if_next_step'];
                            $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                            $path=$st[0];
                            $data['back']=$step['number'];
                            $data['next']=$path['next'];
                        }
                        else
                        {
                            $data['step']=$condition['else_next_step'];  
                            $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                            $path=$st[0];
                            $data['back']=$step['number']; 
                            $data['next']=$path['next'];
                        }
                    break;
                }
                
            }
            elseif($step['type']=='flag')
            {
                //echo '6';exit;
                $result=$params['score'];
                $st=$this->db->query('select * from step_flag where step='.$step['number'])->result_array();
                $condition=$st[0];

                if($condition['step_result']!=0)
                {
                    //echo 'step result is not 0';exit;
                    $this->session->set_userdata('flag','red');
                    $data['step']=$condition['if_next_step'];
                    $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                    $path=$st[0];   
                    $data['back']=$step['number'];
                    $data['next']=$path['next'];
                    //echo '<pre>';print_r($data); exit;
                    $step=$this->getStepByNumber($data['next']);
                    if($step['type']=='condition')
                    {                           
                        //echo '<pre>';print_r($step); exit;
                        $st=$this->db->query('select * from step_condition where step='.$step['number'])->result_array();
                        $condition=$st[0];
                        //echo '691';echo '<pre>';print_r($condition); exit;
                        if(count($st)>0)
                        { 
                         //echo '<pre>';print_r($result); exit;

                            switch($condition['operator'])
                            {
                                case '>':
                                    if($result > $condition['value'])
                                    {
                                        //echo '<pre>';print_r($result); exit;
                                        $data['step']=$condition['if_next_step'];
                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                        $path=$st[0];
                                        $data['back']=$step['number'];
                                        $data['next']=$path['next'];
                                        $step=$this->getStepByNumber($path['next']);

                                        if($step['type']=='age')
                                        {
                                            $result=$this->session->userdata['age'];
                                            $st=$this->db->query('select * from step_age where step='.$step['number'])->result_array();
                                            $condition=$st[0];
                                            switch($condition['operator'])
                                            {
                                                case '>':
                                                    if($result > $condition['value'])
                                                    {
                                                        $data['step']=$condition['if_next_step'];
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number'];
                                                        $data['next']=$path['next'];
                                                        
                                                    }
                                                    else
                                                    {
                                                        $data['step']=$condition['else_next_step'];  
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number']; 
                                                        $data['next']=$path['next'];
                                                        //echo '<pre>';print_r($path);exit;
                                                    }
                                                break;
                                                case '<':
                                                    if($condition['value'] < $result)
                                                    {
                                                        $data['step']=$condition['if_next_step'];
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number'];
                                                        $data['next']=$path['next'];
                                                    }
                                                    else
                                                    {
                                                        $data['step']=$condition['else_next_step'];  
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number']; 
                                                        $data['next']=$path['next'];
                                                    }
                                                break;
                                                case '=':
                                                    if($result == $condition['value'])
                                                    {
                                                        $data['step']=$condition['if_next_step'];
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number'];
                                                        $data['next']=$path['next'];
                                                    }
                                                    else
                                                    {
                                                        $data['step']=$condition['else_next_step'];  
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number']; 
                                                        $data['next']=$path['next'];
                                                    }
                                                break;
                                            }
                                            
                                        }
                                        
                                    }
                                    else
                                    {
                                        //echo '779';exit;
                                        $data['step']=$condition['else_next_step'];  
                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                        $path=$st[0];
                                        $data['back']=$step['number']; 
                                        $data['next']=$path['next'];
                                        $step=$this->getStepByNumber($path['next']);
                                        //echo '<pre>';print_r($step); print_r($data);exit;
                                        if($step['type']=='age')
                                        {
                                            $result=$this->session->userdata['age'];
                                            $st=$this->db->query('select * from step_age where step='.$step['number'])->result_array();
                                            $condition=$st[0];
                                            //echo '3';exit;
                                            // echo '<pre>';print_r($condition);exit;
                                            switch($condition['operator'])
                                            {
                                                case '>':
                                                    if($result > $condition['value'])
                                                    {
                                                        $data['step']=$condition['if_next_step'];
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number'];
                                                        $data['next']=$path['next'];
                                                        
                                                    }
                                                    else
                                                    {
                                                        $data['step']=$condition['else_next_step'];  
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $p=$st[0];
                                                        $data['back']=$step['number']; 
                                                        $data['next']=$path['next'];
                                                        //echo '<pre>';print_r($data);exit;
                                                        $step=$this->getStepByNumber($path['next']);
                                                        if($step['type']=='flag')
                                                        {
                                                            $st=$this->db->query('select * from step_flag where step='.$step['number'])->result_array();
                                                            $path=$st[0];
                                                            if($path['step_result']==0)
                                                            {
                                                                if($this->session->userdata['flag']=='red')
                                                                {
                                                                    $data['back']=$p['back']; 
                                                                    $data['next']=$path['if_next_step'];
                                                                }
                                                                else
                                                                {                                                                    
                                                                    $data['back']=$p['back']; 
                                                                    $data['next']=$path['else_next_step'];
                                                                }
                                                            }
                                                        }
                                                        //echo '<pre>';print_r($p);exit;
                                                    }
                                                break;
                                                case '<':
                                                    if($condition['value'] < $result)
                                                    {
                                                        $data['step']=$condition['if_next_step'];
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number'];
                                                        $data['next']=$path['next'];
                                                    }
                                                    else
                                                    {
                                                        $data['step']=$condition['else_next_step'];  
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number']; 
                                                        $data['next']=$path['next'];
                                                    }
                                                break;
                                                case '=':
                                                    if($result == $condition['value'])
                                                    {
                                                        $data['step']=$condition['if_next_step'];
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number'];
                                                        $data['next']=$path['next'];
                                                    }
                                                    else
                                                    {
                                                        $data['step']=$condition['else_next_step'];  
                                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                                        $path=$st[0];
                                                        $data['back']=$step['number']; 
                                                        $data['next']=$path['next'];
                                                    }
                                                break;
                                            }
                                            $step=$this->getStepByNumber($data['next']);
                                            
                                            $st=$this->db->query('select * from pathflow where step='.$data['step'])->result_array();
                                            $path=$st[0];
                                            $data['step']=$data['next'];
                                            // $st=$this->db->query('select questions.* from questions inner join step_questions on step_questions.question=questions.id where step='.$data['next'])->result_array();
                                            // $data['question']=$st[0];

                                            //echo '<pre>';print_r($step); print_r($data);exit;
                                        }
                                    }
                                break;
                                case '<':
                                    if($result < $condition['value'])
                                    {
                                        $data['step']=$condition['if_next_step'];
                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                        $path=$st[0];
                                        $data['back']=$step['number'];
                                        $data['next']=$path['next'];
                                    }
                                    else
                                    {
                                        $data['step']=$condition['else_next_step'];  
                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                        $path=$st[0];
                                        $data['back']=$step['number']; 
                                        $data['next']=$path['next'];
                                    }
                                break;
                                case '=':
                                    if($result == $condition['value'])
                                    {
                                        $data['step']=$condition['if_next_step'];
                                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                                        $path=$st[0];
                                        $data['back']=$step['number'];
                                        $data['next']=$path['next'];
                                    }
                                    else
                                    {
                                        $data['step']=$condition['else_next_step'];  
                                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                                        $path=$st[0];
                                        $data['back']=$step['number']; 
                                        $data['next']=$path['next'];
                                    }
                                break;
                            }
                        }
                        else
                        {
                            echo '<pre>';print_r('Condition data not present'); print_r($step);exit;
                        }
                        
                        
                        
                    }
                }
                else
                {
                    echo 'step result is 0';exit;
                    if($this->session->userdata['flag']=='red')
                    {
                        $data['step']=$condition['if_next_step'];
                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                        $path=$st[0];   
                        $data['back']=$step['number'];
                        $data['next']=$path['next'];

                        
                    }
                    else
                    {
                        $data['step']=$condition['else_next_step'];
                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                        $path=$st[0];   
                        $data['back']=$step['number'];
                        $data['next']=$path['next'];
                    }
                }
                
                
            }
            //echo '<pre>';print_r($data); exit;
        }
        elseif($step['type']=='condition')
        {   //echo '4';exit;
            $result=$params['score'];
            $st=$this->db->query('select * from step_condition where step='.$step['number'])->result_array();
            $condition=$st[0];
            
            //echo '<pre>';print_r($condition);exit;
            switch($condition['operator'])
            {
                case '>':
                    if($result > $condition['value'])
                    {
                        $data['step']=$condition['if_next_step'];
                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number'];
                        $data['next']=$path['next'];
                        
                    }
                    else
                    {
                        $data['step']=$condition['else_next_step'];  
                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number']; 
                        $data['next']=$path['next'];
                        //echo '<pre>';print_r($path);exit;
                    }
                break;
                case '<':
                    if($condition['value'] < $result)
                    {
                        $data['step']=$condition['if_next_step'];
                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number'];
                        $data['next']=$path['next'];
                    }
                    else
                    {
                        $data['step']=$condition['else_next_step'];  
                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number']; 
                        $data['next']=$path['next'];
                    }
                break;
                case '=':
                    if($result == $condition['value'])
                    {
                        $data['step']=$condition['if_next_step'];
                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number'];
                        $data['next']=$path['next'];
                    }
                    else
                    {
                        $data['step']=$condition['else_next_step'];  
                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number']; 
                        $data['next']=$path['next'];
                    }
                break;
            }
            
        }
        elseif($step['type']=='age')
        {
            //echo '5';exit;
            $result=$this->session->userdata['age'];
            $st=$this->db->query('select * from step_age where step='.$step['number'])->result_array();
            $condition=$st[0];
            
            //echo '<pre>';print_r($condition);exit;
            switch($condition['operator'])
            {
                case '>':
                    if($result > $condition['value'])
                    {
                        $data['step']=$condition['if_next_step'];
                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number'];
                        $data['next']=$path['next'];
                        
                    }
                    else
                    {
                        $data['step']=$condition['else_next_step'];  
                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number']; 
                        $data['next']=$path['next'];
                        //echo '<pre>';print_r($path);exit;
                    }
                break;
                case '<':
                    if($condition['value'] < $result)
                    {
                        $data['step']=$condition['if_next_step'];
                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number'];
                        $data['next']=$path['next'];
                    }
                    else
                    {
                        $data['step']=$condition['else_next_step'];  
                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number']; 
                        $data['next']=$path['next'];
                    }
                break;
                case '=':
                    if($result == $condition['value'])
                    {
                        $data['step']=$condition['if_next_step'];
                        $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number'];
                        $data['next']=$path['next'];
                    }
                    else
                    {
                        $data['step']=$condition['else_next_step'];  
                        $st=$this->db->query('select * from pathflow where step='.$condition['else_next_step'])->result_array();
                        $path=$st[0];
                        $data['back']=$step['number']; 
                        $data['next']=$path['next'];
                    }
                break;
            }
            
        }
        elseif($step['type']=='flag')
        {
            //echo '6';exit;
            $result=$params['score'];
            $st=$this->db->query('select * from step_flag where step='.$step['number'])->result_array();
            $condition=$st[0];
            
            //echo '<pre>';print_r($condition);exit;
            $this->session->set_userdata('flag','red');
            $data['step']=$condition['if_next_step'];
            $st=$this->db->query('select * from pathflow where step='.$condition['if_next_step'])->result_array();
            $path=$st[0];
            $data['back']=$step['number'];
            $data['next']=$path['next'];
            
        }
        
        $st=$this->db->query('select questions.* from questions inner join step_questions on step_questions.question=questions.id where step='.$data['step'])->result_array();
        $data['question']=$st[0];
        //echo '<pre>';print_r($data); exit;
        
        return $data;
    }

    
    public function getBackPathwayQuestion($params)
    {
        $st=$this->db->select('*')->from('pathflow')
                ->where('pathway',$params['pathway'])
                ->where('step',$params['step'])
                ->where('next',$params['next'])
                ->get()->result_array();
        $data=$st[0];
        $st=$this->db->query('select questions.* from questions inner join step_questions on step_questions.question=questions.id where step='.$data['step'])->result_array();
        $data['question']=$st[0];
        //echo '<pre>';print_r($data); exit;
        return $data;
    }

    public function saveResult($data)
    {
        $item=array(
            'pathway'   => $data['pathway'],
            'step'      => $data['step'],
            'value'     => $data['score']
        );

        $st=$this->db->query('select * from step_answers where step='.$data['step'])->result_array();
        if(count($st)>0)
        {
            
            $this->db->where('step',$item['step'])->update('step_answers',$item);
        }
        else
        {
            
            $this->db->insert('step_answers',$item);
        }

    }

    public function getStepAnswer($step)
    {
        $st=$this->db->query('select * from step_answers where step='.$step)->result_array();
        if(count($st)>0)
        {
            return $st[0];
        }
        else
        {
            return array();
        }
    }

}