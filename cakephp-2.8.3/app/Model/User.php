<?php

class User extends AppModel {

    var $name = "User";

    function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password']))
            $this->data[$this->alias]['password'] = md5($this->data[$this->alias]['password']);
        return true;
    }

    function validateUser() {
        $this->validate = array(
            'username' => array(
                'val_1' => array(
                    'rule' => 'notBlank',
                    'message' => 'User name không được để trống!',
                ),
                'val_2' => array(
                    'rule' => "/^[a-zA-Z0-9]{4,}$/i",
                    'message' => 'User phải là chữ hoặc số và ít nhất là 4 ký tự.',
                ),
                'val_3' => array(
                    'rule' => 'checkUsername', //gọi hàm check username
                    'message' => 'Tên đăng nhập đã có người đăng ký.',
                ),
            ),
            'password' => array(
                'val_1' => array(
                    'rule' => 'notBlank',
                    'message' => 'Mật khẩu không được rỗng.',
                    'on' => 'create',
                ),
            ),
            'repassword' => array(
                'val_1' => array(
                    'rule' => 'notBlank',
                    'message' => 'Mật khẩu không được rỗng.',
                    'on' => 'create',
                ),
                'val_2' => array(
                    'rule' => 'comparePass', //gọi function để check pass nhập lại
                    'message' => 'Password confirm không chính xác.'
                ),
            ),
            'email' => array(
                'val_1' => array(
                    'rule' => 'email',
                    'message' => 'Email không hợp lệ.',
                ),
            )
        );

        if ($this->validates($this->validate)) {
            return true;
        } else {
            return false;
        }
    }

    function comparePass() {
        if ($this->data['User']['password'] != $this->data['User']['repassword']) {
            return false;
        } else {
            return true;
        }
    }

    function checkUsername() {
        if (isset($this->data['User']['id'])) {
            $where = array(
                'id != ' => $this->data['User']['id'],
                'username' => $this->data['User']['username'],
            );
        } else {
            $where = array(
                'username' => $this->data['User']['username'],
            );
        }

        $this->find('first', array(
            'conditions' => $where
        ));
        $count = $this->getNumRows();
        if ($count != 0) {
            return false;
        } else {
            return true;
        }
    }

}

?>