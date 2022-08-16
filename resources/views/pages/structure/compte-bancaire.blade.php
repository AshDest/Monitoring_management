@extends('layouts.structure_Default', ['title'=>'Compte Bancaire'])
@section('content')
    @livewire('structure.compte-bancaire', ['structure'=>$structure])
@endsection
