<?php

namespace App\Livewire\Modal\Profile\Fasilitas;

use App\Models\Fasilitas;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

    #[Validate(rule: 'image|max:2048')]
    public $photo;

    #[Validate(rule: 'required')]
    public string $name;

    #[Validate(rule: 'required')]
    public string $description;

    public function create()
    {
        $this->validate();

        $path = $this->photo->store('image/fasilitas');
        $data = $this->only(['name', 'description']);

        Fasilitas::create([
            ...$data,
            'image' => $path
        ]);

        return $this->redirectRoute("fasilitas");
    }

    public function render()
    {
        return view('livewire.modal.profile.fasilitas.create');
    }
}
