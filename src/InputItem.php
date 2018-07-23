<?php

namespace harpya\metaform;


/**
 * 
 */
class InputItem {

    protected static $seedID;
    protected static $sequence=0;
    
    protected static $mapInputItems = [];
    
    protected $id;
    protected $type;
    protected $code;
    protected $title;
    protected $description;
    protected $hint;
    
    /**
     *
     * @var Form 
     */
    protected $form;

    /**
     *
     * @var InputItem 
     */
    protected $parent;
    

    /**
     * 
     * @param int $parentID
     * @return string
     */
    public static function generateID($parentID=false) {
        
        if (!self::$seedID) {
            self::$seedID = crc32(microtime(true) . random_bytes(10));
        }
        
        $id = sprintf("%s%03d",self::$seedID,self::$sequence++);
        
        if ($parentID) {
            $id = $parentID.".".$id;
        }
        return $id;
    }
    
    /**
     * 
     * @return \harpya\metaform\Form
     */
    public function getForm() {
        return $this->form;
    }
    
    
    /**
     * 
     * @param \harpya\metaform\Form $form
     * @param string $code
     * @param string $title
     * @param \harpya\metaform\InputItem $parent
     */
    public function __construct(\harpya\metaform\Form $form = null, $code=false, $title='',InputItem $parent=null) {
        $ignoreAddItem = false;
        
        if ($form) {
            $this->form = $form;            
        }
        
        
        if ($parent) {
            $parentID = $parent->getID();
            $parentCode = $parent->code;
            $this->parent = $parent;  
            
            /**
             * If this item does not have form, but the parent component does, then
             * just assign the parent's form to this component.
             */ 
            if (!$form && $parent->getForm()) {
                $this->form = $parent->getForm();
                // But does not perform the auto-add item to this form (because 
                // was already added by parent container)
                $ignoreAddItem = true;
            }
            
        } else {
            $parentID = false;
            $parentCode = false;
        }
        $this->id = $this->generateID($parentID);
        self::$mapInputItems[$this->id] = $this;
        
        if (!$code) {
            $code = $this->getID();
        }
        
        if ($parentCode) {
            $code = $parentCode . "." . $code;
        }
        
        $this->code = $code;
        
        if ($title) {
            $this->title = $title;
        }
        
        
        if ($this->getForm() && !$ignoreAddItem) {
            $this->getForm()->addItem($this);
        }
        
        if ($parentID) {
            $parent->addChild($this);
        }
        
    }
    
    /**
     * 
     * @return int
     */
    public function getID() {
        return $this->id;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    
    /**
     * 
     */
    public function render() {
        $reg = [
            'id' => $this->getID(),
            'code'=>$this->code,
            'title' => $this->title
        ];
        
        
        if ($this->getForm()) {
            $this->getForm()->getView()->assign('field', $reg);
//        } elseif ($this->parent && $this->parent->getForm()) {
//            $this->parent->getForm()->getView()->assign('field', $reg);            
        }

    }
    
    
}