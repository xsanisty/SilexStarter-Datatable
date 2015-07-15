<?php

/**
 * This is user module, also works as sample module to show you how develop module as composer package
 */
namespace Xsanisty\Datatable;

use Silex\Application;
use SilexStarter\Module\ModuleInfo;
use SilexStarter\Module\ModuleResource;
use SilexStarter\Contracts\ModuleProviderInterface;
use Xsanisty\Datatable\Provider\DatatableServiceProvider;

class DatatableModule implements ModuleProviderInterface
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getInfo()
    {
        return new ModuleInfo(
            [
                'name'          => 'SilexStarter Datatable',
                'author_name'   => 'Xsanisty Development Team',
                'author_email'  => 'developers@xsanisty.com',
                'repository'    => 'https://github.com/xsanisty/SilexStarter-Datatable',
            ]
        );
    }

    public function getModuleIdentifier()
    {
        return 'silexstarter-datatable';
    }

    public function getRequiredModules()
    {
        return [];
    }

    public function getResources()
    {
        return new ModuleResource(
            [

            ]
        );
    }

    public function register()
    {
        $this->app->register(new DatatableServiceProvider);

        $this->app['static_proxy_manager']->addProxy('Datatable', 'Xsanisty\Datatable\StaticProxy\Datatable');
    }

    public function boot()
    {

    }
}
