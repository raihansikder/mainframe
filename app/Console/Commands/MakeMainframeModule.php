<?php /** @noinspection PhpUnhandledExceptionInspection */

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
     * @var string template base name.
     */
    protected $templateModuleName = 'super-heroes';

    /** @var \App\Mainframe\Modules\Modules\Module */
    protected $templateModule;

    /**
     * @var string
     */
    protected $moduleName;

    /** @var \App\Mainframe\Modules\Modules\Module */
    protected $module;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->moduleName = $this->argument('module');
        $this->module = new Module(['name' => $this->moduleName]);
        $this->templateModule = new Module(['name' => $this->templateModuleName]);

        $this->info($this->module->elementNamePlural().'Creating ..');
        // $this->createMigration();
        $this->createClasses();
        $this->createViewFiles();
        $this->info($this->module->elementNamePlural().'... Done');

        return;
    }

    /**
     * Create database migration for the new module
     */
    public function createMigration()
    {
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

    /**
     * Create Model, Controller Observer etc.
     */
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
        $source_root = 'app/Mainframe/Helpers/Modular/Skeleton/views';                  // Source directory
        $destination_root = 'resources/views/mainframe/modules/'.$this->module->name;   // New module directory
        File::copyDirectory($source_root, $destination_root);

        $maps = [
            $source_root.'/form/default.blade.php' => $destination_root.'/form/default.blade.php',
            $source_root.'/form/js.blade.php' => $destination_root.'/form/js.blade.php',
            $source_root.'/grid/default.blade.php' => $destination_root.'/grid/default.blade.php',

        ];

        foreach ($maps as $from => $to) {
            $code = $this->replace(File::get($from));
            File::put($to, $code);
        }
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
            $this->templateModule->tableName() => $this->module->tableName(),                       //'super_heroes' -> 'good_boys'
            $this->templateModule->modelClassNamePlural() => $this->module->modelClassNamePlural(), //'SuperHeroes' -> 'GoodBoys'
            $this->templateModule->elementNamePlural() => $this->module->elementNamePlural(),       //'superHeroes' -> 'goodBoys'
            $this->templateModule->name => $this->module->name,                                     //'super-heroes' -> 'good-boys'
            $this->templateModule->modelClassName() => $this->module->modelClassName(),             //'SuperHero' -> 'GoodBoy'
            $this->templateModule->elementName() => $this->module->elementName(),                   //'superHero' -> 'goodBoy'

        ];

        // run replace across the template code
        foreach ($replaces as $k => $v) {
            $code = str_replace($k, $v, $code);
        }

        return $code;
    }

}
