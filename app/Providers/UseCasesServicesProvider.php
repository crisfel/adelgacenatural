<?php

namespace App\Providers;

use App\UseCases\Contracts\Records\GetQuantitiesAndDatesUseCaseInterface;
use App\UseCases\Contracts\Treatments\DeleteTreatmentsUseCaseInterface;
use App\UseCases\Contracts\Treatments\DetailTreatmentUseCaseInterface;
use App\UseCases\Contracts\Treatments\EditTreatmentsUseCaseInterface;
use App\UseCases\Contracts\Treatments\IndexTreatmentsUseCaseInterface;
use App\UseCases\Contracts\Treatments\StoreTreatmentsUseCaseInterface;
use App\UseCases\Contracts\Treatments\UpdateTreatmentsUseCaseInterface;
use App\UseCases\Contracts\Users\CreateUsersUseCaseInterface;
use App\UseCases\Contracts\Users\DeleteUsersUseCaseInterface;
use App\UseCases\Contracts\Users\EditUsersUseCaseInterface;
use App\UseCases\Contracts\Users\IndexUsersUseCaseInterface;
use App\UseCases\Contracts\Users\StoreUsersUseCaseInterface;
use App\UseCases\Contracts\Users\UpdateUsersUseCaseInterface;
use App\UseCases\Records\GetQuantitiesAndDatesUseCase;
use App\UseCases\Treatments\DeleteTreatmentsUseCase;
use App\UseCases\Treatments\DetailTreatmentUseCase;
use App\UseCases\Treatments\EditTreatmentsUseCase;
use App\UseCases\Treatments\IndexTreatmentsUseCase;
use App\UseCases\Treatments\StoreTreatmentsUseCase;
use App\UseCases\Treatments\UpdateTreatmentsUseCase;
use App\UseCases\Users\CreateUsersUseCase;
use App\UseCases\Users\DeleteUsersUseCase;
use App\UseCases\Users\EditUsersUseCase;
use App\UseCases\Users\IndexUsersUseCase;
use App\UseCases\Users\StoreUsersUseCase;
use App\UseCases\Users\UpdateUsersUseCase;
use Illuminate\Support\ServiceProvider;

class UseCasesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected array $classes = [
        IndexUsersUseCaseInterface::class => IndexUsersUseCase::class,
        CreateUsersUseCaseInterface::class => CreateUsersUseCase::class,
        StoreUsersUseCaseInterface::class => StoreUsersUseCase::class,
        EditUsersUseCaseInterface::class => EditUsersUseCase::class,
        UpdateUsersUseCaseInterface::class => UpdateUsersUseCase::class,
        DeleteUsersUseCaseInterface::class => DeleteUsersUseCase::class,
        IndexTreatmentsUseCaseInterface::class => IndexTreatmentsUseCase::class,
        StoreTreatmentsUseCaseInterface::class => StoreTreatmentsUseCase::class,
        EditTreatmentsUseCaseInterface::class => EditTreatmentsUseCase::class,
        UpdateTreatmentsUseCaseInterface::class => UpdateTreatmentsUseCase::class,
        DetailTreatmentUseCaseInterface::class => DetailTreatmentUseCase::class,
        DeleteTreatmentsUseCaseInterface::class => DeleteTreatmentsUseCase::class,
        GetQuantitiesAndDatesUseCaseInterface::class => GetQuantitiesAndDatesUseCase::class
    ];
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
