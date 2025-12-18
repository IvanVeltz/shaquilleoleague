<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $twitter = null;

    #[ORM\Column]
    private ?bool $OCup = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $urlLogo = null;

    #[ORM\Column]
    private ?int $rankTTFL = null;

    #[ORM\Column(length: 3)]
    private ?string $shortName = null;

    #[ORM\ManyToOne(inversedBy: 'teams')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Conference $teamConf = null;

    /**
     * @var Collection<int, Matchup>
     */
    #[ORM\OneToMany(targetEntity: Matchup::class, mappedBy: 'teamHome')]
    private Collection $homeTeam;

    /**
     * @var Collection<int, Matchup>
     */
    #[ORM\OneToMany(targetEntity: Matchup::class, mappedBy: 'teamAway')]
    private Collection $awayTeam;

    /**
     * @var Collection<int, PointRanking>
     */
    #[ORM\OneToMany(targetEntity: PointRanking::class, mappedBy: 'team')]
    private Collection $pointsTeam;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\OneToMany(targetEntity: Player::class, mappedBy: 'team')]
    private Collection $players;

    /**
     * @var Collection<int, TeamNightStats>
     */
    #[ORM\OneToMany(targetEntity: TeamNightStats::class, mappedBy: 'team', orphanRemoval: true)]
    private Collection $teamNightStats;

    #[ORM\Column(length: 255)]
    private ?string $urlTTFL = null;

    public function __construct()
    {
        $this->homeTeam = new ArrayCollection();
        $this->awayTeam = new ArrayCollection();
        $this->pointsTeam = new ArrayCollection();
        $this->players = new ArrayCollection();
        $this->teamNightStats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(string $twitter): static
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function isOCup(): ?bool
    {
        return $this->OCup;
    }

    public function setOCup(bool $OCup): static
    {
        $this->OCup = $OCup;

        return $this;
    }

    public function getUrlLogo(): ?string
    {
        return $this->urlLogo;
    }

    public function setUrlLogo(string $urlLogo): static
    {
        $this->urlLogo = $urlLogo;

        return $this;
    }

    public function getRankTTFL(): ?int
    {
        return $this->rankTTFL;
    }

    public function setRankTTFL(int $rankTTFL): static
    {
        $this->rankTTFL = $rankTTFL;

        return $this;
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(string $shortName): static
    {
        $this->shortName = $shortName;

        return $this;
    }

    public function getTeamConf(): ?Conference
    {
        return $this->teamConf;
    }

    public function setTeamConf(?Conference $teamConf): static
    {
        $this->teamConf = $teamConf;

        return $this;
    }

    /**
     * @return Collection<int, Matchup>
     */
    public function getHomeTeam(): Collection
    {
        return $this->homeTeam;
    }

    public function addHomeTeam(Matchup $homeTeam): static
    {
        if (!$this->homeTeam->contains($homeTeam)) {
            $this->homeTeam->add($homeTeam);
            $homeTeam->setTeamHome($this);
        }

        return $this;
    }

    public function removeHomeTeam(Matchup $homeTeam): static
    {
        if ($this->homeTeam->removeElement($homeTeam)) {
            // set the owning side to null (unless already changed)
            if ($homeTeam->getTeamHome() === $this) {
                $homeTeam->setTeamHome(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Matchup>
     */
    public function getAwayTeam(): Collection
    {
        return $this->awayTeam;
    }

    public function addAwayTeam(Matchup $awayTeam): static
    {
        if (!$this->awayTeam->contains($awayTeam)) {
            $this->awayTeam->add($awayTeam);
            $awayTeam->setTeamAway($this);
        }

        return $this;
    }

    public function removeAwayTeam(Matchup $awayTeam): static
    {
        if ($this->awayTeam->removeElement($awayTeam)) {
            // set the owning side to null (unless already changed)
            if ($awayTeam->getTeamAway() === $this) {
                $awayTeam->setTeamAway(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PointRanking>
     */
    public function getPointsTeam(): Collection
    {
        return $this->pointsTeam;
    }

    public function addPointsTeam(PointRanking $pointsTeam): static
    {
        if (!$this->pointsTeam->contains($pointsTeam)) {
            $this->pointsTeam->add($pointsTeam);
            $pointsTeam->setTeam($this);
        }

        return $this;
    }

    public function removePointsTeam(PointRanking $pointsTeam): static
    {
        if ($this->pointsTeam->removeElement($pointsTeam)) {
            // set the owning side to null (unless already changed)
            if ($pointsTeam->getTeam() === $this) {
                $pointsTeam->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): static
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);
            $player->setTeam($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getTeam() === $this) {
                $player->setTeam(null);
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
            $teamNightStat->setTeam($this);
        }

        return $this;
    }

    public function removeTeamNightStat(TeamNightStats $teamNightStat): static
    {
        if ($this->teamNightStats->removeElement($teamNightStat)) {
            // set the owning side to null (unless already changed)
            if ($teamNightStat->getTeam() === $this) {
                $teamNightStat->setTeam(null);
            }
        }

        return $this;
    }

    public function getUrlTTFL(): ?string
    {
        return $this->urlTTFL;
    }

    public function setUrlTTFL(string $urlTTFL): static
    {
        $this->urlTTFL = $urlTTFL;

        return $this;
    }
}
