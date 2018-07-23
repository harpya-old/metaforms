<?php

namespace harpya\metaform\type;

class InputText extends \harpya\metaform\InputItem {
    
    
    public function render() {
        echo "<div><label for='".$this->getID()."' >".$this->title."<br/>";
        echo "<input type='text' name='".$this->getID()."' id='".$this->getID()."' >";
        echo "</label></div>";
        
    }
    
    
}