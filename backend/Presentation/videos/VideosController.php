<?php

declare(strict_types=1);

namespace videos;

require_once __DIR__ . "/../../Database/dbconnect.php";
require_once __DIR__ . "/../../Infrastructure/videos/DbalVideo.php";

use Database;
use Infrastructure\videos\DbalVideo;

class VideosController extends Database
{
    public function list()
    {
        $db = $this->connect();
        $repo = new DbalVideo($db);
        return $repo->getAll();
    }
}
