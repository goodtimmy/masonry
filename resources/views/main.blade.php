@extends('layout')
@section('content')

    <div class="container-fluid">

        <div class="masonry"
             id="masonry-container">

            @foreach ($images as $image)

                <div class="box">
                    <img src="images/{{ $image->stored_name }}"
                         @click="showImageInModal('{{ $image->stored_name }}')">
                    <h2>{{ $image->title }}</h2>

                    @if($image->email )
                    <span>Author: {{ $image->email }}</span>
                    @endif

                    <p>
                        {{ $image->description }}
                    </p>
                    {{--<i class="fas fa-heart"></i> {{ $image->favorites }}--}}
                </div>

            @endforeach

        </div>

        <div class="row">
            <div class="col text-center">
                <button class="button button-round button-green">load more</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="full_size_image" src="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        var app = new Vue({
            el: '#masonry-container',
            data: {
                active: 0,
                image_name: 'gg'
            },
            components: {},
            methods: {
                showImageInModal: function (image_name) {

                    $("#exampleModal").modal('show');
                    $("#exampleModalLabel" ).text(image_name);
                    $('#full_size_image').attr('src', 'images/'+ image_name);
                }

            },
            mounted: function () {


            },
            watch: {}
        });

    </script>

@endsection
