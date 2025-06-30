<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Filament\Resources\CategoryResource\RelationManagers\StatesRelationManager;
use App\Models\Category;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use NunoMaduro\Collision\Adapters\Phpunit\State;

// Resource quản lý danh mục bài viết trong Filament
class CategoryResource extends Resource
{
    // Liên kết model Category với resource này
    protected static ?string $model = Category::class;

    // Cấu hình icon, vị trí, nhóm và thuộc tính tiêu đề cho navigation trong admin panel
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort  = 1;
    protected static ?string $navigationGroup = 'Quản Lý Bài Viết';
    protected static ?string $recordTitleAttribute = 'name';

    // Định nghĩa form tạo/sửa danh mục
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Trường nhập tên danh mục
                TextInput::make('name')
                    ->label('Danh mục bài viết')
                    ->live(onBlur: true) // Tự động cập nhật khi rời khỏi trường
                    
                    ->afterStateUpdated(
                        fn(string $operation, $state, Forms\Set $set) =>
                        $operation == 'create' ? $set('slug', str()->slug($state)) : null
                    )
                    ->required() // Bắt buộc nhập
                    ->unique(Category::class, 'name', ignoreRecord: true) // Không trùng tên
                    ->columnSpanFull(),

            
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->disabled() 
                    ->dehydrated()
                    ->unique(Category::class, 'slug', ignoreRecord: true) // Không trùng slug
                    ->columnSpan(2),
            ]);
    }

    // Định nghĩa bảng hiển thị danh sách danh mục
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Cột tên danh mục, có thể tìm kiếm và sắp xếp
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                // Có thể thêm bộ lọc ở đây nếu cần
            ])
            ->actions([
                // Các hành động cho từng bản ghi: xem, sửa, xóa
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Hành động hàng loạt: xóa nhiều bản ghi
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Định nghĩa các quan hệ liên kết (ví dụ: bài viết thuộc danh mục này)
    public static function getRelations(): array
    {
        return [
            RelationManagers\PostsRelationManager::class, // Quản lý các bài viết thuộc danh mục
        ];
    }

    // Định nghĩa các trang (route) cho resource này
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'), // Trang danh sách
            'create' => Pages\CreateCategory::route('/create'), // Trang tạo mới
            'edit' => Pages\EditCategory::route('/{record}/edit'), // Trang chỉnh sửa
        ];
    }
}
