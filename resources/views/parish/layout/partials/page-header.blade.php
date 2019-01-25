<section class="sa-page-title text-left">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $pageTitle }}</h1>       
            </div>
            <div class="col-md-12">
                <nav class="breadcrumb">
                <ul>
                    <li class="breadcrumb-item"><a href="{{ route('parish.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                </ul>
                </nav>
            </div>
        </div>
    </div>
</section>