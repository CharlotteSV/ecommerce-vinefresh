<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Ecommerce Vinefresh</title>
    </head>
    <body>
        <div class="topnav" style="background-color:darkblue">
            <h4 class="card-header" style="color: white">Ecommerce Vinefresh</h4>
        </div>
        <div class="container">
            <div class="card" style="margin: 20px">                
                <h4 class="card-header">Gestionar Sucursal</h4>
                <div class="card-body">
                    <!--Navbar-->
                    <nav class="navbar navbar-light lighten-4 hover">
                    <!-- Navbar brand -->
                        <a class="navbar-brand" href="">Sucursales</a>
                    
                        <!-- Collapse button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><span></button>
                    
                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                        <!-- Links -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="">Seleccione Sucursal<span class="sr-only">(current)</span></a>
                            </li>
                            @foreach ($sucursales as $item)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('verSucursal', $item->SUC_CODIGO) }}">{{$item->SUC_NOMBRE}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Links -->            
                        </div>
                        <!-- Collapsible content -->                
                    </nav>
                    <!--/.Navbar-->
                </div>       
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>