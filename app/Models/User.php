<?php

namespace App\Models;

class User extends Model
{

    protected $table = 'users';

    public function getByUsername(string $username)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE user_name = ?", [$username], true);
    }

    public function createUser(array $data)
    {
        // Préparation de la Requête bindée
        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;
        $end = array_key_last($data);

        foreach ($data as $key => $value) {
            if($key === $end){break;}
                $comma = $i === count($data)-1 ? "" : ", ";
                $firstParenthesis .= "{$key}{$comma}";
                $secondParenthesis .= ":{$key}{$comma}";
                $i++;
        }

        array_pop($data); // Remove password_confirmation from query

        return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($secondParenthesis)", $data);
    }
}
