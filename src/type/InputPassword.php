<?php

namespace harpya\metaform\type;

class InputPassword extends \harpya\metaform\InputItem {
    
    
    public function render() {
        
        parent::render();
        return $this->getForm()->getView()->fetch('input_password.tpl');
    }
    
    
}