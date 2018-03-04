<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - vikri.ru</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="{{elixir('css/core.css')}}" rel="stylesheet">
    @yield('css')
</head>
<body class="fixed-sn homepage-v5">

    <!-- Navigation -->
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark stylish-color-dark">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="/"><i class="fa fa-home"></i></a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                     <!-- Dropdown -->
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Навигация</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">О нас</a>
                            <a class="dropdown-item" href="#">Сделать заказ</a>
                            <a class="dropdown-item" href="#">Контакты</a>
                        </div>
                    </li>

                </ul>
                <!-- Links -->

                <!-- Search form -->
                {{--  <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                </form>  --}}
            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->

    </header>
    @yield('slider')

    <!-- Main layout -->
    <main>
        <div class="container-fluid">
            <!-- Magazine -->
            <div class="row mt-2">
                @yield('content')

                <!-- Sidebar -->
                @if (isset($categories))
                    <div class="col-xl-3 col-md-12 widget-column mt-0">

                            <!-- Section: Categories -->
                            <section class="section mb-5">
        
                                <h4 class="font-bold mt-2"><strong>Категории</strong></h4>
                                <hr class="red title-hr">
        
                                <ul class="list-group z-depth-1 mt-4">
                                    @forelse ($categories as $category)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="{{route('cat.view', [$category->slug])}}">{{$category->name}}</a>
                                            <span class="badge badge-danger badge-pill">{{$category->products_count}}</span>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </section>
                            <!-- Section: Categories -->
        
                        </div>
                    @endif
                    <!--/ Sidebar -->
                </div>
                <!--/ Magazine -->
            </div>
        </main>
        <!--/ Main layout -->
    


    <!--Footer-->
    <footer class="page-footer stylish-color-dark">

        <!--Footer Links-->
        <div class="container-fluid">

            <!-- Footer links -->
            <div class="row text-center text-md-left mt-3 pb-3">

                <!--Grid column-->
                <div class="col-md-4 col-lg-4 col-xl-4 mr-auto mt-4">
                    <h6 class="title mb-4 font-bold">Новые-Викри - село мастеров</h6>
                    <p>Художественная ковка в Дагестане. Изготавливаем кованные ворота, калитки, входные двери, лестничные перила, ограды и все что связано с кованными изделиями на заказ в Дагестане, в селении Новые-Викри (Викри, Ново-Викри)</p>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mr-auto mt-4">
                    <h6 class="title mb-4 font-bold">Доставка</h6>
                    <p>Мы выполняем доставку по всей территории Росии и вблизи находящихся государств по низкой цене.</p>
                </div>
                <!--/.Grid column-->

                <hr class="w-100 clearfix d-md-none">
                <!--Grid column-->
                <div class="col-md-4 col-lg-4 col-xl-4 mr-auto mt-4">
                    <h6 class="title mb-4 font-bold">Контакты</h6>
                    <p><i class="fa fa-home mr-3"></i> с.Новые-Викри, Каякентский р-н, Республика Дагестан</p>
                    <p><i class="fa fa-envelope mr-3"></i> vikri.kovka@gmail.com</p>
                    <p><i class="fa fa-phone mr-3"></i> +7 (989) 86 63 670</p>
                    <p><i class="fa fa-phone mr-3"></i> 8 (989) 86 63 670</p>
                </div>
                <!--/.Grid column-->

            </div>
            <!-- Footer links -->

            <hr>

            <div class="row py-3 d-flex align-items-center">

                <!--Grid column-->
                <div class="col-md-8 col-lg-9">

                    <!--Copyright-->
                    <p class="text-center text-md-left grey-text">© 2018 Copyright: <a href="#"><strong> DCMSX</strong></a></p>
                    <!--/.Copyright-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 col-lg-3 ml-lg-0">

                    <!--Social buttons-->
                    <div class="social-section text-center mr-auto text-md-left">
                        <ul>
                            <li><a href="https://www.instagram.com/vikri.kovka/" target="_blank" class="btn-floating btn-sm rgba-white-slight mr-xl-4"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.facebook.com/vikri.kovka/" target="_blank" class="btn-floating btn-sm rgba-white-slight mr-xl-4"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                    <!--/.Social buttons-->

                </div>
                <!--Grid column-->

            </div>

        </div>

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{elixir('js/jquery.js')}}"></script>

    <!-- Tooltips -->
    <script type="text/javascript" src="{{elixir('js/core.js')}}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{elixir('js/mdb.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    @verbatim
    <script>
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("/mdb-lightbox-ui.html");
        });
        $(document).ready(function() {
            console.log('=)');
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <style>
        .select2{
            width: 100% !important;
        }
    </style>
    @endverbatim

</body>

</html>