<?php

declare(strict_types=1);

namespace videos;

require_once __DIR__ . "/../../Database/dbconnect.php";
require_once __DIR__ . "/../../Domain/Movie.php";
require_once __DIR__ . "/../../Infrastructure/videos/DbalAddVideo.php";
require_once __DIR__ . "/../../CustomExceptions/AddingVideoFailedCustomException.php";

use CustomExceptions\AddingVideoFailedCustomException;
use Database;
use Domain\Movie;
use Infrastructure\videos\DbalAddVideo;

class AddVideoController extends Database
{
    public function AddVideo(Movie $movie)
    {
        $db = $this->connect();
        $repo = new DbalAddVideo($db);
        $result = $repo->insertVideo($movie);

        if (!$result) {
            throw new AddingVideoFailedCustomException("Adding Video failed.");
        }

        header('Location: ../../../frontend/video-page/video.html');
        exit;
    }

}
