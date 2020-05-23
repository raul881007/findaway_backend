<?php

namespace App\DataFixtures;

use App\Entity\NGoals;
use App\Entity\NTask;
use App\Entity\NAvailable;
use App\Entity\NPersonalityStyle;
use App\Entity\Language;
use App\Entity\Role;
use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class MemberFixtures
 * @package App\DataFixtures
 */
class MemberFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $encoder;


    /**
     * UserFixtures constructor.
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
        $ntask = $manager->getRepository(NTask::class)->findAll();
        $ngoal = $manager->getRepository(NGoals::class)->findAll();
        $language = $manager->getRepository(Language::class)->findOneBy(['code' => 'en']);
        $navailable = $manager->getRepository(NAvailable::class)->findAll();
        $npersonalityStyle = $manager->getRepository(NPersonalityStyle::class)->findAll();


        $member = new Member();
        $member->setLanguage($language);
        $member->setUsername('member1@joinfindaway.com');
        $member->setFirstname('Member 1');
        $member->setLastname('Test');
        $member->setEmail('member1@joinfindaway.com');
        $member->setPassword($this->encoder->encodePassword($member, 'member1'));
        $member->setNAvailable($navailable[2]);
        $member->setNPersonalityStyle($npersonalityStyle[1]);
        $member->setPhone('+1786525456789');
        $member->setIsActive(true);
        $member->setPreferenceSexo(2);
        $manager->persist($member);



        $member1 = new Member();
        $member1->setLanguage($language);
        $member1->setUsername('member2@joinfindaway.com');
        $member1->setFirstname('Member 2');
        $member1->setLastname('Test');
        $member1->setEmail('member2@joinfindaway.com');
        $member1->setPassword($this->encoder->encodePassword($member, 'member2'));
        $member1->setNAvailable($navailable[4]);
        $member1->setNPersonalityStyle($npersonalityStyle[2]);
        $member1->setPhone('+1786525485692');
        $member1->setIsActive(true);

        $member1->setPreferenceSexo(1);
        $manager->persist($member1);
        $manager->flush();
    }


}
