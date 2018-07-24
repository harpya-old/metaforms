<?php

namespace harpya\metaform\type;

class InputNumeric extends \harpya\metaform\InputItem {


    public function render() {

        parent::render();
        return $this->getForm()->getView()->fetch('input_numeric.tpl');
    }


}