<?php

namespace App\Mainframe\Modules\Settings;

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
        /** @var \App\Setting $setting */
        /** @noinspection PhpUndefinedMethodInspection */
        if ($setting = self::where('name', $name)->remember(cacheTime('short'))->first()) {
            return $setting->settingValue();
        }

        return null;
    }

    /**
     * Function to get the setting value. The value can be boolean, string, array(json) or files
     */
    public function settingValue()
    {
        $val = $this->value;
        switch ($this->type) {
            case 'boolean':
                $val = $this->value === 'true';
                break;
            case 'string':
                $val = $this->value;
                break;
            case 'array':
                $val = json_decode($this->value, true);
                break;
            case 'file':
                $files = [];
                /** @noinspection PhpUndefinedMethodInspection */
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