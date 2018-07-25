<?php

namespace harpya\metaform;

class Form {

    protected $id;
    protected $title = '';
    protected $items = [];
    protected $values = [];
    protected $theme = 'default';
    protected $smarty;

    protected $validationJS;
    protected $action;
    protected $method = 'POST';
    protected $contents = '';
    protected $actionBar;


    /**
     * Form constructor.
     * @param string $action
     * @param string $method
     * @param bool $id
     */
    public function __construct($action='/', $method='POST', $id=false) {
        
        $this->smarty = new \Smarty();
        $this->smarty->setCompileDir("../tmp/tpl_compile/");
        $this->smarty->setTemplateDir(__DIR__."/../tpl/" . $this->theme.'/');
        
        $this->action = $action;
        $this->method = $method;

        if (!$id) {
            $this->id = md5(microtime(true));
        }
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




    public function getValidationJS($force=false) {
        if (!$this->validationJS || $force) {

            $validationJS = '';

            foreach ($this->items as $id => $item) {
                $validationJS .= $item->getValidationJS();
            }

            $this->validationJS = trim($validationJS);

        }
        return $this->validationJS;
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
     * @return ActionBar
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

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Form
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }





    /**
     * @return string
     */
    public function getScriptJS() {
        $this->getView()->assign('form',$this);
        return $this->getView()->fetch('form_script_js.tpl');
    }





    
    public function assignValues($values=[]) {
        // iterate this list to fill each field with 
    }
    
}
