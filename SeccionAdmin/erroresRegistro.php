<?php if(count($errores) > 0): ?>

<div class="error">
    <?php foreach($errores as $error):?>
    <p>*<?php echo $error; ?></p>
    <?php endforeach ?>
</div>

<?php endif ?>
