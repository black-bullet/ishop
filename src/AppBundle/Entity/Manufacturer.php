<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Translation\ManufacturerTranslation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Attribute Entity
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
     * @ORM\Column(type="string", nullable=false)
     *
     * @Assert\Type(type="string")
     */
    private $image;

    /**
     * @var int $sortOrder Sort oder
     *
     * @ORM\Column(type="integer", nullable=false, options={"default" : 10})
     *
     * @Assert\Type(type="integer")
     */
    private $sortOrder;

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
     * Get locale
     *
     * @return string Locale
     */
    public function getLocale()
    {
        return $this->locale;
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
}
