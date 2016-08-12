{{content()}}
<div>
    <section>
        {% if auths['auth']['raw']['gender'] == "male" %}
           <h2>Bienvenido 
        {% else %}
           <h2>Bienvenida 
        {% endif  %}
        {{ auths['auth']['raw']['given_name'] }}</h2>
        <p>A continuación encontrarás los enlaces a nuestros sistemas de información:</p>
        
        <table class="table">
        <tbody>
        <tr>
        	<th>Enlace</th>
        </tr>
        {% for id,link in auths['modules'] %}
        	{% if id is scalar %}
        	<tr>
        	<th> <a href='{{link}}'>{{id}}</a> </th>
        	</tr>
        	{% endif %}
        {% endfor %}
        </tbody>
        </table>
    </section>
</div>