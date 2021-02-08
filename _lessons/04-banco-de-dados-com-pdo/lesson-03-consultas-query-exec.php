<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Consultas com Query e Exec");

use Source\Classes03\Database\Connect;

lesson_title("Insert", __LINE__);
lesson_obs("Cadastrar dados");

$insert = "INSERT INTO users
                (first_name,last_name,email,document) 
           VALUES
                ('Augusto','Monteiro','jamonteirolima@gmail.com','2525555')
";

lesson_tag("exec => o resutado é 1(Cadastrou) ou 0 (Não cadastratrou)");

echo '
<pre>
    try {
        $exec = Connect::getInstance()->exec($insert);
        var_dump(Connect::getInstance()->lastInsertId());
    } catch (PDOException $exception) {
        var_dump($exception);
    }
</pre>
';


lesson_tag("quey => para obter (retornar dados)");

echo '
<pre>
try {
    $query = Connect::getInstance()->query($insert);
    var_dump( Connect::getInstance()->lastInsertId());
} catch (PDOException $exception) {
    var_dump($exception);
}
</pre>
';



lesson_title("Select", __LINE__);
lesson_obs("Ler/Consultar dados");

try {
    $query = Connect::getInstance()->query("SELECT * FROM users LIMIT 5");
    var_dump([
        $query,
        $query->rowCount(),
        $query->fetchAll()
    ]);
} catch (PDOException $exception) {
    var_dump($exception);
}

echo '
<pre>
try {
    $query = Connect::getInstance()->query("SELECT * FROM users LIMIT 5");
    var_dump([
        $query,
        $query->rowCount(),
        $query->fetchAll()
    ]);
} catch (PDOException $exception) {
    var_dump($exception);
}
</pre>
';

lesson_title("Update", __LINE__);
lesson_obs("Atualizar dados");

echo '
<pre>
try {
    $update = "UPDATE users SET first_name = "Augsuto", last_name = "Monteiro" WHERE id = 49";
    $exec = Connect::getInstance()->exec($update);
    var_dump($exec);
} catch (PDOException $exception) {
    var_dump($exception);
}
</pre>
';

lesson_title("Delete", __LINE__);
lesson_obs("Deletar dados");

echo '
<pre>
try {
    $delete = "DELETE FROM users WHERE id = 1";
    $exec = Connect::getInstance()->exec($delete);
    var_dump($exec);
} catch (PDOException $exception) {
    var_dump($exception);
}
</pre>
';



/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";