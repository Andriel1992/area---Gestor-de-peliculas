

<?php 

    

    session_start();

    $GLOBALS["sessionName"] = "Pelicualas";


    function Add($item){
        $peliculas = GetList();

        

        if (count($peliculas) == 0) {
            $item["id"] = 1;
        }else {
            $lastElement = getLastElement($peliculas);

            $item["id"] = $lastElement["id"] + 1;
        }

        array_push($peliculas, $item);

        $_SESSION[$GLOBALS["sessionName"]] = $peliculas;        
    } 

    function edit($item){

        $peliculas = GetList();
        $pelicula = GetById($item["id"]);

        if ($pelicula != null && count($pelicula) > 0) {

            
            $index = GetIndexElement($peliculas, "id",$item["id"]);

            $peliculas[$index] = $pelicula;
            $_SESSION[$GLOBALS["sessionName"]] = $peliculas; 
        }
        
    
    } 

    function GetList(){

        $peliculas = isset($_SESSION[$GLOBALS["sessionName"]]) ? $_SESSION[$GLOBALS["sessionName"]] : [] ;

        return $peliculas;

    }

    function GetById($id){

        $peliculas = GetList();

        $pelicula = searchProperty($peliculas, "id", $id);

        return $pelicula[0];

    }

?>