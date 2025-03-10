<?php

use App\Entity\CompteBancaire;
use PHPUnit\Framework\TestCase;

class CompteBancaireTest extends TestCase
{
    public function testRetirer()
    {
        $compte = new CompteBancaire("jamila", 100);
        $this->expectException('Exception');
        $compte->retirer(200);
    }
}