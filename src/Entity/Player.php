<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private ?int $ligue = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $team = null;

    /**
     * @var Collection<int, PlayerNightStat>
     */
    #[ORM\OneToMany(targetEntity: PlayerNightStat::class, mappedBy: 'player')]
    private Collection $playerScore;

    public function __construct()
    {
        $this->playerScore = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getLigue(): ?int
    {
        return $this->ligue;
    }

    public function setLigue(int $ligue): static
    {
        $this->ligue = $ligue;

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

    /**
     * @return Collection<int, PlayerNightStat>
     */
    public function getPlayerScore(): Collection
    {
        return $this->playerScore;
    }

    public function addPlayerScore(PlayerNightStat $playerScore): static
    {
        if (!$this->playerScore->contains($playerScore)) {
            $this->playerScore->add($playerScore);
            $playerScore->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerScore(PlayerNightStat $playerScore): static
    {
        if ($this->playerScore->removeElement($playerScore)) {
            // set the owning side to null (unless already changed)
            if ($playerScore->getPlayer() === $this) {
                $playerScore->setPlayer(null);
            }
        }

        return $this;
    }
}
