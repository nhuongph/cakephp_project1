  <?php
    echo $this->Html->css('mycss');
    echo "<div class='w_rap'>";
    echo "<h1>Blog</h1>";
    echo "<ul class='ul'><li>".$this->Html->link('Blog', '/Users/index/')."</li>";
    echo "<li>".$this->Html->link('Users', '/Users/user/')."</li>";
    echo "<li>".$this->Html->link('View Website', '/Topics/index/')."</li>";
    echo "<li>".$this->Html->link('Logout', '/Users/logout/')."</li></ul>";
    echo "<hr>";
    if($data==NULL){
      echo "<h2>Dada Empty</h2>";
    }
    else{
        echo "<br><table>"
        . "<tr>"
                . "<th>Username</th>"
                . "<th>Email</th>"
                . "<th>Action</th>"
        . "</tr>";
        foreach($data as $item){
            echo '<tr>';
                echo "<td>".$item['User']['username']."</td>";
                echo "<td>".$item['User']['email']."</td>";
                echo "<td>".$this->Html->link('Edit', '/Users/edit/'.$item['User']['id'])
                     ."</td>";
            echo '</tr>';
        }
        echo '</table>';
        
    }
    echo "<p>".$this->Html->link('Add User', '/Users/edit/')."</p>";
    echo '</div>';
?>