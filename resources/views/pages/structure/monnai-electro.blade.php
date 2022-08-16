@extends('layouts.structure_Default', ['title'=>'Monnaie Electronique'])
@section('content')
    @livewire('structure.monnai-electronique', ['structure'=>$structure])
@endsection
