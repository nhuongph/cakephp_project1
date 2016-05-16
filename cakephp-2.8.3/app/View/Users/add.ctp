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
    echo "<p>".$this->Html->link('Blog Admin Index', '/Users/index/')."</p>";
    if(!isset($data) || $data==NULL){
        echo $this->Form->create();
        echo $this->Form->input('Title');
        echo $this->Form->input('Description',array('type'=>'Textarea'));
        echo $this->Form->input('Content',array('type'=>'Textarea'));
        echo $this->Form->end("Submit");
    }
    else{
        foreach($data as $item){        
            echo $this->Form->create();
            echo $this->Form->input('Title',array('value'=>$item['Topic']['title']));
            echo $this->Form->input('id',array('type'=>'hidden','value'=>$item['Topic']['id']));
            echo $this->Form->input('Description',array('type'=>'Textarea','value'=>$item['Topic']['description']));
            echo $this->Form->input('Content',array('type'=>'Textarea','value'=>$item['Topic']['content']));
            echo $this->Form->end("Submit");
        }
        
    }
    echo '</div>';
?>
<script>tinymce.init({ selector:'textarea' });</script>