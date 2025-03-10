<?php

namespace App\Entity;

use App\Repository\CompteBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteBancaireRepository::class)]
class CompteBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $sold = null;

    #[ORM\Column(length: 255)]
    private ?string $proprietaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSold(): ?float
    {
        return $this->sold;
    }

    public function setSold(float $sold): static
    {
        $this->sold = $sold;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): static
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }
    public function __CONSTRUCT($proprietaire,$sold){
        $this->proprietaire=$proprietaire;
        $this->sold=$sold;
    }
    public function retirer(float $montant){
       if ($this->sold > $montant) {
        $this->sold-=$montant;
           return $this->sold;
       }
       else{
           throw new \Exception("solde insuffisant");
       }
    }
}
