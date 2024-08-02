

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">types</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->type->name }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->author }}</td>
                            <td>{{ $project->date}}</td>
                            <td>
                                <a href="{{route('admin.project.show', $project)}}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{route('admin.project.edit', $project)}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('admin.project.destroy', $project)}}" method="POST" class="d-inline-block">
                                    @method("delete")
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm"></input>

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection
