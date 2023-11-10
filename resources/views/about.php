<?php ob_start(); ?>
<h1 class="text-4xl font-serif">
    Acerca de <?php echo $this->title?>
</h1>
<div>
    <p>Este sitio web es un proyecto que busca exponer el contenido del Museo Paleontológico de la ciudad de Melchor Múzquiz Coahuila.</p>
    <p>Es un donativo de parte de Miguel A. Guajardo, para el Museo.</p>
</div>
<?php $this->content = ob_get_clean(); ?>
