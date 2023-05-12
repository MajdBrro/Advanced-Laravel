<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
        
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> 
                            {{ $properties['native'] }} 
                        </a>
                    </li>
                @endforeach
                </ul>
              
            </div>
        </nav>        
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{ __('messages.add your offer') }}
        </div>
        {{-- <form method="POST" action="{{ url('offers\store') }}">  --}}
            <form method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data"> 
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
</body>
</html>