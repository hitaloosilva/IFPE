<?php
namespace IFPE\Monitoria\model;

/**
 * @author Hitalo Silva
 *
 */
class User
{
    
    private $name;
    private $matricula;
    private $email;
    
    
    
    public function __construct(array $params = array()){
        if(empty($params) || !is_array($params)){
            throw new \Exception("Invalid data!");
        }
        foreach($params as $key=>$value){
            $property 	= strpos($key, '_')?substr($key, 0, strpos($key, '_')).ucfirst(substr($key, strpos($key, '_')+1)):$key;
            $method 	= 'set'.$property;
            if(property_exists($this, $property) && method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
}


$user = new User(['name'=>'nome', 'email'=>'email', 'matricula'=>'matricula']);

echo $user->getName() ."\r\n";
var_dump($user);




