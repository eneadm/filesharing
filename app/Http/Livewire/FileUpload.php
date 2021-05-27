<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public string|null|TemporaryUploadedFile $document = null;

    protected array $rules = [
        'document' => 'required|max:2048|mimes:jpeg,jpg,bmp,png,pdf,xls,xlsx,doc,docx,zip',
    ];

    public function save(): void
    {
        $this->validate();

        $document = Document::create([
            'user_id' => auth()->id(),
            'name' => $this->document?->getClientOriginalName(),
            'extension' => $this->document?->getClientOriginalExtension(),
            'path' => $this->document?->store('documents'),
        ]);

        $this->emit('documentUploaded', $document);
    }

    public function render(): View
    {
        return view('livewire.file-upload');
    }
}
