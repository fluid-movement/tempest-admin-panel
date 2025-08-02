<?php

use FluidMovement\TempestAdminPanel\AdminController;

use function Tempest\uri;

$homeUri = uri([AdminController::class, 'index'])

?>

<aside class="p-4 w-[150px]">
    <h1 class="font-bold mb-8">
        <a href="{{$homeUri}}">Admin Panel</a>
    </h1>
    <nav class="flex flex-col gap-2">
        <ul>
            <li :foreach="$items as $item" class="py-2">
                <a href="{{$item->getListUri()}}">{{$item->getName()}}</a>
            </li>
        </ul>
    </nav>
</aside>
