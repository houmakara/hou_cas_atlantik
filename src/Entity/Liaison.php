<?php

namespace App\Entity;

use App\Repository\LiaisonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LiaisonRepository::class)
 */
class Liaison
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
    private $distance;

    /**
     * @ORM\ManyToOne(targetEntity=Secteur::class, inversedBy="codeL")
     */
    private $idS;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getIdS(): ?Secteur
    {
        return $this->idS;
    }

    public function setIdS(?Secteur $idS): self
    {
        $this->idS = $idS;

        return $this;
    }
}
