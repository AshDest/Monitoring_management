@extends('layouts.structure_Default', ['title'=>'Liste des Comptes'])
@section('content')
@livewire('structure.accounts', ['structure'=>$structure])
@endsection
