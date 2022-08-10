@extends('layouts.structure_Default')
@section('content')
    @livewire('structure.compte-bancaire', ['structure'=>$structure])
@endsection
