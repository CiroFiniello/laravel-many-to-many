@extends('admin.project.layouts.create-or-edit')

@section("page-title")
Create New Project
@endsection
@section('form-action')
{{route('admin.project.store')}}
@endsection

@section('form-method')

@method("POST")

@endsection
