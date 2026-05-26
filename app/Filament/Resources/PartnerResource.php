<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    // Icône personnalisée pour le menu (Poignée de main / Partenaires)
    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';
    
    protected static ?string $navigationLabel = 'Partenaires & Alliés';
    protected static ?string $modelLabel = 'Partenaire';
    protected static ?string $pluralModelLabel = 'Partenaires';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nom du partenaire / Structure')
                            ->maxLength(255)
                            ->placeholder('Ex: Dynamique de la Société Civile, Parti XYZ...')
                            ->required(),

                        Forms\Components\TextInput::make('link')
                            ->label('Lien internet / Réseau social')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://...'),

                        Forms\Components\FileUpload::make('image')
                            ->label('Logo du partenaire')
                            ->image()
                             // Stocké dans storage/app/public/partners
                            ->imageEditor() // Permet de recadrer le logo directement
                            ->maxSize(2048), // Max 2Mo

                        Forms\Components\Toggle::make('status')
                            ->label('Afficher sur le site')
                            ->default(true)
                            ->required(),
                    ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Logo')
                    ->circular(), // Rend le logo rond dans le tableau

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom de la Structure')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('link')
                    ->label('Lien')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('status')
                    ->label('Actif')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date d\'adhésion')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Visibilité'),
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}