<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container" style="width: auto;">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      {{ link_to(null, 'class': 'brand', 'Multisistemas Dashboard')}}
        <div class="nav-collapse">

          <ul class="nav">

            {%- set menus = [
              'Inicio': null,
              'Login' : 'session/loginOpauth'
            ] 
            -%}

            {%- for key, value in menus %}
              {% if value == dispatcher.getControllerName() %}
              <li class="active">{{ link_to(value, (key)) }}</li>
              {% else %}
              <li>{{ link_to(value,(key)) }}</li>
              {% endif %}
            {%- endfor -%}

          </ul>

      </div>
    </div>
  </div>
</div>

<div class="container main-container">
  {{ content() }}
</div>

<footer>
Made with love by the Phalcon Team

    {{ link_to("privacy", "Privacy Policy") }}
    {{ link_to("terms", "Terms") }}

© 2016 Multisistemas Team.
</footer>