
<form class="form" action="./?post=true" method="<?= $form->method; ?>" enctype="multipart/form-data" novalidate>
    <p><a href="" title="atualizar">Atualizar</a></p>
    <div>
        <input type="text" name="name" value="<?= $form->name; ?>" placeholder="Nome:" />
        <input type="text" name="mail" value="<?= $form->mail; ?>" placeholder="E-mail:" />
    </div>
    <button>Enviar agora</button>
</form>

<!-- <?php var_dump($form); ?> -->