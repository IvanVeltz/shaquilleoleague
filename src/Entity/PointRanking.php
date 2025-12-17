<?php

namespace App\Entity;

use App\Repository\PointRankingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PointRankingRepository::class)]
class PointRanking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $isWin = null;

    #[ORM\Column]
    private ?int $points = null;

    #[ORM\ManyToOne(inversedBy: 'pointsTeam')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $team = null;

    #[ORM\ManyToOne(inversedBy: 'points')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Deck $deck = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isWin(): ?bool
    {
        return $this->isWin;
    }

    public function setIsWin(bool $isWin): static
    {
        $this->isWin = $isWin;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getDeck(): ?Deck
    {
        return $this->deck;
    }

    public function setDeck(?Deck $deck): static
    {
        $this->deck = $deck;

        return $this;
    }
}
