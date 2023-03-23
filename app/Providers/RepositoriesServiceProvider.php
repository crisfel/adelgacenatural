<?php

namespace App\Providers;

use App\Repositories\Appointments\AppointmentRepository;
use App\Repositories\Contracts\Appointments\AppointmentRepositoryInterface;
use App\Repositories\Contracts\Records\RecordRepositoryInterface;
use App\Repositories\Contracts\Treatments\TreatmentRepositoryInterface;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\Repositories\Records\RecordRepository;
use App\Repositories\Treatments\TreatmentRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    protected array $classes = [
        UserRepositoryInterface::class => UserRepository::class,
        TreatmentRepositoryInterface::class => TreatmentRepository::class,
        RecordRepositoryInterface::class => RecordRepository::class,
        AppointmentRepositoryInterface::class => AppointmentRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
