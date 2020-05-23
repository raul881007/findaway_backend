<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Entity\Language;
use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture implements DependentFixtureInterface
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
        $roles = $manager->getRepository(Role::class)->findAll();
        $language = $manager->getRepository(Language::class)->findOneBy(['code' => 'en']);

        $groupDemo = new Group();
        $groupDemo->setName('Administrator');

        /** @var Role $role */
        foreach ($roles as $role) {
            $groupDemo->addRole($role);
        }
        $manager->persist($groupDemo);


        $user = new User();
        $user->setLanguage($language);
        $user->setUsername('admin@joinfindaway.com');
        $user->setName('Adminitrator');
        $user->setEmail('admin@joinfindaway.com');
        $user->addGroup($groupDemo);
        $user->setPassword($this->encoder->encodePassword($user, 'admin'));
        $manager->persist($user);
        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return array(
            RoleFixtures::class,
        );
    }
}
