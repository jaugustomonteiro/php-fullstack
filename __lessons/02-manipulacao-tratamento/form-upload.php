<?php
$file_lesson = "./lesson-09.php";
?>
<form class="form-upload" action="<?= $file_lesson ?>/?post=true" method="post" enctype="multipart/form-data" novalidate>
    <p><a href="<?= $file_lesson ?>" title="atualizar">Atualizar</a></p>
    
    <input type="file" name="file" />
    
    <button>Enviar agora</button>
</form>

<!-- <?php var_dump($form); ?> -->