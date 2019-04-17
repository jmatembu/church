<footer id="footer">
    <!-- Footer-Top -->
    <div class="footer_top secondary-bg pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt-3 pb-0">
                    <p class="text-white">&copy; {{ date('Y') }} {{ config('app.name') }}</p>
                </div>
                <div class="col-md-8 text-right pt-3 pb-0">
                    <a href="{{ route('pages.terms') }}">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer-Top -->
</footer>
