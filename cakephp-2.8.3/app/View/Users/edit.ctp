  <?php
    echo $this->Html->css('mycss');
    echo "<div class='w_rap'>";
    echo "<h1>Blog</h1>";
    echo "<ul class='ul'><li>".$this->Html->link('Blog', '/Users/index/')."</li>";
    echo "<li>".$this->Html->link('Users', '/Users/user/')."</li>";
    echo "<li>".$this->Html->link('View Website', '/Topics/index/')."</li>";
    echo "<li>".$this->Html->link('Logout', '/Users/logout/')."</li></ul>";
    echo "<hr>";
    echo "<br>";
    echo "<br>";
    echo "<p>".$this->Html->link('User Admin Index', '/Users/user/')."</p>";
    if(!isset($data) || $data==NULL){
        echo $this->Form->create();
        echo $this->Form->input('username',array('label'=>'Username'));
        echo $this->Form->input('password',array('label'=>'Password (only to change)'));
        echo $this->Form->input('repassword',array('label'=>'Confirm Password','type'=>'password'));
        echo $this->Form->input('email',array('label'=>'Email','type' => 'email'));
        echo $this->Form->end("Submit");
    }
    else{
        foreach($data as $item){        
            echo $this->Form->create();
            echo $this->Form->input('username',array('label'=>'Username','value'=>$item['User']['username']));
            echo $this->Form->input('id',array('type'=>'hidden','value'=>$item['User']['id']));
            echo $this->Form->input('password',array('label'=>'Password (only to change)'));
            echo $this->Form->input('repassword',array('label'=>'Confirm Password','type'=>'password'));
            echo $this->Form->input('email',array('label'=>'Email','value'=>$item['User']['email'],'type' => 'email'));
            echo $this->Form->end("Submit");
        }
        
    }
    echo '</div>';
?>