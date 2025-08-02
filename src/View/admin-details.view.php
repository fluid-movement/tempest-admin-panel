<x-admin-base :title="$this->title">
    <div class="flex gap-4">
        <x-sidebar :items="$this->items"/>
        <div class="pt-4">
            <h1 class="font-bold">{{$this->activeItem->getName()}}</h1>
            <ul>
                <li :foreach="$entry->getProperties() as $property">
                    {{$property}} : {{$entry->$property}}
                </li>
            </ul>
        </div>
    </div>
</x-admin-base>