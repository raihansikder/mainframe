<?php

namespace App\Mainframe\Features\DynamicContents;

trait DynamicContentTrait
{

    /**
     * View blade location
     *
     * @var string
     */
    public $view;

    /**
     * Unique identifier
     *
     * @var string
     */
    public $key;

    public $content;

    public function replace()
    {
        return [
            '[KEY]' => '\'[KEY]\' has been replaced by new content '.$this->key(),
        ];
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function source()
    {
        if ($this->view) {
            return view($this->view)->render();
        }

        return "<h1>[KEY]</h1>";
    }

    /**
     * @return mixed|string
     * @throws \Throwable
     */
    public function process()
    {
        return $this->replaceKeys();
    }

    /**
     * @return mixed|string
     * @throws \Throwable
     */
    public function replaceKeys()
    {
        return multipleStrReplace($this->source(), $this->replace());
    }

    public function setKey()
    {
        $this->key = $this->key();

        return $this;
    }

    /**
     * @return string
     */
    public function key()
    {
        if ($this->key) {
            return $this->key;
        }

        $path = explode('\\', get_class($this));

        return kebab_case(array_pop($path));
    }

}