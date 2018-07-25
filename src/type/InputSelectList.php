<?php

namespace harpya\metaform\type;

class InputSelectList extends \harpya\metaform\InputOptionsBase {


    public function render() {

        parent::render();
        return $this->getForm()->getView()->fetch('input_select_list.tpl');
    }


}