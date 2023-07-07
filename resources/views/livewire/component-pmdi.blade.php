<div>
    <x-data-form>
        @slot('form')
            <form class="mt-2">
                <div class="grid md:grid-cols-4 md:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="code" id="code" wire:model='code'
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />

                        <label for="code"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            {{ __('Code') }}
                        </label>
                        <x-jet-input-error for="code" />
                    </div>

                    @if (Auth::user()->getRoleNames()[0] == 'creador territorial')
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="text" name="action_code" id="action_code" wire:model='action_code'
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />

                            <label for="action_code"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                {{ __('Code') }} {{ __('Action') }}
                            </label>
                            <x-jet-input-error for="action_code" />
                        </div>
                    @endif
                </div>
                
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="result_description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            {{ __('Result description') }}
                        </label>
                        <textarea id="result_description" wire:model='result_description' rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""></textarea>
                        <x-jet-input-error for="result_description" />
                    </div>

                    <div class="relative z-0 mb-6 w-full group">
                        <label for="action_description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            {{ __('Action description') }}
                        </label>
                        <textarea id="action_description" wire:model='action_description' rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=""></textarea>
                        <x-jet-input-error for="action_description" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-12 gap-2">
                    <a wire:click='store' wire:loading.attr="disabled" wire:target="store"
                        class="col-span-1 sm:col-span-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer disabled:opacity-25 transition">
                        {{ __('Create') }}
                    </a>

                    <a wire:click='clear' wire:loading.attr="disabled"
                        class="col-span-1 sm:col-span-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 cursor-pointer">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        @endslot
    </x-data-form>
    <x-search-form>
        @slot('search')
            <form>
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <input type="text" id="search" wire:model="search"
                        class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=" ">

                    @if ($search != null)
                        <a wire:click='resetSearch'
                            class="text-white absolute right-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 cursor-pointer">
                            X
                        </a>
                    @endif
                </div>
            </form>
        @endslot
    </x-search-form>

    <x-table-form>
        @slot('table')
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Code') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Entity') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Type') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Sector') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Pillar') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Hub') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Goal') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Result') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Action') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Result description') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                {{ __('Action description') }}
                            </th>

                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Options</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($plannings as $planning)
                            @php
                                $visibility = false;
                            @endphp

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $planning->code }}
                                </th>

                                <td class="py-4 px-6">
                                    {{ $planning->entity->name }}
                                </td>

                                <td class="py-4 px-6">
                                    <ul>
                                        @foreach ($planning->types as $type)
                                            <li class="flex items-center gap-2">
                                                {{ $type->name }}
                                            </li>

                                            @php
                                                if ($type->id == 9 || $type->id == 10 || $type->id == 11) {
                                                    $visibility = true;
                                                }
                                            @endphp
                                        @endforeach
                                    </ul>
                                </td>

                                <td class="py-4 px-6">
                                    {{ $planning->sector->name }} {{ $planning->sector->description }}
                                </td>

                                <td class="py-4 px-6">
                                    @foreach ($planning->action->result->goal->hub->pillars as $pilar)
                                        <ul
                                            class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                {{ $pilar->name }} {{ $pilar->description }}
                                            </li>
                                        </ul>
                                    @endforeach
                                </td>

                                <td class="py-4 px-6">
                                    {{ $planning->action->result->goal->hub->name }}
                                    {{ $planning->action->result->goal->hub->description }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ $planning->action->result->goal->name }}
                                    {{ $planning->action->result->goal->description }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ $planning->action->result->name }} {{ $planning->action->result->description }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ $planning->action->name }} {{ $planning->action->description }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ $planning->result_description }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ $planning->action_description }}
                                </td>

                                <td>
                                    <ul>
                                        <li>
                                            <a wire:click='select({{ $planning->id }})'
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">{{ __('Select') }}</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endslot
        @slot('paginate')
            {{ $plannings->links('vendor.livewire.custom') }}
        @endslot
    </x-table-form>

    <x-dialog-modal wire:model="deleteModal">
        <x-slot name="title">
            <div class="flex col-span-6 sm:col-span-4 items-center">
                <x-feathericon-alert-triangle class="h-10 w-10 text-red-500 mr-2" />
                {{ __('Delete') }} {{ __('Pillar') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="flex col-span-6 sm:col-span-4 items-center gap-2">
                <x-feathericon-trash class="h-20 w-20 text-red-500 mr-2" />
                <p>
                    {{ __('Once deleted, the record cannot be recovered.') }}
                </p>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('deleteModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-danger-button>
            <x-jet-secondary-button class="ml-2" wire:click='delete' wire:loading.attr="disabled">
                {{ __('Accept') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
