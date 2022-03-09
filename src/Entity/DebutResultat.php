<?php

namespace App\Entity;

use App\Repository\DebutResultatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DebutResultatRepository::class)
 */
class DebutResultat
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
    private $q1;

    /**
     * @ORM\Column(type="integer")
     */
    private $q2;

    /**
     * @ORM\Column(type="integer")
     */
    private $q3;

    /**
     * @ORM\Column(type="integer")
     */
    private $q4;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class, inversedBy="debutResultats")
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity=Seance::class, inversedBy="debutResultats")
     */
    private $seance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQ1(): ?int
    {
        return $this->q1;
    }

    public function setQ1(int $q1): self
    {
        $this->q1 = $q1;

        return $this;
    }

    public function getQ2(): ?int
    {
        return $this->q2;
    }

    public function setQ2(int $q2): self
    {
        $this->q2 = $q2;

        return $this;
    }

    public function getQ3(): ?int
    {
        return $this->q3;
    }

    public function setQ3(int $q3): self
    {
        $this->q3 = $q3;

        return $this;
    }

    public function getQ4(): ?int
    {
        return $this->q4;
    }

    public function setQ4(int $q4): self
    {
        $this->q4 = $q4;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    public function getSeance(): ?Seance
    {
        return $this->seance;
    }

    public function setSeance(?Seance $seance): self
    {
        $this->seance = $seance;

        return $this;
    }
}
