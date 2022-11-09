<?php
namespace Livro\DataBase;

require_once 'Transaction.php';

/**
 * Description of AbstractRecord
 * 
 * Essa super classe abstrata que persiste os dados de um objeto em uma tabela, de 
 *  forma generica, fazendo uso de métodos magicos e armazenando em um vetor de 
 *  dados, os métodos concretos froArray() e toArray() atribuem e retornam o 
 *  array de dados, os metodos load(), store() e delete() fazem alterações na tabela 
 *  de acordo com o nome retornado do método getEntity(), chamando internamente 
 *  os metodos prepared() e escape() que preparam e validam o vetor de dados.
 * 
 * Qualquer objeto em conformidade com a tabela de dados pode ser criado com uma
 * clase que instâncie essa super classe.
 * 
 * @author raul alencar
 * @date 18 de Setembro de 2022
 * 
 */
abstract class AbstractRecord {
    
//    protected array $data;
//
////    METODOS MAGICOS
//    public function __construct($id = null) {
//        if ($id) {
//            $object = $this->load($id);
//            if ($object) {
//                $this->fromArray($object->toArray());
//            }
//        }
//    }
//
//    public function __set($name, $value) {
//        if ($value === null) {
//            unset($this->data[$name]);
//        }
//
//        $this->data[$name] = $value;
//    }
//
//    public function __get($name) {
//        if (isset($this->data[$name])) {
//            return $this->data[$name];
//        }
//    }
//
//    public function __isset($name) {
//        return isset($this->data[$name]);
//    }
//
//    public function __clone() {
//        unset($this->data['id']);
//    }
//
////    METODOS CONCRETOS
//    public function fronArray($data) {
//        $this->data = $data;
//    }
//
//    public function toArray() {
//        return $this->data;
//    }
//
//    public function getEntity() {
//        $class = get_class($this);
//
//        return constant("{$class}::TABLENAME");
//    }
//
////   METODOS DE PERSISTENCIA 
////   Retorna os dados da tabela em forma de objeto
//    public function load(int $id) {
//        $sql = "SELECT * FROM {$this->getEntity()}";
//        $sql." WHERE id=" . (int) $id;
//        if ($conn = Transaction::get()) {
//
//            Transaction::log($sql);
//            $stmt = $conn->query($sql);
//
//            if ($result) {
//                $object = $result->fetchObject(get_class($this));
//            }
//            return $object;
//        } else {
//            throw new Exception("Sem transação ativa");
//        }
//    }
//    
//    
//
////    Grava ou atualiza os dados de acordo com o id dentro do vetor de dados 
//    public function store() {
//
//        if (empty($this->data['id']) || (!$this->load($this->data['id']))) {
//            $prepared = $this->prepared($this->data);
//
//            if (empty($this->data['id'])) {
//                $this->data['id'] = $this->getLastId();
//                $prepared['id'] = $this->data['id'];
//            }
//            $sql = "INSERT INTO {$this->getEntity()}" .
//                    '(' . implode(',', array_keys($prepared)) . ')'
//                    . "VALUES" .
//                    '(' . implode(',', array_values($prepared)) . ')';
//        } else {
//            $prepared = $this->prepared($this->data);
//
//            $set = [];
//            foreach ($prepared as $colunm => $value) {
//                if ($colunm !== 'id') {
//                    $set[] = "$colunm = $value";
//                }
//            }
//
//            $sql = "UPDATE {$this->getEntity()}";
//            $sql .= " SET " . implode(',', $set);
//            $sql .= " WHERE id= " . (int) $this->data['id'];
//        }
//        if ($conn = Transaction::get()) {
//            Transaction::log($sql);
//            return $conn->exec($sql);
//        } else {
//            throw new Exception("Sem transação ativa");
//        }
//    }
//
////    Deleta os dados da tabela de acordo com o id informado ou o id presente no
////     vetor de dados.
//    public function delete(int $id = null) {
//
//        $id = $id ? $id : $this->data['id'];
//        $sql = "DELETE FROM {$this->getEntity()} WHERE id= {$id}";
//
//        if ($conn = Transaction::get()) {
//            Transaction::log($sql);
//            return $conn->exec($sql);
//        } else {
//            throw new Exception("Sem transação ativa");
//        }
//    }
//
////    Esse metodo é chamado dentro do metodo de persistencia e é responsavel por
////    verificar os dados do vetor 
//    private function prepared(array $data) {
//        $prepared = [];
//        foreach ($data as $key => $value) {
//            if (is_scalar($value)) {
//                $prepared[$key] = $this->escape($value);
//            }
//        }
//        return $prepared;
//    }
//
//// Esse metodo é chamado dentro do metodo prepared() e é responsavel por os 
////    valores do vetor e retornar para o banco as decisoes dependendo do tipo 
////    de dado
//    private function escape($value) {
//        if (is_string($value) && (!empty($value))) 
//        {
////            adiciona \ em aspas
////            $value = addcslashes($value)        ;
//            return "'$value'";
//        } elseif (is_bool($value)) {
//            return $value ? 'TRUE' : 'FALSE';
//        } elseif ($value !== '') {
//            return $value;
//        } else {
//            return 'NULL';
//        }
//    }
//
////    Método responsavel por retornar o id de qualquer tabela retornada pelo 
////    metodo getentity();
//    public function getLastId() {
//        $sql = "SELECT * FROM {$this->getEntity()};";
//        $conn = Transaction::get();
//
//        $result = $conn->query($sql);
//        Transaction::log($sql);
//
//        return $result->rowCount() + 1;
//    }
//    
//    
//
////    ???????????????????????????????????????????????
//    public function testeData() {
////        print_r(array_values($this->data));
//        $prepared = $this->prepared($this->data);
//        print_r($prepared);
//    }
    
    
    
    protected $data; // array contendo os dados do objeto
    
    /**
     * Instancia um Active Record. Se passado o $id, já carrega o objeto
     * @param [$id] = ID do objeto
     */
    public function __construct($id = NULL)
    {
        if ($id) // se o ID for informado
        {
            // carrega o objeto correspondente
            $object = $this->load($id);
            if ($object)
            {
                $this->fromArray($object->toArray());
            }
        }
    }
    
    /**
     * Limpa o ID para que seja gerado um novo ID para o clone.
     */
    public function __clone()
    {
        unset($this->data['id']);
    }
    
    /**
     * Executado sempre que uma propriedade for atribuída.
     */
    public function __set($prop, $value)
    {
        // verifica se existe método set_<propriedade>
        if (method_exists($this, 'set_'.$prop))
        {
            // executa o método set_<propriedade>
            call_user_func(array($this, 'set_'.$prop), $value);
        }
        else
        {
            if ($value === NULL)
            {
                unset($this->data[$prop]);
            }
            else
            {
                // atribui o valor da propriedade
                $this->data[$prop] = $value;
            }
        }
    }
    
    /**
     * Executado sempre que uma propriedade for requerida
     */
    public function __get($prop)
    {
        // verifica se existe método get_<propriedade>
        if (method_exists($this, 'get_'.$prop))
        {
            // executa o método get_<propriedade>
            return call_user_func(array($this, 'get_'.$prop));
        }
        else
        {
            // retorna o valor da propriedade
            if (isset($this->data[$prop]))
            {
                return $this->data[$prop];
            }
        }
    }
    
    /**
     * Retorna se a propriedade está definida
     */
    public function __isset($prop)
    {
        return isset($this->data[$prop]);
    }
    
    /**
     * Retorna o nome da entidade (tabela)
     */
    private function getEntity()
    {
        // obtém o nome da classe
        $class = get_class($this);
        
        // retorna a constante de classe TABLENAME
        return constant("{$class}::TABLENAME");
    }
    
    /**
     * Preenche os dados do objeto com um array
     */
    public function fromArray($data)
    {
        $this->data = $data;
    }
    
    /**
     * Retorna os dados do objeto como array
     */
    public function toArray()
    {
        return $this->data;
    }
    
    /**
     * Armazena o objeto na base de dados
     */
    public function store()
    {
        $prepared = $this->prepare($this->data);
        
        // verifica se tem ID ou se existe na base de dados
        if (empty($this->data['id']) or (!$this->load($this->id)))
        {
            // incrementa o ID
            if (empty($this->data['id']))
            {
                $this->id = $this->getLast() +1;
                $prepared['id'] = $this->id;
            }
            
            // cria uma instrução de insert
            $sql = "INSERT INTO {$this->getEntity()} " . 
                   '('. implode(', ', array_keys($prepared))   . ' )'.
                   ' values ' .
                   '('. implode(', ', array_values($prepared)) . ' )';
        }
        else
        {
            // monta a string de UPDATE
            $sql = "UPDATE {$this->getEntity()}";
            // monta os pares: coluna=valor,...
            if ($prepared) {
                foreach ($prepared as $column => $value) {
                    if ($column !== 'id') {
                        $set[] = "{$column} = {$value}";
                    }
                }
            }
            $sql .= ' SET ' . implode(', ', $set);
            $sql .= ' WHERE id=' . (int) $this->data['id'];
        }
        
        // obtém transação ativa
        if ($conn = Transaction::get())
        {
            // faz o log e executa o SQL
            Transaction::log($sql);
            $result = $conn->exec($sql);
            // retorna o resultado
            return $result;
        }
        else
        {
            // se não tiver transação, retorna uma exceção
            throw new Exception('Não há transação ativa!!');
        }
    }
    
    /*
     * Recupera (retorna) um objeto da base de dados pelo seu ID
     * @param $id = ID do objeto
     */
    public function load($id)
    {
        // instancia instrução de SELECT
        $sql = "SELECT * FROM {$this->getEntity()}";
        $sql .= ' WHERE id=' . (int) $id;
        
        // obtém transação ativa
        if ($conn = Transaction::get())
        {
            // cria mensagem de log e executa a consulta
            Transaction::log($sql);
            $result= $conn->query($sql);
            
            // se retornou algum dado
            if ($result)
            {
                // retorna os dados em forma de objeto
                $object = $result->fetchObject(get_class($this));
            }
            return $object;
        }
        else
        {
            // se não tiver transação, retorna uma exceção
            throw new Exception('Não há transação ativa!!');
        }
    }
    
    /**
     * Exclui um objeto da base de dados através de seu ID.
     * @param $id = ID do objeto
     */
    public function delete($id = NULL)
    {
        // o ID é o parâmetro ou a propriedade ID
        $id = $id ? $id : $this->id;
        
        // monsta a string de UPDATE
        $sql  = "DELETE FROM {$this->getEntity()}";
        $sql .= ' WHERE id=' . (int) $this->data['id'];
        
        // obtém transação ativa
        if ($conn = Transaction::get())
        {
            // faz o log e executa o SQL
            Transaction::log($sql);
            $result = $conn->exec($sql);
            // retorna o resultado
            return $result;
        }
        else
        {
            // se não tiver transação, retorna uma exceção
            throw new Exception('Não há transação ativa!!');
        }
    }
    
    /**
     * Retorna o último ID
     */
    private function getLast()
    {
        // inicia transação
        if ($conn = Transaction::get())
        {
            // instancia instrução de SELECT
            $sql  = "SELECT max(id) FROM {$this->getEntity()}";
            
            // cria log e executa instrução SQL
            Transaction::log($sql);
            $result= $conn->query($sql);
            
            // retorna os dados do banco
            $row = $result->fetch();
            return $row[0];
        }
        else
        {
            // se não tiver transação, retorna uma exceção
            throw new Exception('Não há transação ativa!!');
        }
    }
    
    /**
     * Retorna todos objetos
     */
    public static function all()
    {
        $classname = get_called_class();
        $rep = new Repository($classname);
        return $rep->load(new Criteria);
    }
    
    /**
     * Busca um objeto pelo id
     */
    public static function find($id)
    {
        $classname = get_called_class();
        $ar = new $classname;
        return $ar->load($id);
    }
    
    public function prepare($data)
    {
        $prepared = array();
        foreach ($data as $key => $value)
        {
            if (is_scalar($value))
            {
                $prepared[$key] = $this->escape($value);
            }
        }
        return $prepared;
    }
    
    public function escape($value)
    {
        // verifica se é um dado escalar (string, inteiro, ...)
        if (is_scalar($value))
        {
            if (is_string($value) and (!empty($value)))
            {
                // adiciona \ em aspas
                $value = addslashes($value);
                // caso seja uma string
                return "'$value'";
            }
            else if (is_bool($value))
            {
                // caso seja um boolean
                return $value ? 'TRUE': 'FALSE';
            }
            else if ($value!=='')
            {
                // caso seja outro tipo de dado
                return $value;
            }
            else
            {
                // caso seja NULL
                return "NULL";
            }
        }
    }

}
