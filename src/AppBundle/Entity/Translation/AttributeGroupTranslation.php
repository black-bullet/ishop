<?php

namespace AppBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;

/**
 * AttributeGroupTranslation Entity
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 *
 * @ORM\Entity()
 * @ORM\Table(name="attribute_group_translations",
 *   uniqueConstraints={@ORM\UniqueConstraint(name="attribute_group_translation_unique_idx", columns={
 *     "locale", "object_id", "field"
 *   })}
 * )
 */
class AttributeGroupTranslation extends AbstractPersonalTranslation
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AttributeGroup", inversedBy="translations")
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
