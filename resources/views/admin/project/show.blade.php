
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>{{ $project->id }}</h1>
            <h2>{{ $project->title }}</h2>
            <h2 style="background:{{$project->type->color}}">{{ $project->type->name }}</h2>
            <h2>Technologies Used</h2>
            @if($project->technologies->isEmpty())
                <p>No technologies assigned.</p>
            @else
                <ul>
                    @foreach($project->technologies as $technology)
                        <li>{{ $technology->name }}</li>
                    @endforeach
                </ul>
            @endif
            <h3>{{ $project->author }}</h3>
            <div class="image d-flex justify-content-center">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid">
            </div>
            <h4>{{ $project->date }}</h4>
            <p>
                {{ $project->content }}
            </p>
        </div>
    </div>
</div>
@endsection
