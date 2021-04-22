<?php

namespace App\Mainframe\Commands;

use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Query\Builder;

class FixPolymorphicType extends MakeMainframeModule
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mainframe:fix-polymorphic-type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command links existing polymorphic model to a root model i.e. App\User instead of App\\Projects\\...\\User';

    protected $polymorphicTableFields = [
        'audits' => 'auditable_type',
        'changes' => 'changeable_type',
        'comments' => 'commentable_type',
        'in_app_notifications' => 'notifiable_type',
        'notifications' => 'notifiable_type',
        // 'push_notifications' => 'notifiable_type',
        'uploads' => 'uploadable_type',
        'spreads' => 'spreadable_type',
    ];

    /**
     * Execute the console command.
     *
     * @return mixed|null
     */
    public function handle()
    {

        $modules = Module::all();

        foreach ($this->polymorphicTableFields as $table => $field) {
            $this->info("Fixing $table.$field ...");
            foreach ($modules as $module) {
                \DB::table($table)->where(function (Builder $q) use ($field, $module) {
                    $q->where($field, 'LIKE', "%".$module->modelClassName());
                })->update([
                    $field => 'App\\'.class_basename($module->model),
                ]);
            }
        }

        $this->info('... Done');

    }

}
