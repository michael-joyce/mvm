<?php

declare(strict_types=1);

/*
 * (c) 2021 Michael Joyce <mjoyce@sfu.ca>
 * This source file is subject to the GPL v2, bundled
 * with this source code in the file LICENSE.
 */

namespace App\DataFixtures;

use App\Entity\Manuscript;
use App\Entity\ManuscriptContent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Persistence\ObjectManager;

/**
 * Generated by Webonaute\DoctrineFixtureGenerator.
 */
class ManuscriptContentFixtures extends Fixture implements DependentFixtureInterface {
    /**
     * Set loading order.
     *
     * @return int
     */
    public function getDependencies() {
        return [
            ManuscriptFixtures::class,
            ContentFixtures::class,
            PrintSourceFixtures::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager) : void {
        $manager->getClassMetadata(Manuscript::class)->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $item1 = new ManuscriptContent();
        $item1->setContent($this->getReference('_reference_Content1'));
        $item1->setManuscript($this->getReference('_reference_Manuscript1'));
        $item1->setContext('On a page');
        $item1->setPrintSource($this->getReference('_reference_PrintSource1'));
        $this->addReference('_reference_ManuscriptContent1', $item1);
        $manager->persist($item1);

        $manager->flush();
    }
}
