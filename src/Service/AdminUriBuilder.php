<?php

namespace FluidMovement\TempestAdminPanel\Service;

use FluidMovement\TempestAdminPanel\AdminController;
use Tempest\Reflection\ClassReflector;

use function Tempest\uri;

readonly class AdminUriBuilder
{
    public function __construct(private AdminModelNameResolver $resolver)
    {
    }

    public function list(ClassReflector $class): string
    {
        $name = $this->resolver->resolve($class);
        return uri([AdminController::class, 'list'], entity: $name);
    }

    public function details(ClassReflector $class, string $id): string
    {
        $name = $this->resolver->resolve($class);
        return uri([AdminController::class, 'details'], entity: $name, id: $id);
    }
}