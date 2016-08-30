<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Option;
use AppBundle\Entity\Translation\OptionTranslation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * LoadOptionData
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 */
class LoadOptionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //Screen
        $option = (new Option())
            ->setName('Экран');

        $optionTranslationUa = (new OptionTranslation())
            ->setField('name')
            ->setContent('Екран')
            ->setLocale('uk');
        $optionTranslationEn = (new OptionTranslation())
            ->setField('name')
            ->setContent('Screen')
            ->setLocale('en');

        $option->addTranslation($optionTranslationUa)
               ->addTranslation($optionTranslationEn);
        $this->setReference('option-screen', $option);
        $manager->persist($option);

        //CPU
        $option = (new Option())
            ->setName('Процессор');

        $optionTranslationUa = (new OptionTranslation())
            ->setField('name')
            ->setContent('Процесор')
            ->setLocale('uk');
        $optionTranslationEn = (new OptionTranslation())
            ->setField('name')
            ->setContent('CPU')
            ->setLocale('en');

        $option->addTranslation($optionTranslationUa)
               ->addTranslation($optionTranslationEn);
        $this->setReference('option-cpu', $option);
        $manager->persist($option);

        //RAM
        $option = (new Option())
            ->setName('Оперативная память');

        $optionTranslationUa = (new OptionTranslation())
            ->setField('name')
            ->setContent('Оперативна память')
            ->setLocale('uk');
        $optionTranslationEn = (new OptionTranslation())
            ->setField('name')
            ->setContent('RAM')
            ->setLocale('en');

        $option->addTranslation($optionTranslationUa)
               ->addTranslation($optionTranslationEn);
        $this->setReference('option-ram', $option);
        $manager->persist($option);

        //Amount video
        $option = (new Option())
            ->setName('Объем памяти видеокарты');

        $optionTranslationUa = (new OptionTranslation())
            ->setField('name')
            ->setContent('Обсяг пам\'яті відеокарти')
            ->setLocale('uk');
        $optionTranslationEn = (new OptionTranslation())
            ->setField('The amount of video memory')
            ->setContent('RAM')
            ->setLocale('en');

        $option->addTranslation($optionTranslationUa)
               ->addTranslation($optionTranslationEn);
        $this->setReference('option-video-memory', $option);
        $manager->persist($option);

        //Type of hard drive
        $option = (new Option())
            ->setName('Тип накопителя');

        $optionTranslationUa = (new OptionTranslation())
            ->setField('name')
            ->setContent('Тип накопичувача')
            ->setLocale('uk');
        $optionTranslationEn = (new OptionTranslation())
            ->setField('Type of hard drive')
            ->setContent('RAM')
            ->setLocale('en');

        $option->addTranslation($optionTranslationUa)
               ->addTranslation($optionTranslationEn);
        $this->setReference('option-type-hard-drive', $option);
        $manager->persist($option);

        //Amount of hard drive
        $option = (new Option())
            ->setName('Объём накопителя');

        $optionTranslationUa = (new OptionTranslation())
            ->setField('name')
            ->setContent('Обсяг накопичувача')
            ->setLocale('uk');
        $optionTranslationEn = (new OptionTranslation())
            ->setField('Amount of hard drive')
            ->setContent('RAM')
            ->setLocale('en');

        $option->addTranslation($optionTranslationUa)
               ->addTranslation($optionTranslationEn);
        $this->setReference('option-amount-hard-drive', $option);
        $manager->persist($option);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
