<?php

namespace App\Mainframe\Features\Core\Traits;

use Illuminate\Support\MessageBag;

trait HasMessageBag
{

    /** @var MessageBag */
    public $messageBag;

    /**
     * Retrieve the singleton messageBag
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Support\MessageBag|mixed
     */
    public function messageBag()
    {
        $this->messageBag = resolve(MessageBag::class);

        return $this->messageBag;
    }

    /**
     * @param $messageBag
     * @return $this
     */
    public function setMessageBag($messageBag)
    {
        $this->messageBag = $messageBag;

        return $this;
    }

    /**
     * Add message to different keys.
     *
     * @param $bag
     * @param $data
     * @return $this
     */
    public function addToMessageBag($bag, $data)
    {
        $this->messageBag()->add($bag, $data);

        return $this;

    }

    /**
     * Add message under the 'errors' key
     *
     * @param $data
     * @return $this
     */
    public function addError($data)
    {
        $this->addToMessageBag('errors', $data);

        return $this;

    }

    /**
     * Add/Merge all the  errors from a validator instance
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return $this
     */
    public function addValidatorErrors($validator)
    {
        $this->addToMessageBag('errors', ['validation_errors' => $validator->messages()->toArray()]);

        return $this;
    }

    /**
     * Add message under the 'messages' key
     *
     * @param $data
     * @return $this
     */
    public function addMessage($data)
    {
        $this->addToMessageBag('messages', $data);

        return $this;
    }

    /**
     * Add message under the 'warnings' key
     *
     * @param $data
     * @return $this
     */
    public function addWarning($data)
    {
        $this->addToMessageBag('warnings', $data);

        return $this;
    }

    /**
     * Add message under the 'debug' key
     *
     * @param $data
     * @return $this
     */
    public function addDebug($data)
    {
        $this->addToMessageBag('debug', $data);

        return $this;
    }

    /**
     * Get messages of a given key
     * @param $key
     * @return mixed|null
     */
    public function getMessages($key)
    {
        if (! $this->messageBag()->count()) {
            return null;
        }

        $messages = $this->messageBag()->messages();

        return $messages[$key] ?? null;

    }

    /**
     * Checks if a key has any message
     * @param $key
     * @return bool
     */
    public function hasMessages($key)
    {
        return $this->getMessages($key) ? true : false;
    }

    /**
     * Get all the entries under 'errors' key
     *
     * @return mixed|null
     */
    public function getErrors()
    {
        return $this->getMessages('errors');
    }

    /**
     * Check if messageBag has any error
     *
     * @return bool
     */
    public function hasErrors()
    {
        return $this->getMessages('errors') ? true : false;
    }
}