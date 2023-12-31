<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
class Participant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'participants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Campaign $campaign_id = null;

    #[ORM\OneToOne(mappedBy: 'participant_id', cascade: ['persist', 'remove'])]
    private ?Payment $payment = null;

   

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCampaign(): ?Campaign
    {
        return $this->campaign_id;
    }

    public function setCampaign(?Campaign $campaign_id): static
    {
        $this->campaign_id = $campaign_id;

        return $this;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): static
    {
        // unset the owning side of the relation if necessary
        if ($payment === null && $this->payment !== null) {
            $this->payment->setParticipant(null);
        }

        // set the owning side of the relation if necessary
        if ($payment !== null && $payment->getParticipant() !== $this) {
            $payment->setParticipant($this);
        }

        $this->payment = $payment;

        return $this;
    }

 
}
