@extends('layouts.structure_Default', ['title'=>'Accueil'])
@section('content')
    @livewire('structure.homes', ['structure'=>$structure])
@endsection
