<?php

    $genero = [1=> "Acción",2=> "Terror",3=> "Comedia",4=> "Suspenso",5=> "Documentales"];

    function getLastElement ($list){

        $countList = count($list);

        $lastElement = $list[$countList -1];

        return $lastElement;

    }

    function searchProperty ($list, $property, $value){

        $filter = [];

        foreach ($list as $item) {
            if ($item[$property] == $value) {
                array_push($filter, $item);
            }
        }

        return $filter;

    }

    function GetIndexElement($list, $property, $value){

        foreach ($list as $key => $item) {
            
            if ($item[$property] == $value) {
                return $key;
                break;
            }
        }

    }
?>