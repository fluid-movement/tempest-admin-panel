<?php

namespace FluidMovement\TempestAdminPanel;

class AdminItems
{
    private(set) array $items = [];

    public function add(string $item): void
    {
        $this->items[] = $item;
    }
}