<?php

namespace App\Entity;

use App\Repository\TraitementsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraitementsRepository::class)
 */
class Traitements
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=Reclamations::class, mappedBy="traitement", cascade={"persist", "remove"})
     */
    private $reclamations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReclamations(): ?Reclamations
    {
        return $this->reclamations;
    }

    public function setReclamations(?Reclamations $reclamations): self
    {
        // unset the owning side of the relation if necessary
        if ($reclamations === null && $this->reclamations !== null) {
            $this->reclamations->setTraitement(null);
        }

        // set the owning side of the relation if necessary
        if ($reclamations !== null && $reclamations->getTraitement() !== $this) {
            $reclamations->setTraitement($this);
        }

        $this->reclamations = $reclamations;

        return $this;
    }
}
