<?php

namespace App\Entity;

use App\Repository\BorrowerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BorrowerRepository::class)
 */
class Borrower implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @ORM\OneToMany(targetEntity=Book::class, mappedBy="borrower")
     */
    private $username;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner votre prénom")
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;


    /**
     * @Assert\NotBlank(message="Veuillez renseigner votre nom")
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner votre adresse")
     * @ORM\Column(type="string", length=255)
     */
    private $address;


    /**
     *
     * @ORM\Column (type="date")
     */
    private $date_of_birth;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $isChecked = 0;



    public function __construct()
    {
        $this->book_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }



    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }



    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * @param mixed $date_of_birth
     */
    public function setDateOfBirth($date_of_birth): void
    {
        $this->date_of_birth = $date_of_birth;
    }



    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_BORROWER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBookId(): Collection
    {
        return $this->username;
    }

    public function addBookId(Book $bookId): self
    {
        if (!$this->username->contains($bookId)) {
            $this->username[] = $bookId;
            $bookId->setBorrowerUn($this);
        }

        return $this;
    }

    public function removeBookId(Book $bookId): self
    {
        if ($this->username->removeElement($bookId)) {
            // set the owning side to null (unless already changed)
            if ($bookId->getBorrowerUn() === $this) {
                $bookId->setBorrowerUn(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->username;
    }

    public function getIsChecked(): ?bool
    {
        return $this->isChecked;
    }

    public function setIsChecked(?bool $isChecked): self
    {
        $this->isChecked = $isChecked;

        return $this;
    }


}
