<?php

namespace AppBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;

/**
 * ManufacturerTranslation Entity
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 *
 * @ORM\Entity()
 * @ORM\Table(name="manufacturer_translations",
 *   uniqueConstraints={@ORM\UniqueConstraint(name="manufacturer_translation_unique_idx", columns={
 *     "locale", "object_id", "field"
 *   })}
 * )
 */
class ManufacturerTranslation extends AbstractPersonalTranslation
{
    /**
     * Constructor
     *
     * @param string $locale  locale
     * @param string $field   field
     * @param string $content content
     */
    public function __construct($locale = null, $field = null, $content = null)
    {
        $this->setLocale($locale);
        $this->setField($field);
        $this->setContent($content);
    }

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Attribute", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getLocale();
    }
}
