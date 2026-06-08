<section class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <header class="mb-6 border-b pb-4">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Supprimer le compte
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Une fois votre compte supprimé, toutes ses données et ressources seront définitivement effacées.
            Avant de procéder, veuillez télécharger les informations que vous souhaitez conserver.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-5 rounded-md shadow-md transition duration-200"
    >
        Supprimer le compte
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Êtes-vous sûr de vouloir supprimer votre compte ?
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Une fois votre compte supprimé, toutes ses données seront définitivement effacées.
                Veuillez entrer votre mot de passe pour confirmer la suppression.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Mot de passe" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 dark:bg-gray-900 dark:text-white"
                    placeholder="Mot de passe"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-700 dark:text-gray-200 px-4 py-2 rounded-md">
                    Annuler
                </x-secondary-button>

                <x-danger-button class="ml-3 bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow-md transition duration-200">
                    Supprimer le compte
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
