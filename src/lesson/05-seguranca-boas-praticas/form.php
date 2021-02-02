<form class="form" action="" method="post" enctype="multipart/form-data" novalidate>
    
    <?= csrf_input(); ?>
    
    <div>
        <input type="text" name="first_name" value="<?= $data->first_name ?? "" ?>" placeholder="Primeiro Nome:" />
        <input type="text" name="last_name" value="<?= $data->last_name ?? "" ?>" placeholder="Sobre Nome:" />
        <input type="text" name="email" value="<?= $data->email ?? "" ?>" placeholder="E-mail:" />
        <input type="text" name="password" value="<?= $data->password ?? "" ?>" placeholder="Senha:" />
    </div>
    <button>Cadastre-se</button>
</form>