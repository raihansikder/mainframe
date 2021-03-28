@servers(['localhost' => '127.0.0.1'])

@task('deploy', ['on' => 'localhost'])


@if ($branch)
    git pull origin {{ $branch }}
@endif

php artisan migrate
@endtask