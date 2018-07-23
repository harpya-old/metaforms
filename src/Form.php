<?php

namespace harpya\metaform;

class Form {
    
    
    protected $items = [];
    protected $values = [];
    protected $theme = 'default';
    protected $smarty;
    
    protected $action;
    protected $method = 'POST';




    public function __construct($action='/', $method='POST') {
        
        $this->smarty = new \Smarty();
        $this->smarty->setCompileDir("../tmp/tpl_compile/");
        $this->smarty->setTemplateDir(__DIR__."/../tpl/" . $this->theme.'/');
        
        $this->action = $action;
        $this->method = $method;
    }
    
    /**
     * 
     * @return \Smarty
     */
    public function getView() {
        return $this->smarty;
    }
    
    
    /**
     * 
     * @param InputItem $item
     */
    public function addItem(InputItem $item) {
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
        
        $contents = '';
        foreach ($this->items as $id => $item) {
            $contents .= "\n". $item->render();
        }
        
        $form = [
            'action' => $this->action,
            'method' => $this->method,
            'contents' => $contents                
        ];
        
        $this->getView()->assign('form', $form);
        $result = $this->getView()->fetch('form.tpl');
        return $result;
    }
    
    
    public function assignValues($values=[]) {
        // iterate this list to fill each field with 
    }
    
}
