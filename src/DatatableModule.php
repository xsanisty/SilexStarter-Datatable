<?php

namespace Xsanisty\Datatable;

use Silex\Application;
use SilexStarter\Module\ModuleInfo;
use SilexStarter\Module\ModuleResource;
use SilexStarter\Contracts\ModuleProviderInterface;
use Xsanisty\Datatable\Provider\DatatableServiceProvider;

class DatatableModule implements ModuleProviderInterface
{
    protected $app;

    /**
     * {@inheritdoc}
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
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
    public function getRequiredModules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function getResources()
    {
        return new ModuleResource(
            [
                'assets' => 'Resources/assets'
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getRequiredPermissions()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function uninstall()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->app->register(new DatatableServiceProvider);

        $this->app['static_proxy_manager']->addProxy('Datatable', 'Xsanisty\Datatable\StaticProxy\Datatable');
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {

    }
}
