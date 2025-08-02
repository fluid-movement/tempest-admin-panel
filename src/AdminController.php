<?php

namespace FluidMovement\TempestAdminPanel;

use Tempest\Router\Get;
use Tempest\View\View;

use function Tempest\Database\query;
use function Tempest\view;

final readonly class AdminController
{
    public function __construct(private AdminItemList $adminItems)
    {
    }

    #[Get('/admin')]
    public function index(): View
    {
        return view(
            'View/admin.view.php',
            items: $this->adminItems->items,
            title: 'Home',
        );
    }

    #[Get('/admin/{entity}')]
    public function list(string $entity): View
    {
        $activeItem = $this->adminItems->setActive($entity);
        return view(
            'View/admin-list.view.php',
            items: $this->adminItems->items,
            title: $activeItem->getName(),
            activeItem: $activeItem,
        );
    }

    #[Get('/admin/{entity}/{id}')]
    public function details(string $entity, string $id): View
    {
        $activeItem = $this->adminItems->setActive($entity);

        $entry = $activeItem?->load($id);

        return view(
            'View/admin-details.view.php',
            items: $this->adminItems->items,
            title: $activeItem->getName(),
            activeItem: $activeItem,
            entry: $entry
        );
    }
}