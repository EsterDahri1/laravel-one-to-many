@extends('layouts.admin')

@section('content')
    <div class="container py-4">


        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif

        <h1>Projects table</h1>

        <div class="d-flex justify-content-between my-4">
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add New project</a>
        </div>

        <div class="table-responsive">
            <table class="table table-primary table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Github</th>
                        <th scope="col">Link</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($projects as $project)
                        <tr>
                            <td scope="row"> {{ $project->id }} </td>
                            <td> {{ $project->title }} </td>

                            <td>

                                <img width="100" class="img-fluid" src="{{ $project->cover_image }}" alt="">

                            </td>

                            <td> {{ $project->description }} </td>

                            <td> <a href="{{ $project->github }} ">{{ $project->github }} </a></td>

                            <td> <a href="{{ $project->link }}">{{ $project->link }}</a> </td>

                            <td>
                                <div class="d-flex gap-2 align-items-center justify-content-center">
                                    <a href=" {{ route('admin.projects.show', $project->slug) }} "
                                        class="btn btn-outline-primary">View</a>
                                    <a href=" {{ route('admin.projects.edit', $project->slug) }} "
                                        class="btn btn-outline-success">Edit</a>

                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $project->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">Warning!
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure? Irreversible action
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @empty
                        No projects yet
                    @endforelse
                </tbody>
            </table>

            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
