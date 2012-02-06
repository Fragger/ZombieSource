<?php

function getActivePlayers($gameid){
    if(!$gameid){
        throw new UnexpectedValueException('Gameid not set.');
    }
    $CI =& get_instance();
    $CI->load->model('Player_model','',TRUE);
    $playerids = $CI->Player_model->getActivePlayerIDsByGameID($gameid);

    $CI->load->library('PlayerCreator');
    $playerArray = array();
    foreach($playerids as $i){
        $playerArray[] = $CI->playercreator->getPlayerByPlayerID($i);
    }

    return $playerArray;
}

function getPublicActiveZombies(){
    $players = getActivePlayers(GAME_KEY);
    $active_zombies =  Array();
    foreach($players as $player){
        if(is_a($player, 'Zombie') && $player->isActive()){
            if(is_a($player, 'OriginalZombie') && !$player->isExposed()){
                continue;
            }
            $active_zombies[] = $player;
        }
    }
    return $active_zombies;
}


function getActiveZombiesString(){
    $zombies = getPublicActiveZombies();
    $my_string = "[";
    foreach($zombies as $zombie){
        $username = $zombie->getUser()->getUsername();
        $my_string .= "\"$username\",";
    }
    $my_string .= "\"\"]";
    return $my_string;
}

?>