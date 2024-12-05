<?php

namespace App\Livewire\Modal\Profile\Misi;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Misi;

class Create extends Component
{
    #[Validate(rule: 'required|string|max:255|unique:misi,name')]
    public string $name;

    #[Validate(rule: 'required|string|max:255')]
    public string $description;

    public function create()
    {
        $data = $this->validate();

        Misi::create($data);

        return $this->redirectRoute("misi");
    }

    public function render()
    {
        return view('livewire.modal.profile.misi.create');
    }
}
