<?php
/**
 * Created by PhpStorm.
 * User: eduardoluz
 * Date: 2018-07-24
 * Time: 8:39 AM
 */

namespace harpya\metaform;


use harpya\metaform\button\ButtonBase;

class ActionBar
{
    protected $actionItemList = [];

    /**
     *
     * @var Form
     */
    protected $form;

    /**
     *
     * @return \harpya\metaform\Form
     */
    public function getForm() {
        return $this->form;
    }

    public function __construct(Form $form, $title=null)
    {
        $this->form = $form;
    }


    public function addActionItem(ButtonBase $item) {
        $id = $item->getID();
        $this->actionItemList[$id] = $item;
    }


    public function getActionItems() {
        return $this->actionItemList;
    }


    public function render() {

        if ($this->getForm()) {
            $this->getForm()->getView()->assign('actionBar', $this);
            return $this->getForm()->getView()->fetch('action_bar.tpl');
        }

    }

}