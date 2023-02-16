<?php

//Get the day TAB number.
//This works only with Synclogic, our programme TPL template and the Bootstrap List Tab Items
function getDayProgrammeTab($dayValue)
{
    //get_programme_days is located in synclogic
    $days = get_programme_days();
    $tab = 0;
    foreach ($days as $key => $day) {
        if ($dayValue == $day->session_day) {
            $tab = $key;
        }
    }
    return $tab;
}
