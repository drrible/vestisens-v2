{{--<div class="container">--}}

{{--    <div class="w-50 justify-content-center d-flex m-auto">--}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block text-center mt-2">
{{--                <button type="button" class="btn btn-success btn-btn-close" data-dismiss="alert"></button>--}}
                <span>{{ $message }}</span>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block text-center mt-2">
{{--                <button type="button" class="btn btn-danger  btn-close" data-dismiss="alert"></button>--}}
                <span>{{ $message }}</span>
            </div>
        @endif

        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block text-center mt-2">
{{--                <button type="button" class="btn btn-close" data-dismiss="alert"></button>--}}
                <span>{{ $message }}</span>
            </div>
        @endif

        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block text-center mt-2">
{{--                <button type="button" class="btn btn-close" data-dismiss="alert"></button>--}}
                <span>{{ $message }}</span>
            </div>
        @endif

{{--    </div>--}}


{{--@if ($errors->any())--}}
{{--<div class="alert alert-danger">--}}
{{--    <button type="button" class=" btn btn-close" data-dismiss="alert">×</button>--}}
{{--</div>  --}}
{{--@endif--}}

{{--</div>--}}
