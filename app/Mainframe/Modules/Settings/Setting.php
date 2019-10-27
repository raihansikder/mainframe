<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Helpers\Modular\BaseModule\BaseModule;

/**
 * Class Setting
 */
class Setting extends BaseModule
{
    protected $fillable = [
        'uuid',
        'name',
        'title',
        'type',
        'description',
        'value',
        'is_active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'deleted_by',
    ];

    /**
     * @var array Options for setting type
     */
    public static $types = [
        'boolean' => 'Boolean',
        'string' => 'String',
        'array' => 'Array',
        'file' => 'File',
    ];

    /**
     * Automatic eager load relation by default (can be expensive)
     *
     * @var array
     */
    // protected $with = ['relation1', 'relation2'];

    ############################################################################################
    # Model events
    ############################################################################################

    public static function boot()
    {
        parent::boot();
        self::observe(SettingObserver::class);
    }


    ############################################################################################
    # Helper functions
    ############################################################################################

    /**
     * Get setting
     *
     * @param $name
     * @return array|bool|mixed|null|string
     */
    public static function read($name)
    {
        /** @var \App\Setting $setting */
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
