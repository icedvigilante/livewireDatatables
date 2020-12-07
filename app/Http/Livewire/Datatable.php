<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    public $model;

    public $exclude;

    public $columns;

    public $paginate;

    protected $paginationTheme = 'bootstrap';

    public function mount($model, $exclude = '', $paginate = 20)
    {
        $this->model = $model;
        $this->paginate = $paginate;
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
        return $this->builder()->paginate($this->paginate);
    }

    public function render()
    {
        return view('livewire.datatable');
    }
}
