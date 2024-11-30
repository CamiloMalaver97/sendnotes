<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit() {
        dd($this->noteTitle, $this->noteBody, $this->noteRecipient, $this->noteSendDate);
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model='noteTitle' label='Note title' placeholder='Awesome note title'/>
        <x-textarea wire:model='noteBody' label='Your note' placeholder='Put here your note'/>
        <x-input wire:model='noteRecipient' icon='user' label='Recipient' placeholder='yourfriend@email.com'/>
        <x-input wire:model='noteSendDate' icon='calendar' type='date' label='Send date'/>
        <x-button wire:click='submit' primary>Create note</x-button>
    </form>
</div>
