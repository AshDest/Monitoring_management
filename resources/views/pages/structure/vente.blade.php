@extends('layouts.structure_Default', ['title'=>'Liste des Ventes'])
@section('content')
    @livewire('structure.ventes', ['structure'=>$structure])
@endsection
