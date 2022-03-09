<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Classe::class, inversedBy="eleves")
     */
    private $classe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatar;

    /**
     * @ORM\OneToMany(targetEntity=FinResultat::class, mappedBy="eleve")
     */
    private $finResultats;

    /**
     * @ORM\OneToMany(targetEntity=DebutResultat::class, mappedBy="eleve")
     */
    private $debutResultats;

    public function __construct()
    {
        $this->classe = new ArrayCollection();
        $this->finResultats = new ArrayCollection();
        $this->debutResultats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Classe[]
     */
    public function getClasse(): Collection
    {
        return $this->classe;
    }

    public function addClasse(Classe $classe): self
    {
        if (!$this->classe->contains($classe)) {
            $this->classe[] = $classe;
        }

        return $this;
    }

    public function removeClasse(Classe $classe): self
    {
        $this->classe->removeElement($classe);

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return Collection|FinResultat[]
     */
    public function getFinResultats(): Collection
    {
        return $this->finResultats;
    }

    public function addFinResultat(FinResultat $finResultat): self
    {
        if (!$this->finResultats->contains($finResultat)) {
            $this->finResultats[] = $finResultat;
            $finResultat->setEleve($this);
        }

        return $this;
    }

    public function removeFinResultat(FinResultat $finResultat): self
    {
        if ($this->finResultats->removeElement($finResultat)) {
            // set the owning side to null (unless already changed)
            if ($finResultat->getEleve() === $this) {
                $finResultat->setEleve(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DebutResultat[]
     */
    public function getDebutResultats(): Collection
    {
        return $this->debutResultats;
    }

    public function addDebutResultat(DebutResultat $debutResultat): self
    {
        if (!$this->debutResultats->contains($debutResultat)) {
            $this->debutResultats[] = $debutResultat;
            $debutResultat->setEleve($this);
        }

        return $this;
    }

    public function removeDebutResultat(DebutResultat $debutResultat): self
    {
        if ($this->debutResultats->removeElement($debutResultat)) {
            // set the owning side to null (unless already changed)
            if ($debutResultat->getEleve() === $this) {
                $debutResultat->setEleve(null);
            }
        }

        return $this;
    }
}
