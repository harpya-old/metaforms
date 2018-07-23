<?php

namespace harpya\metaform;

class Form {
    
    
    protected $items = [];
    protected $values = [];
    
    /**
     * 
     * @param InputItem $item
     */
    public function addItem(InputItem $item) {
        
//        if (array_key_exists('id', $item)) {
//            $id = $item['id'];
////        } else {
////            $id = $this->generateID();
//        }
        $id = $item->getID();
        $this->items[$id] = $item;
        return $this;
    }
    
    
    /**
     * 
     * @param type $id
     * @return \harpya\metaform\InputItem
     */
    public function getItem($id) : InputItem {
        return $this->items[$id];
    }
    
    
    /**
     * 
     * @param type $values
     */
    public function render($values=[]) {
        
        $this->assignValues($values);
        
        foreach ($this->items as $id => $item) {
            $item->render();
        }
    }
    
    
    public function assignValues($values=[]) {
        // iterate this list to fill each field with 
    }
    
}
