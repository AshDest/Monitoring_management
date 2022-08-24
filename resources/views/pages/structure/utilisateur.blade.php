@extends('layouts.structure_Default', ['title'=>'Utilisateur'])
@section('content')
    @livewire('structure.utilisateur', ['structure'=>$structure])
@endsection
