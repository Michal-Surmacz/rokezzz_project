// src/Entity/JobApplication.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"read"}}
 *         },
 *         "post"={"denormalization_context"={"groups"={"write"}}}
 *     },
 *     itemOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"read"}}
 *         }
 *     }
 * )
 */
class JobApplication
{
    /**
     * @var int|null The id of this application (automatically generated)
     */
    private $id;

    /**
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @Assert\NotBlank
     */
    public $surname;

    /**
     * @Assert\Email
     */
    public $email;

    /**
     * @Assert\NotBlank
     */
    public $telephoneNumber;

    /**
     * @Assert\NotBlank
     */
    public $expectedSalary;

    /**
     * @Assert\NotBlank
     */
    public $position;

    /**
     * @Assert\NotBlank
     */
    public $level;

    // getters and setters...

    public function getId(): ?int
    {
        return $this->id;
    }

    // Other getters and setters go here...

    // Add a method to automatically set the level based on the expected salary
    public function setLevelBasedOnSalary()
    {
        if ($this->expectedSalary < 5000) {
            $this->level = 'junior';
        } elseif ($this->expectedSalary >= 5000 && $this->expectedSalary <= 9999) {
            $this->level = 'regular';
        } else {
            $this->level = 'senior';
        }
    }
}