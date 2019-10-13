<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class MakeIsomodule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a isotone module';

    /**
     * @var string template base name.
     */
    protected $template = 'superheroes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createMigration();
        $this->createViewFiles();
        $this->createModel();
        $this->createObserver();
        $this->createController();
    }

    /**
     * Create database migration for the new module
     */
    public function createMigration()
    {
        $module = $this->argument('module'); // Get module name from console

        // Get template code and replace 
        $code = $this->replace(File::get("database/2016_02_29_162403_create_superheroes_table.php"));

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
        $to = 'resources/views/modules/'.$module; // New module directory

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
