<?php

namespace App\Entity;

use App\Repository\MatchupRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchupRepository::class)]
class Matchup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $week = null;

    #[ORM\ManyToOne(inversedBy: 'homeTeam')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $teamHome = null;

    #[ORM\ManyToOne(inversedBy: 'awayTeam')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $teamAway = null;

    #[ORM\ManyToOne(inversedBy: 'matchs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Deck $deck = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function setWeek(int $week): static
    {
        $this->week = $week;

        return $this;
    }

    public function getTeamHome(): ?Team
    {
        return $this->teamHome;
    }

    public function setTeamHome(?Team $teamHome): static
    {
        $this->teamHome = $teamHome;

        return $this;
    }

    public function getTeamAway(): ?Team
    {
        return $this->teamAway;
    }

    public function setTeamAway(?Team $teamAway): static
    {
        $this->teamAway = $teamAway;

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
