<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ApiResource()
 * @ORM\Entity()
 * @ORM\Table(name="company")
 * @Gedmo\TranslationEntity(class="App\Entity\Translation\CompanyTranslation")
 * @UniqueEntity("name")
 */
class Company
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"out"})
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(type="string", unique=true)
     * @Groups({"out", "in", "recruiter_in"})
     */
    private $name;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"out", "in", "recruiter_in"})
     */
    private $description;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"out", "in", "recruiter_in"})
     */
    private $catchPhrase;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     * @Gedmo\Slug(fields={"name"})
     * @Groups({"out"})
     */
    private $slug;

    /**
     * @var Locale
     *
     * @Gedmo\Locale
     */
    private $locale;

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCatchPhrase(): string
    {
        return $this->catchPhrase;
    }

    /**
     * @param string $catchPhrase
     */
    public function setCatchPhrase(string $catchPhrase): void
    {
        $this->catchPhrase = $catchPhrase;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }


}
