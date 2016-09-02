<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Translation\AttributeTranslation;
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
 * @ORM\Table(name="attributes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AttributeRepository")
 *
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\AttributeTranslation")
 */
class Attribute implements Translatable
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
     * @var AttributeGroup $attributeGroup Attribute group
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AttributeGroup", inversedBy="attributes")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     * @Assert\NotBlank()
     */
    private $attributeGroup;

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
     * @var int $sortOrder Sort oder
     *
     * @ORM\Column(type="integer", nullable=false, options={"default" : 10})
     *
     * @Assert\Type(type="integer")
     */
    private $sortOrder = 10;

    /**
     * @var string $locale Locale
     *
     * @Gedmo\Locale
     */
    private $locale;

    /**
     * @var AttributeTranslation $translations Attribute translation
     *
     * @ORM\OneToMany(
     *   targetEntity="AppBundle\Entity\Translation\AttributeTranslation",
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
     * Get attribute group
     *
     * @return AttributeGroup Attribute group
     */
    public function getAttributeGroup()
    {
        return $this->attributeGroup;
    }

    /**
     * Set attribute group
     *
     * @param AttributeGroup $attributeGroup Attribute group
     *
     * @return $this
     */
    public function setAttributeGroup($attributeGroup)
    {
        $this->attributeGroup = $attributeGroup;

        return $this;
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

    /**
     * Add translation
     *
     * @param AttributeTranslation $attributeTranslation
     *
     * @return $this
     */
    public function addTranslation(AttributeTranslation $attributeTranslation)
    {
        if (!$this->translations->contains($attributeTranslation)) {
            $this->translations->add($attributeTranslation);
            $attributeTranslation->setObject($this);
        }

        return $this;
    }

    /**
     * Remove translation
     *
     * @param AttributeTranslation $attributeTranslation
     */
    public function removeTranslation(AttributeTranslation $attributeTranslation)
    {
        $this->translations->removeElement($attributeTranslation);
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
