<?php

namespace App\Livewire;

use App\Models\Igreja;
use Livewire\Component;

//use Livewire\WithPagination;

class IgrejasTable extends Component
{
    public $igrejas;

    public $igreja;

    public $nome;

    public $endereco;

    public bool $modalNew = false;

    public bool $modalEdit = false;
    //use WithPagination;

    public function mount()
    {
        $this->igrejas = Igreja::all();
    }

    public function render()
    {
        return view('livewire.igrejas-table');
    }

    public function create()
    {

        $igreja = new Igreja();
        $this->validate([
            'nome' => 'required|unique:igrejas,nome',
            'endereco' => 'required',
        ], [
            'nome.unique' => 'Igreja já cadastrada no sistema',
            'nome.required' => 'O campo nome e obrigatorio',
            'endereco.required' => 'O campo endereço e obrigatorio',
        ]);

        $igreja->nome = $this->nome;
        $igreja->endereco = $this->endereco;
        $igreja->save();

        if ($igreja) {
            $this->modalNew = false;
        }

        $this->reset(['nome', 'endereco']);

        $this->igrejas = Igreja::all();
    }

    public function destroy(Igreja $igreja)
    {
        $igreja->delete();
        $this->igrejas = Igreja::all();
    }

    public function edit(Igreja $igreja)
    {
        $this->igreja = $igreja;
        $this->nome = $igreja->nome;
        $this->endereco = $igreja->endereco;
        $this->modalEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nome' => 'required',
            'endereco' => 'required',
        ], [
            'nome.required' => 'O campo nome e obrigatorio',
            'endereco.required' => 'O campo endereço e obrigatorio',
        ]);
        $this->igreja->nome = $this->nome;
        $this->igreja->endereco = $this->endereco;
        $this->igreja->save();

        if ($this->igreja) {
            $this->modalEdit = false;
        }

        $this->reset(['nome', 'endereco']);

        $this->igrejas = Igreja::all();
    }
}
