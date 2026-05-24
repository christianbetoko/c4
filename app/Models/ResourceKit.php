<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceKit extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'type',
        'file_path',
        'thumbnail_path',
        'file_size',
        'download_count',
        'is_active',
    ];

    // Constantes pour typer proprement tes ressources dans ton code ou dans Filament
    const TYPE_SOCIAL = 'social_media';
    const TYPE_PRINT = 'print_material';
    const TYPE_REFERENCE = 'reference_text';

    public static function getTypes(): array
    {
        return [
            self::TYPE_SOCIAL => 'Réseaux Sociaux (Bannières, Statuts)',
            self::TYPE_PRINT => 'Matériel de Terrain (Affiches, Dépliants)',
            self::TYPE_REFERENCE => 'Textes de Référence (Constitutions, Manifestes)',
        ];
    }
}