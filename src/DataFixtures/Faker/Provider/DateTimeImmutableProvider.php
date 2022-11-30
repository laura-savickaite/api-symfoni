<?php

namespace App\DataFixtures\Faker\Provider;
// namespace App\Tests\Resources\Services\Faker;

// use DataFixtures\Faker\Provider\DateTime as DateTime;
use Faker\Provider\Base as BaseProvider;
// extends BaseProvider

final class DateTimeImmutableProvider extends BaseProvider
{
    public function DateTimeImmutable(\DateTime $datetime)
    {
        return \DateTimeImmutable::createFromMutable($datetime);
    }
}
