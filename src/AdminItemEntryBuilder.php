<?php

namespace FluidMovement\TempestAdminPanel;

use FluidMovement\TempestAdminPanel\Service\AdminUriBuilder;
use Tempest\Container\Singleton;
use Tempest\Reflection\ClassReflector;

#[Singleton]
readonly class AdminItemEntryBuilder
{
    public function __construct(
        private AdminUriBuilder $uriBuilder
    ) {
    }

    public function create($entry, ClassReflector $item): AdminItemEntry
    {
        return new AdminItemEntry($entry, $item, $this->uriBuilder);
    }
}