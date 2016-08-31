<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Attribute;
use AppBundle\Entity\AttributeGroup;
use AppBundle\Entity\Translation\AttributeGroupTranslation;
use AppBundle\Entity\Translation\AttributeTranslation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * LoadAttributeData
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 */
class LoadAttributeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /** @var AttributeGroup $attributeGroupScreen Attribute group screen */
        /** @var AttributeGroup $attributeGroupCPU Attribute group CPU */
        /** @var AttributeGroup $attributeGroupRAM Attribute group RAM */
        /** @var AttributeGroup $attributeGroupVideo Attribute group video */
        /** @var AttributeGroup $attributeGroupDrive Attribute group drive */
        $attributeGroupScreen = $this->getReference('attribute-group-screen');
        $attributeGroupCPU    = $this->getReference('attribute-group-cpu');
        $attributeGroupRAM    = $this->getReference('attribute-group-ram');
        $attributeGroupVideo  = $this->getReference('attribute-group-video');
        $attributeGroupDrive  = $this->getReference('attribute-group-drive');

        //Screen size
        $attribute = (new Attribute())
            ->setName('Размер экрана')
            ->setAttributeGroup($attributeGroupScreen);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Розмір екрану')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Screen size')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-screen-size', $attribute);
        $manager->persist($attribute);

        //Screen resolution
        $attribute = (new Attribute())
            ->setName('Разрешение экрана')
            ->setAttributeGroup($attributeGroupScreen);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Розширення екрану')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Screen resolution')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-screen-resolution', $attribute);
        $manager->persist($attribute);

        //CPU model
        $attribute = (new Attribute())
            ->setName('Модель процессора')
            ->setAttributeGroup($attributeGroupCPU);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Модель процесору')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Model of CPU')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-cpu-model', $attribute);
        $manager->persist($attribute);

        //CPU frequency
        $attribute = (new Attribute())
            ->setName('Частота процессора')
            ->setAttributeGroup($attributeGroupCPU);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Частота процесору')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('CPU frequency')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-cpu-frequency', $attribute);
        $manager->persist($attribute);

        //RAM amount
        $attribute = (new Attribute())
            ->setName('Объем оперативной памяти')
            ->setAttributeGroup($attributeGroupRAM);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Об\'єм оперативної пам\'яті')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('The amount of RAM')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-ram-amount', $attribute);
        $manager->persist($attribute);

        //RAM type
        $attribute = (new Attribute())
            ->setName('Тип оперативной памяти')
            ->setAttributeGroup($attributeGroupRAM);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Тип оперативної пам\'яті')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Type of memory')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-ram-type', $attribute);
        $manager->persist($attribute);

        //Video model
        $attribute = (new Attribute())
            ->setName('Модель видеокарты')
            ->setAttributeGroup($attributeGroupVideo);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Модель відоекарти')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Model of video card')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-ram-model', $attribute);
        $manager->persist($attribute);

        //Video amount
        $attribute = (new Attribute())
            ->setName('Объем видеокарты')
            ->setAttributeGroup($attributeGroupVideo);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Обсяг відеокарти')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('The amount of video')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-video-amount', $attribute);
        $manager->persist($attribute);

        //Drive type
        $attribute = (new Attribute())
            ->setName('Тип накопителя')
            ->setAttributeGroup($attributeGroupDrive);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Тип накопичувача')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Type of drive')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-drive-type', $attribute);
        $manager->persist($attribute);

        //Drive amount
        $attribute = (new Attribute())
            ->setName('Объем накопителя')
            ->setAttributeGroup($attributeGroupDrive);

        $attributeTranslationUa = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Обсяг накопичувача')
            ->setLocale('uk');
        $attributeTranslationEn = (new AttributeTranslation())
            ->setField('name')
            ->setContent('Amount of drive')
            ->setLocale('en');
        $attribute->addTranslation($attributeTranslationUa)
                  ->addTranslation($attributeTranslationEn);
        $this->setReference('attribute-drive-ammount', $attribute);
        $manager->persist($attribute);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}
