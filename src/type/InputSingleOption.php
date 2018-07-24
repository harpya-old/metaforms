<?php

namespace harpya\metaform\type;

class InputSingleOption extends \harpya\metaform\InputOptionsBase {


    public function render() {

        parent::render();
        return $this->getForm()->getView()->fetch('input_single_option.tpl');
    }


}