<?php

namespace Xsanisty\Datatable\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Xsanisty\Datatable\DatatableResponseBuilder;

class DatatableServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['datatable'] = $app->share(
            function (Container $app) {
                return new DatatableResponseBuilder(
                    $app['capsule']->getConnection(),
                    $app['request']->request
                );
            }
        );

        $app->bind('Xsanisty\Datatable\DatatableResponseBuilder', 'datatable');
    }
}
