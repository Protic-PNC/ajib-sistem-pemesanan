<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Bearer Token Information') }}
                            </h2>
                        </header>

                        <div class="flex items-center gap-x-6">
                            <div class="mt-6 w-full">
                                @if (session('status') )
                                    <div class="text-sm text-gray-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <x-input-label for="bearer" :value="__('Bearer Token')" />
                                <x-text-input id="bearer" name="bearer" type="text" class="mt-1 block w-full" :value="old('token', $user->token->token ?? '')" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <form method="post" action="{{ route('token.create') }}" class="mt-6 space-y-6">
                                @csrf
                                <input type="hidden" name="token_name" value="Bearer">
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Generate Token') }}</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
