@extends('layouts.default',['title'=>'Comptes Comptables'])
@section('content')
@livewire('comptabilite.edit-gl-account', ['ids' => $ids])
@endsection
