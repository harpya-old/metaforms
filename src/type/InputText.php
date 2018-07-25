<?php

namespace harpya\metaform\type;

class InputText extends \harpya\metaform\InputItem {
    
    
    public function render() {
        
        parent::render();
        return $this->getForm()->getView()->fetch('input_text.tpl');        
    }

    public function getValidationJS() {
        if ($this->isRequired()) {
            return "\n// ". $this->getID()." is required";
        }
    }
}