<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InfosRepository")
 */
class Infos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Groups({"patient"})
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"patient"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"patient"})
     */
    private $accompagnant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"patient"})
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"patient"})
     */
    private $motifRefus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="infos")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"infos"})
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAccompagnant(): ?string
    {
        return $this->accompagnant;
    }

    public function setAccompagnant(?string $accompagnant): self
    {
        $this->accompagnant = $accompagnant;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getMotifRefus(): ?string
    {
        return $this->motifRefus;
    }

    public function setMotifRefus(?string $motifRefus): self
    {
        $this->motifRefus = $motifRefus;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
}
