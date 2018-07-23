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
     * @param InputItem $parent
     */
    public function __construct($code=false, $title='',$parent=false) {
        if ($parent) {
            $parentID = $parent->getID();
        } else {
            $parentID = false;
        }
        $this->id = $this->generateID($parentID);
        self::$mapInputItems[$this->id] = $this;
        
        if (!$code) {
            $code = $this->getID();
        }
        $this->code = $code;
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
        echo " Rendering ". $this->getID();
    }
    
    
}