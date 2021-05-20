@extends('layout')
@section('content')

    <div class="container-fluid">
        <div class="masonry"
             id="masonry-container">

            @foreach ($images as $image)

                <div class="box">
                    <img src="images/{{ $image['stored_name'] }}"
                         @click="showImageInModal()">
                    <h2>{{ $image['title'] }}</h2>
                    <p>
                        {{ $image['description'] }}
                    </p>
                    <i class="fas fa-heart"></i> {{ $image['favorites'] }}
                </div>

            @endforeach

        </div>

        <div class="row">
            <div class="col text-center">
                <button class="button button-round button-green">load more</button>
            </div>
        </div>
    </div>

@endsection
