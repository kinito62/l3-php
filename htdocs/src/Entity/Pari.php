<?php

namespace App\Entity;

use App\Repository\PariRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PariRepository::class)
 */
class Pari
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ScoreD;

    /**
     * @ORM\Column(type="integer")
     */
    private $ScoreE;

    /**
     * @ORM\Column(type="string")
     */
    private $idUser;

    /**
     * @ORM\Column(type="integer")
     */
    private $idMatch;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreD(): ?int
    {
        return $this->ScoreD;
    }

    public function setScoreD(int $ScoreD): self
    {
        $this->ScoreD = $ScoreD;

        return $this;
    }

    public function getScoreE(): ?int
    {
        return $this->ScoreE;
    }

    public function setScoreE(?int $ScoreE): self
    {
        $this->ScoreE = $ScoreE;

        return $this;
    }

    public function getIdUser(): ?string
    {
        return $this->idUser;
    }

    public function setIdUser(string $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdMatch(): ?int
    {
        return $this->idMatch;
    }

    public function setIdMatch(int $idMatch): self
    {
        $this->idMatch = $idMatch;

        return $this;
    }
}
