<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\Translation\CategoryTranslation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * LoadCategoryData
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 */
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /** @var Category $category */
        $category = (new Category())
            ->setName('Ноутбуки')
            ->setSlug('laptop')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setIsActive(true);

        $categoryTranslationUa = (new CategoryTranslation())
            ->setField('name')
            ->setContent('Ноутбуки')
            ->setLocale('uk');
        $categoryTranslationEn = (new CategoryTranslation())
            ->setField('name')
            ->setContent('Laptop')
            ->setLocale('en');
        $category->addTranslation($categoryTranslationUa)
                  ->addTranslation($categoryTranslationEn);
        $this->setReference('category-laptop', $category);
        $manager->persist($category);

        /** @var Category $category */
        $category = (new Category())
            ->setName('Телефоны')
            ->setSlug('phone')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setIsActive(true);

        $categoryTranslationUa = (new CategoryTranslation())
            ->setField('name')
            ->setContent('Телефони')
            ->setLocale('uk');
        $categoryTranslationEn = (new CategoryTranslation())
            ->setField('name')
            ->setContent('Phone')
            ->setLocale('en');
        $category->addTranslation($categoryTranslationUa)
                 ->addTranslation($categoryTranslationEn);
        $this->setReference('category-phone', $category);
        $manager->persist($category);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5;
    }
}
