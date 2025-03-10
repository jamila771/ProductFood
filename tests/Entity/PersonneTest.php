<?php

namespace App\tests\Entity;

use App\Entity\Personne;
use PHPUnit\Framework\TestCase;

class PersonneTest extends TestCase
{
    private Personne $personne;

    protected function setUp(): void
    {
        $this->personne = new Personne("kawech", "jamila", 30);
    }

    public function testSetAndGetNom()
    {
        $nom = "ben youssef";
        $this->personne->setNom($nom);
        $this->assertEquals($nom, $this->personne->getNom());
    }

    public function testSetAndGetPrenom() 
    {
        $prenom = "imen";
        $this->personne->setPrenom($prenom);
        $this->assertEquals($prenom, $this->personne->getPrenom());
    }

    public function testSetAndGetAge()
    {
        $age = 35;
        $this->personne->setAge($age);
        $this->assertEquals($age, $this->personne->getAge());
    }

    public function testCategorieMineur()
    {
        $this->personne->setAge(17);
        $this->assertEquals("mineur", $this->personne->categorie());
    }

    public function testCategorieMajeur()
    {
        $this->personne->setAge(18);
        $this->assertEquals("majeur", $this->personne->categorie());
    }
    
    /**
     * @dataProvider ageProvider
     */
    public function testCategorieProvider($age, $expectedCategory)
    {
        $this->personne->setAge($age);
        $this->assertEquals($expectedCategory, $this->personne->categorie());
    }

    public function ageProvider()
    {
        return [
            [10, "mineur"],
            [17, "mineur"],
            [18, "majeur"],
            [25, "majeur"],
            [30, "majeur"],
        ];
    }
}
