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
        foreach ($rules as $name => $ruleArray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($ruleArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                            break;
                        case 'password_match':
                            $this->passwordMatch($name, $this->data);
                    }
                }
            }
        }

        return $this->getErrors();
    }

    public function required(string $name, string $value)
    {
        $value = trim($value);

        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = ($name === 'username' || $name === 'user_name') ? "Nom d'utilisateur requis" : "Mot de passe requis";
        }
    }

    public function min(string $name, string $value, string $rule)
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];
        if (strlen($value) < $limit) {
            $this->errors[$name][] = ($name === 'username' || $name === 'user_name') ? "Nom d'utilisateur à {$limit} caractères minimum" : "Mot de passe à {$limit} caractères minimum";
        }
    }

    public function passwordMatch(string $name, array $data)
    {
        if($data['user_password'] !== $data['password_confirmation']){
            $this->errors[$name][] = "Les mots de passe ne correspondent pas";
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
