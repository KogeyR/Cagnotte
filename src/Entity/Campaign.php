<?php

namespace App\Entity;

use App\Repository\CampaignRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampaignRepository::class)]
class Campaign
{
    #[ORM\Id]
    #[ORM\Column]
    private ?string $id = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $create_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $update_at = null;

    #[ORM\Column(nullable: true)]
    private ?int $goal = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'campaign_id', targetEntity: Participant::class, orphanRemoval: true)]
    private Collection $participants;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(): self
    {  
    $id = md5(random_bytes(50));
    $this->id = $id;
    return $this;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->create_at;
    }

    public function setCreateAt(?\DateTimeImmutable $create_at): static
    {
        $this->create_at = $create_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeImmutable $update_at): static
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function getGoal(): ?int
    {
        return $this->goal;
    }

    public function setGoal(?int $goal): static
    {
        $this->goal = $goal;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return Collection<int, Participant>
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(Participant $participant): static
    {
        if (!$this->participants->contains($participant)) {
            $this->participants->add($participant);
            $participant->setCampaignId($this);
        }

        return $this;
    }

    public function removeParticipant(Participant $participant): static
    {
        if ($this->participants->removeElement($participant)) {
            // set the owning side to null (unless already changed)
            if ($participant->getCampaignId() === $this) {
                $participant->setCampaignId(null);
            }
        }

        return $this;
    }
}
