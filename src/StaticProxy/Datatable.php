<?php

namespace Xsanisty\Datatable\StaticProxy;

use Xstatic\StaticProxy;
use LiveControl\EloquentDataTable\DataTable as DatatableBuilder;

class Datatable extends StaticProxy
{
    public static function getInstanceIdentifier()
    {
        return 'datatable';
    }

    public static function of($builder, $column)
    {
        return new DatatableBuilder($builder, $column);
    }

    public static function make($column)
    {
        static::$container->set('datatable.column', $column)->make();
    }

    public static function setModel($model)
    {
        static::$container->set('datatable.model', $model);
    }
}
