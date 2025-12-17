<?php

namespace App\Entity;

use App\Repository\DeckRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeckRepository::class)]
class Deck
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\Column]
    private ?int $numberOfPick = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateStart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateEnd = null;

    #[ORM\ManyToOne(inversedBy: 'decks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Competition $compet = null;

    /**
     * @var Collection<int, Matchup>
     */
    #[ORM\OneToMany(targetEntity: Matchup::class, mappedBy: 'deck')]
    private Collection $matchs;

    /**
     * @var Collection<int, PointRanking>
     */
    #[ORM\OneToMany(targetEntity: PointRanking::class, mappedBy: 'deck')]
    private Collection $points;

    /**
     * @var Collection<int, PlayerNightStat>
     */
    #[ORM\OneToMany(targetEntity: PlayerNightStat::class, mappedBy: 'deck')]
    private Collection $PlayerByDeck;

    /**
     * @var Collection<int, TeamNightStats>
     */
    #[ORM\OneToMany(targetEntity: TeamNightStats::class, mappedBy: 'deck')]
    private Collection $teamNightStats;

    public function __construct()
    {
        $this->matchs = new ArrayCollection();
        $this->points = new ArrayCollection();
        $this->PlayerByDeck = new ArrayCollection();
        $this->teamNightStats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getNumberOfPick(): ?int
    {
        return $this->numberOfPick;
    }

    public function setNumberOfPick(int $numberOfPick): static
    {
        $this->numberOfPick = $numberOfPick;

        return $this;
    }

    public function getDateStart(): ?\DateTime
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTime $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTime
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTime $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getCompet(): ?Competition
    {
        return $this->compet;
    }

    public function setCompet(?Competition $compet): static
    {
        $this->compet = $compet;

        return $this;
    }

    /**
     * @return Collection<int, Matchup>
     */
    public function getMatchs(): Collection
    {
        return $this->matchs;
    }

    public function addMatch(Matchup $match): static
    {
        if (!$this->matchs->contains($match)) {
            $this->matchs->add($match);
            $match->setDeck($this);
        }

        return $this;
    }

    public function removeMatch(Matchup $match): static
    {
        if ($this->matchs->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getDeck() === $this) {
                $match->setDeck(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PointRanking>
     */
    public function getPoints(): Collection
    {
        return $this->points;
    }

    public function addPoint(PointRanking $point): static
    {
        if (!$this->points->contains($point)) {
            $this->points->add($point);
            $point->setDeck($this);
        }

        return $this;
    }

    public function removePoint(PointRanking $point): static
    {
        if ($this->points->removeElement($point)) {
            // set the owning side to null (unless already changed)
            if ($point->getDeck() === $this) {
                $point->setDeck(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayerNightStat>
     */
    public function getPlayerByDeck(): Collection
    {
        return $this->PlayerByDeck;
    }

    public function addPlayerByDeck(PlayerNightStat $playerByDeck): static
    {
        if (!$this->PlayerByDeck->contains($playerByDeck)) {
            $this->PlayerByDeck->add($playerByDeck);
            $playerByDeck->setDeck($this);
        }

        return $this;
    }

    public function removePlayerByDeck(PlayerNightStat $playerByDeck): static
    {
        if ($this->PlayerByDeck->removeElement($playerByDeck)) {
            // set the owning side to null (unless already changed)
            if ($playerByDeck->getDeck() === $this) {
                $playerByDeck->setDeck(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TeamNightStats>
     */
    public function getTeamNightStats(): Collection
    {
        return $this->teamNightStats;
    }

    public function addTeamNightStat(TeamNightStats $teamNightStat): static
    {
        if (!$this->teamNightStats->contains($teamNightStat)) {
            $this->teamNightStats->add($teamNightStat);
            $teamNightStat->setDeck($this);
        }

        return $this;
    }

    public function removeTeamNightStat(TeamNightStats $teamNightStat): static
    {
        if ($this->teamNightStats->removeElement($teamNightStat)) {
            // set the owning side to null (unless already changed)
            if ($teamNightStat->getDeck() === $this) {
                $teamNightStat->setDeck(null);
            }
        }

        return $this;
    }
}
