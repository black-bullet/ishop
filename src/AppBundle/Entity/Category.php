<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Translation\CategoryTranslation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category Entity
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 *
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\CategoryTranslation")
 */
class Category
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
     * @var ArrayCollection|Category[] $children Children
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    protected $children;

    /**
     * @var Category $parent Parent category
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category", inversedBy="children")
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $parent;

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
     * @Gedmo\Translatable
     */
    private $description;

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
     * @var CategoryTranslation $translations Category translation
     *
     * @ORM\OneToMany(
     *   targetEntity="AppBundle\Entity\Translation\CategoryTranslation",
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
        $this->children     = new ArrayCollection();
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
     * Set parent
     *
     * @return $this
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set Parent
     *
     * @param Category $parent Parent category
     *
     * @return $this
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get name
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
     * Get description
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
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
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
     * Get slug
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
     * Is active?
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive Is Active?
     *
     * @return $this
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get meta keyword
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
     * Get meta description
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
     * @return Category
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get locale
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
     * @return Category
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Add translation
     *
     * @param CategoryTranslation $categoryTranslation
     *
     * @return $this
     */
    public function addTranslation(CategoryTranslation $categoryTranslation)
    {
        if (!$this->translations->contains($categoryTranslation)) {
            $this->translations->add($categoryTranslation);
            $categoryTranslation->setObject($this);
        }

        return $this;
    }

    /**
     * Remove translation
     *
     * @param CategoryTranslation $categoryTranslation
     */
    public function removeTranslation(CategoryTranslation $categoryTranslation)
    {
        $this->translations->removeElement($categoryTranslation);
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

    /**
     * Add children
     *
     * @param Category $child Child of category
     *
     * @return $this
     */
    public function addChildren(Category $child)
    {
        $this->children->add($child);

        return $this;
    }

    /**
     * Remove children
     *
     * @param Category $child Category
     *
     * @return $this
     */
    public function removeChildren(Category $child)
    {
        $this->children->removeElement($child);

        return $this;
    }

    /**
     * Set children
     *
     * @param ArrayCollection|Category[] $children Array of children
     *
     * @return $this
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * Get children
     *
     * @return ArrayCollection|Category
     */
    public function getChildren()
    {
        return $this->children;
    }
}
