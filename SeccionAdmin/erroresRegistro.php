<?php if(count($errores) > 0): ?>
<!-- Lo mismo con el sistema de error de la autenticacion -->
<div class="error">
    <?php foreach($errores as $error):?>
    <p>*<?php echo $error; ?></p>
    <?php endforeach ?>
</div>

<?php endif ?>
