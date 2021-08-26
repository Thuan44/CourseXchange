<?php

namespace App\validation;

class Validator
{

    private $data;
    private $errors;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate(array $rules): ?array
    {
        foreach($rules as $name => $ruleArray){
            if(array_key_exists($name, $this->data)){
                foreach($ruleArray as $rule){
                    switch($rule){
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                            break;
                    }
                }
            }
        }

        return $this->getErrors();
    }

    public function required(string $name, string $value)
    {
        $value = trim($value);

        if(!isset($value) || is_null($value) || empty($value)){
            $this->errors[$name][] = ($name === 'username') ? "Le nom d'utilisateur est requis" : "Le mot de passe est requis";
        }
    }

    public function min(string $name, string $value, string $rule)
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];
        if(strlen($value) < $limit){
            $this->errors[$name][] = ($name === 'username') ? "Nom d'utilisateur à {$limit} caractères minimum" : "Mot de passe à {$limit} caractères minimum";
        }
    }


    public function getErrors()
    {
        return $this->errors;
    }

}
