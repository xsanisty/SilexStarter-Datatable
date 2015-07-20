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
}
