<?php

namespace FluidMovement\TempestAdminPanel\Attribute;

use Attribute;

#[Attribute]
class AdminPanel
{
    /**
     * todo: document
     *
     * @param string $titleField
     * @param string $name
     */
    public function __construct(
        public string $titleField,
        public string $name = '',
    ) {
    }


}