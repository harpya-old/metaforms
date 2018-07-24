<?php

namespace harpya\metaform;


class ItemOption {

    const STATE_ENABLED = 1;
    const STATE_DISABLED = 0;


    protected $key;
    protected $value;
    protected $state=1;


    public function __construct($key, $value=null)
    {
        $this->setKey($key);
        if ($value) {
            $this->setValue($value);
        } else {
            $this->setValue($key);
        }
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return ItemOption
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return ItemOption
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return ItemOption
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }





}
