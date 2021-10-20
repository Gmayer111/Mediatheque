<?phpnamespace App\Entity;use App\Repository\BookRepository;use DateTime;use DateTimeInterface;use Doctrine\ORM\Mapping as ORM;use Symfony\Component\HttpFoundation\File\File;use Symfony\Component\HttpFoundation\File\UploadedFile;use Vich\UploaderBundle\Mapping\Annotation as Vich;/** * @ORM\Entity(repositoryClass=BookRepository::class) * @Vich\Uploadable */class Book{    /**     * @ORM\Id     * @ORM\GeneratedValue     * @ORM\Column(type="integer")     */    private $id;    /**     * @ORM\Column(type="string", length=255)     */    private $title;    /**     * @ORM\Column(type="text")     */    private $description;    /**     * @var string|null     * @ORM\Column (type="string", length=255)     */    private $filename;    /**     * @var File|null     * @Vich\UploadableField(mapping="book_images", fileNameProperty="filename")     */    private $picture;    /**     * @ORM\Column(type="datetime")     */    private $updated_at;    /**     * @ORM\Column(type="string", length=255)     */    private $author;    /**     * @ORM\Column(type="date")     */    private $publication_date;    /**     * @ORM\Column(type="string", length=255)     */    private $genre;    /**     * @ORM\Column(type="string")     */    private $availability = 'disponible';    /**     * @var string|null     * @ORM\ManyToOne(targetEntity=Borrower::class, inversedBy="username")     * @ORM\Column(type="string", nullable=true)     */    private $borrower_un = null;    public function getId(): ?int    {        return $this->id;    }    public function getTitle(): ?string    {        return $this->title;    }    public function setTitle(string $title): self    {        $this->title = $title;        return $this;    }    public function getDescription(): ?string    {        return $this->description;    }    public function setDescription(string $description): self    {        $this->description = $description;        return $this;    }    /**     * @return string|null     */    public function getFilename(): ?string    {        return $this->filename;    }    /**     * @param string|null $filename     */    public function setFilename(?string $filename): void    {        $this->filename = $filename;    }    /**     * @return File|null     */    public function getPicture(): ?File    {        return $this->picture;    }    /**     * @param File|null $picture     */    public function setPicture(?File $picture): void    {        $this->picture = $picture;        if ($this->picture instanceof UploadedFile) {            $this->updated_at = new DateTime('now');        }    }    public function getAuthor(): ?string    {        return $this->author;    }    public function setAuthor(string $author): self    {        $this->author = $author;        return $this;    }    public function getPublicationDate(): ?DateTimeInterface    {        return $this->publication_date;    }    public function setPublicationDate(DateTimeInterface $publication_date): self    {        $this->publication_date = $publication_date;        return $this;    }    public function getGenre(): ?string    {        return $this->genre;    }    public function setGenre(string $genre): self    {        $this->genre = $genre;        return $this;    }    /**     * @return mixed     */    public function getUpdatedAt()    {        return $this->updated_at;    }    /**     * @param mixed $updated_at     */    public function setUpdatedAt($updated_at): void    {        $this->updated_at = $updated_at;    }    /**     * @return string     */    public function getAvailability(): string    {        return $this->availability;    }    /**     * @param string $availability     */    public function setAvailability(string $availability): void    {        $this->availability = $availability;    }    /**     * @return string|null     */    public function getBorrowerUn(): ?string    {        return $this->borrower_un;    }    /**     * @param string|null $borrower_un     */    public function setBorrowerUn(?string $borrower_un): void    {        $this->borrower_un = $borrower_un;    }}