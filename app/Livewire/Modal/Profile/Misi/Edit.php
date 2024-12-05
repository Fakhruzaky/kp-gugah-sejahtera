<?php

namespace App\Livewire\Modal\Profile\Misi;

use App\Models\Misi;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public ?Misi $misi = null;

    public string $name;
    public string $description;

    #[On('update')]
    public function prepare(int $id)
    {
        $this->misi = Misi::findOrFail($id);

        $this->name = $this->misi->name;
        $this->description = $this->misi->description;

        $this->dispatch("open-modal", modal: 'update misi');
    }

    public function rules()
    {
        return [
            "name" => ["required", "string", "max:255", Rule::unique("misi", "name")->ignore($this->misi->id)],
            "description" => ["required", "string", "max:255"]
        ];
    }

    public function update()
    {
        $data = $this->validate();

        $this->misi->update($data);

        return $this->redirectRoute("misi");
    }

    public function render()
    {
        return view('livewire.modal.profile.misi.edit');
    }
}
