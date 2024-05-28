@php
    $actions = [
        ['label' => 'Editar', 'icon' => 'c-edit', 'method' => 'edit'],
        ['label' => 'Excluir', 'icon' => 'c-delete', 'method' => 'delete'],
    ];

    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'nome', 'label' => 'Nome'],
        ['key' => 'endereco', 'label' => 'Endereço'],
    ];
@endphp

<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <x-mary-button icon="c-plus-circle" responsive class="btn-primary" label="Nova Igreja"
                    @click="$wire.modalNew = true" />
            </div>
            <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <x-mary-table :headers="$headers" :rows="$igrejas">
                    @scope('actions', $igreja)
                        <div class="flex space-x-2 items-center">
                            <x-mary-button icon="o-trash" wire:click="destroy({{ $igreja->id }})"
                                class="btn-xs btn-error" />
                            <x-mary-button icon="o-pencil-square" wire:click="edit({{ $igreja->id }})" class="btn-xs" />
                        </div>
                    @endscope
                </x-mary-table>
            </div>
        </div>
    </div>

    <x-mary-modal wire:model="modalNew" class="backdrop-blur">
        <div>
            <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
                Nova Igreja
            </h2>
        </div>
        <form wire:submit.prevent="create">
            @csrf
            <div class="mb-5 space-y-4">
                <x-mary-input label="Nome" placeholder="Nome da Igreja" wire:model="nome" icon="o-user"
                    hint="Ex.: CCB xxxx" />

                <x-mary-input label="Endereço" placeholder="Endereço da Igreja" wire:model="endereco"
                    icon="o-map-pin" />
            </div>
            <div class="space-x-2">
                <x-mary-button label="Cadastrar" class="btn-sm btn-primary" type="submit"
                    wire:loading.attr="disabled" />
                <x-mary-button label="Cancelar" class="btn-sm" @click="$wire.modalNew = false" />
            </div>
        </form>

    </x-mary-modal>

    <x-mary-modal wire:model="modalEdit" class="backdrop-blur">
        <div>
            <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
                Editar Igreja
            </h2>
        </div>
        <form wire:submit.prevent="update">
            @csrf
            <div class="mb-5 space-y-4">
                <x-mary-input label="Nome" placeholder="Nome da Igreja" wire:model="nome" icon="o-user"
                    hint="Ex.: CCB xxxx" />

                <x-mary-input label="Endereço" placeholder="Endereço da Igreja" wire:model="endereco"
                    icon="o-map-pin" />
            </div>
            <div class="space-x-2">
                <x-mary-button label="Cadastrar" class="btn-sm btn-primary" type="submit"
                    wire:loading.attr="disabled" />
                <x-mary-button label="Cancelar" class="btn-sm" @click="$wire.modalEdit = false" />
            </div>
        </form>
    </x-mary-modal>
</div>
