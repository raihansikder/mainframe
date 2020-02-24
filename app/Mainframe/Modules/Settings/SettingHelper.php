<?php

namespace App\Mainframe\Modules\Settings;

/** @mixin \App\Mainframe\Modules\Settings\Setting $this */
trait SettingHelper
{
    /**
     * Get setting
     *
     * @param $name
     * @return array|bool|mixed|null|string
     */
    public static function read($name)
    {
        /** @var \App\Mainframe\Modules\Settings\Setting $setting */
        /** @noinspection PhpUndefinedMethodInspection */
        if ($setting = Setting::where('name', $name)->remember(timer('long'))->first()) {
            return $setting->getValue();
        }

        return null;
    }

    /**
     * Function to get the setting value. The value can be boolean, string, array(json) or files
     */
    public function getValue()
    {
        // if (!isset($this->value)) {
        //     return null;
        // }

        $val = $this->value;
        switch ($this->type) {
            case 'boolean':
                $val = $this->value == 'true';
                break;
            case 'string':
                $val = $this->value;
                break;
            case 'array':
                $val = json_decode($this->value, true);
                break;
            case 'file':
                $files = [];
                if ($this->uploads()->exists()) {
                    foreach ($this->uploads as $upload) {
                        $files[] = $upload->url;
                    }
                }
                $val = $files;
                break;
        }

        return $val;
    }
}