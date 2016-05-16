<?php

class UsersController extends AppController {
    var $name = "Users";
    var $helpers = array("Html");
    public $components = array("Session");
    
    function beforeFilter() {
        parent::beforeFilter();
    }
            
    function index(){
        $this->loadModel('Topic');
        $data = $this->Topic->find('all');
        $this->set('data',$data);
    }
    
    function user(){
        $data = $this->User->find('all');
        $this->set('data',$data);
    }
    
    function edit($id = null){
        if($this->request->is('get') && $id != 0){
            if(isset($id) && $id != null && $id != ''){
                $data = $this->User->find('all',
                        array(
                            'conditions' => array( "User.id" => $id )
                            )
                        );
                $this->set('data',$data);
            }
        }else{
            $this->set('data',null);
        }
        if($this->request->is('post')){
            $this->User->set($this->request->data);
            if($this->User->ValidateUser()){
                $this->User->save($this->request->data);
                $this->redirect('user');
            }else{
                $this->render();
            }
            
        }else{
            $this->render();
        }
    }
    
    function add($id = null){
        $this->loadModel('Topic');
        if($this->request->is('get') && $id != 0){
            if(isset($id) && $id != null){
                $data = $this->Topic->find('all',
                        array(
                            'conditions' => array( "Topic.id" => $id )
                            )
                        );
                $this->set('data',$data);
            }
        }else{
            $this->set('data',null);
        }
        if($this->request->is('post')){
            if($id == 0){
                $this->request->data['Topic']['create'] = date("Y-m-d H:i:s");
            }else{
                $this->request->data['Topic']['id'] = $this->request->data['User']['id'];
            }
            $this->request->data['Topic']['update'] = date("Y-m-d H:i:s");
            $this->request->data['Topic']['title'] = $this->request->data['User']['Title'];
            $this->request->data['Topic']['description'] = $this->request->data['User']['Description'];
            $this->request->data['Topic']['content'] = $this->request->data['User']['Content'];
            $this->Topic->set($this->request->data['Topic']);
            if($this->Topic->validateTopic()){
                $this->Topic->save($this->request->data);
                $this->redirect('index');
            }else{
                $this->Session->setFlash('Title not empty!');
                $this->render();
            }
        }else{
            $this->render();
        }
    }
    
    function delete($id){
        $this->loadModel('Topic');
        $this->Topic->delete($id);
        $this->redirect('index');            
    }
    
    function login(){
//        if($this->request->is('post')){
//            $username = $this->request->data['User']['username'];
//            $password = $this->request->data['User']['password'];
//            if(!isset($username) || !isset($password)
//                    || $username == null || $password == null){
//                $this->Session->setFlash('Bạn cần nhập username và password');
//                $this->render();
//            }else{
//                $data = $this->User->find("all",
//                    array(
//                        "conditions"=>array(
//                            "User.username"=>array($username),
//                            "User.password"=>array(md5($password))
//                        )
//                        ));
//                if(isset($data) && $data != null && $data != ""){
//                    $this->redirect('index');
//                }else{
//                    $this->Session->setFlash('Username hoặc Password không đúng-'.md5($password));
//                    $this->render();
//                }
//            }
//        }else{
//            $this->render();
//        }
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->redirect('index');
            }  else {
                $this->Session->setFlash('Username or password incorect!');
                $this->render();
            }
        }  else {
            $this->render();
        }
        
    }
    
    function logout(){
        $this->redirect($this->Auth->logout());
    }
    
}
