<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create view files for a given resource';

    /**
     * The Filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $viewsPath = resource_path("views/{$name}");

        // Create the directory if it doesn't exist
        if (!$this->files->exists($viewsPath)) {
            $this->files->makeDirectory($viewsPath, 0755, true);
        }

        // Define the view files to create
        $files = [
            'index.blade.php',
            'create.blade.php',
            'edit.blade.php',
            'show.blade.php',
        ];

        // Generate each file
        foreach ($files as $file) {
            $filePath = "{$viewsPath}/{$file}";
            if (!$this->files->exists($filePath)) {
                $this->files->put($filePath, $this->getTemplate($file, $name));
                $this->info("Created: {$filePath}");
            } else {
                $this->warn("File already exists: {$filePath}");
            }
        }
    }

    /**
     * Get a basic template for each view file.
     */
    protected function getTemplate($file, $name)
    {
        switch ($file) {
            case 'index.blade.php':
                return "@extends('layouts.app')\n\n@section('content')\n<h1>{$name} Index View</h1>\n@endsection";
            case 'create.blade.php':
                return "@extends('layouts.app')\n\n@section('content')\n<h1>Create New {$name}</h1>\n<form method=\"POST\" action=\"{{ route('{$name}.store') }}\">\n    @csrf\n    <!-- Add your form fields here -->\n    <button type=\"submit\">Create</button>\n</form>\n@endsection";
            case 'edit.blade.php':
                return "@extends('layouts.app')\n\n@section('content')\n<h1>Edit {$name}</h1>\n<form method=\"POST\" action=\"{{ route('{$name}.update', \$id) }}\">\n    @csrf\n    @method('PUT')\n    <!-- Add your form fields here -->\n    <button type=\"submit\">Update</button>\n</form>\n@endsection";
            case 'show.blade.php':
                return "@extends('layouts.app')\n\n@section('content')\n<h1>{$name} Details</h1>\n<p>Show details of the {$name} here.</p>\n@endsection";
            default:
                return '';
        }
    }
}
