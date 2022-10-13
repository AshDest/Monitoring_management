@extends('layouts.structure_Default', ['title'=>'Monnaie Electronique'])
@section('content')
@livewire('structure.add-monnaie-electronique', ['structure'=>$structure])
@endsection
