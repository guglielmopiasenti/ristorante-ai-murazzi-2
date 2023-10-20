<div class="relative z-10" role="dialog" aria-modal="true">
    <div class="fixed inset-0 hidden bg-gray-900 bg-opacity-10 transition-opacity md:block"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">

            <div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                <div
                    class="relative flex w-full items-center overflow-hidden rounded-lg bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                    <button @click="openCreatePlate = false" type="button"
                        class="absolute right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <form method="POST" enctype="multipart/form-data" novalidate
                        x-bind:action="`{{ url('admin/pictures') }}`" id="submit-form">
                        @csrf

                        <div class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
                            <div
                                class="aspect-h-3 aspect-w-2 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                                <div x-data="{ imagePreview: '{{ asset('storage/placeholder.jpg') }}' }" class="col-span-full">
                                    <div class="mt-2 flex justify-center rounded-lg  border-gray-400 px-6 py-10">
                                        <div class="text-center">
                                            <img x-bind:src="imagePreview" class="mx-auto h-32 w-32 object-cover">
                                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                <label for="file-upload"
                                                    class="relative cursor-pointer rounded-md bg-white px-2 font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Carica</span>
                                                    <input
                                                        x-on:change="imagePreview = URL.createObjectURL($event.target.files[0])"
                                                        name="filename" type="file" class="sr-only" id="file-upload">
                                                </label>
                                                <p class="pl-1">o droppa img</p>
                                            </div>
                                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF</p>
                                        </div>
                                    </div>
                                    @error('filename')
                                        <div class="text-red-500 text-sm mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-8 lg:col-span-7">
                                <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">Carica Una Foto</h2>



                                <p class="text-lg text-gray-900">Carica velocemente una foto. Scegli il file che
                                    vuoi caricare premendo sul bottone "carica" all'interno del riquadro, oppure
                                    semplicemente trascina un'immagine da una cartella del tuo pc! Se l'immagine è
                                    supportata verrà caricata in tempo reale una preview. A quel punto potrai
                                    premere sul bottone sottostante per caricare online la foto. Potrai eliminarla
                                    da questo pannello, ma ricorda, verrà immediatamente caricata sul sito che
                                    vedono anche i clienti.</p>

                                <button type="submit"
                                    class="rounded-full bg-indigo-600 px-3 py-2 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-5">Carica
                                    Foto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
