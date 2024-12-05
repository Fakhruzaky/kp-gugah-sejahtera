<?php

namespace App\Livewire\Modal\Profile\Visi;

use Livewire\Component;
use App\Models\Visi as Model;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate(rule: 'required|string|max:255|unique:visi,name')]
    public string $name;

    #[Validate(rule: 'required|string|max:255')]
    public string $description;

    public function create()
    {
        $data = $this->validate();

        Model::create($data);

        return $this->redirectRoute("visi");
    }

    public function render()
    {
        return view('livewire.modal.profile.visi.create');
    }
}
