<?phpnamespace App\Entity;use App\Repository\BookRepository;use DateTime;use DateTimeInterface;use Doctrine\ORM\Mapping as ORM;use Symfony\Component\HttpFoundation\File\File;use Symfony\Component\HttpFoundation\File\UploadedFile;use Vich\UploaderBundle\Mapping\Annotation as Vich;/** * @ORM\Entity(repositoryClass=BookRepository::class) * @Vich\Uploadable */class Book{    /**     * @ORM\Id     * @ORM\GeneratedValue     * @ORM\Column(type="integer")     */    private $id;    /**     * @ORM\Column(type="string", length=255)     */    private $title;    /**     * @ORM\Column(type="text")     */    private $description;    /**     * @var string|null     * @ORM\Column (type="string", length=255)     */    private $filename;    /**     * @var File|null     * @Vich\UploadableField(mapping="book_image", fileNameProperty="filename")     */    private $picture;    /**     * @ORM\Column(type="string", length=255)     */    private $author;    /**     * @ORM\Column(type="date")     */    private $publication_date;    /**     * @ORM\Column(type="string", length=255)     */    private $genre;    /**     * @ORM\ManyToOne(targetEntity=Catalogue::class, inversedBy="book_id")     * @ORM\JoinColumn(nullable=true)     */    private $catalogue;/** * @ORM\Column(type="datetime") */private $updated_at;/** * @ORM\Column(type="integer") */private $availability = 1;    public function getId(): ?int    {        return $this->id;    }    public function getTitle(): ?string    {        return $this->title;    }    public function setTitle(string $title): self    {        $this->title = $title;        return $this;    }    public function getDescription(): ?string    {        return $this->description;    }    public function setDescription(string $description): self    {        $this->description = $description;        return $this;    }    /**     * @return string|null     */    public function getFilename(): ?string    {        return $this->filename;    }    /**     * @param string|null $filename     */    public function setFilename(?string $filename): void    {        $this->filename = $filename;    }    /**     * @return File|null     */    public function getPicture(): ?File    {        return $this->picture;    }    /**     * @param File|null $picture     */    public function setPicture(?File $picture): void    {        $this->picture = $picture;        if ($this->picture instanceof UploadedFile) {            $this->updated_at = new DateTime('now');        }    }    public function getAuthor(): ?string    {        return $this->author;    }    public function setAuthor(string $author): self    {        $this->author = $author;        return $this;    }    public function getPublicationDate(): ?DateTimeInterface    {        return $this->publication_date;    }    public function setPublicationDate(DateTimeInterface $publication_date): self    {        $this->publication_date = $publication_date;        return $this;    }    public function getGenre(): ?string    {        return $this->genre;    }    public function setGenre(string $genre): self    {        $this->genre = $genre;        return $this;    }    public function getCatalogue(): ?Catalogue    {        return $this->catalogue;    }    public function setCatalogue(?Catalogue $catalogue): self    {        $this->catalogue = $catalogue;        return $this;    }    /**     * @return mixed     */    public function getUpdatedAt()    {        return $this->updated_at;    }    /**     * @param mixed $updated_at     */    public function setUpdatedAt($updated_at): void    {        $this->updated_at = $updated_at;    }public function getAvailability(): ?int{    return $this->availability;}public function setAvailability(int $availability): self{    $this->availability = $availability;    return $this;}}