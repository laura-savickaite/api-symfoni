<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use DateTimeImmutable;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class UsersProcessor implements ProcessorInterface
{
	public function __construct(private EntityManagerInterface $manager)
	{
	}

	public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
	{
		$data->setCreatedAt(new DateTimeImmutable());
		$this->manager->persist($data);
		$this->manager->flush();
	}
}
