@extends('layouts.structure_Default')
@section('content')
    @livewire('structure.homes', ['structure'=>$structure])
@endsection
