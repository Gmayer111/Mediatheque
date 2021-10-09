<?php

namespace App\Entity;

use App\Repository\CatalogueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CatalogueRepository::class)
 */
class Catalogue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Book::class, mappedBy="catalogue", orphanRemoval=true)
     */
    private $book_id;

    public function __construct()
    {
        $this->book_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBookId(): Collection
    {
        return $this->book_id;
    }

    public function addBookId(Book $bookId): self
    {
        if (!$this->book_id->contains($bookId)) {
            $this->book_id[] = $bookId;
            $bookId->setCatalogue($this);
        }

        return $this;
    }

    public function removeBookId(Book $bookId): self
    {
        if ($this->book_id->removeElement($bookId)) {
            // set the owning side to null (unless already changed)
            if ($bookId->getCatalogue() === $this) {
                $bookId->setCatalogue(null);
            }
        }

        return $this;
    }
}
