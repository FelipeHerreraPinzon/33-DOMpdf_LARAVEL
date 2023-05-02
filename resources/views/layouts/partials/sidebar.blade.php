<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">AppSys - Valorar</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">Bienvenido {{ auth()->user()->name }}</a>
                <input type="number" id="user_id" value="{{ auth()->user()->id }}" hidden>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-people-arrows"></i>
                        <p>
                            Personas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{  url('personas')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Clientes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ url('personas/solicitantes')}}" class="nav-link">
                                <i class="fas fa-address-card nav-icon"></i>
                                <p>Solicitantes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-signature "></i>
                        <p>
                            Solicitudes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('radicados')}}" class="nav-link">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Radicar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ url('asignados')}}" class="nav-link">
                                <i class="fas fa-hand-point-right nav-icon"></i>
                                <p>Asignar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('avaluos') }}" class="nav-link">
                        <i class="nav-icon fas fa-store-alt "></i>
                        <p>
                            Avaluos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contactos.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Contactos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>
                            Area de Trabajo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ url('areas')}} " class=" nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Visitador</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Avaluador</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Verificador</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('variables')}}" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Variables
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.documentos.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Documentos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Formatos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('inmuebles')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inmuebles</p>
                            </a>
                        </li>
                        <li class="nav-item active" @if (Request::path() == ('avaluoComercial') )class="active" @endif>
                            <a href="{{ url('avaluoComercial')}}"  class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Avalúo comercial </p>
                        <li class="nav-item">
                            <a href="{{ url('prueba')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Datos de Mercado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('consultas')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consultas</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">
                            </i>
                            <p>Cerrar sesión</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>