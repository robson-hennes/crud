<?php
namespace App\Classes;

use App\Interfaces\ContatoInterface;

class Contato implements ContatoInterface {
    private int $id;
    private string $nome;
    private string $email;

       /**
     * Init class Contato
     *
     * @return class
     */
    public function __construct($id, $nome, $email)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

      /**
     * Get the value of id
     *
     * @return int
     */
    public function getId() : int 
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }
    

    /**
     * Get the value of nome
     *
     * @return string
     */
    public function getNome() : string 
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param string $nome
     *
     * @return self
     */
    public function setNome(string $nome) : self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail() : string 
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email) : self
    {
        $this->email = $email;

        return $this;
    }  

  
}