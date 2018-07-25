<?php
/**
 * Created by PhpStorm.
 * User: eduardoluz
 * Date: 2018-07-24
 * Time: 8:45 AM
 */

namespace harpya\metaform\button;


use harpya\metaform\ActionBar;

class ButtonBase
{
    /**
     * @var ActionBar
     */
    protected $container;
    protected $id;
    protected $type;
    protected $title;
    protected $uri;


    public function __construct( ActionBar $container=null)
    {
        if ($container) {
            $this->container = $container;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ButtonBase
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return ButtonBase
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return ButtonBase
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return ActionBar
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ActionBar $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     * @return ButtonBase
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }





    public function render() {
        if ($this->getContainer()) {
            $view = $this->getContainer()->getForm()->getView();
            $view->assign('btn',$this);
        }
    }

}