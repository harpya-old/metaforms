<?php

namespace harpya\metaform;

class Form {
    
    protected $title = '';
    protected $items = [];
    protected $values = [];
    protected $theme = 'default';
    protected $smarty;
    
    protected $action;
    protected $method = 'POST';
    protected $contents = '';
    protected $actionBar;



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

        $this->setContents($contents);

        $this->getView()->assign('form', $this);
        $result = $this->getView()->fetch('form.tpl');
        return $result;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return Form
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return Form
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param string $contents
     * @return Form
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getActionBar()
    {
        return $this->actionBar;
    }

    /**
     * @param mixed $actionBar
     * @return Form
     */
    public function setActionBar($actionBar)
    {
        $this->actionBar = $actionBar;
        return $this;
    }






    
    public function assignValues($values=[]) {
        // iterate this list to fill each field with 
    }
    
}
