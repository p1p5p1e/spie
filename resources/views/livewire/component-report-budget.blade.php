<div class="grid grid-cols-1 md:grid-cols-12 gap-2">
    <div class="col-span-1 text-center md:col-span-12 p-4 mb-4">
        <h5 class="text-3xl font-bold leading-none text-gray-900 dark:text-white">
            {{ __('Budget') }}
        </h5>
    </div>

    <div class="col-span-1 md:col-span-6 p-2">
        <div
            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                    {{ __('Hub') }}
                </h5>
            </div>
            <div class="flow-root">
                <canvas id="budgetHub" budgetHub="{{ $budgetperaxis }}"></canvas>
            </div>
        </div>
    </div>

    <div class="col-span-1 md:col-span-6 p-2">
        <div
            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                    {{ __('Goal') }}
                </h5>
            </div>

            @foreach ($hubs as $hub)
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <x-feathericon-book-open class="h-8 w-8 text-gray-500 mr-2" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ __('Hub') }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $hub->name }}
                                    </p>
                                </div>
                                <div
                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    @php
                                        $aux = 0;
                                        foreach ($hub->goals as $goal) {
                                            foreach ($goal->results as $result) {
                                                foreach ($result->actions as $action) {
                                                    foreach ($action->plannings as $planning) {
                                                        foreach ($planning->finances as $finance) {
                                                            $aux = $aux + $finance->budget;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    @endphp

                                    {{ $aux }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
