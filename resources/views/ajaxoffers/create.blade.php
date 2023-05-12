@extends('layouts.app')
@section('content')
<div>
    <div class="container"> 
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <h1>{{ __('messages.add your offer') }}</h1>
            </div>
            {{-- <form method="POST" action="{{ url('offers\store') }}">  --}}
                <form method="POST" action="{{ route('ajaxoffers.store') }}" enctype="multipart/form-data"> 
                    {{-- <form method="POST" action="{{ route('Crud.store') }}">  --}}
                        @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Choose Photo</label>
                    <input type="file" class="form-control" name="photo" value="{{ old('name') }}">
                @error('photo')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('messages.offer name label') }}</label>
                    <input type="text" class="form-control" name={{ 'name_'.LaravelLocalization::setLocale() }} value="{{ old('name') }}" placeholder="NAME">
                @error('name_'.LaravelLocalization::setLocale())
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"> {{ __('messages.offer price label') }}</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="PRICE">
                @error('price')
                <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"> {{ __('messages.offer details label') }}</label>
                    <input type="text" class="form-control" name={{ 'details_'.LaravelLocalization::setLocale() }} value="{{ old('details') }}" placeholder="DETAILS">
                    @error('details_'.LaravelLocalization::setLocale())
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">{{ __('messages.save offer') }}</button>
            </form>
        </div>
    </div>

</div>
@endsection
@section('scripts')
    <script>
          $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('ajaxoffers.store')}}",
                data: {
                    '': 2,
                },
              
                success: function (data) {
                }, error: function (reject) {
                }
                    });        
    </script>
@stop
