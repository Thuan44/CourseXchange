<?php

namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model
{

    protected $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    // Requête générique
    public function query(string $query, array $param = null, bool $single = null)
    {
        // S'il n'y pas de param, appeler juste query(). Sinon, appeler prepare( pour que la requête préparée puisse être exécutée
        $method = is_null($param) ? 'query' : 'prepare';

        if(
            strpos($query, 'DELETE') === 0 
            || strpos($query, 'UPDATE') === 0 
            || strpos($query, 'INSERT') === 0 
        ){
            $stmt = $this->db->getPDO()->$method($query);
            $stmt->setFetMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

         // Si $single est null, il ne s'agit pas d'une requête single donc on fetchAll. Sinon juste fetch
         $fetch = is_null($single) ? 'fetchAll' : 'fetch';

         $stmt = $this->db->getPDO()->$method($query);
         $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
 
         if ($method === 'query') {
             return $stmt->$fetch();
         } else {
             $stmt->execute($param);
             return $stmt->$fetch();
         }
    }

    // Renvoie un tableau de tous les éléments d'une table
    public function all()
    {
        return $this->query("SELECT * FROM {$this->table}");
    }
}
