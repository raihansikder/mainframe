<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;
/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this  */
trait RelatedUsersTrait
{
    /**
     * Returns array of user ids including creator and updater user ids.
     * This can be overridden in different modules as per business.
     *
     * @return array
     */
    public function relatedUserIds()
    {
        $user_ids = []; // Init array to store all user ids
        if (isset($this->creator->id)) {
            $user_ids[] = $this->creator->id;
        }
        //get the creator
        //if the creator and updater is same no need to add the id twice
        if (isset($this->updater->id, $this->creator->id) && $this->creator->id !== $this->updater->id) {
            $user_ids[] = $this->updater->id;
        } //get the updater

        return $user_ids;
    }
}