@extends('parish.layout.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="mb-sm-3">Projects at the Parish</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary" href="{{ route('parish.admin.projects.create', $parish) }}">+
                            Create New Project</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if ($projects->count())
                            <table class="table table-condensed table-borderless table-striped">
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            <div class="row">

                                                <div class="col-sm-2">
                                                    @if($project->featured_image)
                                                        <img src="{{ asset('storage/' . $project->featured_image) }}" class="img-fluid mt-2">
                                                    @endif
                                                </div>

                                                <div class="col-sm-10">
                                                    <a class="d-block" href="{{ route('parish.admin.projects.show', ['parish' => $parish, 'projectsPost' => $project]) }}">{{ $project->title }}</a>
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
