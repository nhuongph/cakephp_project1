<?php

class TopicsController extends AppController {
    var $name = "Topics";
    var $helpers = array("Html","Paginator");
    public $layout = "mylayout";
    public $paginate = array();
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');
    }
            
    function index(){
//        $data = $this->Topic->find("all");
        $this->paginate = array(
            'limit' => 4,
            'order' => array('id' => 'asc')
        );
        $data = $this->paginate('Topic');
        $this->set('data',$data);
    }
    
    function view($id){
        $data = $this->Topic->find("all",array(
            'conditions' => array( "Topic.id" => $id )
                                            )
                                  );
        $this->set('data',$data);
    }
}
?>