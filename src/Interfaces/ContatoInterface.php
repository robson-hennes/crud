<?php
namespace App\interfaces;

interface ContatoInterface {
    
    public function getId();
    public function getNome();
    public function getEmail();
    public function setId(int $id) : self;
    public function setNome(string $nome) : self;
    public function setEmail(string $email) : self;
   
}