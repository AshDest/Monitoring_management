@extends('layouts.structure_Default')
@section('content')
    @livewire('structure.agents', ['structure'=>$structure])
@endsection
