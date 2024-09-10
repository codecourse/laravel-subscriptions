<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Subscription details
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            These are the details of your subscription
        </p>
    </header>

    <div class="mt-6">
        @if(auth()->user()->subscribed())
            <x-primary-link-button href="{{ route('subscription.portal') }}">
                Manage your subscription
            </x-primary-link-button>
        @endif

        @if(!auth()->user()->subscribed())
            <x-primary-link-button href="{{ route('plans') }}">
                Choose a plan
            </x-primary-link-button>
        @endif
    </div>
</section>
