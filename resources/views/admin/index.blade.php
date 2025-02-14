@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                    @livewire('admin.category')
            </div>
        </div>
    </div>
@endsection