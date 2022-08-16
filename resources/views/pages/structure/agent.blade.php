@extends('layouts.structure_Default', ['title'=>'Agents'])
@section('content')
    @livewire('structure.agents', ['structure'=>$structure])
@endsection
