<?php

use App\Models\{Job, Project};

$jobs = Job::all(); //Nos trae todos los registros que encuentre en la tabla de la DDBB
$projects = Project::all();

function printElement($job) {
    // if($job->visible == false) {
    //   return;
    // }
  
    echo '<li class="work-position">';
    echo '<h5>' . $job->Title . '</h5>';
    echo '<p>' . $job->Description . '</p>';
    echo '<p>' . $job->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
}
?>