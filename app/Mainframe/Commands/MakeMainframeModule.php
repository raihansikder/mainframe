<?php

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
    protected $signature = 'mainframe:make-module {namespace}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a mainframe module';

    /** @var string */
    private $namespace;

    /** * @var string */
    private $model;

    /**
     * Execute the console command.
     *
     * @return mixed|null
     */
    public function handle()
    {
        $this->namespace = $this->argument('namespace');
        $this->model = $this->model();

        $this->info($this->model.'Creating ..');
        $this->createMigration();
        $this->createClasses();
        $this->createViewFiles();
        $this->info($this->model.'... Done');

    }

    /**
     * Return project name
     *
     * @return mixed|string
     */
    public function project()
    {
        return $this->extractProjectNameFromNamespace();
    }

    public function projectViewDirName()
    {
        return Str::kebab($this->project());
    }

    /**
     * Extract Project name
     *
     * @return mixed|string
     */
    public function extractProjectNameFromNamespace()
    {
        return explode('\\', Str::after($this->namespace, 'Projects\\'))[0];
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
        $destination = $this->classDirectory().'/'.$this->modelClassName();

        $maps = [
            $sourceRoot.'SuperHero.php' => $destination.'.php',
            $sourceRoot.'SuperHeroController.php' => $destination.'Controller.php',
            $sourceRoot.'SuperHeroDatatable.php' => $destination.'Datatable.php',
            $sourceRoot.'SuperHeroHelper.php' => $destination.'Helper.php',
            $sourceRoot.'SuperHeroObserver.php' => $destination.'Observer.php',
            $sourceRoot.'SuperHeroPolicy.php' => $destination.'Policy.php',
            $sourceRoot.'SuperHeroProcessor.php' => $destination.'Processor.php',
            $sourceRoot.'SuperHeroProcessorHelper.php' => $destination.'ProcessorHelper.php',
            $sourceRoot.'SuperHeroViewProcessor.php' => $destination.'ViewProcessor.php',
        ];

        File::makeDirectory($this->classDirectory(), 755, true);

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
            'App\Mainframe\Modules\SuperHeroes' => trim($this->namespace(), '\\'),
            'mainframe.modules.super-heroes' => $this->viewDirectory(),
            'super_heroes' => $this->moduleTable(),
            'super-heroes' => $this->routePath(),
            'SuperHeroes' => Str::plural($this->modelClassName()),
            'SuperHero' => $this->modelClassName(),
            'superHeroes' => lcfirst(Str::plural($this->modelClassName())),
            'superHero' => lcfirst($this->modelClassName()),
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
        ];

        if (strlen($this->project())) {
            $replaces = array_merge($replaces, [
                'App\Mainframe\Features' => 'App\Projects\\'.$this->project().'\Features',
                '{project-name}' => $this->projectViewDirName(),
            ]);
        }

        // run replace across the template code
        foreach ($replaces as $k => $v) {
            $code = str_replace($k, $v, $code);
        }

        return $code;
    }

    public function model()
    {
        $modelClass = Str::singular(class_basename($this->namespace));

        return $this->namespace.'\\'.$modelClass;
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
        return str_replace(['\\App', '\\'], ['app', '/'], $this->namespace());
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
        return class_basename($this->model);
    }

}
