<?php /** @noinspection PhpUnhandledExceptionInspection */

namespace App\Mainframe\Commands;

use File;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class MakeMainframeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mainframe:make-module {model}';

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
     * @var null|array|string
     */
    protected $moduleClassPath;
    /**
     * @var null|array|string
     */
    private $model;
    /**
     * @var void
     */
    private $moduleTable;
    private $routePath;
    private $routeName;
    private $classDirectory;
    private $namespace;
    private $policy;
    private $processor;
    private $controller;
    private $viewDirectory;
    private $modelClassName;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->model = $this->argument('model');

        $this->modelClassName = $this->modelClassName();
        $this->moduleTable = $this->moduleTable();
        $this->routePath = $this->routePath();
        $this->routeName = $this->routeName();
        $this->classDirectory = $this->classDirectory();
        $this->namespace = $this->namespace();
        $this->policy = $this->policy();
        $this->processor = $this->processor();
        $this->controller = $this->controller();
        $this->viewDirectory = $this->viewDirectory();

        //$this->info($this->moduleTable());

        // $this->moduleName = $this->argument('module');
        // $this->module = new Module(['name' => $this->moduleName]);
        // $this->templateModule = new Module(['name' => $this->templateModuleName]);

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
        $this->call('make:migration', ['name' => "create_{$this->moduleTable()}_table"]);
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
        //$destinationRoot = 'app/Mainframe/Modules/'.$this->module->modelClassNamePlural().'/';
        $maps = [
            $sourceRoot.'SuperHero.php' => $this->classDirectory().'/'.$this->modelClassName().'.php',
            $sourceRoot.'SuperHeroController.php' => $this->classDirectory().'/'.$this->modelClassName().'Controller.php',
            $sourceRoot.'SuperHeroDatatable.php' => $this->classDirectory().'/'.$this->modelClassName().'Datatable.php',
            $sourceRoot.'SuperHeroHelper.php' => $this->classDirectory().'/'.$this->modelClassName().'Helper.php',
            $sourceRoot.'SuperHeroObserver.php' => $this->classDirectory().'/'.$this->modelClassName().'Observer.php',
            $sourceRoot.'SuperHeroPolicy.php' => $this->classDirectory().'/'.$this->modelClassName().'Policy.php',
            $sourceRoot.'SuperHeroProcessor.php' => $this->classDirectory().'/'.$this->modelClassName().'Processor.php',
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
        $sourceRoot = 'app/Mainframe/Features/Modular/Skeleton/views';                          // Source directory
        $destinationRoot = 'resources/views/'.str_replace('.', '/', $this->viewDirectory());    // New module directory
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
            'App\Mainframe\Modules\SuperHeroes' => trim('\\', $this->namespace()),
            'super_heroes' => $this->moduleTable(),
            'super-heroes' => $this->routePath(),
            'SuperHeroes' => Str::plural($this->modelClassName()),
            'SuperHero' => $this->modelClassName(),
            'superHeroes' => lcfirst(Str::plural($this->modelClassName())),
            'superHero' => lcfirst($this->modelClassName()),
            'mainframe.modules.super-heroes' => $this->viewDirectory(),
            '{table}' => $this->moduleTable(),
            '{module_name}' => $this->moduleName(),
            '{route_path}' => $this->routePath(),
            '{route_name}' => $this->routeName(),
            '{class_directory}' => $this->classDirectory(),
            '{namespace}' => $this->namespace(),
            '{model}' => $this->model,
            '{policy}' => $this->policy(),
            '{processor}' => $this->processor(),
            '{controller}' => $this->controller(),
            '{view_directory}' => $this->viewDirectory(),
            // $this->templateModule->modelClassNamePlural() => $this->module->modelClassNamePlural(), //'SuperHeroes' -> 'GoodBoys'
            // $this->templateModule->collectionName() => $this->module->collectionName(),       //'superHeroes' -> 'goodBoys'
            // $this->templateModule->name => $this->module->name,                                     //'super-heroes' -> 'good-boys'
            // $this->templateModule->modelClassName() => $this->module->modelClassName(),             //'SuperHero' -> 'GoodBoy'
            // $this->templateModule->elementName() => $this->module->elementName(),                   //'superHero' -> 'goodBoy'

        ];

        // run replace across the template code
        foreach ($replaces as $k => $v) {
            $code = str_replace($k, $v, $code);
        }

        return $code;
    }

    private function moduleTable()
    {
        return Str::snake(Str::plural($this->modelClassName()));
    }

    private function moduleName()
    {
        return Str::kebab(Str::plural($this->modelClassName()));
    }

    private function routePath()
    {
        return $this->moduleName();
    }

    private function routeName()
    {
        return $this->moduleName();
    }

    private function classDirectory()
    {
        $str = str_replace(['\\App', '\\'], ['app', '/'], $this->namespace());

        return $str;
    }

    private function namespace()
    {
        $directories = explode('\\', $this->model);
        unset($directories[count($directories) - 1]);

        return implode('\\', $directories);
    }

    private function policy()
    {
        return $this->namespace().'\\'.$this->modelClassName().'Policy';
    }

    private function processor()
    {
        return $this->namespace().'\\'.$this->modelClassName().'Processor';
    }

    private function controller()
    {
        return $this->namespace().'\\'.$this->modelClassName().'Controller';
    }

    private function viewDirectory()
    {
        $str = str_replace('\\App', '', $this->namespace());
        $directories = explode('\\', $str);

        $arr = [];
        foreach ($directories as $directory) {
            $arr[] = Str::kebab($directory);
        }

        $path = implode('.', $arr);
        $path = trim($path, '.');

        return $path;
    }

    private function modelClassName()
    {
        return Arr::last(explode('\\', $this->model));
    }

}
