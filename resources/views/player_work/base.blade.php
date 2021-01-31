<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MelodiousWeb</title>
    <link rel="icon" href="https://p1.hiclipart.com/preview/581/116/844/minimal-icons-icon-256x256-2x-music-logo-png-clipart.jpg">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>

<style>
    #nav_bg{
        background: rgb(252,169,169);
        background: linear-gradient(90deg, rgba(252,169,169,1) 0%, rgba(246,80,80,1) 55%);
        box-shadow: 0 2px 4px 2px rgba(0,0,0,0.25)
    }
    #brand_font{
        font-family: Quicksand;
        font-size: 25px;
    }
    #icon_design{
        font-size: 17px;
        color:rgb(228, 228, 228);
        cursor: pointer;
        margin: 7px;
        transition: 0.3s;
    }
    #icon_design:hover{
        color:rgb(11, 12, 15);
        transition: 0.3s;
    }


</style>

<body class="text-white" style="font-family:Quicksand;background: #2a2d38">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="nav_bg">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-dark" href="{{route('index')}}" id="brand_font"><img src="https://www.freeiconspng.com/uploads/music-red-symbol-free-icon-27.png" width="50"> MelodiousWeb</a>

            <form action="{{route('index')}}" method="get" class="w-50">
                <div class="input-group">
                    <div class="input-group-text border-0" style="border-top-left-radius: 100px;border-bottom-left-radius: 100px;">
                        <i class="fas fa-music" style="color:rgba(207, 73, 97, 0.918);"></i>
                    </div>
                    <input type="search" name="search"
                    class="form-control shadow-none border-0"
                    placeholder="search for Songs, Artists, Album..." style="font-family:Quicksand;font-size:13px;">
                    <div class="input-group-append">
                        <button class="border-0 btn shadow-none"
                         type="submit" name="find" style="background-color:rgba(206, 35, 66, 0.473);border-top-right-radius: 100px;border-bottom-right-radius: 100px;">
                            <i class="fas fa-search text-white"></i>
                        </button>
                    </div>
                </div>
            </form>


            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#create_new_album" href="#" style="font-family:Quicksand;">Create New Album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#add_artist" href="#" style="font-family:Quicksand;">Add Artist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#new_track" href="#" style="font-family:Quicksand;">New Track</a>
                    </li>
                    <form action="{{route('logout')}}" method="POST">
                        <input type="submit" class="bg-danger bg-gradient mt-1 ms-1 btn btn-sm text-white" value="LogOut">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-family:Quicksand;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-family:Quicksand;">RegisterNow</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-family:Quicksand;"><i class="fas fa-file-pdf"></i> Report</a>
                    </li>
                @endif

            </ul>

        </nav>

@yield('content')

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
