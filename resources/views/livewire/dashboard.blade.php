<div class="container mx-auto px-4">
    <section class="py-8 px-4">
        @if($documents)
        <div class="flex flex-wrap -mx-4 -mb-8">
            @foreach($documents as $document)
            <a href="{{ route('document.download', $document->id) }}" class="md:w-1/5 px-4 mb-8 text-center">
                <div class="block w-full pb-1/1 relative overflow-hidden bg-gray-100 rounded mb-4 hover:bg-gray-300 transition">
                    <button class="bg-indigo-700 absolute top-2 right-2 text-white rounded p-1 z-10">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    @if($document->isImage())
                        <img class="absolute w-full h-full object-cover" src="{{ route('document.show', $document->id) }}" alt="{{ $document->name }}">
                    @elseif($document->isPdf())
                        <x-icons.pdf class="absolute p-10 text-gray-600 w-full h-full object-cover" />
                    @elseif($document->isWord())
                        <x-icons.doc class="absolute p-10 text-gray-600 w-full h-full object-cover" />
                    @elseif($document->isExcel())
                        <x-icons.xls class="absolute p-10 text-gray-600 w-full h-full object-cover" />
                    @elseif($document->isZip())
                        <x-icons.zip class="absolute p-10 text-gray-600 w-full h-full object-cover" />
                    @endif
                </div>
                <p class="text-gray-800 text-sm truncate max-w-full">{{ $document->name }}</p>
            </a>
            @endforeach
        </div>
        @endif
    </section>
</div>
