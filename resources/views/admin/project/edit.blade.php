@extends('admin.project.layouts.create-or-edit')

@section("page-title")
Edit {{$project->title}}
@endsection
@section('form-action')
{{route('admin.project.update', $project)}}
@endsection

@section('form-method')

@method("PUT")

@endsection
