@extends('master.layouts')
@section('body')
    @extends('master.navbar')
    <div class="container mt-4">
        <div class="row">
            <livewire:register/>
            <livewire:login/>
        </div>
    </div>
    
@endsection