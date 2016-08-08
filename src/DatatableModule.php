<?php

namespace Xsanisty\Datatable;

use Silex\Application;
use SilexStarter\Module\ModuleInfo;
use SilexStarter\Module\ModuleResource;
use SilexStarter\Module\ModuleProvider;
use Xsanisty\Datatable\Provider\DatatableServiceProvider;

class DatatableModule extends ModuleProvider
{
    /**
     * {@inheritdoc}
     */
    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->info = new ModuleInfo(
            [
                'name'          => 'SilexStarter Datatable',
                'author_name'   => 'Xsanisty Development Team',
                'author_email'  => 'developers@xsanisty.com',
                'repository'    => 'https://github.com/xsanisty/SilexStarter-Datatable',
            ]
        );

        $this->resources = new ModuleResource(['assets' => 'Resources/assets']);
    }

    /**
     * {@inheritdoc}
     */
    public function getModuleIdentifier()
    {
        return 'silexstarter-datatable';
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->app->register(new DatatableServiceProvider);

        $this->app['static_proxy_manager']->addProxy('Datatable', 'Xsanisty\Datatable\StaticProxy\Datatable');
    }
}
