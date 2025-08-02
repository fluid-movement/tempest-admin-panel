<?php

namespace FluidMovement\TempestAdminPanel;

use FluidMovement\TempestAdminPanel\Service\AdminModelNameResolver;
use FluidMovement\TempestAdminPanel\Service\AdminUriBuilder;
use Tempest\Container\Singleton;
use Tempest\Reflection\ClassReflector;

#[Singleton]
readonly class AdminItemBuilder
{
    public function __construct(
        private AdminModelNameResolver $resolver,
        private AdminUriBuilder $uriBuilder,
        private AdminItemEntryBuilder $entryBuilder
    ) {
    }

    public function create(ClassReflector $item): AdminItem
    {
        return new AdminItem($item, $this->resolver, $this->uriBuilder, $this->entryBuilder);
    }
}