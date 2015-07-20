<?php

namespace Xsanisty\Datatable;

use Exception;
use Illuminate\Database\Schema\Builder as SchemaBuilder;
use LiveControl\EloquentDataTable\DataTable;

class DatatableResponseBuilder
{
    protected $schema;
    protected $column;
    protected $model;

    public function __construct(SchemaBuilder $schema)
    {
        $this->schema = $schema;
    }

    public function setColumn(array $column)
    {
        $this->column = $column;

        return $this;
    }

    public function getColumn()
    {
        if ($this->column) {
            return $this->column;
        }

        return $this->schema->getColumnListing($this->getModel()->getTable());
    }

    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function getModel()
    {
        if (!$this->model) {
            throw new Exception("Model must be set before creating datatable response", 1);
        }

        return $this->model;
    }

    public function of($model)
    {
        return $this->setModel($model);
    }

    public function make()
    {
        $datatable = $this->datatableFactory();

        return $datatable->make();
    }

    protected function datatableFactory()
    {
        return new DataTable($this->model, $this->column);
    }

    protected function getTableColumn()
    {

    }
}
