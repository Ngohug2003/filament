<?php

namespace App\Livewire;

use App\Models\Contact;
use Filament\Forms\Components\Grid;
use Filament\Forms\Concerns\InteractsWithForms;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;

class CreateContact extends Component implements HasForms
{
    use InteractsWithForms;
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([

                    TextInput::make('name')
                        ->label('Họ và tên')
                        ->required(),

                    TextInput::make('number')
                        ->label('Số điện thoại')
                        ->required(),
                ]),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->columnSpanFull(),
                Textarea::make('message')
                    ->label('Nội dung')
                    ->rows(10)
                    ->cols(30)
                    ->required(),


            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState(); 
        Contact::create($data); 
        session()->flash('success', 'Thông tin liên hệ đã được gửi thành công!');
        $this->reset('data'); 
        $this->form->fill(); 
        session()->flash('success', 'Bạn đã gửi phản hồi thành công !');
    }

    public function render()
    {
        return view('livewire.create-contact');
    }
}
