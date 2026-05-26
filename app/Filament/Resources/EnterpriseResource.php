<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnterpriseResource\Pages;
use App\Models\Enterprise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class EnterpriseResource extends Resource
{
    protected static ?string $model = Enterprise::class;

    // Configuration des labels en Français pour l'administration de la coalition
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Configuration C4';
    protected static ?string $modelLabel = 'Info Coalition';
    protected static ?string $pluralModelLabel = 'Configuration C4';
    protected static ?string $navigationGroup = 'Paramètres Généraux';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3) // Architecture sur 3 colonnes pour optimiser l'espace
                    ->schema([
                        
                        // SECTION PRINCIPALE : CONTENU (Prend 2 colonnes sur 3)
                        Section::make('Identité et Vision de la Coalition')
                            ->description('Gérez les textes fondamentaux et la doctrine du C4.')
                            ->columnSpan(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nom de l\'organisation')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Ex: Coalition des Congolais pour le Changement de la Constitution'),

                                TextInput::make('slogan')
                                    ->label('Slogan officiel')
                                    ->maxLength(255)
                                    ->placeholder('Ex: Le peuple souverain écrit son histoire'),

                                RichEditor::make('about')
                                    ->label('À propos (Court)')
                                    ->toolbarButtons([
                                        'blockquote', 'bold', 'bulletList', 'orderedList', 'redo', 'undo'
                                    ]),

                                RichEditor::make('description')
                                    ->label('Présentation générale et Contexte')
                                    ,

                                RichEditor::make('mission')
                                    ->label('Objectifs & Missions de la Dynamique'),

                                RichEditor::make('vision')
                                    ->label('Vision à long terme'),
                            ]),

                        // SECTION LATÉRALE : LOGOS ET CONTACTS (Prend 1 colonne sur 3)
                        Grid::make(1)
                            ->columnSpan(1)
                            ->schema([
                                
                                Section::make('Identité Visuelle')
                                    ->schema([
                                        FileUpload::make('logo_with_bg')
                                            ->label('Logo (Avec fond)')
                                            ->image()
                                         
                                         
                                         ,

                                        FileUpload::make('logo_without_bg')
                                            ->label('Logo (Transparent / Sans fond)')
                                            ->image()
                                            ,
                                    ]),

                                Section::make('Coordonnées & Liens')
                                    ->schema([
                                        TextInput::make('email')
                                            ->label('E-mail officiel')
                                            ->email()
                                            ->maxLength(255),

                                        TextInput::make('phone')
                                            ->label('Téléphone de contact')
                                            ->tel()
                                            ->maxLength(255),

                                        TextInput::make('address')
                                            ->label('Adresse physique (Siège)')
                                            ->maxLength(255)
                                            ->placeholder('Ex: Croisement de l\'avenue Limete...'),

                                        TextInput::make('website')
                                            ->label('Site Web')
                                            ->url()
                                            ->maxLength(255)
                                            ->default('https://c4.cd'),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_without_bg')
                    ->label('Logo')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slogan')
                    ->label('Slogan')
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Téléphone'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dernière modification')
                    ->dateTime('d/m/Y H:i')
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
            'index' => Pages\ListEnterprises::route('/'),
            'create' => Pages\CreateEnterprise::route('/create'),
            'edit' => Pages\EditEnterprise::route('/{record}/edit'),
        ];
    }
}