<?php

namespace FluidMovement\TempestAdminPanel\Service;

use FluidMovement\TempestAdminPanel\Attribute\AdminPanel;
use Tempest\Reflection\ClassReflector;

class AdminModelNameResolver
{
    public function resolve(ClassReflector $class): string
    {
        $attribute = $class->getAttribute(AdminPanel::class);
        if ($attribute->name) {
            return $attribute->name;
        }

        $namespace = explode("\\", $class->getName());
        return end($namespace);
    }
}