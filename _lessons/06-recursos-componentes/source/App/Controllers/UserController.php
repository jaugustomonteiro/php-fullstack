<?php

namespace Source\App\Controllers;

use CoffeeCode\Paginator\Paginator;
use Source\Core\Connect;
use Source\Core\Controller;
use Source\Core\Message;
use Source\Core\View;
use Source\Models\User;

class UserController extends Controller {

    private $template;

    public function __construct() {
        $this->template = new View();
        $this->template->path("test", "test");
    }

    /**
     * @return void
     */
    public function home(): void {
        $getPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
        $total = Connect::getInstance()->query("SELECT COUNT(id) as total FROM users")->fetch()->total;
        $page = new Paginator("?page=");
        $page->pager($total, 3, $getPage, 2);
        echo $this->template->render("test::list", [
            "title" => "Usuário do sistema",
            "list"  => (new User())->all($page->limit(), $page->offset()),
            "pager" => $page->render(),
            "pageInit"  => "lesson-12-desmitificado-rotas.php"
        ]);
    }

    public function edit() {
        $getUser = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $user = ($getUser ? (new User())->findById($getUser) : null);
        if(!$user) {
            (new Message())->error("Usuário não encontrado")->flash();
            header("Location: ./");
            exit;
        }

        echo $this->template->render("test::user", [
            "user"      => $user,
            "pageInit"  => "lesson-12-desmitificado-rotas.php"
        ]);
    }

}