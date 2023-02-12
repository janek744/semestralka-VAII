<?php

use \App\Models\Event;
?>
<?php

$data = Event::getAll();

foreach ($data as $log) {
    $events[] = $log->getText();
    $event = $log->getText();
    echo $event;
}

$q = $_REQUEST['q'];

$suggestion = "";

if($q !== ""){
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($events as $event){
        if(stristr($q, substr($event,0,$len))) {
            if($suggestion === ""){
                $suggestion = $event;
            } else {
                $suggestion .= "\n $event";
            }
        }
    }
}