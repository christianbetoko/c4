<?php

namespace App\Livewire;

use App\Models\Individual;
use App\Models\Organization;
use App\Models\Province;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Carbon\Carbon;
use Livewire\Attributes\Title;
#[Title('Rejoindre - C4')]
class JointPage extends Component
{
    use WithFileUploads;

     public $iteration = 1; // Pour réinitialiser le champ file
     // Champs pour les individus
    public $membership_type="individual";   
    public $photo;
    public $name;
    public $lastname;
    public $firstname;
    public $gender;
    public $birth_date;
    public $email;
    public $phone;
    public $province_id;
    public $country_residence;
    public $city_district;
    public $address;
    public $motivation;
    public $preferred_language;


// Champs pour les organisations
 public $logo;
 public $letter;
 public $organization_name;
 public $organization_type;
 public $organization_owner;
 public $organization_email;
 public $organization_phone;
 public $organization_province;
 public $organization_motivation;

protected $rules = [
   
    'photo' => 'nullable|image|max:4096', // Max 4MB
    'name' => 'required|max:255',
    'lastname' => 'nullable|max:255',
    'firstname' => 'required|max:255',
    'gender' => 'required|in:M,F',
    'birth_date' => 'required|date|before:-18 years',
    'email' => 'nullable|string|max:255|email|unique:individuals,email',
    'phone' => 'nullable|max:255|unique:individuals,phone',
    'province_id' => 'required',
    'country_residence' => 'nullable|max:255',
    'city_district' => 'nullable|max:255',
    'address' => 'nullable|max: 255',
    'motivation' => 'required|string|max:1000',
    'preferred_language' => 'nullable|in:fr,en,sw,ln,lu,kg'
    ];

    public function submitIndividual(){
          $validatedData = $this->validate();
if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('photos', 'public');
        }
Individual::create($validatedData);
$this->reset(['membership_type', 'photo', 'name', 'lastname', 'firstname', 'gender', 'birth_date', 'email', 'phone', 'province_id', 'country_residence', 'city_district', 'address', 'motivation', 'preferred_language']);
        $this->iteration++; 
 LivewireAlert::title("Merci d'avoir rejoint la Coalition C4")
            ->success()
            ->withOptions([
                'background' => '#E8F5E9',
                'confirmButtonColor' => '#6F00FF',
                'color' => '#2600FF',
            ])
            ->show();

    }

    public function submitOrganization(){
        // Validation et traitement pour les organisations
        // 1. Valida    tion des champs spécifiques à l'organisation
    $validatedDataOrganization = $this->validate([
        'logo' => 'nullable|image|max:4096', // Max 4MB
        'letter' => 'nullable|file|mimes:pdf,doc,docx|max:4096', // PDF/Word Max 4MB
        'organization_name' => 'required|string|max:255',
        'organization_type' => 'nullable|string|max:255',
        'organization_owner' => 'required|string|max:255',
        'organization_email' => 'nullable|email|max:255|unique:organizations,organization_email',
        'organization_phone' => 'required|max:255|unique:organizations,organization_phone',
        'organization_province' => 'nullable|string|max:255',
        'organization_motivation' => 'required|string|max:1000',
    ]);
        // Vous pouvez créer une nouvelle table pour les organisations ou utiliser une table existante
        // Assurez-vous de valider les champs spécifiques aux organisations
   
   // 2. Gestion de l'upload du Logo
    if ($this->logo) {
        $validatedDataOrganization['logo'] = $this->logo->store('logos', 'public');
    }

    // 3. Gestion de l'upload de la Lettre (ou manifeste)
    if ($this->letter) {
        $validatedDataOrganization['letter'] = $this->letter->store('letters', 'public');
    }


Organization::create($validatedDataOrganization);

    $this->reset([
        'logo', 'letter', 'organization_name', 'organization_type', 
        'organization_owner', 'organization_email', 'organization_phone', 
        'organization_province', 'organization_motivation'
    ]);

    // Forcer le rafraîchissement des inputs de type file dans la vue
    $this->iteration++; 

    // 6. Notification de succès avec LivewireAlert
    LivewireAlert::title("Merci à votre organisation d'avoir rejoint la Coalition C4")
        ->success()
        ->withOptions([
            'background' => '#E8F5E9',
            'confirmButtonColor' => '#6F00FF',
            'color' => '#2600FF',
        ])
        ->show();
   
        }




    public function render()
    {
        Carbon::setLocale('fr');
        $provinces = Province::orderBy('name', 'asc')->get();
        return view('livewire.joint-page', compact('provinces'));
    }
}
