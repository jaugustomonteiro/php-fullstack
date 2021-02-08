<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Paginador de resultados");

use Source\Support\Pager;

lesson_title("Paginator", __LINE__);

echo <<<STYLE
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
STYLE;


$total = db()->query("SELECT COUNT(id) as total FROM users")->fetch()->total;
$getPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);

$page = new Pager("?page=");
$page->pager($total, 20, $getPage, 2);

$users = user()->all($page->limit(), $page->offset());

echo $page->render();

/** @var User */
foreach ($users as $user) {
    $register = date_fmt($user->created_at);
    echo <<<USER
        <article>
            <h1>{$user->first_name} {$user->last_name}</h1>
            <p>{$user->email} Registrado em {$register}</p>
        </article>
    USER;
}




var_dump($total);


/****************************************************************
 *  echo "<p>" . COURSE . "</p>";                               *
 *  lesson_title($title = "include include_ondce", __LINE__);   *
 *  heder_lesson("Requisição de arquivos");                     *
 *  lesson_obs("bolean");                                       *
 ****************************************************************/
require __DIR__ . "/../_shared/footer.php";