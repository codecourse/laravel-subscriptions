<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('subscription.partials.details')
                </div>
            </div>

            @if (auth()->user()->subscribed())
                @if (auth()->user()->subscription()->canceled())
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('subscription.partials.resume')
                        </div>
                    </div>
                @else
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('subscription.partials.cancel')
                        </div>
                    </div>
                @endif
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('subscription.partials.invoices')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
