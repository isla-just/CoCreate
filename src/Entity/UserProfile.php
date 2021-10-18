<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

 /**
 * @ORM\Entity(repositoryClass="App\Repository\UserProfileRepository")
 */

class UserProfile implements UserInterface{

    //variables

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    
private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

        /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

     /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $profilePic;

     /**
     * @ORM\Column(
     * type="integer", 
     * length=5, 
     * name="access",
     * options={"default": 0})
     */
    private $access = 0;

    // private $access;

     /**
     * @ORM\Column(
     * type="integer", 
     * length=5, 
     * name="reputation",
     * options={"default": 0})
     */
private $reputation = 0;

/**
 * @ORM\OneToMany(targetEntity=Question::class, mappedBy="user_id")
 */
private $questions;

public function __construct()
{
    $this->questions = new ArrayCollection();
}

    // private $reputation;

//functions getting the data from DebugBundle
public function getId() {return $this->id;}
public function setId($id) {$this->id =$id;}

public function getName() {return $this->name;}


public function setName(string $name): self
{
    $this->name = $name;

    return $this;
}


public function getEmail() {return $this->email;}

public function setEmail(string $email): self
{
    $this->email = $email;

    return $this;
}


public function getPassword(): ?string
{
    return $this->password;
}

public function setPassword(string $password): self
{
    $this->password = $password;

    return $this;
}

public function getProfilePic(): ?string
{
    return $this->profilePic;
}

public function setProfilePic(string $profilePic): self
{
    $this->profilePic = $profilePic;

    return $this;
}

public function getAccess(): ?int
{
    return $this->access;
}

public function setAccess(int $access): self
{
    $this->access = $access;

    return $this;
}

public function getReputation(): ?int
{
    return $this->reputation;
}

public function setReputation(int $reputation): self
{
    $this->reputation = $reputation;

    return $this;
}

public function getUsername()
    {
        return $this->email;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
   public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setUserId($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getUserId() === $this) {
                $question->setUserId(null);
            }
        }

        return $this;
    }

}
?>