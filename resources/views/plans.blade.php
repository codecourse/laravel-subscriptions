<x-app-layout>
    <div class="bg-white py-24 sm:py-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl text-center">
                <p class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Choose a plan</p>
            </div>
            <div class="mt-20 flow-root">
                <div class="isolate -mt-16 flex items-center justify-center sm:mx-auto lg:-mx-8 lg:mt-0 lg:max-w-none xl:-mx-4 space-x-6">
                    <div class="pt-16 lg:px-8 lg:pt-0 xl:px-14 text-center grow">
                        <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $monthly['name'] }}</h3>
                        <p class="mt-6 gap-x-1">
                            <span class="text-5xl font-bold tracking-tight text-gray-900">$15</span>
                            <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
                        </p>
                        <x-primary-link-button href="{{ route('checkout', ['plan' => 'monthly']) }}" class="mt-8 w-1/2 justify-center">
                            Buy plan
                        </x-primary-link-button>
                    </div>
                    <div class="pt-16 lg:px-8 lg:pt-0 xl:px-14 text-center grow">
                        <h3 class="text-base font-semibold leading-7 text-gray-900">Yearly</h3>
                        <p class="mt-6 gap-x-1">
                            <span class="text-5xl font-bold tracking-tight text-gray-900">$120</span>
                            <span class="text-sm font-semibold leading-6 text-gray-600">/year</span>
                        </p>
                        <x-primary-link-button href="{{ route('checkout', ['plan' => 'yearly']) }}" class="mt-8 w-1/2 justify-center">
                            Buy plan
                        </x-primary-link-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
