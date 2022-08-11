@extends('layouts.app')

@section('contenu')
    <div>{{ $device->name }}</div>
    <div>{{ $device->location }}</div>
    <div>{{ $user }}</div>
    <div>{{ $device->state ? 'Ok' : 'Not ok' }}</div>
    <div>{{ $device->date_taken}}</div>
    <div>{{ $device->date_delivery }}</div>
    <div>{{ $device->comment }}</div>
@endsection