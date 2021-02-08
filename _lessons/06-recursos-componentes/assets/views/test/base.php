<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        /*PAGINATOR EXEMPLE*/
        .paginator {
        display: block;
        text-align: center;
        list-style: none;
        padding: 0;
        margin-top: 30px;
        }

        .paginator_item {
        display: inline-block;
        margin: 0 10px;
        padding: 4px 12px;
        background: #a287e7;
        color: #fff;
        text-decoration: none;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        }

        .paginator_item:hover {
        background: #8a6ed5;
        }

        .paginator_active,
        .paginator_active:hover {
        background: #cccccc;
        }
    </style>
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