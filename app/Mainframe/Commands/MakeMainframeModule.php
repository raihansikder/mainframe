<?php /** @noinspection PhpUnhandledExceptionInspection */

namespace App\Mainframe\Commands;

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
    protected $signature = 'mainframe:make-module {module}';

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

    /**
     * @var \App\Mainframe\Modules\Modules\Module
     */
    protected $templateModule;

    /**
     * @var string
     */
    protected $moduleName;

    /**
     * @var \App\Mainframe\Modules\Modules\Module
     */
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

        $this->info($this->module->collectionName().'Creating ..');
        $this->createMigration();
        $this->createClasses();
        $this->createViewFiles();
        $this->info($this->module->collectionName().'... Done');

        return;
    }

    /**
     * Create database migration for the new module
     */
    public function createMigration()
    {
        // Get template code and replace
        $code = $this->replace(File::get("app/Mainframe/Features/Modular/Skeleton/migration.php"));
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
        $sourceRoot = 'app/Mainframe/Features/Modular/Skeleton/';
        $destinationRoot = 'app/Mainframe/Modules/'.$this->module->modelClassNamePlural().'/';
        $maps = [
            $sourceRoot.'SuperHero.php' => $destinationRoot.$this->module->modelClassName().'.php',
            $sourceRoot.'SuperHeroController.php' => $destinationRoot.$this->module->modelClassName().'Controller.php',
            $sourceRoot.'SuperHeroDatatable.php' => $destinationRoot.$this->module->modelClassName().'Datatable.php',
            $sourceRoot.'SuperHeroHelper.php' => $destinationRoot.$this->module->modelClassName().'Helper.php',
            $sourceRoot.'SuperHeroObserver.php' => $destinationRoot.$this->module->modelClassName().'Observer.php',
            $sourceRoot.'SuperHeroPolicy.php' => $destinationRoot.$this->module->modelClassName().'Policy.php',
            $sourceRoot.'SuperHeroProcessor.php' => $destinationRoot.$this->module->modelClassName().'Processor.php',
        ];

        File::makeDirectory($this->module->moduleClassDir());

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
        $sourceRoot = 'app/Mainframe/Features/Modular/Skeleton/views';                  // Source directory
        $destinationRoot = 'resources/views/mainframe/modules/'.$this->module->name;    // New module directory
        File::copyDirectory($sourceRoot, $destinationRoot);

        $maps = [
            $sourceRoot.'/form/default.blade.php' => $destinationRoot.'/form/default.blade.php',
            $sourceRoot.'/form/js.blade.php' => $destinationRoot.'/form/js.blade.php',
            $sourceRoot.'/grid/default.blade.php' => $destinationRoot.'/grid/default.blade.php',

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
            $this->templateModule->collectionName() => $this->module->collectionName(),       //'superHeroes' -> 'goodBoys'
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
