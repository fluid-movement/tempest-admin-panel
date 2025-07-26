<?php

namespace FluidMovement\TempestAdminPanel;

use FluidMovement\TempestAdminPanel\Attribute\AdminPanel;
use Tempest\Discovery\Discovery;
use Tempest\Discovery\DiscoveryLocation;
use Tempest\Discovery\IsDiscovery;
use Tempest\Reflection\ClassReflector;

class AdminDiscovery implements Discovery
{
    use IsDiscovery;

    public function __construct(private readonly AdminItems $adminItems) {

    }
    public function discover(DiscoveryLocation $location, ClassReflector $class): void
    {
        if($class->hasAttribute(AdminPanel::class)) {
            $this->discoveryItems->add($location, $class->getName());
        }
    }

    public function apply(): void
    {
    }
}