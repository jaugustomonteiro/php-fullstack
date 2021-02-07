<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>
    <body>
        <?php
            echo message()->success($title);
        ?>
        
        <?php if($v->section("nav")): ?>
            <nav class="message message-info"><?= $v->section("nav"); ?></nav>
        <?php else: ?>
            <p class="message message-danger">Lista de usuários</p>
        <?php endif; ?>
            
        <?= $v->section("content"); ?>
    </body>
</html>