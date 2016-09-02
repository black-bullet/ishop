<?php

namespace AppBundle\Entity;

use AppBundle\DBAL\Types\ProductStatusType;
use AppBundle\Entity\Translation\ProductTranslation;
use Doctrine\Common\Collections\ArrayCollection;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product Entity
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 *
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\ProductTranslation")
 */
class Product
{
    use TimestampableEntity;

    /**
     * var int $id ID
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Manufacturer $manufacturer Manufacturer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Manufacturer", inversedBy="products")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     * @Assert\NotBlank()
     */
    private $manufacturer;

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
     * var string $model Model
     *
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(min="2", max="255")
     */
    private $model;

    /**
     * var string $description Description
     *
     * @ORM\Column(type="text", nullable=true)
     *
     * @Gedmo\Translatable
     */
    private $description;

    /**
     * @var float $price Price
     *
     * @ORM\Column(type="decimal", precision=7, scale=2)
     *
     * @Assert\NotBlank()
     */
    private $price;

    /**
     * @var int $quantity Quantity
     *
     * @ORM\Column(type="integer", nullable=true)
     *
     * @Assert\Type(type="integer")
     */
    private $quantity;

    /**
     * @var ProductStatusType $status Status
     *
     * @ORM\Column(name="status", type="ProductStatusType", nullable=false)
     * @DoctrineAssert\Enum(entity="AppBundle\DBAL\Types\ProductStatusType")
     */
    protected $status;

    /**
     * @var string $image Image
     *
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\Type(type="string")
     */
    private $image;

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
     * @var string $metaKeyword Meta keyword
     *
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\Type(type="string")
     *
     * @Gedmo\Translatable
     */
    private $metaKeyword;

    /**
     * @var string $metaDescription Meta description
     *
     * @ORM\Column(type="text", nullable=true)
     *
     * @Assert\Type(type="string")
     *
     * @Gedmo\Translatable
     */
    private $metaDescription;

    /**
     * @var string $locale Locale
     *
     * @Gedmo\Locale
     */
    private $locale;

    /**
     * @var ProductTranslation $translations Product translation
     *
     * @ORM\OneToMany(
     *   targetEntity="AppBundle\Entity\Translation\ProductTranslation",
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
     * Set ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set manufacturer
     *
     * @return Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set manufacturer
     *
     * @param Manufacturer $manufacturer Manufacturer
     *
     * @return $this
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Set name
     *
     * @return string
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
     * Set model
     *
     * @return $this
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set model
     *
     * @param string $model Model
     *
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Set description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description Description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param float $price Price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantity
     *
     * @param int $quantity Quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set status
     *
     * @return ProductStatusType
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param ProductStatusType $status Status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set mage
     *
     * @param string $image Image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
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
     * IsActive ?
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * Set Is active
     *
     * @param boolean $isActive isActive
     *
     * @return $this
     */
    public function setActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Set meta keyword
     *
     * @return string
     */
    public function getMetaKeyword()
    {
        return $this->metaKeyword;
    }

    /**
     * Set meta keyword
     *
     * @param string $metaKeyword Meta keyword
     *
     * @return $this
     */
    public function setMetaKeyword($metaKeyword)
    {
        $this->metaKeyword = $metaKeyword;

        return $this;
    }

    /**
     * Set meta description
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set meta description
     *
     * @param string $metaDescription Meta description
     *
     * @return $this
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Set locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set locale
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
     * Add translation
     *
     * @param ProductTranslation $productTranslation Product translations
     *
     * @return $this
     */
    public function addTranslation(ProductTranslation $productTranslation)
    {
        if (!$this->translations->contains($productTranslation)) {
            $this->translations->add($productTranslation);
            $productTranslation->setObject($this);
        }

        return $this;
    }

    /**
     * Remove translation
     *
     * @param ProductTranslation $productTranslation Product translations
     */
    public function removeTranslation(ProductTranslation $productTranslation)
    {
        $this->translations->removeElement($productTranslation);
    }

    /**
     * Set translations
     *
     * @param ArrayCollection $translations Translations
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
