<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceRepository::class)
 */
class Seance
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $robot;

    /**
     * @ORM\ManyToMany(targetEntity=Classe::class, inversedBy="seances")
     */
    private $classe;

    /**
     * @ORM\OneToMany(targetEntity=DebutResultat::class, mappedBy="seance")
     */
    private $debutResultats;

    /**
     * @ORM\OneToMany(targetEntity=FinResultat::class, mappedBy="seance")
     */
    private $finResultats;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="seances")
     */
    private $enseignant;

    public function __construct()
    {
        $this->classe = new ArrayCollection();
        $this->debutResultats = new ArrayCollection();
        $this->finResultats = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
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

    public function getRobot(): ?string
    {
        return $this->robot;
    }

    public function setRobot(string $robot): self
    {
        $this->robot = $robot;

        return $this;
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
            $debutResultat->setSeance($this);
        }

        return $this;
    }

    public function removeDebutResultat(DebutResultat $debutResultat): self
    {
        if ($this->debutResultats->removeElement($debutResultat)) {
            // set the owning side to null (unless already changed)
            if ($debutResultat->getSeance() === $this) {
                $debutResultat->setSeance(null);
            }
        }

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
            $finResultat->setSeance($this);
        }

        return $this;
    }

    public function removeFinResultat(FinResultat $finResultat): self
    {
        if ($this->finResultats->removeElement($finResultat)) {
            // set the owning side to null (unless already changed)
            if ($finResultat->getSeance() === $this) {
                $finResultat->setSeance(null);
            }
        }

        return $this;
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): self
    {
        $this->enseignant = $enseignant;

        return $this;
    }
}
