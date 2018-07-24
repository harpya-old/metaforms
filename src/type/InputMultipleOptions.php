<?php

namespace harpya\metaform\type;


/**
 *
 * @todo Implement max/min number selected options (validation)
 *
 *
 * Class InputMultipleOptions
 * @package harpya\metaform\type
 */
class InputMultipleOptions extends \harpya\metaform\InputOptionsBase {


    public function render() {

        parent::render();
        return $this->getForm()->getView()->fetch('input_multiple_options.tpl');
    }


}