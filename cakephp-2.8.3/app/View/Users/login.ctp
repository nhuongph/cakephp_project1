<?php
    echo $this->Form->create('User',array('url'=>'login'));
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end("Submit");
?>