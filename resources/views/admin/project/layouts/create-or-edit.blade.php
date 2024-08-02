

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-8 p-3">
            <form action="@yield('form-action')" method="POST">
                @yield('form-method')
                @csrf

                <div class="mb-3">
                    <h1>
                        @yield('page-title')
                    </h1>
                </div>

                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $project->title) }}">
                    @error("title")
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="type_id">
                        @foreach ( $types as $type )
                        <option value="{{ $type->id }}"
                            {{$type->id == old("type_id", $project->type_id) ? "selected" : ""}}
                            >{{$type->name}}</option>
                        @endforeach
                    </select>
                    @error("type_id")
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image">image url</label>
                    <input type="text" name="image" id="image" class="form-control"
                    value="{{ old('image', $project->image) }}">
                    @error("image")
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content">Post content</label>
                    <textarea name="content" id="content" cols="30" rows="15" class="form-control"
                    >{{ old('content', $project->content) }}</textarea>
                    @error("content")
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <input type="submit" value="@yield('page-title')" class="btn btn-primary btn-lg">
                <input type="reset" value="Reset Fields" class="btn btn-warning btn-lg">
            </form>
        </div>
    </div>
</div>
@endsection
