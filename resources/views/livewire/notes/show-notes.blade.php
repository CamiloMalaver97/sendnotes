<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with(): array {
        return [
            'notes' => Auth::user()
                ->notes()
                ->orderBy('send_date', 'desc')
                ->get(),
        ];
    }
}; ?>

<div>
    <div class="space-y-2">
        @if (!$notes->isEmpty())
            <div class="text-center">
                <p class="text-2xl font-bold">No notes yet</p>
                <p class="text-base">Lets create your first note</p>
                <x-button primary icon-right="plus" class="mt-6" href="{{route('notes.create')}}" wire:navigate>Create note</x-button>
            </div>
        @else
            <div class="grid grid-cols-2 gap-4 mt-6">
                @foreach ($notes as $note)
                    <x-card wire:key='{{$note->id}}' class="">
                        <div class="flex justify-between h-12 content-center">
                            <a href="#" class="text-lg font-bold hover:underline hover:text-blue-500">
                                {{$note->title}}
                            </a>
                            <div class="text-xs text-gray-500">
                                {{\Carbon\Carbon::parse($note->send_date)->format('M-d-Y')}}
                            </div>
                        </div>
                        <div class="flex items-end justify-between mt-1 space-x-1">
                            <p class="text-xs">Recipient <span class="font-semibold">{{$note->recipient}}</span></p>
                            <div>
                                <x-button.circle class="h-auto p-1" icon="eye"></x-button-circle>
                                <x-button.circle class="h-auto p-1" icon="trash"></x-button-circle>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>
</div>
