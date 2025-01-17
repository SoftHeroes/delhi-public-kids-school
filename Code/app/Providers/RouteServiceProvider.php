<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapForgetPasswordRoutes();

        $this->mapDashboardRoutes();

        $this->mapSlidersManagementRoutes();

        $this->mapHomeworkManagementRoutes();

        $this->mapWeekScheduleManagementRoutes();

        $this->mapPrincipalMessagesManagementRoutes();

        $this->mapStudentManagementRoutes();

        $this->mapImageGalleryManagementRoutes();

        $this->mapVideoGalleryManagementRoutes();

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/admin.php'));
    }

    protected function mapForgetPasswordRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/forgetPassword.php'));
    }
    protected function mapDashboardRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/dashboard.php'));
    }
    protected function mapSlidersManagementRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/slidersManagement.php'));
    }
    protected function mapHomeworkManagementRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/homeworkManagement.php'));
    }
    protected function mapWeekScheduleManagementRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/weekScheduleManagement.php'));
    }
    protected function mapPrincipalMessagesManagementRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/principalMessagesManagement.php'));
    }
    protected function mapStudentManagementRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/studentManagement.php'));
    }
    protected function mapImageGalleryManagementRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/imageGalleryManagement.php'));
    }
    protected function mapVideoGalleryManagementRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard/videoGalleryManagement.php'));
    }

}
