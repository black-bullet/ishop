<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Manufacturer;
use AppBundle\Entity\Translation\ManufacturerTranslation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadManufacturerData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /** @var Manufacturer $manufacturer */
        $manufacturer = (new Manufacturer())
            ->setName('Dell')
            ->setDescription(
                <<<TEXT
Dell — американская корпорация, одна из крупнейших компаний в области производства компьютеров. Входит в список Fortune 1000 по итогам 2005 года (26-е место). Штаб-квартира находится в Раунд-Роке в штате Техас в США.
TEXT
            )
            ->setSlug('dell')
            ->setActive(true);

        $manufacturerNameUa        = (new ManufacturerTranslation())
            ->setField('name')
            ->setContent('Dell')
            ->setLocale('uk');
        $manufacturerDescriptionUa = (new ManufacturerTranslation())
            ->setField('description')
            ->setContent(
                <<<TEXT
«Dell» — американська компанія з головним офісом в Остіні, штат Техас, заснована в 1984: один із провідних світових лідерів в галузі розробки і виробництва комп'ютерних систем. «Dell» виробляє сервери, системи зберігання даних, робочі станції, мережне устаткування, персональні комп'ютери, ноутбуки і КПК, принтери, багатофункціональні пристрої, монітори, проектори, телевізори
TEXT
            )
            ->setLocale('uk');

        $manufacturerNameEn        = (new ManufacturerTranslation())
            ->setField('name')
            ->setContent('Dell')
            ->setLocale('en');
        $manufacturerDescriptionEn = (new ManufacturerTranslation())
            ->setField('description')
            ->setContent(
                <<<TEXT
Dell Technologies Inc. (stylized as DELL), formerly Dell Inc., is an American privately owned multinational computer technology company based in Round Rock, Texas, United States, that develops, sells, repairs, and supports computers and related products and services.
TEXT
            )
            ->setLocale('en');

        $manufacturer->addTranslation($manufacturerNameUa)
                     ->addTranslation($manufacturerDescriptionUa)
                     ->addTranslation($manufacturerNameEn)
                     ->addTranslation($manufacturerDescriptionEn);
        $this->setReference('manufacturer-dell', $manufacturer);
        $manager->persist($manufacturer);

        $manufacturer = (new Manufacturer())
            ->setName('Asus')
            ->setDescription(
                <<<TEXT
ASUSTeK Computer Inc — расположенная в Тайване компания, производящая разнообразную компьютерную технику (как комплектующие, так и готовые продукты).
TEXT
            )
            ->setSlug('asus')
            ->setActive(true);

        $manufacturerNameUa        = (new ManufacturerTranslation())
            ->setField('name')
            ->setContent('Asus')
            ->setLocale('uk');
        $manufacturerDescriptionUa = (new ManufacturerTranslation())
            ->setField('description')
            ->setContent(
                <<<TEXT
ASUSTeK Computer Inc - розташована в Тайвані міжнародна компанія, що виробляє материнські плати, відеокарти, оптичні приводи, КПК, монітори, ноутбуки, сервери, мережеве обладнання, мобільні телефони, комп'ютерні корпуси, компоненти і системи охолодження.
TEXT
            )
            ->setLocale('uk');

        $manufacturerNameEn        = (new ManufacturerTranslation())
            ->setField('name')
            ->setContent('Asus')
            ->setLocale('en');
        $manufacturerDescriptionEn = (new ManufacturerTranslation())
            ->setField('description')
            ->setContent(
                <<<TEXT
ASUSTeK Computer Inc is a Taiwanese multinational computer hardware and electronics company headquartered in Beitou District, Taipei, Taiwan. 
TEXT
            )
            ->setLocale('en');

        $manufacturer->addTranslation($manufacturerNameUa)
                     ->addTranslation($manufacturerDescriptionUa)
                     ->addTranslation($manufacturerNameEn)
                     ->addTranslation($manufacturerDescriptionEn);
        $this->setReference('manufacturer-asus', $manufacturer);
        $manager->persist($manufacturer);

        $manufacturer = (new Manufacturer())
            ->setName('Acer')
            ->setDescription(
                <<<TEXT
Acer - тайваньская компания по производству компьютерной техники и электроники. 
TEXT
            )
            ->setSlug('acer')
            ->setActive(true);

        $manufacturerNameUa        = (new ManufacturerTranslation())
            ->setField('name')
            ->setContent('Acer')
            ->setLocale('uk');
        $manufacturerDescriptionUa = (new ManufacturerTranslation())
            ->setField('description')
            ->setContent(
                <<<TEXT
Acer - тайванська компанія з виробництва комп'ютерної техніки і електроніки.
TEXT
            )
            ->setLocale('uk');

        $manufacturerNameEn        = (new ManufacturerTranslation())
            ->setField('name')
            ->setContent('Acer')
            ->setLocale('en');
        $manufacturerDescriptionEn = (new ManufacturerTranslation())
            ->setField('description')
            ->setContent(
                <<<TEXT
Acer is a commonly known as Acer, stylised as acer, or formerly as acer) is a Taiwanese multinational hardware and electronics corporation specialising in advanced electronics technology.
TEXT
            )
            ->setLocale('en');

        $manufacturer->addTranslation($manufacturerNameUa)
                     ->addTranslation($manufacturerDescriptionUa)
                     ->addTranslation($manufacturerNameEn)
                     ->addTranslation($manufacturerDescriptionEn);
        $this->setReference('manufacturer-asus', $manufacturer);
        $manager->persist($manufacturer);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }
}
