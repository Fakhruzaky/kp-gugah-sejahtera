<?php

namespace App\Livewire\Modal\Profile\Visi;

use App\Models\Visi;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public ?Visi $visi = null;

    public string $name;

    public string $description;

    #[On('update')]
    public function prepare(int $id)
    {
        $this->visi = Visi::findOrFail($id);
        $this->name = $this->visi->name;
        $this->description = $this->visi->description;

        $this->dispatch("open-modal", modal: 'update visi');
    }

    public function update()
    {
        $data = $this->validate();

        $this->visi->update($data);

        $this->redirectRoute('visi');
    }

    public function rules()
    {
        return [
            "name" => ["required", "string", "max:255", Rule::unique('visi', 'name')->ignore($this->visi->id)],
            "description" => ["required", "string", "max:255"],
        ];
    }

    public function render()
    {
        return view('livewire.modal.profile.visi.edit');
    }
}
