<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndividualResource\Pages;
use App\Models\Individual;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class IndividualResource extends Resource
{
    protected static ?string $model = Individual::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $modelLabel = 'Adhérent Citoyen';
    protected static ?string $pluralModelLabel = 'Adhérents Citoyens';
    protected static ?string $navigationGroup = 'Gestion C4';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        // Colonne de gauche : Photo et informations principales
                        Section::make('Identité & Profil')
                            ->columnSpan(2)
                            ->schema([
                                Forms\Components\FileUpload::make('photo')
                                    ->image()
                                   
                                    ->avatar()
                                    ->imageEditor()
                                    ->circleCropper()
                                    ->maxSize(4096)
                                    ->columnSpanFull(),

                                Grid::make(3)->schema([
                                    Forms\Components\TextInput::make('name')
                                        ->label('Nom')
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('lastname')
                                        ->label('Postnom')
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('firstname')
                                        ->label('Prénom')
                                        ->maxLength(255),
                                ]),

                                Grid::make(2)->schema([
                                    Forms\Components\Select::make('gender')
                                        ->label('Genre')
                                        ->options([
                                            'M' => 'Masculin',
                                            'F' => 'Féminin',
                                        ]),
                                    Forms\Components\DatePicker::make('birth_date')
                                        ->label('Date de naissance')
                                        ->native(false),
                                ]),
                            ]),

                        // Colonne de droite : Paramètres, Contact & Origine
                        Section::make()
                            ->columnSpan(1)
                            ->schema([
                                Section::make('Statut & Langue')
                                    ->schema([
                                        Forms\Components\Toggle::make('is_testimonial')
                                            ->label('Afficher comme témoignage')
                                            ->helperText('Activer pour afficher sur la page d\'accueil')
                                            ->onColor('success')
                                            ->offColor('danger'),

                                        Forms\Components\Select::make('preferred_language')
                                            ->label('Zone linguistique / Langue')
                                            ->options([
                                                'Lingala' => 'Lingala',
                                                'Swahili' => 'Swahili',
                                                'Kikongo' => 'Kikongo',
                                                'Tshiluba' => 'Tshiluba',
                                                'Français' => 'Français',
                                            ]),
                                    ]),

                                Section::make('Coordonnées de Contact')
                                    ->schema([
                                        Forms\Components\TextInput::make('email')
                                            ->label('Adresse Email')
                                            ->email()
                                            ->maxLength(191)
                                            ->unique(ignoreRecord: true),
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Téléphone')
                                            ->tel()
                                            ->maxLength(191)
                                            ->unique(ignoreRecord: true),
                                    ]),
                            ]),
                    ]),

                // Section du bas : Géographie & Motivation
                Section::make('Localisation & Engagement')
                    ->schema([
                        Grid::make(3)->schema([
                            Forms\Components\Select::make('province_id')
                                ->label('Province d\'Origine / Attachement')
                                ->relationship('province', 'name') // Assure-toi d'avoir la relation "province" dans ton modèle Individual
                                ->searchable()
                                ->preload()
                                ->required(),
                            Forms\Components\TextInput::make('country_residence')
                                ->label('Pays de résidence')
                                ->default('République Démocratique du Congo')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('city_district')
                                ->label('Ville / District / Territoire')
                                ->maxLength(255),
                        ]),

                        Forms\Components\TextInput::make('address')
                            ->label('Adresse physique complète')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('motivation')
                            ->label('Motivation de l\'adhésion')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Photo')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom Complet')
                    ->searchable(['name', 'lastname', 'firstname'])
                    ->formatStateUsing(fn ($record) => "{$record->name} {$record->lastname} {$record->firstname}"),

                Tables\Columns\TextColumn::make('gender')
                    ->label('Genre')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'M' => 'info',
                        'F' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Téléphone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('province.name')
                    ->label('Province')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('preferred_language')
                    ->label('Espace Linguistique')
                    ->badge()
                    ->color('warning'),

                Tables\Columns\IconColumn::make('is_testimonial')
                    ->label('Témoignage')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date d\'Adhésion')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('province_id')
                    ->label('Filtrer par Province')
                    ->relationship('province', 'name'),

                Tables\Filters\SelectFilter::make('preferred_language')
                    ->label('Filtrer par Langue')
                    ->options([
                        'Lingala' => 'Lingala',
                        'Swahili' => 'Swahili',
                        'Kikongo' => 'Kikongo',
                        'Tshiluba' => 'Tshiluba',
                        'Français' => 'Français',
                    ]),

                Tables\Filters\Filter::make('is_testimonial')
                    ->label('Uniquement les témoignages')
                    ->query(fn ($query) => $query->where('is_testimonial', true)),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndividuals::route('/'),
            'create' => Pages\CreateIndividual::route('/create'),
            'edit' => Pages\EditIndividual::route('/{record}/edit'),
        ];
    }
}