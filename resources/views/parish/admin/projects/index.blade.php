@extends('layouts.dashboard.app')
@section('pageTitle', 'Projects')
@section('content')
    <div class="container-fluid mt--7">
        <div class="row my-5 justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @include('shared.notifications')
                        @include('shared.errors')
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h2 class="mb-sm-3">Projects at the Parish</h2>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-primary" href="{{ route('parish.admin.projects.create', $parish) }}">+
                                    Add Project</a>
                            </div>
                        </div>

                        @if ($projects->count())
                            <div class="table-responsive">
                                <table class="table table-condensed table-borderless table-striped">
                                    <tbody>
                                    @foreach($projects as $project)
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    @if($project->featured_image)
                                                    <div class="col-sm-2">
                                                        <img src="{{ asset($project->featured_image) }}" class="img-fluid mt-2" alt="">
                                                    </div>
                                                    @endif

                                                    <div class="col-sm-10">
                                                        <h3><a class="d-block" href="{{ route('parish.admin.projects.show', ['parish' => $parish, 'projectsPost' => $project]) }}">{{ $project->title }}</a></h3>
                                                        <p>{{ $project->snippet }}</p>
                                                        <div class="d-flex justify-content-between">
                                                            <small>Posted on: {{ $project->created_at->format('M d, Y') }}</small>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $projects->links() }}
                        @else
                            <p>You have not posted any projects. Start by clicking the Create New Project button above</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
