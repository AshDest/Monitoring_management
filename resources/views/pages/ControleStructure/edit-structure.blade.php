@extends('layouts.default',['title'=>'Structures'])
@section('content')
@livewire('controle-structure.edit-structure', ['ids' => $ids])
@endsection
