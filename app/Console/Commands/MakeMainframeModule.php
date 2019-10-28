<?php /** @noinspection PhpUnhandledExceptionInspection */

namespace App\Console\Commands;

use File;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use App\Mainframe\Modules\Modules\Module;
use function Illuminate\Support\Str;

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
     * @var string template base name.
     */
    protected $template = 'super-heroes';

    /**
     * @var string
     */
    protected $moduleName;

    /** @var \App\Mainframe\Modules\Modules\Module */
    protected $module;

    /** @var \App\Mainframe\Modules\Modules\Module */
    protected $templateModule;

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
        $this->templateModule = new Module(['name' => $this->template]);

        $this->info($this->module->elementNamePlural().' creation ..');
        // $this->createMigration();
        $this->createClasses();
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
        $code = $this->replace(File::get("app/Mainframe/Helpers/Modular/Skeleton/migration.php"));

        // Create a new laravel migration
        $this->call('make:migration', ['name' => "create_{$this->module->tableName()}_table"]);

        // Find the newly created migration file and put the updated code.
        $migration = Collection::make(File::files('database/migrations'))->last();
        File::put($migration, $code);

        // Console output
        $this->info('Migration Created');
    }

    public function createClasses()
    {
        $source_root = 'app/Mainframe/Helpers/Modular/Skeleton/';
        $destination_root = 'app/Mainframe/Modules/'.$this->module->modelClassNamePlural().'/';
        $maps = [
            $source_root.'SuperHero.php' => $destination_root.$this->module->modelClassName().'.php',
            $source_root.'SuperHeroController.php' => $destination_root.$this->module->modelClassName().'Controller.php',
            $source_root.'SuperHeroDatatable.php' => $destination_root.$this->module->modelClassName().'Datatable.php',
            $source_root.'SuperHeroHelper.php' => $destination_root.$this->module->modelClassName().'Helper.php',
            $source_root.'SuperHeroObserver.php' => $destination_root.$this->module->modelClassName().'Observer.php',
            $source_root.'SuperHeroPolicy.php' => $destination_root.$this->module->modelClassName().'Policy.php',
            $source_root.'SuperHeroValidator.php' => $destination_root.$this->module->modelClassName().'Validator.php',
            // 'app/Mainframe/Helpers/Modular/Skeleton/SuperHero.php' => 'app/Mainframe/'.$this->module->modelClassName().'.php'
        ];

        File::makeDirectory($this->module->moduleNameSpace());

        foreach ($maps as $from => $to) {
            $code = $this->replace(File::get($from));
            File::put($to, $code);
        }
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
        $code = $this->replace(File::get("app/".ucfirst(Str::singular($this->template)).".php"));

        // write on new file
        File::put('app/'.ucfirst(Str::singular($module)).'.php', $code);

        // Console output
        $this->info('Model Created');
    }

    /**
     * Create observer file/class
     */
    public function createObserver()
    {
        $module = $this->argument('module');

        $code = $this->replace(File::get("app/Observers/".ucfirst(Str::singular($this->template))."Observer.php"));

        // write on new file
        File::put('app/Observers/'.ucfirst(Str::singular($module)).'Observer.php', $code);

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

        $replaces = [
            $this->templateModule->tableName() => $this->module->tableName(), //'super_heroes' -> 'good_boys'
            $this->templateModule->modelClassNamePlural() => $this->module->modelClassNamePlural(), //'SuperHeroes' -> 'GoodBoys'
            $this->templateModule->elementNamePlural() => $this->module->elementNamePlural(), //'superHeroes' -> 'goodBoys'
            $this->templateModule->modelClassName() => $this->module->modelClassName(), //'SuperHero' -> 'GoodBoy'
            $this->templateModule->elementName() => $this->module->elementName(), //'superHero' -> 'goodBoy'
            $this->templateModule->name => $this->module->name, //'superHero' -> 'goodBoy'

            // ucfirst($this->template) => ucfirst($module), //'Superheroes' -> 'Goodboys'
            //ucfirst(Str::singular($this->template)) => ucfirst(Str::singular($module)), //'Superhero' -> 'Goodboy'
            //Str::singular($this->template) => Str::singular($module), //'superhero' -> 'goodboy'
        ];

        // run replace across the template code
        foreach ($replaces as $k => $v) {
            $code = str_replace($k, $v, $code);
        }

        return $code;
    }

}
