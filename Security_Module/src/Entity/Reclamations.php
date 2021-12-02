<?php

namespace App\Entity;

use App\Repository\ReclamationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReclamationsRepository::class)
 */
class Reclamations
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
    private $reclamationID;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $reclamationRegion;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $reclamationType;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $traitement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReclamationID(): ?int
    {
        return $this->reclamationID;
    }

    public function setReclamationID(int $reclamationID): self
    {
        $this->reclamationID = $reclamationID;

        return $this;
    }

    public function getReclamationRegion(): ?string
    {
        return $this->reclamationRegion;
    }

    public function setReclamationRegion(?string $reclamationRegion): self
    {
        $this->reclamationRegion = $reclamationRegion;

        return $this;
    }

    public function getReclamationType(): ?string
    {
        return $this->reclamationType;
    }

    public function setReclamationType(string $reclamationType): self
    {
        $this->reclamationType = $reclamationType;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(?int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(?string $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }
}
