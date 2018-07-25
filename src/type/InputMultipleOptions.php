<?php

namespace harpya\metaform\type;


/**
 *
 *
 * Class InputMultipleOptions
 * @author Eduardo Luz
 * @package harpya\metaform\type
 */
class InputMultipleOptions extends \harpya\metaform\InputOptionsBase {


    protected $numMinOptionsSelected=0;
    protected $numMaxOptionsSelected=null;


    /**
     * @param int $num
     * @return $this
     */
    public function setNumMinOptions($num) {
        $this->numMinOptionsSelected = $num;
        return $this;
    }

    /**
     * @param int $num
     * @return $this
     */
    public function setNumMaxOptions($num) {
        $this->numMaxOptionsSelected = $num;
        return $this;
    }


    /**
     * @param mixed $value
     * @return $this|\harpya\metaform\InputOptionsBase
     */
    public function setValue($value)
    {
        parent::setValue($value);
        if (is_scalar($value)) {
            $list = [$value];
        } else {
            $list = (array) $value;
        }

        foreach ($list as $key) {
            if ($this->getOption($key)) {
                $this->getOption($key)->setSelected();
            }
        }


        return $this;
    }


    /**
     * @return string|void
     */
    public function render() {
        parent::render();
        return $this->getForm()->getView()->fetch('input_multiple_options.tpl');
    }


    public function getValidationJS()
    {
        $validationJS = '';

        $varNumSelectedOptions = sprintf("num%sSelected ",$this->getID());
        $varTriggerValidationError = sprintf("trigger%sValidationError ",$this->getID());


        $prefix =  sprintf("\n\n\n var $varNumSelectedOptions = \$('#%s  :checkbox:checked').length; ",$this->getID(),$this->numMinOptionsSelected);
        $prefix .= "\n var $varTriggerValidationError = false;";

        $sufix = sprintf("\n if ($varTriggerValidationError) { \$('#%s').children().addClass(\"has-error\"); return false;  }  ", $this->getID());


        if ($this->numMinOptionsSelected>0) {
         //   $validationJS .= "\n // Validation " . $this->getID(). " : at least ".$this->numMinOptionsSelected." options selected";
            $validationJS .= sprintf("\n if ($varNumSelectedOptions < %d) { console.log('Error ' + num%sSelected );  $varTriggerValidationError = true; }",$this->numMinOptionsSelected,$this->getID());
        }

        if ($this->numMaxOptionsSelected>0) {
         //   $validationJS .= "\n // Validation " . $this->getID(). " : no more than ".$this->numMaxOptionsSelected." options selected";
            $validationJS .= sprintf("\n if ($varNumSelectedOptions > %d) { console.log('Error ' + num%sSelected );  $varTriggerValidationError = true; }",$this->numMaxOptionsSelected,$this->getID());

        }

        if ($validationJS) {
            return $prefix . "\n" . $validationJS . "\n" . $sufix;
        } else {
            return '';
        }
    }


    /**
     * @return string
     */
    public function getEmptyErrorMessage() {
        if ($this->numMinOptionsSelected>0 && $this->numMaxOptionsSelected>0) {
            if ($this->numMinOptionsSelected == $this->numMaxOptionsSelected) {
                return sprintf("Please, select exactly %d options",$this->numMinOptionsSelected);
            } else {
                return sprintf("Please, select from %d to %d options",$this->numMinOptionsSelected,$this->numMaxOptionsSelected);
            }

        } elseif ($this->numMinOptionsSelected>0) {
            return sprintf("Please, select at least %d options",$this->numMinOptionsSelected);
        } elseif ($this->numMaxOptionsSelected>0) {
            return sprintf("Please, select no more than %d options",$this->numMaxOptionsSelected);
        }
    }

}