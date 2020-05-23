<?php

namespace App\DataFixtures;

use App\Entity\NCompliment;
use App\Entity\Ratings;
use App\Entity\Member;
use App\Entity\NAvailable;
use App\Entity\NPersonalityStyle;
use App\Entity\Language;
use App\Entity\Role;
use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class MemberFixtures
 * @package App\DataFixtures
 */
class PartnerFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $encoder;


    /**
     * PartnerFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $language = $manager->getRepository(Language::class)->findOneBy(['code' => 'en']);
        $navailable = $manager->getRepository(NAvailable::class)->findAll();
        $npersonalityStyle = $manager->getRepository(NPersonalityStyle::class)->findAll();
        $member = $manager->getRepository(Member::class)->findAll();
        $ncompliment = $manager->getRepository(NCompliment::class)->findAll();

        $ratings1 = new Ratings();
        $ratings1->setMember($member[0]);
        $ratings1->setNote('Partner 1 is fantastic with his questions. I realize how many excuses I can make');
        $ratings1->setScore(4.5);
        $ratings1->addNCompliment($ncompliment[2]);
        $ratings1->addNCompliment($ncompliment[1]);
        $ratings1->addNCompliment($ncompliment[4]);
        $manager->persist($ratings1);


        $ratings2 = new Ratings();
        $ratings2->setMember($member[1]);
        $ratings2->setNote('Partner 1 is fantastic with his questions. I realize how many excuses I can make');
        $ratings2->setScore(3.5);
        $ratings2->addNCompliment($ncompliment[0]);
        $ratings2->addNCompliment($ncompliment[4]);
        $ratings2->addNCompliment($ncompliment[1]);
        $manager->persist($ratings2);

        $partner = new Partner();
        $partner->setLanguage($language);
        $partner->setUsername('partner1@joinfindaway.com');
        $partner->setFirstname('Partner 1');
        $partner->setLastname('Test');
        $partner->setEmail('partner1@joinfindaway.com');
        $partner->setPassword($this->encoder->encodePassword($partner, 'partner1'));
        $partner->setNAvailable($navailable[2]);
        $partner->setNPersonalityStyle($npersonalityStyle[1]);
        $partner->setGender('M');
        $partner->setPhone('+1786525632569');
        $partner->addRating($ratings1);
        $partner->addRating($ratings2);
        $partner->setIsActive(true);

        $manager->persist($partner);
        $manager->flush();

    }


}
