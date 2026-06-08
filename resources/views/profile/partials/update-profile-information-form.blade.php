<section class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <header class="mb-6 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
            Informations du profil
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Mettez à jour le nom et l'adresse e-mail de votre compte.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="'Nom'" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:text-white"
                :value="old('name', $user->name)"
                required autofocus autocomplete="name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="'Adresse e-mail'" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:text-white"
                :value="old('email', $user->email)"
                required autocomplete="username"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4">
                    <p class="text-sm text-gray-800 dark:text-gray-200">
                        Votre adresse e-mail n'est pas vérifiée.
                        <button form="send-verification" class="ml-2 underline text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-600">
                            Cliquez ici pour renvoyer l'e-mail de vérification.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow">
            Enregistrer
        </x-primary-button>
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >Modifications enregistrées.</p>
            @endif
        </div>
    </form>
</section>
