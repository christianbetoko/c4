<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResourceKitResource\Pages;
use App\Models\ResourceKit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ResourceKitResource extends Resource
{
    protected static ?string $model = ResourceKit::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Boîte à outils (Kits)';

    protected static ?string $modelLabel = 'Kit de Ressource';

    protected static ?string $pluralModelLabel = 'Boîte à outils';

    protected static ?string $navigationGroup = 'Gestion Contenu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations Générales')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titre de la ressource')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->disabled()
                            ->dehydrated(),

                        Forms\Components\Select::make('type')
                            ->label('Catégorie de ressource')
                            ->required()
                            ->options(ResourceKit::getTypes()) // Utilise les constantes du modèle
                            ->default(ResourceKit::TYPE_SOCIAL),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Publié / Actif')
                            ->default(true)
                            ->inline(false),

                        Forms\Components\Textarea::make('description')
                            ->label('Description / Instructions d\'utilisation')
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Fichiers et Médias')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Le Fichier à télécharger (PDF, ZIP, Images, etc.)')
                            ->required()
                            ->directory('resource_kits/files')
                            ->disk('public')
                            
                            // Calcul automatique et stockage de la taille du fichier téléversé
                            ,

                       

                        Forms\Components\FileUpload::make('thumbnail_path')
                            ->label('Image d\'aperçu / Miniature (Thumbnail)')
                            ->image()
                           
                            ->disk('public')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_path')
                    ->label('Aperçu')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Catégorie')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        ResourceKit::TYPE_SOCIAL => 'Réseaux Sociaux',
                        ResourceKit::TYPE_PRINT => 'Terrain (Print)',
                        ResourceKit::TYPE_REFERENCE => 'Réf. Juridique',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        ResourceKit::TYPE_SOCIAL => 'info',
                        ResourceKit::TYPE_PRINT => 'warning',
                        ResourceKit::TYPE_REFERENCE => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('file_size')
                    ->label('Taille')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('download_count')
                    ->label('Téléchargements')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Actif')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ajouté le')
                    ->dateTime('d/m/Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Filtrer par catégorie')
                    ->options(ResourceKit::getTypes()),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Uniquement actifs'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResourceKits::route('/'),
            'create' => Pages\CreateResourceKit::route('/create'),
            'edit' => Pages\EditResourceKit::route('/{record}/edit'),
        ];
    }
}