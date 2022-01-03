<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use App\Models\PackageType;
use App\Models\Service;
use Livewire\Component;

class SiteSetting extends Component
{

    public $state = [];
    public $email = [];

    public $editedServiceIndex = null;
    public $services = [];

    public $editedPackageIndex = null;
    public $packages = [];

    public $strSecrect = null;

    protected $rules = [
        'services.*.service_name' => ['required', 'string'],
        'services.*.price' => ['required', 'numeric']
    ];

    protected $validationAttributes = [
        'services.*.service_name' => 'name',
        'services.*.price' => 'price'
    ];

    public function render()
    {

        $this->services = Service::all()->toArray();

        $this->packages = PackageType::all()->toArray();

        // $secrect = config('services.stripe.secret');
        // $this->strSecrect =  preg_replace("/(?!^).(?!$)/", "*", $secrect);


        return view('livewire.admin.site-setting', []);
    }

    public function editService($serviceIndex)
    {
        $this->editedServiceIndex = $serviceIndex;
    }
    public function editPackage($packageIndex)
    {
        $this->editedPackageIndex = $packageIndex;
    }


    public function saveService($serviceIndex)
    {

        $this->validate();

        $service = $this->services[$serviceIndex] ?? null;

        if (!is_null($service)) {


            optional(Service::find($service['id'])->update($service));
        }
        $this->resetEditMode();
    }
    public function savePackage($packageIndex)
    {

        $this->validate(
            [
                'packages.*.packageType_name' => ['required', 'string'],
                'packages.*.price' => ['required', 'numeric']
            ],
            [],
            [
                'packages.*.packageType_name' => 'name',
                'packages.*.price' => 'price'
            ]
        );

        $package = $this->packages[$packageIndex] ?? null;



        if (!is_null($package)) {

            optional(PackageType::find($package['id'])->update($package));
        }
        $this->resetEditMode();
    }

    public function resetEditMode()
    {
        $this->editedPackageIndex = null;
        $this->editedServiceIndex = null;
    }


    // public function strConfig()
    // {
    //     //     $secrect = config('services.stripe.secret');
    //     //     $t =  preg_replace("/(?!^).(?!$)/", "*", $secrect);

    //     //    // $t = config('services.stripe.secret');

    //     $this->validate([
    //         'strSecrect' => 'required|string',
    //     ], [
    //         'strSecrect.required' => 'Please Enter Stripe API Key',
    //         'strSecrect.string' => 'Please Enter a valid Stripe API Key',

    //     ]);

    //     $path = base_path('.env');

    //     $key = 'STRIPE_SECRET';
    //     $value = '5252';
    //     if (file_exists($path)) {

    //         file_put_contents($path, str_replace(
    //             $key . '=' . env($key),
    //             $key . '=' . $value,
    //             file_get_contents($path)
    //         ));
    //     }

    //     //config(['services.stripe.secret' => 'DEAD']);
    //     //config(['services.stripe.secret' => '2000']);
    //     session()->flash('message', 'Stripe Key updated Successfully!');
    // }
}
