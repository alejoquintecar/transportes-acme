<!-- --- --- --- Css --- --- --- -->
<link rel="stylesheet" href="assets/libraries/responsive-sidebar-submenu/assets/css/styles.css">
<!-- --- --- END Css --- --- --- -->

<!-- ========== HEADER ========== -->
<header class="header pe-0">
  <div class="header__container">
    <a href="#" class="header__logo fs-4" style="color: #0B68B0;">Indutapa</a>
    <a class="nav-link dropdown-toggle" id="image-user-dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="{{ asset('assets/images/Novitek-min.png') }}" alt="" class="header__img">
    </a>
    <ul class="dropdown-menu">
      <li>
        <button class="btn btn-outline-danger w-100" id="btn-cerrar-sesion">
          Cerrar sesión&nbsp;<i class="fa-solid fa-right-from-bracket"></i>
        </button>
      </li>
    </ul>
    <button type="button" class="btn btn-light header__toggle p-2" id="header-toggle">
      <i class='fa-solid fa-bars text-primary'></i>
    </button>
  </div>
</header>

<!-- ========== NAV ========== -->
<div class="nav nav_header p-2" style="background-color: #EFEFEF;" id="navbar">
  <nav class="nav__container">
    <div>
      <a href="#" class="nav__link nav__logo mb-1">
        <img class='nav__icon m-0' src="images/logo-acme.png" width="220">
      </a>
      <div class="nav__list border-top p-1 bg-white rounded">
        <div class="nav__items">
          <h3 class="nav__subtitle border-bottom text-primary fs-5 ps-2">Menú</h3>
          <div class="accordion accordion-flush" id="accordionFlushMenu">
            <div class="accordion-item">

            <!-- --- --- --- Usuarios --- --- --- -->
            <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Usuarios">
              <a type="button" href="#" class="accordion-button nav__link border-bottom p-1 collapsed active" data-bs-toggle="collapse" data-bs-target="#flush-collapse-usuarios" aria-expanded="false" aria-controls="flush-collapse-usuarios">
                <i class="fas fa-users text-primary"></i>&nbsp;
                <span class="nav__name" style="font-size: 1rem!important">Usuarios</span>
              </a>
            </span>
            <div id="flush-collapse-usuarios" class="accordion-collapse collapse" style="">
              <div class="accordion-body p-0">
                <div class="nav__dropdown-collapse m-0 border">
                  <div class="nav__dropdown-content p-0 bg-white">
                    <a href="/app/usuarios_list" class="nav__dropdown-item p-2 pb-1 border-bottom" style="font-size: .9rem!important">
                      <i class="fas fa-list text-primary"></i>&nbsp;<i class=" fas fa-users text-primary"></i>&nbsp;Usuarios
                    </a>                                                                                                                                                                                                                                                                                                            
                    <a href="/app/logs" class="nav__dropdown-item p-2 pb-1 border-bottom" style="font-size: .9rem!important">
                      <i class="fas fa-history text-info"></i>&nbsp;Reg. Actividad
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- --- --- --- Vehiculos --- --- --- -->
            <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Vehículos">
              <a type="button" href="#" class="accordion-button nav__link border-bottom p-1 collapsed active" data-bs-toggle="collapse" data-bs-target="#flush-collapse-vehiculos" aria-expanded="false" aria-controls="flush-collapse-vehiculos">
                <i class="fas fa-truck text-primary"></i></i>&nbsp;
                <span class="nav__name" style="font-size: 1rem!important">Vehículos</span>
              </a>
            </span>
            <div id="flush-collapse-vehiculos" class="accordion-collapse collapse" style="">
              <div class="accordion-body p-0">
                <div class="nav__dropdown-collapse m-0 border">
                  <div class="nav__dropdown-content p-0 bg-white">
                    <a href="/app/usuarios_list" class="nav__dropdown-item p-2 pb-1 border-bottom" style="font-size: .9rem!important">
                      <i class="fas fa-truck text-primary"></i>&nbsp;Vehículos
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- {% set menuPermisos = app.session.get('menuPermisos') %}
            {% for modulo in menuPermisos %}
              {% if modulo.totalVistas == 1 %}
              {% else %}

                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{modulo.mNombre}}">
                  <a type="button" href="#" class="accordion-button collapsed nav__link border-bottom p-1" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{modulo.mIndice}}" aria-expanded="false" aria-controls="flush-collapse-{{modulo.mIndice}}">
                    {% for mIcono in modulo.mIconos %}
                      <i class="{{mIcono}}"></i>&nbsp;
                    {% endfor %}
                    <span class="nav__name" style="font-size: 1rem!important">{{modulo.mNombre}}</span>
                  </a>
                </span>
                <div id="flush-collapse-{{modulo.mIndice}}" class="accordion-collapse collapse">
                  <div class="accordion-body p-0">
                    <div class="nav__dropdown-collapse m-0 border">
                      <div class="nav__dropdown-content p-0 bg-white">
                        {% for vista in modulo.vistas %}
                          {% for accion in vista.acciones %}
                            {% if accion.maVista == 1 %}
                              <a href="{{ path(accion.maNamePath) }}" class="nav__dropdown-item p-2 pb-1 border-bottom" style="font-size: .9rem!important">
                                {% for icono in accion.maIconos %}<i class="{{icono}}"></i>&nbsp;{% endfor %}{{vista.mvNombre}}
                              </a>
                            {% endif %}
                          {% endfor %}
                          
                          {# {% for accion in modulo.vistas.acciones %}
                            {% if accion.maVista == 1 %}
                              
                            {% endif %}
                          {% endfor %} #}
                        {% endfor %}
                      </div>
                    </div>
                  </div>
                </div>
              {% endif %}
            {% endfor %} -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>
<!-- ========== NAV ========== -->

<script src="assets/libraries/responsive-sidebar-submenu/assets/js/main.js" ></script>