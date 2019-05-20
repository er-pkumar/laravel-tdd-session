<?php

namespace App\Components;

class DALComponent
{


    public function select($table, $column = [], $orderBy = [], $limit = 0, $offset = 0)
    {
        if (count($column) && !count($orderBy) && $limit == 0 && $offset == 0)
            return 'SELECT '. implode(', ', $column) ." from $table";
        
        if (count($orderBy) && !is_array($orderBy[0]))
            return 'SELECT '. implode(', ', $column) ." from $table ORDER BY ". implode(' ', $orderBy);
        
        if (count($orderBy) && is_array($orderBy[0]) && is_array($orderBy[1]))
            return 'SELECT '. implode(', ', $column) ." from $table ORDER BY ".  implode(' ', $orderBy[0]).', '.implode(' ', $orderBy[1]);
        
        if ($limit > 0 && $offset == 0)
            return 'SELECT *'. implode(', ', $column) ." from $table limit $limit";
        
        if ($limit > 0 && $offset >= 0)
            return 'SELECT *'. implode(', ', $column) ." from $table limit $limit offset $offset";

        return "SELECT * from $table";
    }

}