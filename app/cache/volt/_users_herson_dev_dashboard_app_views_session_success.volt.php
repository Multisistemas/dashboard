<?php echo $this->getContent(); ?>
<div>
    <section>
        <?php if ($auths['auth']['raw']['gender'] == 'male') { ?>
           <h2>Bienvenido 
        <?php } else { ?>
           <h2>Bienvenida 
        <?php } ?>
        <?php echo $auths['auth']['raw']['given_name']; ?></h2>
        <p>A continuación encontrarás los enlaces a nuestros sistemas de información:</p>
        
        <table class="table">
        <tbody>
        <tr>
        	<th>Enlace</th>
        </tr>
        <?php foreach ($auths['modules'] as $id => $link) { ?>
        	<?php if (is_scalar($id)) { ?>
        	<tr>
        	<th> <a href='<?php echo $link; ?>'><?php echo $id; ?></a> </th>
        	</tr>
        	<?php } ?>
        <?php } ?>
        </tbody>
        </table>

        <table class="table">
        <tbody>
        <tr>
        	<th>Manuales</th>
        </tr>
        <?php foreach ($auths['manuals'] as $id => $link) { ?>
        	<?php if (is_scalar($id)) { ?>
        	<tr>
        	<th> <a href='<?php echo $link; ?>'><?php echo $id; ?></a> </th>
        	</tr>
        	<?php } ?>
        <?php } ?>
        </tbody>
        </table>
    </section>
</div>