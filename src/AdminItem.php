<?php

namespace FluidMovement\TempestAdminPanel;

use FluidMovement\TempestAdminPanel\Service\AdminModelNameResolver;
use FluidMovement\TempestAdminPanel\Service\AdminUriBuilder;
use Tempest\Reflection\ClassReflector;

use function Tempest\Database\query;

class AdminItem
{
    /**
     * @var AdminItemEntry[]
     */
    private(set) array $entries {
        get {
            if (isset($this->entries)) {
                return $this->entries;
            }

            $this->entries = [];
            foreach (query($this->class->getName())->select()->all() as $entry) {
                $this->entries[] = $this->entryBuilder->create($entry, $this->class);
            }
            return $this->entries;
        }
    }

    public function __construct(
        private readonly ClassReflector $class,
        private readonly AdminModelNameResolver $resolver,
        private readonly AdminUriBuilder $uriBuilder,
        private readonly AdminItemEntryBuilder $entryBuilder
    ) {
    }

    public function load(string $id): AdminItemEntry
    {
        return $this->entryBuilder->create(
            query($this->class->getName())->select()->where('id = ?', $id)->first(),
            $this->class);
    }

    public function getName(): string
    {
        return $this->resolver->resolve($this->class);
    }

    public function getListUri(): string
    {
        return $this->uriBuilder->list($this->class);
    }
}