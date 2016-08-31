<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\AttributeGroup;
use AppBundle\Entity\Translation\AttributeGroupTranslation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * LoadAttributeGroupData
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 */
class LoadAttributeGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //Screen
        $attributeGroup = (new AttributeGroup())
            ->setName('Экран');

        $attributeGroupTranslationUa = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('Екран')
            ->setLocale('uk');
        $attributeGroupTranslationEn = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('Screen')
            ->setLocale('en');

        $attributeGroup->addTranslation($attributeGroupTranslationUa)
                       ->addTranslation($attributeGroupTranslationEn);
        $this->setReference('attribute-group-screen', $attributeGroup);
        $manager->persist($attributeGroup);

        //CPU
        $attributeGroup = (new AttributeGroup())
            ->setName('Процессор');

        $attributeGroupTranslationUa = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('Процесор')
            ->setLocale('uk');
        $attributeGroupTranslationEn = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('CPU')
            ->setLocale('en');

        $attributeGroup->addTranslation($attributeGroupTranslationUa)
                       ->addTranslation($attributeGroupTranslationEn);
        $this->setReference('attribute-group-cpu', $attributeGroup);
        $manager->persist($attributeGroup);

        //RAM
        $attributeGroup = (new AttributeGroup())
            ->setName('Оперативная память');

        $attributeGroupTranslationUa = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('Оперативна память')
            ->setLocale('uk');
        $attributeGroupTranslationEn = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('RAM')
            ->setLocale('en');

        $attributeGroup->addTranslation($attributeGroupTranslationUa)
                       ->addTranslation($attributeGroupTranslationEn);
        $this->setReference('attribute-group-ram', $attributeGroup);
        $manager->persist($attributeGroup);

        //Video
        $attributeGroup = (new AttributeGroup())
            ->setName('Видеокарта');

        $attributeGroupTranslationUa = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('Відеокарта')
            ->setLocale('uk');
        $attributeGroupTranslationEn = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('Video card')
            ->setLocale('en');

        $attributeGroup->addTranslation($attributeGroupTranslationUa)
                       ->addTranslation($attributeGroupTranslationEn);
        $this->setReference('attribute-group-video', $attributeGroup);
        $manager->persist($attributeGroup);

        //Drive
        $attributeGroup = (new AttributeGroup())
            ->setName('Накопителя');

        $attributeGroupTranslationUa = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('Накопичувач')
            ->setLocale('uk');
        $attributeGroupTranslationEn = (new AttributeGroupTranslation())
            ->setField('name')
            ->setContent('Drive')
            ->setLocale('en');

        $attributeGroup->addTranslation($attributeGroupTranslationUa)
                       ->addTranslation($attributeGroupTranslationEn);
        $this->setReference('attribute-group-drive', $attributeGroup);
        $manager->persist($attributeGroup);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
