 <?php
/**
 * Arquivo que simula um servidor rest que pega a requisição e retorna os dados
 *  da classe de serviço que é chamada e executada de forma automatica através 
 *  do método call_user_func e retorna os dados para o usuario em formato json.
 */
header('Content-Type: application/json; charset=utf-8');

require_once './Lib/Livro/Core/ClassLoader.php';
$al= new Livro\Core\ClassLoader;
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

require_once './Lib/Livro/Core/AppLoader.php';
$al= new Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->addDirectory('App/Services');
$al->register();


// Mecanismos que identifica qual classe ou método está sendo buscada.
class LivroRestServer{
    public static function run($request) {
        $class = isset($request['class']) ? $request['class'] : '';
        $method = isset($request['method']) ? $request['method'] : '';
        try {
            
            if(class_exists($class)){
                if(method_exists($class, $method)){
                    $response = call_user_func([$class, $method], $request);
                    return json_encode( ['status' => 'sucess', 'data' => $response] );
                } else {
                    return json_encode( ['status' => 'error', 'data' => "Método {$method} não encontrado"] );
                }
            } else {
                 return json_encode( ['status' => 'error', 'data' => "Classe {$class} não encontrada"] );
            }
             
        } catch (Exception $ex) {
             return json_encode( ['status' => 'error', 'data' => $ex->getMessage()] );
        }
    }
}

print LivroRestServer::run($_REQUEST);

