<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Translation\OptionTranslation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Option Entity
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 *
 * @ORM\Table(name="options")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OptionRepository")
 *
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\OptionTranslation")
 */
class Option implements Translatable
{
    use TimestampableEntity;

    /**
     * @var int $id ID
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name Name
     *
     * @ORM\Column(type="string", length=255, nullable=false)
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
     * @var OptionTranslation $translations Option translation
     *
     * @ORM\OneToMany(
     *   targetEntity="AppBundle\Entity\Translation\OptionTranslation",
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
     * @param string $name Name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Set Locale
     *
     * @param string $locale Locale
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

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
     * @param int $sortOrder
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
     * @param OptionTranslation $optionTranslation
     *
     * @return $this
     */
    public function addTranslation(OptionTranslation $optionTranslation)
    {
        if (!$this->translations->contains($optionTranslation)) {
            $this->translations->add($optionTranslation);
            $optionTranslation->setObject($this);
        }

        return $this;
    }

    /**
     * Remove translation
     *
     * @param OptionTranslation $optionTranslation
     */
    public function removeTranslation(OptionTranslation $optionTranslation)
    {
        $this->translations->removeElement($optionTranslation);
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
