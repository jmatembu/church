@extends('layouts.site')

@section('metaKeywords')
    "Find Parish, Catholic Parish, Cathedral, near you"
@endsection

@section('metaDescrition')
    "Find a Catholic Parish near your. Simply search for available parishes'
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
                    <h1>Find a Parish</h1>
                </div>
                <div class="col-md-12">
                    <nav class="breadcrumb">
                        <ul>
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Parishes</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="sa-intro-section sa-intro-section-3 pd-default-3">
        <div class="container">

            <div class="table-responsive mb-5">
                <table class="datatable">
                    <thead class="d-none">
                        <th>Parish</th>
                    </thead>
                    <tbody>
                    @foreach($parishes as $parish)
                        <tr>
                            <td class="border-0 px-0">
                                <h2 class="h4"><a href="#">{{ $parish->name }}</a></h2>
                                <p class="mb-1">{{ $parish->description }}</p>
                                <p><strong>Diocese: </strong>{{ $parish->diocese->name }}, <strong>Address: </strong> {{ $parish->main_address }}</p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-center">
                <div class="col-8 text-center">
                    <h3>Didn't find the parish you were looking for?</h3>
                    <p>There are thousands of Catholic parishes allover the world, help us add more to the site. Use this <a href="{{ route('home') }}#site-feedback">feedback form</a> to let us know of the parish you want us to add. Please ensure you give us full details of the parish including its contact details. We will contact the parish to verify and request permission to be added onto <a href="{{ route('home') }}">{{ config('app.name') }}</a>.</p>
                </div>
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
