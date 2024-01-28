<?php

declare(strict_types=1);

namespace Src\Giphy\Domain\ValueObjects;

final class GiphyId
{
    private $value;

    public function __construct(string $name)
    {
        $this->value = $name;
    }

    public function value(): string
    {
        return $this->value;
    }
}