<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $pwd
    ){}

    public function load(ObjectManager $manager): void
    {
        $user = new Users();
        $user->setEmail('admin@admin.admin');
        $user->setPassword($this->pwd->hashPassword($user,'admin'));
        $user->setRoles(['ROLE_USER']);
        $user->setFirstName('Cinnamon');
        $user->setLastName('CINNAMON');
        $user->setPhoneNumber('0000000000');
        $user->setPicture('https://example.com/admin-profile-pic.jpg');
        $user->setBiography('123 pouf paf pof 456 boum bam bim 789 plus d inspi');
        $user->setUserName('SuperAdminDeLaMortQuiTueMouahahahah');
        $manager->persist($user);

        $manager->flush();

        
        }
}
