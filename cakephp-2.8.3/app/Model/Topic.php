<?php

class Topic extends AppModel {

    var $name = "Topic";

    function validateTopic() {
        $this->validate = array(
            'title' => array(
                'val_1' => array(
                    'rule' => 'notBlank',
                    'message' => 'Title không được để trống!',
                )
            )
        );
        
        if ($this->validates($this->validate)) {
            return true;
        } else {
            return false;
        }
    }

}

?>