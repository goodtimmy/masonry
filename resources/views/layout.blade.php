<!DOCTYPE html>
<html>
<head>

    <title>Regex</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"/>

    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- vue -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

</head>
<body>

<div class="container-fluid">
    <div class="navbar">
        <div class="logo">
            <h3 class="logo"
                onclick="location.href='main';"
            >Project name</h3>
        </div>
        <nav>
            <ul>
                @if (Auth::check())
                    <li class="button button-favorites"> moderation</li>
                @endif

                @if (Auth::check())
                    <li class="button button-favorites"><i class="fas fa-heart"></i> favorites</li>
                @endif

                <li class="button button-upload"
                    onclick="location.href='image-upload';"
                >upload
                </li>

                @if (Auth::check())
                    <li class="button button-login"
                        onclick="location.href='logout';"
                    >logout
                    </li>                @else
                    <li class="button button-login"
                        onclick="location.href='login';"
                    >login
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    @yield('content')
</div>

<script>
    $(document).ready(function(){
        $('#formSubmit').click(function(e){

            $.ajax({
                url: "{{ url('/main') }}",
                method: 'post',
                data: {
                    name: $('#name').val(),
                    auther_name: $('#auther_name').val(),
                    description: $('#description').val(),
                },
                success: function(result){
                    if(result.errors)
                    {
                        $('.alert-danger').html('');

                        $.each(result.errors, function(key, value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<li>'+value+'</li>');
                        });
                    }
                    else
                    {
                        $('.alert-danger').hide();
                        $('#exampleModal').modal('hide');
                    }
                }
            });
        });
    });
</script>

</body>
</html>






