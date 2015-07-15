<?php

namespace Xsanisty\Datatable\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use LiveControl\EloquentDataTable\DataTable;

class DatatableServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['datatable'] = function () use ($app) {
            return new DataTable($app['datatable.model'], $app['datatable.column']);
        };
    }

    public function boot(Application $app)
    {
    }
}
