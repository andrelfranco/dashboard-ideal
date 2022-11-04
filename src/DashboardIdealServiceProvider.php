<?php
// MyVendor\formulario-contato\src\FormularioContatoServiceProvider.php
namespace IdealTrends\dashboardIdeal;
use Illuminate\Support\ServiceProvider;

class DashboardIdealServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
    public function register()
    {
    }
}
