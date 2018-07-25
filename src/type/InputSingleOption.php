<?php

namespace harpya\metaform\type;

class InputSingleOption extends \harpya\metaform\InputOptionsBase {



    public function setValue($value)
    {
        parent::setValue($value);
        if (is_scalar($value)) {
            $list = [$value];
        } else {
            $list = (array) $value;
        }

        $key = reset($list);

        if ($this->getOption($key)) {
            $this->getOption($key)->setSelected();
        }

        return $this;
    }


    public function render() {

        parent::render();
        return $this->getForm()->getView()->fetch('input_single_option.tpl');
    }


}