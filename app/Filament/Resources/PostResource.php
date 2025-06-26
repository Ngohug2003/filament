<?php

namespace App\Filament\Resources;

// Import các class cần thiết
use App\Filament\Resources\PostResource\Pages;
use App\Forms\Components\SeoMetaFields;
use App\Models\Post;
use Filament\Forms;
use App\Forms\Components\DateTimePicker;
use Dom\Text;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

// Định nghĩa resource quản lý bài viết
class PostResource extends Resource
{
    // Liên kết model Post với resource này
    protected static ?string $model = Post::class;


    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?int $navigationSort  = 3;
    protected static ?string $recordTitleAttribute = 'title';
    // protected static ?string $navigationParentItem = 'Notifications'; // Có thể dùng để nhóm menu

    protected static ?string $navigationGroup = 'Quản Lý Bài Viết';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Grid chia layout form
                Grid::make()
                    ->columns([
                        'default' => 12,
                        'sm' => 12,
                        'md' => 12,
                        'lg' => 12,
                        'xl' => 12,
                        '2xl' => 12,
                    ])

                    ->schema([

                        Grid::make(8)->schema([

                            Section::make('Thông tin bài viết')
                                ->schema([

                                    Grid::make(2)->schema([

                                        TextInput::make('title')
                                            ->label('Tiêu đề')
                                            ->required()
                                            ->live(onBlur: true)

                                            ->afterStateUpdated(
                                                fn(string $operation, $state, Forms\Set $set) =>
                                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                            ),


                                        TextInput::make('slug')
                                            ->label('Slug')
                                            ->required()
                                            ->disabled()
                                            ->unique(Post::class, 'slug', ignoreRecord: true)
                                            ->dehydrated(),
                                    ]),


                                    RichEditor::make('content')
                                        ->label('Bài Viết')
                                        ->required()
                                        ->fileAttachmentsDirectory('posts/attachments')
                                        ->columnSpanFull()
                                        ->rules(['required', 'string'])
                                        ->validationMessages([
                                            'required' => 'Nội dung bài viết là bắt buộc.',
                                        ]),

                                ]),

                            FileUpload::make('featured_image')
                                ->image()
                                ->label('Hình ảnh')
                                ->imageEditor()
                                ->columnSpanFull()
                                ->directory('img/posts')
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg'])
                                ->imageEditorAspectRatios([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),

                            SeoMetaFields::make('seo_meta_fields_group')
                                ->label('Tối ưu SEO')
                                ->columnSpanFull(),


                            Hidden::make('seo_title'),
                            Hidden::make('seo_description'),
                            Hidden::make('seo_keywords'),
                        ])->columnSpan(8),
                        // Phần sidebar (4 cột)
                        Grid::make(1)->schema([
                            // Section: Danh mục bài viết
                            Section::make('Danh mục ')
                                ->schema([

                                    Select::make('category_id')
                                        ->relationship('category', 'name')
                                        ->preload()
                                        ->required()
                                        ->searchable()
                                        ->label('Danh mục bài viết')

                                        ->createOptionForm([
                                            Forms\Components\TextInput::make('name')
                                                ->required()
                                                ->label('Tên danh mục'),
                                        ]),

                                ]),
                            // Trường chọn nhiều thẻ (tags)
                            Select::make('tags')
                                ->multiple()
                                ->relationship('tags', 'name')
                                ->preload()
                                ->searchable()
                                ->label('Thẻ')

                                ->createOptionForm([
                                    Forms\Components\TextInput::make('name')
                                        ->required()
                                        ->label('Tên thẻ'),
                                ])
                                ->helperText('Chọn hoặc thêm mới các thẻ cho bài viết.'),

                            Section::make('Trang thái')
                                ->schema([

                                    Toggle::make('is_published')
                                        ->label('Đã xuất bản')
                                        ->helperText('Bật nếu bài viết này đã sẵn sàng để hiển thị công khai.')
                                        ->default(false),

                                    DateTimePicker::make('published_at')
                                        ->label('Thời gian lên lịch')
                                        ->options([
                                            'minDate' => 'today',           
                                            'time_24hr' => true,           
                                            'enableSeconds' => true,        
                                            'defaultHour' => 9,             
                                            'defaultMinute' => 0,         
                                        ])
                                ]),


                        ])->columnSpan(4),
                    ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('featured_image')
                    ->label('Hình ảnh')
                    ->width(100)
                    ->height(100)
                    ->extraImgAttributes(['class' => 'object-cover'])
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Danh mục')
                    ->searchable()
                    ->sortable(),

                TagsColumn::make('tags.name')
                    ->label('Thẻ')
                    ->separator(',')
                    ->searchable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('published_at')
                    ->label('Ngày xuất bản')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),

                TextColumn::make('created_at')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

                SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->preload()
                    ->searchable()
                    ->label('Danh mục bài viết'),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })

            ])
            ->actions([

                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([

                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // Định nghĩa các quan hệ liên kết (nếu có)
    public static function getRelations(): array
    {
        return [
            // Define relation managers here if needed

        ];
    }

    // Định nghĩa các trang (route) cho resource này
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
            // 'view' => Pages\ViewPost::route('/{record}'), // Trang xem chi tiết (nếu cần)
        ];
    }
}
