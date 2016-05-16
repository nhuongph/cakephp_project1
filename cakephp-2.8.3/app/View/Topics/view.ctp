  <?php
   if($data==NULL){
     echo "<h2>Dada Empty</h2>";
   }
   else{
        echo "<div class='w_rap'>";
        echo "<h1>Blog</h1>";
        echo "<hr>";
        echo "<p>".$this->Html->link('Blog index', '/Topics/index')."</p>";
        foreach($data as $item){
            echo "<h1>".$item['Topic']['title']."</h1></a>";
            $date = new DateTime($item['Topic']['update']);
            echo "<p>Posted on ".$date->format('jS M Y')."</p>";
            echo $item['Topic']['content'];
        }
        echo '</div>';
  }
?>