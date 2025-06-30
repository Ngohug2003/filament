<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?int $navigationSort  = 2;
    protected static ?string $navigationGroup = 'Quản Lý Bài Viết';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                // TagsInput::make('name')
                //     ->label('Thẻ')
                //     ->color('danger'),
                // Builder::make('content')
                //     ->blocks([
                //         Builder\Block::make('heading')
                //             ->schema([
                //                 TextInput::make('content')
                //                     ->label('Heading')
                //                     ->required(),
                //                 Select::make('level')
                //                     ->options([
                //                         'h1' => 'Heading 1',
                //                         'h2' => 'Heading 2',
                //                         'h3' => 'Heading 3',
                //                         'h4' => 'Heading 4',
                //                         'h5' => 'Heading 5',
                //                         'h6' => 'Heading 6',
                //                     ])
                //                     ->required(),
                //             ])
                //             ->columns(2),
                //         Builder\Block::make('paragraph')
                //             ->schema([
                //                 Textarea::make('content')
                //                     ->label('Paragraph')
                //                     ->required(),
                //             ]),
                //         Builder\Block::make('image')
                //             ->schema([
                //                 FileUpload::make('url')
                //                     ->label('Image')
                //                     ->image()
                //                     ->required(),
                //                 TextInput::make('alt')
                //                     ->label('Alt text')
                //                     ->required(),
                //             ]),
                //     ])->reorderableWithButtons()
                //     ->collapsed(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
