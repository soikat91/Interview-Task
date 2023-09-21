@extends('layout.sidenav-layout')

@section('content')
@include('components.Task.task-list')
@include('components.Task.task-delete')
@include('components.Task.task-update')
@include('components.Task.task-show')
@include('components.Task.task-create')

@endsection