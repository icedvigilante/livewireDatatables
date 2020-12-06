<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Datatable extends Component
{
    public $model;

    public $exclude;

    public $columns;

    public function mount($model, $exclude = '')
    {
        $this->model = $model;
        $this->exclude = explode(',', $exclude);
        $this->columns = $this->columns();

    }

    public function columns()
    {
        return collect(Schema::getColumnListing($this->builder()->getQuery()->from))->reject(function($column){
            return in_array($column, $this->exclude);
        })->toArray();
    }

    public function builder()
    {
        return $this->model::query();
    }

    public function records()
    {
        return $this->builder()->get();
    }

    public function render()
    {
        return view('livewire.datatable');
    }
}
