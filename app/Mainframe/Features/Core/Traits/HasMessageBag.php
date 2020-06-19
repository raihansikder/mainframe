<?php

namespace App\Mainframe\Features\Core\Traits;

use Illuminate\Support\MessageBag;

trait HasMessageBag
{

    /** @var MessageBag */
    public $messageBag;

    public function messageBag()
    {
        $this->messageBag = resolve(MessageBag::class);

        return $this->messageBag;
    }

    public function setMessageBag($messageBag)
    {
        $this->messageBag = $messageBag;

        return $this;
    }

    public function addToMessageBag($bag, $data)
    {
        $this->messageBag()->add($bag, $data);

    }

    public function addMessageBagError($data)
    {
        $this->addToMessageBag('errors', $data);

    }

    /**
     * @param \Illuminate\Validation\Validator $validator
     */
    public function addMessageBagValidationError($validator)
    {
        $this->addToMessageBag('errors', ['validation_errors' => $validator->messages()->toArray()]);

    }

    public function addMessageBagMessage($data)
    {
        $this->addToMessageBag('messages', $data);

    }

    public function addMessageBagWarning($data)
    {
        $this->addToMessageBag('warnings', $data);
    }

    public function addMessageBagDebug($data)
    {
        $this->addToMessageBag('debug', $data);
    }

    public function getMessageBagErrors()
    {
        if (! $this->messageBag()->count()) {
            return null;
        }

        if (isset($this->messageBag()->messages()['errors'])) {
            return $this->messageBag()->messages()['errors'];
        }

        return null;
    }

    public function hasMessageBagErrors()
    {
        return $this->getMessageBagErrors() ? true : false;
    }
}