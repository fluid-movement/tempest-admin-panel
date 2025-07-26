<?php

namespace FluidMovement\TempestAdminPanel;

use Tempest\Router\Get;
use Tempest\View\View;
use function Tempest\view;

final class AdminController
{
    public function __construct()
    {

    }

    #[Get('/admin')]
    public function __invoke(): View
    {
        return view('View/admin.view.php');
    }
}