<?php

namespace Xsanisty\Datatable\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Xsanisty\Datatable\DatatableResponseBuilder;

class DatatableServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['datatable'] = $app->share(
            function (Application $app) {
                return new DatatableResponseBuilder(
                    $app['capsule']->getConnection(),
                    $app['request']->request
                );
            }
        );

        $app->bind('Xsanisty\Datatable\DatatableResponseBuilder', 'datatable');
    }

    public function boot(Application $app)
    {
    }
}
