<?php

namespace App\Mainframe\Commands;

use App\Module;
use File;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class CreateRootModels extends MakeMainframeModule
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mainframe:create-root-models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create models in App directory root';

    /**
     * Execute the console command.
     *
     * @return mixed|null
     */
    public function handle()
    {

        $this->info('Creating ..');
        $this->createClasses();
        $this->info('... Done');

    }

    /**
     * Create Model, Controller Observer etc.
     */
    public function createClasses()
    {
        $modules = Module::whereIsActive(1)->get();
        foreach ($modules as $module) {
            /** @var Module $module */
            $extends = $module->model;

            $content = "<?php

namespace App;

class {$module->modelClassName()} extends {$extends}
{

}";

            $path = 'app/'.$module->modelClassName().'.php';
            // if (File::exists($path)) {
            //     $this->info('File exists ... '.$path);
            // }
            if (File::put($path, $content)) {
                $this->info('Model recreated ... '.$path.' extends '.$extends);
            }
        }
    }

}
