<?php

include "vendor/autoload.php";

use App\Entity\Article;
use App\Entity\Journaliste;
use App\Entity\Medias\Media;

$j = new Journaliste(1, "Nick", "mampassi");

$art = new Article(1, "24/04/2024", "info", "texte ...", $j);

var_dump($j);
var_dump($art);     
var_dump(new Media);     