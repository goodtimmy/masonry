@extends('layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    {{--<img src="images/{{ Session::get('image') }}">--}}
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <h2 class="header-text">
                    upload your image
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="standart-label" for="image">upload image</label>
                        <input class="form-control input-lg standart-input" type="file" name="image" id=""
                               placeholder="choose a file"/>
                    </div>
                    <div class="form-group">
                        <label class="standart-label" for="password">title</label>
                        <input class="form-control input-lg standart-input" type="text" name="title" placeholder="image title"/>
                    </div>
                    <div class="form-group">
                        <label class="standart-label" for="password">description</label>
                        <input class="form-control input-lg standart-input" type="text" name="description" placeholder="image description"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="button button-round" value="upload"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
