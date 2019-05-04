@extends('layouts.site')

@section('meta')
    <meta name="keywords" content="find catholic parish">
    <meta name="description" content="Find a catholic parish from the list of parishes currently available on {{ config('app.name') }}">
    <link rel="canonical" href="{{ route('parishes.index') }}">
@endsection

@section('styles')
    @parent
    <style type="text/css">
        .dataTables_filter {
            text-align: right;
        }
        .dataTables_filter input.form-control {
            width: 300px;
            border: 1px solid #ccc;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }
        .pagination {
            float: right;
        }
    </style>
@endsection

@section('content')

    <section class="sa-page-title text-left p-5">
        <div class="container pt-5">
            <div class="row pt-5">
                <div class="col-md-12">
                    <h1>Find a Catholic Parish</h1>
                </div>
                <div class="col-md-12">
                    <nav class="breadcrumb">
                        <ul>
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Catholic Parishes</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="sa-intro-section sa-intro-section-3 pd-default-3">
        <div class="container">
            <p class="text-center">Find a catholic parish from the list of parishes currently available on {{ config('app.name') }}</p>
            <div class="table-responsive mb-5">
                <table class="datatable">
                    <thead class="d-none">
                        <tr>
                            <th>Parish</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($parishes as $parish)
                        <tr>
                            <td class="border-0 px-0">
                                <h2 class="h4"><a href="{{ route('parish.show', $parish) }}">{{ $parish->name }}</a></h2>
                                <p class="mb-1">{{ $parish->description }}</p>
                                <p><strong>Diocese: </strong>{{ $parish->diocese->name }}, <strong>Address: </strong> {{ $parish->main_address }}</p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-center">
                <article class="col-10 text-center">
                    <h3>Didn't find the parish you were looking for?</h3>
                    <p>There are thousands of Catholic parishes allover the world, help us add more to the site. Use this <a href="{{ route('home') }}#site-feedback">feedback form</a> to let us know of the parish you want us to add. Please ensure you give us full details of the parish including its contact details. We will contact the parish to verify and request permission to be added onto <a href="{{ route('home') }}">{{ config('app.name') }}</a>.</p>
                </article>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('assets/js/datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/datatable/dataTables.rowReorder.min.js') }}" type="text/javascript"></script>
@endsection
