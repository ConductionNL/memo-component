<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}}
 *
 * )
 *
 * @ORM\Entity(repositoryClass="App\Repository\MemoRepository")
 * @Gedmo\Loggable(logEntryClass="App\Entity\ChangeLog")
 *
 * @ApiFilter(BooleanFilter::class)
 * @ApiFilter(OrderFilter::class)
 * @ApiFilter(DateFilter::class, strategy=DateFilter::EXCLUDE_NULL)
 * @ApiFilter(SearchFilter::class)
 */
class Memo
{
    /**
     * @var UuidInterface The UUID identifier of this object
     *
     * @example e2984465-190a-4562-829e-a8cca81aa35d
     *
     * @Groups({"read"})
     * @Assert\Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string A contact component person
     *
     * @example https://cc.zaakonline.nl/people/e2984465-190a-4562-829e-a8cca81aa35d
     * @Groups({"read", "write"})
     * @ORM\Column(type="text")
     * @Assert\Url
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotBlank
     */
    private $author;

    /**
     * @var string Name of the memo
     *
     * @example grocery list
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string Topic of the memo
     *
     * @example https://cc.zaakonline.nl/people/e2984465-190a-4562-829e-a8cca81aa35d
     * @Groups({"read", "write"})
     * @ORM\Column(type="text")
     * @Assert\Url
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotBlank
     */
    private $topic;

    /**
     * @var string Description of the memo
     *
     * @example list of grocery items
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max = 400
     * )
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @var Datetime $dateCreated The moment this resource was created
     *
     * @Groups({"read"})
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var Datetime $dateModified  The moment this resource last Modified
     *
     * @ApiFilter(DateFilter::class, strategy=DateFilter::EXCLUDE_NULL)
     * @Groups({"read"})
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModified;


    public function getId()
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTopic(): ?string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->mdescription;
    }

    public function setDescription(string $description): self
    {
        $this->description = $dscription;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated= $dateCreated;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }



}
