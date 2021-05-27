<div class="container mx-auto px-4">
    <section class="py-8 px-4 text-center">
        <form class="flex-row justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md"
              wire:submit.prevent="save"
              x-data="{ isUploading: false, progress: 0, finished: false }"
              x-on:livewire-upload-start="isUploading = true"
              x-on:livewire-upload-finish="isUploading = false; finished = true"
              x-on:livewire-upload-error="isUploading = false"
              x-on:livewire-upload-progress="progress = $event.detail.progress"
        >
            <div x-show="!finished" class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="w-full relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                        Upload a file

                        <!-- File Input -->
                        <input id="file-upload" wire:model="document" type="file" class="sr-only">
                    </label>
                </div>
                <p class="text-xs text-gray-500">
                    File up to 2MB
                </p>

                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>

            <!-- Preview -->
            @if($document && str_contains($document->getMimeType(), 'image'))
                <div class="md:w-1/5" x-show="finished">
                    <div class="relative w-full pb-1/1">
                        <img class="absolute w-full h-full cover" src="{{ $document->temporaryUrl() }}" alt="">
                    </div>
                </div>
            @endif

            <!-- Submit -->
            <div x-show="finished">
                <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="finished = false">
                    Submit
                </button>
            </div>

            <!-- Errors -->
            @error('document')
                <span class="text-xs text-red-700">{{ $message }}</span>
            @enderror
        </form>
    </section>
</div>
