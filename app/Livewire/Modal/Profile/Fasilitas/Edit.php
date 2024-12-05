<?php

namespace App\Livewire\Modal\Profile\Fasilitas;

use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Edit extends Component
{
    use WithFileUploads;

    public ?Fasilitas $fasilitas = null;

    #[Validate(rule: 'required|image|max:2048')]
    public $photo;

    #[Validate(rule: 'required|string|max:255')]
    public string $name;

    #[Validate(rule: 'required|string|max:255')]
    public string $description;

    public string $image;

    #[On('update')]
    public function prepare(int $id)
    {
        $this->fasilitas = Fasilitas::findOrFail($id);

        $this->image = $this->fasilitas->image;
        $this->name = $this->fasilitas->name;
        $this->description = $this->fasilitas->description;

        $this->dispatch('open-modal', modal: 'update fasilitas');
    }

    public function update()
    {
        $this->validate();

        Storage::delete($this->fasilitas->image);

        $path = $this->photo->store('image/fasilitas');
        $data = $this->only(['name', 'description']);

        $this->fasilitas->update([
            ...$data,
            'image' => $path
        ]);

        return $this->redirectRoute("fasilitas");
    }

    public function render()
    {
        return view('livewire.modal.profile.fasilitas.edit');
    }
}
