<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Subscription details
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            These are the details of your subscription
        </p>
    </header>

    <div class="mt-6 space-y-6">
        @if(auth()->user()->subscribed())
            <ul>
                <li>
                    <strong>Plan</strong>: {{ $plan->title() }}
                </li>

                @if ($upcoming)
                    <li>
                        <strong>Renews</strong>: {{ $upcoming->date()->toDateString() }} ({{ $upcoming->date()->diffForHumans() }})
                    </li>
                    <li>
                        <strong>Next charge</strong>: {{ $upcoming->total() }}
                    </li>
                @endif

                @if (auth()->user()->subscription()->canceled())
                    <li>
                        <strong>Ends</strong>: {{ auth()->user()->subscription()->ends_at->toDateString() }} ({{ auth()->user()->subscription()->ends_at->diffForHumans() }})
                    </li>
                @endif
            </ul>

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
