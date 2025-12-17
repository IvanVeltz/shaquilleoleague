<?php

namespace App\Entity;

use App\Repository\PlayerNightStatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerNightStatRepository::class)]
class PlayerNightStat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateOfPick = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nbaPlayer = null;

    #[ORM\Column]
    private ?int $score = null;

    #[ORM\Column]
    private ?bool $bestPick = null;

    #[ORM\ManyToOne(inversedBy: 'PlayerByDeck')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Deck $deck = null;

    #[ORM\ManyToOne(inversedBy: 'playerScore')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOfPick(): ?\DateTime
    {
        return $this->dateOfPick;
    }

    public function setDateOfPick(\DateTime $dateOfPick): static
    {
        $this->dateOfPick = $dateOfPick;

        return $this;
    }

    public function getNbaPlayer(): ?string
    {
        return $this->nbaPlayer;
    }

    public function setNbaPlayer(string $nbaPlayer): static
    {
        $this->nbaPlayer = $nbaPlayer;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function isBestPick(): ?bool
    {
        return $this->bestPick;
    }

    public function setBestPick(bool $bestPick): static
    {
        $this->bestPick = $bestPick;

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

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }
}
