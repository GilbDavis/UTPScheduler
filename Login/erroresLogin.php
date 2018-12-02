<?php if (count($errors) > 0): ?>
<!-- Se cuenta la cantidad de errores y se muestra en el inicio de sesion -->
<div class="error">
    <?php foreach ($errors as $error):?>
    <p>*<?php echo $error; ?></p>
    <?php endforeach ?>
</div>

<?php endif ?>
