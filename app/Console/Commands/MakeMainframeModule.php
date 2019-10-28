<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use App\Mainframe\Modules\Modules\Module;

class MakeMainframeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mainframe:module {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a mainframe module';

    /**
     * @var string
     */
    protected $moduleName;

    protected $module;

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $this->moduleName = $this->argument('module');
        $this->module = new Module(['name' => $this->moduleName]);

        $this->info($this->module->elementNamePlural().' creation ..');
        $this->createMigration();
        // $this->createViewFiles();
        // $this->createModel();
        // $this->createObserver();
        // $this->createController();
    }

    /**
     * Create database migration for the new module
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function createMigration()
    {
        $module = $this->argument('module'); // Get module name from console

        // Get template code and replace 
        $code = $this->replace(File::get("Mainframe/Helpers/Modular/Skeleton/migration.php"));

        // Create a new laravel migration
        $this->call('make:migration', ['name' => "create_{$module}_table"]);

        // Find the newly created migration file and put the updated code.
        $migration = Collection::make(File::files('database/migrations'))->last();
        File::put($migration, $code);

        // Console output
        $this->info('Migration Created');
    }

    /**
     * Create view blades for the new module
     */
    public function createViewFiles()
    {
        $module = $this->argument('module');
        $from = 'resources/views/modules/'.$this->template; // Source directory
        $to = 'resources/views/modules/'.$module;           // New module directory

        if (! File::copyDirectory($from, $to)) {
            $this->error('Creating view was unsuccessful');
        } else {
            // Get template code and replace
            $code = $this->replace(File::get($from.'/form.blade.php'));

            // Write updated code in new file
            File::put($to.'/form.blade.php', $code);

            // Console output
            $this->info('View Files Created');
        }
    }

    /**
     * Create the model file and find-replace the placeholder words
     */
    public function createModel()
    {
        $module = $this->argument('module');

        // Get template code and replace
        $code = $this->replace(File::get("app/".ucfirst(str_singular($this->template)).".php"));

        // write on new file
        File::put('app/'.ucfirst(str_singular($module)).'.php', $code);

        // Console output
        $this->info('Model Created');
    }

    /**
     * Create observer file/class
     */
    public function createObserver()
    {
        $module = $this->argument('module');

        $code = $this->replace(File::get("app/Observers/".ucfirst(str_singular($this->template))."Observer.php"));

        // write on new file
        File::put('app/Observers/'.ucfirst(str_singular($module)).'Observer.php', $code);

        // Console output
        $this->info('Observer Created');
    }

    /**
     * Create Controller file
     */
    public function createController()
    {
        $module = $this->argument('module');

        $code = $this->replace(File::get("app/Http/Controllers/".ucfirst($this->template)."Controller.php"));

        // write on new file
        File::put('app/Http/Controllers/'.ucfirst($module).'Controller.php', $code);

        // Console output
        $this->info('Controller Created');
    }

    /**
     * Function to replace boilerplate code with new module name references
     *
     * @param $code
     * @return mixed
     */
    public function replace($code)
    {
        // replace maps
        $module = $this->argument('module');
        $replaces = [
            $this->template => $module, //'superheroes' -> 'goodboys'
            ucfirst($this->template) => ucfirst($module), //'Superheroes' -> 'Goodboys'
            ucfirst(str_singular($this->template)) => ucfirst(str_singular($module)), //'Superhero' -> 'Goodboy'
            str_singular($this->template) => str_singular($module), //'superhero' -> 'goodboy'
        ];

        // run replace across the template code
        foreach ($replaces as $k => $v) {
            $code = str_replace($k, $v, $code);
        }

        return $code;
    }

}
