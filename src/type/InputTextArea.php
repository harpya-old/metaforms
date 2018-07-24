<?php

namespace harpya\metaform\type;

class InputTextArea extends \harpya\metaform\InputItem {
    
    
    public function render() {
        
        parent::render();
        return $this->getForm()->getView()->fetch('input_textarea.tpl');
    }
    
    
}