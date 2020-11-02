<?php

namespace App\Entity;

use App\Repository\SecteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SecteurRepository::class)
 */
class Secteur
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Liaison::class, mappedBy="idS")
     */
    private $codeL;

    public function __construct()
    {
        $this->codeL = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Liaison[]
     */
    public function getCodeL(): Collection
    {
        return $this->codeL;
    }

    public function addCodeL(Liaison $codeL): self
    {
        if (!$this->codeL->contains($codeL)) {
            $this->codeL[] = $codeL;
            $codeL->setIdS($this);
        }

        return $this;
    }

    public function removeCodeL(Liaison $codeL): self
    {
        if ($this->codeL->removeElement($codeL)) {
            // set the owning side to null (unless already changed)
            if ($codeL->getIdS() === $this) {
                $codeL->setIdS(null);
            }
        }

        return $this;
    }
}
