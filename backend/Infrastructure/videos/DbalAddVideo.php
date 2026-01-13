<?php

declare(strict_types=1);

namespace Infrastructure\videos;

use Exception;
use Throwable;

class DbalAddVideo
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertVideo($video)
    {
        $sql = "INSERT INTO movie (title, url, year, description)
                VALUES (:title, :url, :year, :description)";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':title' => $video->title,
                ':url' => $video->url,
                ':year' => $video->year,
                ':description' => $video->description
            ]);

        } catch (Throwable $e) {
            throw new Exception('Error inserting video: ' . $e->getMessage(), 0, $e);
        }
    }

}
