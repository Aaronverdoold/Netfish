<?php

declare(strict_types=1);

namespace Infrastructure\videos;

use PDO;

class DbalVideo
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM movie ORDER BY url DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
