<?php


namespace harpya\metaform\type;

class GroupItems extends \harpya\metaform\InputItem {
    

    protected $children = [];
    
    
    public function addChild($field) {
        $this->children[] = $field;
    }
    
    public function getChildren() {
        //print_r($this->children);
        return $this->children;
    }
    
    
    public function render() {
        
        $this->getForm()->getView()->assign('group', $this);
        
        return $this->getForm()->getView()->fetch('group_items.tpl');        
    }
    
    
}

