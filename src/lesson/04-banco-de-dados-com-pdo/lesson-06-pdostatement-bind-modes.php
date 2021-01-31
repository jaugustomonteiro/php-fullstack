<?php

use Source\Classes03\Database\Connect;

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> PDOStatement e bind modes");

lesson_title("Prepared statement", __LINE__);
$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 1");

$stmt->execute();

var_dump(
    $stmt,
    $stmt->rowCount(),
    $stmt->columnCount(),
    $stmt->fetch()
);


lesson_title("STMT bind value", __LINE__);

/*
$stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindValue(":id", 50, PDO::PARAM_INT);
$stmt->execute();
var_dump($stmt->fetch());
*/

/*
$stmt = Connect::getInstance()->prepare(
    "INSERT INTO users(first_name, last_name)
                VALUES(?, ?)    
");

$stmt->bindValue(1, "Augusto", PDO::PARAM_STR);
$stmt->bindValue(2, "Monteiro", PDO::PARAM_STR);

$stmt->execute();

var_dump(
    $stmt->rowCount(),
    Connect::getInstance()->lastInsertId()
);
*/

echo '
<pre>
$stmt = Connect::getInstance()->prepare(
    "INSERT INTO users(first_name, last_name)
                VALUES(:first_name, :last_name)    
");

$stmt->bindValue(":first_name", "Augusto", PDO::PARAM_STR);
$stmt->bindValue(":last_name", "Monteiro", PDO::PARAM_STR);

$stmt->execute();

var_dump(
    $stmt->rowCount(),
    Connect::getInstance()->lastInsertId()
);
</pre>
';

lesson_title("STMT bind param", __LINE__);

echo '
<pre>
$stmt = Connect::getInstance()->prepare(
    "INSERT INTO users(first_name, last_name)
                VALUES(:first_name, :last_name)    
");

$firstName = "Marcio";
$lastName = "Lima". 

$stmt->bindParam(":first_name", $firstName, PDO::PARAM_STR);
$stmt->bindParam(":last_name", $lastName, PDO::PARAM_STR);

$stmt->execute();

var_dump(
    $stmt->rowCount(),
    Connect::getInstance()->lastInsertId()
);
</pre>
';


lesson_title("STML execute array", __LINE__);

echo '
<pre>
$stmt = Connect::getInstance()->prepare(
    "INSERT INTO users(first_name, last_name)
     VALUES(:first_name, :last_name)    
");

$user = [
    "first_name"    => "Augusto",
    "last_name"     => "Monteiro", 
];

$stmt->execute($user);

var_dump(Connect::getInstance()->lastInsertId());
</pre>
';




lesson_title("Bind Column", __LINE__);

echo '
<pre>
$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 3");
$stmt->execute();

$stmt->bindColumn("first_name", $name);
$stmt->bindColumn("email", $email);

/*
foreach ($stmt->fetchAll() as $user) {
    var_dump($user);
    lesson_message("O email de ${name} é {$email}");
}
*/

while($user = $stmt->fetch()) {
    //var_dump($user);
    lesson_message("O email de ${name} é {$email}");
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