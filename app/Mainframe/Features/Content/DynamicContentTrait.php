<?php

namespace App\Mainframe\Features\Content;

use App\Content;

/** @mixin DynamicContent $this */
trait DynamicContentTrait
{
    /**
     * View blade location
     *
     * @var string
     */
    public $view;

    /** @var string */
    public $text;

    /**
     * Unique identifier
     *
     * @var string
     */
    public $key;

    /**
     * Segment keys with original contents
     *
     * @var array
     */
    public $segments = [];

    /**
     * Segment keys with new contents
     *
     * @var array
     */
    public $replaced = [];

    /**
     * Map array for key based string replace
     *
     * @return array
     */
    public function replace()
    {
        return [
            '{KEY}' => $this->key(),
        ];
    }

    /**
     * Store all the replaced content in $replaced array
     *
     * @return DynamicContentTrait|mixed|string
     * @throws \Throwable
     */
    public function process()
    {
        return $this->setSegments()->replaceKeys();
    }

    /**
     * Set the segments based on content source
     *
     * @return $this
     * @throws \Throwable
     */
    public function setSegments()
    {
        // Source is view blade
        if ($this->view) {
            $this->segments[$this::DEFAULT_BODY] = view($this->view)->render(); // 'body' is the default part

            return $this;
        }

        // Source is text string
        if ($this->text) {
            $this->segments[$this::DEFAULT_BODY] = $this->text; // 'body' is the default part

            return $this;

        }

        if ($content = $this->content()) {
            $this->segments[$this::DEFAULT_BODY] = $content->body;
            $this->segments[$this::DEFAULT_TITLE] = $content->title;

            $this->segments = array_merge($this->segments, $content->parts_array);

            return $this;
        }

        $this->segments[$this::DEFAULT_BODY] = '';

        return $this;

    }

    /**
     * Replace
     *
     * @return mixed|string
     * @throws \Throwable
     */
    public function replaceKeys()
    {
        foreach ($this->segments as $k => $v) {
            $this->replaced[$k] = multipleStrReplace($v, $this->replace());
        }

        return $this;
    }

    /**
     * Setter for key
     *
     * @param  null  $key
     * @return $this
     */
    public function setKey($key = null)
    {
        $this->key = $key ?: $this->key();

        return $this;
    }

    /**
     * Derive the key
     *
     * @return string
     */
    public function key()
    {
        if ($this->key) {
            return $this->key;
        }

        $path = explode('\\', get_class($this));

        return \Str::kebab(array_pop($path));
    }

    /**
     * Get the replaced content part. If not parameter selected then 'body' will be returned.
     *
     * @param  string  $part
     * @return mixed|string
     * @throws \Throwable
     */
    public function get($part = null)
    {
        $part = $part ?? $this::DEFAULT_BODY;

        if ($content = $this->part($part)) {
            return $content;
        }

        return $this->process()->part($part);

    }

    /**
     * Get the replaced content part from $replaced array. If not parameter selected then 'body' will be returned.
     *
     * @param  null  $part
     * @return mixed|null
     */
    public function part($part = null)
    {
        $part = $part ?? $this::DEFAULT_BODY;

        return $this->replaced[$part] ?? null;
    }

    /**
     * Get the content object from database
     *
     * @return Content|mixed|null
     */
    public function content()
    {
        return Content::where('key', $this->key())->remember(timer('short'))->first();
    }

    /**
     * @param  string  $text
     * @return DynamicContentTrait
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

}