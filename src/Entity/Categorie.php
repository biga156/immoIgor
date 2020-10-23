<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\OneToMany(targetEntity=Immobilier::class, mappedBy="categorie", orphanRemoval=true)
     */
    private $immobiliers;

    public function __construct()
    {
        $this->immobiliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return Collection|Immobilier[]
     */
    public function getImmobiliers(): Collection
    {
        return $this->immobiliers;
    }

    public function addImmobilier(Immobilier $immobilier): self
    {
        if (!$this->immobiliers->contains($immobilier)) {
            $this->immobiliers[] = $immobilier;
            $immobilier->setCategorie($this);
        }

        return $this;
    }

    public function removeImmobilier(Immobilier $immobilier): self
    {
        if ($this->immobiliers->contains($immobilier)) {
            $this->immobiliers->removeElement($immobilier);
            // set the owning side to null (unless already changed)
            if ($immobilier->getCategorie() === $this) {
                $immobilier->setCategorie(null);
            }
        }

        return $this;
    }
}
