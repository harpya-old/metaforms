<?php


namespace harpya\metaform;


/**
 *
 */
class InputOptionsBase extends InputItem {

    protected $options = [];

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }


    /**
     * @param $key
     * @return ItemOption
     */
    public function getOption($key) {
        if (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        }
    }


    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }


    /**
     * @param $key
     * @param $title
     * @return $this
     */
    public function addOption($key,$title=null) {
        $this->options[$key] = new ItemOption($key,$title);
        return $this;
    }





}