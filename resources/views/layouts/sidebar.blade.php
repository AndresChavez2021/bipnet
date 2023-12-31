    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">

                <img class="img-fluid" src="{{ asset('assets/img/portfolio/logo.webp') }}" alt="Logo de BIPNET">


            </div>

            <ul class="list-unstyled components">
                <li class="{{ 'home' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/home') }}">
                        <i class="fas fa-home"></i>
                        <b>Home</b>
                    </a>
                </li>

                <li class="">
                    <a href="#UserMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-users"></i>
                        <b>USUARIOS</b>
                    </a>
                    <ul class="collapse list-unstyled" id="UserMenu">
                        <li class="{{ 'empleados' == Request::is('empleados*') ? 'active' : '' }}">
                            <a href="{{ url('/empleados') }}"><i class="fa fa-user-tie"></i> <b>Empleados</b></a>
                        </li>
                        
                        <li class="{{ 'users' == Request::is('users*') ? 'active' : '' }}">
                            <a href="{{ url('/users') }}"><i class="fa fa-users"></i> <b>Usuarios</b></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-clipboard"></i> <b>Bitácora</b></a>
                        </li>
                        <li class="{{ 'roles' == Request::is('roles*') ? 'active' : '' }}">
                            <a href={{ url('/roles') }}><i class="fa fa-user-lock"></i> <b>Privilegios</b></a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#VentasMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-chart-line"></i>
                            <b>VENTAS</b>
                     </a>
                    <ul class="collapse list-unstyled" id="VentasMenu">
                              <!-- Agrega un nuevo ítem dentro de "Ventas" llamado "Oportunidades" -->
                            <li class="{{ 'clientes' == Request::is('clientes*') ? 'active' : '' }}">
                                <a href="{{ url('/clientes') }}"><i class="fa fa-user"></i> <b>Clientes</b></a>
                            </li>
                            <li>
                                <a href="{{ url('/oportunidades') }}"><b>Oportunidades</b></a>
                            </li>
                            <li>
                                <a href="{{ url('/actividades') }}"><b>Actividades</b></a>
                            </li>
                            <li>
                                <a href="{{ url('/cotizaciones') }}"><b>cotizaciones</b></a>
                            </li>
                     </ul>
                </li>

                <li class="">
                    <a href="#AnalisisMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-chart-bar"></i>
                        <b>ANÁLISIS DE SERIE TEMPORAL</b>
                    </a>
                    <ul class="collapse list-unstyled" id="AnalisisMenu">
                        <!-- Agrega un nuevo ítem dentro de "Análisis de Serie Temporal" llamado "Pronóstico de Ventas" -->
                        <li>
                            <a href="{{ url('/pronostico-ventas') }}"><b>Pronóstico de Ventas</b></a>
                        </li>
                        <li>
                            <a href="{{ url('/pronostico-productos') }}"><b>Pronóstico de Productos</b></a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#ServiceMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-cube"></i>
                        <b>PRODUCTOS <br> Y SERVICIOS </b>
                    </a>
                    <ul class="collapse list-unstyled" id="ServiceMenu">
                        <li>
                            <a href={{ url('/estados') }}><b>Etiquetas</b></a>
                        </li>
                        {{--  <li>
                            <a href={{ url('/categorias') }}><b>Categorias</b></a>
                        </li>--}}
                        <li>
                            <a href={{ url('/servicios') }}><b>Productos y servicios </b></a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        <b>Contact</b>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <!--<div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>
        </div>-->
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
