@extends('layouts.structure_Default', ['title'=>'Monnaie Electronique'])
@section('content')
@livewire('structure.edit-monnais', ['structure'=>$structure, 'ids'=> $ids])
@endsection
