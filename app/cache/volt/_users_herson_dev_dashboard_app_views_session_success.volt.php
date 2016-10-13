<?= $this->getContent() ?>
<div>
    <section>
        <?php if ($auths['auth']['raw']['gender'] == 'female') { ?>
           <h2>Bienvenida 
        <?php } else { ?>
           <h2>Bienvenido 
        <?php } ?>
        <?= $auths['auth']['raw']['given_name'] ?></h2>
        <p>A continuación encontrarás los enlaces a nuestros sistemas de información:</p>
		<h4>Enlaces</h4>
        <div class="bs-glyphicons"> 
        <ul class="bs-glyphicons-list">
        <?php foreach ($auths['modules'] as $id => $link) { ?>
        	<?php if (is_scalar($id)) { ?>
        	<a href='<?= $link ?>'>
        	<li>
        		 <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 
        		 <span class="glyphicon-class"><?= $id ?></span>
        	</li>
        	</a>
        	<?php } ?>
        <?php } ?>
        </ul>
        </div>
		
		<h4>Manuales</h4>
        <div class="bs-glyphicons"> 
        <ul class="bs-glyphicons-list">
        <?php foreach ($auths['manuals'] as $id => $link) { ?>
        	<?php if (is_scalar($id)) { ?>
        	<a href='<?= $link ?>'>
        	<li>
        		 <span class="glyphicon glyphicon-book" aria-hidden="true"></span> 
        		 <span class="glyphicon-class"><?= $id ?></span>
        	</li>
        	</a>
        	<?php } ?>
        <?php } ?>
        </ul>
        </div>
    </section>
</div>