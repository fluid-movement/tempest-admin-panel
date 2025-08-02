<?php

namespace FluidMovement\TempestAdminPanel;

use FluidMovement\TempestAdminPanel\Attribute\AdminPanel;
use FluidMovement\TempestAdminPanel\Service\AdminUriBuilder;
use Tempest\Reflection\ClassReflector;

class AdminItemEntry
{
    public function __construct(
        private $entry,
        private readonly ClassReflector $reflector,
        private readonly AdminUriBuilder $uriBuilder
    ) {
    }

    public function __get(string $name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } elseif (isset($this->entry->$name)) {
            return $this->entry->$name;
        }

        return null;
    }

    public function getProperties(): array
    {
        return array_map(
            fn ($property) => $property->name,
            $this->reflector->getReflection()->getProperties()
        );
    }

    public function getTitle(): string
    {
        /** @var AdminPanel $attribute */
        $attribute = $this->reflector->getAttribute(AdminPanel::class);
        $field = $attribute->titleField;
        return $this->entry->$field;
    }

    public function getUri(): string
    {
        return $this->uriBuilder->details($this->reflector, $this->entry->id);
    }
}