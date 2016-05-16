<?php
if($data==NULL){
     echo "<h2>Dada Empty</h2>";
}
else{
    echo "<div class='w_rap'>";
        echo "<h1>Blog</h1>";
        echo "<hr>";
        foreach($data as $item){
            $id = $item['Topic']['id'];
            echo "<h1>".$this->Html->link($item['Topic']['title'], '/Topics/view/'.$id)."</h1></a>";
            $date = new DateTime($item['Topic']['update']);
            echo "<p>Posted on ".$date->format('jS M Y h:i:s')."</p>";
            echo "<p>".$item['Topic']['description']."</p>";
            echo "<p>".$this->Html->link('Read More', '/Topics/view/'.$id)."</p>";
        }
	echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
	echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
	echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
	echo " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
    echo '</div>';
}
?>