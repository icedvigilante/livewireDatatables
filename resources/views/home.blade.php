@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <livewire:datatable model="App\Models\User"></livewire:datatable>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
