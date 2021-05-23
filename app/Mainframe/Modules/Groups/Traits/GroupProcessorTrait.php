<?php

namespace App\Mainframe\Modules\Groups\Traits;

use App\Mainframe\Modules\Groups\GroupProcessor;
use Artisan;

trait GroupProcessorTrait
{
    public function immutables()
    {
        return ['name'];
    }
    /*
    |--------------------------------------------------------------------------
    | Rules.
    |--------------------------------------------------------------------------
    |
    | Write the laravel validation rules
    */
    /**
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param       $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? (string) $element->id : 'null').',id,deleted_at,NULL',
            'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /*
   |--------------------------------------------------------------------------
   | Execute validation on module events
   |--------------------------------------------------------------------------
   |
   | Check validations on saving, creating, updating, deleting and restoring
   */
    /**
     * Run validations for saving. This should be common for both creating and updating.
     *
     * @param $element \App\Group
     * @return $this
     */
    public function saving($element)
    {
        $permissions = [];
        // revoke existing group permissions
        $existing_permissions = $element->getPermissions();
        if (count($existing_permissions)) {
            foreach ($existing_permissions as $k => $v) {
                $permissions[$k] = 0;
            }
        }

        // include new group permissions from form input
        foreach (request('permission', []) as $k) {
            $permissions[$k] = 1;
        }

        $element->permissions = array_merge($element->permissions, $permissions);

        return $this;
    }
    // public function creating($element) { return $this; }
    // public function updating($element) { return $this; }
    // public function created($element) { return $this; }
    /**
     * @param \App\Group $element
     * @return $this
     */
    public function updated($element) {
        if($this->fieldHasChanged('permissions')){
            $this->addMessage('Permission changed');
            Artisan::call('cache:clear');

        }
        return $this;
    }
    // public function saved($element) { return $this; }
    // public function deleting($element) { return $this; }
    // public function deleted($element) { return $this; }

    /*
    |--------------------------------------------------------------------------
    | Functions for deriving immutables & allowed transitions
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Other helper functions
    |--------------------------------------------------------------------------
    */
    // Todo: Other helper functions

    /*
    |--------------------------------------------------------------------------
    | Validation helper functions
    |--------------------------------------------------------------------------
    */

    // Todo: Functions for validation
}