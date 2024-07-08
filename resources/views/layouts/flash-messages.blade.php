
@if ($message = Session::get('success'))
    <div class="alert alert-success background-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="feather icon-minus-circle text-white"></i>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if (session('code'))
    <div class="alert alert-success background-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="feather icon-minus-circle text-white"></i>
        </button>
        <strong>{!! session('code') !!}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger background-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="feather icon-minus-circle text-white"></i>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning background-warning">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="feather icon-minus-circle text-white"></i>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info background-info">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="feather icon-minus-circle text-white"></i>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif
