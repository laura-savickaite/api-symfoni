<?php 

namespace App\DataFixtures\Processor;

use Fidry\AliceDataFixtures\ProcessorInterface;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UserProcessor implements ProcessorInterface
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @inheritdoc
     */
    public function preProcess(string $fixtureId, $object): void
    {
        if (false === $object instanceof User) {
            return;
        }
		// dd($object->getPassword());
        $object->setPassword($this->passwordHasher->hashPassword($object, $object->getPassword()));
    }

    /**
     * @inheritdoc
     */
    public function postProcess(string $fixtureId, $object): void
    {
        // do nothing
    }
}
