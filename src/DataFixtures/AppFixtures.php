<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('en_US');

        for($i = 0;$i < 30;$i++)
        {
            $firstname = $faker->firstNameFemale;
            $lasname = $faker->lastName;
            $mail = $faker->freeEmail;
            $phone = $faker->isbn10;

            $customer = (new Customer())
            ->setFirstname($firstname)
            ->setLastname($lasname)
            ->setEmail($mail)
            ->setPhone($phone);

            $manager->persist($customer);


        }

        for($i = 0;$i < 10;$i++)
        {

            $name = $faker->company;
            $siret = $faker->isbn10;
            $adress = $faker->streetAddress;
            $zipCode = $faker->postcode;
            $city = $faker->city;

            $company = (new Company())
            ->setName($name)
            ->setSiret($siret)
            ->setAddress($adress)
            ->setZipCode($zipCode)
            ->setCity($city);

            $manager->persist($company);

        }
        
        $manager->flush();
    }
}
