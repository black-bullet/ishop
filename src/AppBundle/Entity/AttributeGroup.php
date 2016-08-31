<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Translation\AttributeGroupTranslation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AttributeGroup class
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 *
 * @ORM\Table(name="attribute_groups")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AttributeGroupRepository")
 *
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\AttributeGroupTranslation")
 */
class AttributeGroup implements Translatable
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
     * @var AttributeGroupTranslation $translations Attribute group translation
     *
     * @ORM\OneToMany(
     *   targetEntity="AppBundle\Entity\Translation\AttributeGroupTranslation",
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
     * Add translation
     *
     * @param AttributeGroupTranslation $attributeGroupTranslation
     *
     * @return $this
     */
    public function addTranslation(AttributeGroupTranslation $attributeGroupTranslation)
    {
        if (!$this->translations->contains($attributeGroupTranslation)) {
            $this->translations->add($attributeGroupTranslation);
            $attributeGroupTranslation->setObject($this);
        }

        return $this;
    }

    /**
     * Remove translation
     *
     * @param AttributeGroupTranslation $attributeGroupTranslation
     */
    public function removeTranslation(AttributeGroupTranslation $attributeGroupTranslation)
    {
        $this->translations->removeElement($attributeGroupTranslation);
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
