<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Entity\UserProfile;
use App\Entity\Answer;
use App\Entity\Question;
class UserTest extends KernelTestCase
{
    //first unit test testing project setup

     /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function setup(): void
    {
        $kernel = self::bootKernel();


        $this->entityManager = $kernel->getContainer()
                                    ->get('doctrine')
                                    ->getManager();
    }


    //second user testing - testing if a user is inserted into our database correctly
    public function testUserCreation(): void
    {
        $userProfile = new UserProfile();

        $userProfile->setName("test user");
        $userProfile->setEmail("test@test.com");
        $userProfile->setPassword("123456");
        $userProfile->setProfilePic("123.png");
        $userProfile->setAccess("0");
        $userProfile->setReputation("0");

        //assert that all the values are strings
        $this->assertIsString($userProfile->getName());
        $this->assertIsString($userProfile->getEmail());
        $this->assertIsString($userProfile->getPassword());
        $this->assertIsString($userProfile->getProfilePic());
        $this->assertIsString($userProfile->getAccess());
        $this->assertIsString($userProfile->getReputation());

        //update our db
        $this->entityManager->persist($userProfile);
        $this->entityManager->flush();

    }


    //third unit test - test if we can find the correct user using the email
    /**
     * @depends testUserCreation
     */
    public function testSearchByEmail(): void
    {
        $userProfile = $this->entityManager
                        ->getRepository(UserProfile::class)
                        ->findOneBy(['email' => "test@test.com"]);

        //assert if the values are correct
        $this->assertEquals("test@test.com", $userProfile->getEmail());
        $this->assertEquals("test user", $userProfile->getUsername());
        $this->assertSame("123456", $userProfile->getPassword());
        $this->assertSame("123.png", $userProfile->getProfilePic());
        $this->assertSame("0", $userProfile->getReputation());
        $this->assertSame("0", $userProfile->getAccess());
    }

        //fourth unit test - update pinned value
/**
 * @test
 */

public function updatePinnedTest(){

    //targeting the entity
      $answer = new Answer();
    
      //getting the data from the db
        $answer = $this->entityManager
        ->getRepository(Answer::class)
        ->findOneBy(['id' => '1']);

        //getting the total likes from the db
      $getPinned=$answer->getPinned();


    //   //checking if we are getting the correct value
    $this->assertEquals('0', $answer->getPinned());

      //setting the likes to +1
      $getPinned =  $answer->setPinned(1);
    
      //update the data
      $this->entityManager->persist($answer);
      $this->entityManager->flush();

      //check if they are equal - final assert
      $this->assertEquals(1,$answer->getPinned());
  
 }

 //fifth test - deleting a user test
 public function deleteUserTest(){

    //targeting the entity
      $userProfile = new UserProfile();
    
      //getting the data from the db
        $userProfile = $this->entityManager
        ->getRepository(UserProfile::class)
        ->findBy(['id' => '1']);


      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($userProfile);
      $entityManager->flush();
  
 }

 //6th unit test - creating a new question
     public function testQuestionCreation(): void
     {
         $question = new Question();
 
         $userProfile->setUserId("1");
         $userProfile->setQuestionText("test@test.com");
         $userProfile->setUpvotes("123456");
         $userProfile->setDownvotes("123.png");
         $userProfile->setImageUrl("0");
         $userProfile->setCommunity("0");
 
         //assert that all the values are strings
         $this->assertIsString($userProfile->getUserId());
         $this->assertIsString($userProfile->getQuestionText());
         $this->assertIsString($userProfile->getUpvotes());
         $this->assertIsString($userProfile->getDownvotes());
         $this->assertIsString($userProfile->getImageUrl());
         $this->assertIsString($userProfile->getCommunity());
 
         //update our db
         $this->entityManager->persist($question);
         $this->entityManager->flush();
 
     }


    protected function tearDown(): void 
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }

}
