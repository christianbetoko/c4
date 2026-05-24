<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResourceKit;
use Carbon\Carbon;
use Livewire\Attributes\Title;

#[Title('Boîte à Outils - C4')]
class ToolsPage extends Component
{
    // Propriété pour gérer le filtre sélectionné (all, social_media, print_material, reference_text)
    public $selectedType = 'all';

    /**
     * Gère l'incrémentation du compteur et force le téléchargement du fichier
     */
    public function downloadResource(ResourceKit $resource)
    {
        // Sécurité : Vérifie que le fichier existe bien avant de lancer l'action
        if ($resource->file_path && \Storage::disk('public')->exists($resource->file_path)) {
            
            // Incrémente le compteur en BDD
            $resource->increment('download_count');

            // Déclenche le téléchargement du fichier stocké
            return \Storage::disk('public')->download($resource->file_path, $resource->title . '.' . pathinfo($resource->file_path, PATHINFO_EXTENSION));
        }

        // Optionnel : Tu peux ajouter une alerte si le fichier est manquant sur le serveur
    }

    public function render()
    {
        Carbon::setLocale('fr');

        // Construction dynamique de la requête de filtrage
        $query = ResourceKit::orderBy('title', 'ASC')->where('is_active', true);

        if ($this->selectedType !== 'all') {
            $query->where('type', $this->selectedType);
        }

        $resources = $query->get();

        return view('livewire.tools-page', compact('resources'));
    }
}