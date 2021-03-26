<?php


require("./model/filmModel.php");

function giveJSONofAllFilm(){
    $films = getAllFilm();
    $i = 0;
    if(count($films)!= 0){
        foreach ($films as $film => $tab) {
            //c ok on return le tab.
            $director = getDirectorInformation($tab['director_id']);
            $json[$i] = [
                'id' => $tab['id'],
                'name' => $tab['name'],
                'year' => $tab['year'],
                'duration' => $tab['duration'],
                'nationality' => $tab['nationality'],
                'director' => [
                    'firstname' => $director[0]["firstname"],
                    'lastname' => $director[0]["lastname"],
                    'birthdate' => $director[0]["birthdate"],
                    'nationality' => $director[0]["nationality"]
                ]
            ]; 
            $i++;       
       }
    } else {
        $json = "Nothing was found...";
    }

    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function giveJSONofAFilm($id){
    $film = getAFilm($id);
    if(count($film)!= 0){
        $film = $film[0];
    
        $director = getDirectorInformation($film['director_id']);
        
        $json = [
            'id' => $film['id'],
            'name' => $film['name'],
            'year' => $film['year'],
            'duration' => $film['duration'],
            'nationality' => $film['nationality'],
            'director' => [
                'firstname' => $director[0]["firstname"],
                'lastname' => $director[0]["lastname"],
                'birthdate' => $director[0]["birthdate"],
                'nationality' => $director[0]["nationality"]
            ]
        ]; 
    } else {
        $json = "Nothing was found...";
    }
    
           
    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

?>