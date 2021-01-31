<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e boas práticas <br> Configuração do php.ini");

lesson_title("RFI and DoS", __LINE__);

echo "
<pre>
/*
 * [ allow_url_fopen | allow_url_include ] Com eles sua aplicação fica vulnerável a
 * ataques de inclusão remotas de arquivos (RFI) e negação de serviços (DoS).
 *
 * RFI: File Remote Inclusion
 * DoS: Denial of service
 */
</pre>";

var_dump([
    "allow_url_fopen" => ini_get('allow_url_fopen'),
    "allow_url_include" => ini_get('allow_url_include')
]);

lesson_title("memory and time", __LINE__);
echo "
<pre>
/*
 * [ DoS (Denial of Service) ] Configurações que melhoram performance e ajudam a evitar
 * ataques de negação de serviço.
 *
 * [ memory_limit ] 64m (pequenas), 128m (a maioria) e 512m ou + (grandes) de memória alocada
 * para o PHP. Uma regra básica de 1/4 (da memória do servidor) pode ser aplicada.
 *
 * [ max_execution_time ] O padrão é 30s, mas vamos buscar o mínimo possível ou o máximo
 * aceitável (5s) para seu usuário esperar.
 *
 * [ max_input_time ] É o tempo que o PHP interpreta dados vindos via GET ou POST. O padrão
 * é 60 segundos, e esse é um bom número devido ao tratamento da aplicação.
</pre>";
var_dump([
    "memory_get_peak_usage" => $mem = memory_get_peak_usage(),
    "memory_get_peak_usage | M" => number_format($mem / (1024 * 1024), 2) . "M",
], [
    "memory_limit" => ini_get("memory_limit"),
    "max_execution_time" => ini_get("max_execution_time"),
    "max_input_time" => ini_get("max_input_time")
]);

lesson_title("post and files", __LINE__);
echo "
<pre>
/*
 * [ post_max_size ] Limite máximo permitido em dados vindos de um formulário.

 * [ max_input_nesting_level ] Profundidade máxima permitida em um vetor. (GET, POST)
 *
 * [ file_uploads ] Permiter ou não o envio de arquivos em formulários.
 *
 * [ upload_max_filesize ] Tamanho máximo de UM arquivo no formulário.
 *
 * [ max_file_uploads ] Quantidade máxima de arquivos em UMA requisição
</pre>";

var_dump([
    "post_max_size" => ini_get("post_max_size"),
    "max_input_nesting_level" => ini_get("max_input_nesting_level"),
    "file_uploads" => ini_get("file_uploads"),
    "upload_max_filesize" => ini_get("upload_max_filesize"),
    "max_file_uploads" => ini_get("max_file_uploads") //padrão 20
]);


lesson_title("buffering", __LINE__);
echo "
<pre>
/*
 * [ output_buffering ] Limita a quantidade de requisições melhorando a performance da
 * aplicação ao empurrar todos os comandos de saída para o final da requisição.
 *
 * [ implicit_flush ] Em off para empurrar o buffering para o final da saída. Em on
 * para descarregar a cada echo, print, etc.
 */
</pre>";

var_dump([
    "output_buffering" => ini_get("output_buffering"),
    "implicit_flush" => ini_get("implicit_flush")
]);

lesson_title("realpath", __LINE__);
echo "
<pre>
/*
 * [ realpath_cache_size ] O PHP consegue manter um cache de arquivos usados em sua
 * aplicação para evitar reprocessamento e com isso melhora a performance.
 *
 * [ realpath_cache_ttl ] É o tempo em segundos deste cache.
 */
</pre>";

 var_dump([
    "realpath_cache_size()" => realpath_cache_size(),
], [
    "realpath_cache_size" => ini_get("realpath_cache_size"),
    "realpath_cache_ttl" => ini_get("realpath_cache_ttl")
]);


lesson_title("opcache", __LINE__);
echo "
<pre>
/*
 * [ OPcache ] Um cache bytecode de scripts PHP pré-compilados em memória compartilhada
 * que elimina a necessidade do PHP carregar e analisar scripts em cada requisição.
 */
</pre>";

var_dump(
    opcache_get_configuration(),
    opcache_get_status()["scripts"]
);


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";