<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public Collection $documents;

    protected $listeners = ['documentUploaded'];

    public function mount(): void
    {
        $this->documents = auth()->user()->documents()->get();
    }

    public function documentUploaded(): void
    {
        $this->documents = auth()->user()->documents()->get();
    }

    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
