<?php

namespace App\Mainframe\Modules\Changes;

use Illuminate\Support\Str;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;

trait ChangeHelper
{
    /**
     * Get changes of a model and store in session.
     *
     * @param  \App\Http\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     */
    public static function keepChangesInSession($element)
    {
        \Session::put('model-changes', Change::getDifferences($element));
    }

    /**
     * Get the changes in an array
     *
     * @param  \App\Http\Mainframe\Features\Modular\BaseModule\BaseModule  $filled_element
     * @param  array  $except
     * @return array
     */
    public static function getDifferences($filled_element, $except = ['updated_at'])
    {
        /** @var BaseModule $Model */

        $changes = [];
        if (isset($filled_element->id)) {
            $new_values = $filled_element->getDirty();
            $Model = get_class($filled_element);
            $original = $Model::find($filled_element->id);

            $i = 0;
            foreach ($new_values as $attribute => $value) {
                if (! in_array($attribute, $except) && $original->$attribute != $value) {
                    $old_value = $original->$attribute;
                    if (is_array($old_value)) {
                        $old_value = json_encode($old_value);
                    }

                    $new_value = $value;
                    if (is_array($new_value)) {
                        $new_value = json_encode($new_value);
                    }

                    $changes[$i] = [
                        "field" => $attribute,
                        "old" => $old_value,
                        "new" => $new_value,
                    ];
                    $i++;
                }
            }

            return $changes;
        }
    }

    /**
     * Fetch changes that are stored in session and save in database.
     *
     * @param  string  $change_name
     * @param  \App\Http\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @param  string  $desc
     */
    public static function storeChangesFromSession($change_name = "", $element, $desc = "")
    {
        if (\Session::has('model-changes')) {
            Change::storeChanges($change_name, $element, \Session::get('model-changes'), $desc);
        }
    }

    /**
     * @param  string  $change_name  : assign a meaningful name of the change
     * @param  \App\Http\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @param  array  $changes
     * @param  string  $desc
     * @internal param array $change_items
     */
    public static function storeChanges($change_name = '', $element, $changes = [], $desc = "")
    {
        if (isset($element->id) && count($changes)) {
            $change_set = Str::random(8);
            if ($module = Module::whereName(moduleName(get_class($element)))->first()) {
                foreach ($changes as $change) {
                    if (is_array($change['new'])) {
                        $change['new'] = implode(',', $change['new']);
                    }
                    if (is_array($change['old'])) {
                        $change['old'] = implode(',', $change['old']);
                    }

                    $change = Change::create([
                        "name" => $change_name,
                        "change_set" => $change_set,
                        "module_id" => $module->id,
                        "module_name" => $module->name,
                        "element_id" => $element->id,
                        "element_uuid" => $element->uuid,
                        "field" => $change['field'],
                        "old" => $change['old'],
                        "new" => $change['new'],
                        "desc" => $desc,
                        "created_by" => $element->updated_by,
                        "updated_by" => $element->updated_by,
                    ]);
                }
            }
        }
    }

    /**
     * Store a log entry when a new element is created
     *
     * @param  BaseModule  $element
     * @param  string  $details
     */
    public static function storeCreateLog($element, $details = "")
    {
        if (isset($element->id)) {
            $change_set = Str::random(8);
            if ($module = Module::whereName($element->module()->name)->remember(timer('long'))->first()) {
                $change = Change::create([
                    "name" => "Create new ".get_class($element),
                    "change_set" => $change_set,
                    "module_id" => $module->id,
                    "module_name" => $module->name,
                    "element_id" => $element->id,
                    "element_uuid" => $element->uuid,
                    //"event" => "Create",
                    // "details" => $details,
                    "created_by" => $element->updated_by,
                    "updated_by" => $element->updated_by,
                ]);
            }
        }
    }
}