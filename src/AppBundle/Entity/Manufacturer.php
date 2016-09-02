<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Translation\ManufacturerTranslation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Manufacturer Entity
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 *
 * @ORM\Table(name="manufacturers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ManufacturerRepository")
 *
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\ManufacturerTranslation")
 */
class Manufacturer implements Translatable
{
    /**
     * var int $id ID
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * var string $name Name
     *
     * @ORM\Column(type="string", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(min="2", max="255")
     *
     * @Gedmo\Translatable
     */
    private $name;

    /**
     * var string $description Description
     *
     * @ORM\Column(type="text", nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(min="2")
     *
     * @Gedmo\Translatable
     */
    private $description;

    /**
     * var string $image Image
     *
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\Type(type="string")
     */
    private $image;

    /**
     * @var int $sortOrder Sort oder
     *
     * @ORM\Column(type="integer", nullable=true, options={"default" : 10})
     *
     * @Assert\Type(type="integer")
     */
    private $sortOrder;

    /**
     * @var string $slug Slug
     *
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    private $slug;

    /**
     * @var bool $isActive Is active?
     *
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="bool")
     */
    private $isActive;

    /**
     * @var string $locale Locale
     *
     * @Gedmo\Locale
     */
    private $locale;

    /**
     * @var ManufacturerTranslation $translations Manufacturer translation
     *
     * @ORM\OneToMany(
     *   targetEntity="AppBundle\Entity\Translation\ManufacturerTranslation",
     *   mappedBy="object",
     *   cascade={"persist", "remove"}
     * )
     */
    private $translations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    /**
     * Get ID
     *
     * @return int ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get description
     *
     * @return string Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get image
     *
     * @return string Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
     *
     * @param string $image image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get sort order
     *
     * @return int Sort order
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set sort order
     *
     * @param int $sortOrder Sort order
     *
     * @return $this
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Set slug
     *
     * @param string $slug Slug
     *
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string Slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get locale
     *
     * @return string Locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Is active?
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * Set is Active
     *
     * @param bool $isActive is Active
     *
     * @return $this
     */
    public function setActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Set locale
     *
     * @param string $locale locale
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Add translation
     *
     * @param ManufacturerTranslation $manufacturerTranslation
     *
     * @return $this
     */
    public function addTranslation(ManufacturerTranslation $manufacturerTranslation)
    {
        if (!$this->translations->contains($manufacturerTranslation)) {
            $this->translations->add($manufacturerTranslation);
            $manufacturerTranslation->setObject($this);
        }

        return $this;
    }

    /**
     * Remove translation
     *
     * @param ManufacturerTranslation $manufacturerTranslation
     */
    public function removeTranslation(ManufacturerTranslation $manufacturerTranslation)
    {
        $this->translations->removeElement($manufacturerTranslation);
    }

    /**
     * Set translations
     *
     * @param ArrayCollection $translations
     *
     * @return $this
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * Get translations
     *
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}
