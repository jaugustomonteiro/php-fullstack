<?php $v->layout("test::base", [
    "title" => "Editando usuário {$user->first_name}"
]); ?>

<?php $v->start("nav"); ?>
<a href="<?=$pageInit;?>" title="Voltar">Voltar</a>
<?php $v->stop(); ?>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $user->first_name; ?>">
    <input type="text" name="name" value="<?= $user->last_name; ?>">
    <input type="text" name="name" value="<?= $user->email; ?>">
    <button>Atualizar usuário</button>    
   
</form>