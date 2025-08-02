<?php

namespace FluidMovement\TempestAdminPanel;

use Tempest\Container\Singleton;
use Tempest\Reflection\ClassReflector;

#[Singleton]
class AdminItemList
{
    /**
     * @var AdminItem[]
     */
    private(set) array $items = [];

    private(set) int $active;

    public function __construct(private readonly AdminItemBuilder $builder)
    {
    }

    public function add(ClassReflector $item): void
    {
        $this->items[] = $this->builder->create($item);
    }

    public function getActive(): ?AdminItem
    {
        return isset($this->active) ? $this->items[$this->active] : null;
    }

    public function setActive(string $name): ?AdminItem
    {
        foreach ($this->items as $key => $item) {
            if ($item->getName() === $name) {
                $this->active = $key;
                return $item;
            }
        }
        return null;
    }
}