<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\SMSApi;
use Livewire\Component;
use App\Models\LocationCode;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DashboardComponent extends Component
{
    use WithPagination;

    /**
     * Filter by table variable declaration
     */
    public $startDate;
    public $endDate;
    /**
     * brand filter
     */
    public $selectedFilter = '';
    public $brandFilters = [];
    /**
     * Outlet filter variable
     */
    public $selectedOutlet = '';
    public $outletFilters = [];

    public function resetDateFilter()
    {
        $this->startDate = null;
        $this->endDate = null;
        $this->selectedFilter = null;
        $this->selectedOutlet = null;
    }

    public function fetchBrandFilters()
    {
        // todo: change to another model (Brand) or
        // $this->brandFilters = SMSAPI::select('idbrand')->distinct()->pluck('brand');
        
        // todo: hard coded list
        $this->brandFilters = [
            [
                'id' => '1',
                'name' => 'Skechers',
                'value' => 'Skechers'
            ],
            [
                'id' => '2',
                'name' => 'Saucony',
                'value' => 'Saucony'
            ],
            [
                'id' => '3',
                'name' => 'Merrell',
                'value' => 'Merrell',
            ],
            [
                 'id' =>'4',
                 'name' => 'Mario Dboro',
                 'value' => 'Mario Dboro'
            ],
            [
                 'id' => '5',
                 'name' => 'Florsheim',
                 'value' => 'Florsheim'
            ]
        ];
    }

    public function fetchOutletFilters()
    {
        // todo: change to another model (Brand) or
        // $this->brandFilters = SMSAPI::select('idbrand')->distinct()->pluck('brand');
        
        // todo: hard coded list
        $this->outletFilters = [
          [
              'id' => '1',
              'name' => '15-0006 - SM Megamall',
              'value' => '15-0006 - SM Megamall'
          ],
          [
              'id' => '2',
              'name' => '15-0007 - SM Southmall',
              'value' => '15-0007 - SM Southmall'
          ],
          [
              'id' => '3',
              'name' => '15-0008 - SM Sta. Mesa',
              'value' => '15-0008 - SM Sta. Mesa',
          ],
          [
               'id' =>'4',
               'name' => '15-0011 - SM Cubao',
               'value' => '15-0011 - SM Cubao'
          ],
          [
               'id' =>'196',
               'name' => '15-0027 - SM Bacoor',
               'value' => '15-0027 - SM Bacoor'
          ],

          [
               'id' => '5',
               'name' => '15-0012 - SM Harrison',
               'value' => '15-0012 - SM Harrison'
          ],
          [
              'id' => '6',
              'name' => '15-0013 - SM Makati',
              'value' => '15-0013 - SM Makati'
          ],
          [
              'id' => '7',
              'name' => '15-0014 - SM North Edsa',
              'value' => '15-0014 - SM North Edsa'
          ],
          [
              'id' => '8',
              'name' => ' 15-0017 - SM Cebu',
              'value' => ' 15-0017 - SM Cebu',
          ],
          [
               'id' =>'9',
               'name' => '15-0022 - SM Quiapo',
               'value' => '15-0022 - SM Quiapo'
          ],
          [
               'id' => '10',
               'name' => '15-0012 - SM Harrison',
               'value' => '15-0012 - SM Harrison'
          ],
          [
              'id' => '11',
              'name' => ' 15-0030 - SM Fairview',
              'value' => ' 15-0030 - SM Fairview'
          ],
          [
              'id' => '12',
              'name' => '15-0071 - SM Iloilo',
              'value' => '15-0071 - SM Iloilo'
          ],
          [
              'id' => '13',
              'name' => '15-0079 - SM City Manila',
              'value' => '15-0079 - SM City Manila',
          ],
          [
               'id' =>'14',
               'name' => '15-0096 - SM Davao',
               'value' => '15-0096 - SM Davao'
          ],
          [
               'id' => '15',
               'name' => ' 15-0108 - SM Cagayan De Oro',
               'value' => ' 15-0108 - SM Cagayan De Oro'
          ],
          [
              'id' => '16',
              'name' => '15-0109 - SM Bicutan',
              'value' => '15-0109 - SM Bicutan'
          ],
          [
              'id' => '17',
              'name' => '15-0140 - SM Lucena',
              'value' => '15-0140 - SM Lucena'
          ],
          [
              'id' => '18',
              'name' => '15-0146 - SM Baguio',
              'value' => '15-0146 - SM Baguio',
          ],
          [
               'id' =>'19',
               'name' => '15-0147 - SM Marilao',
               'value' => '15-0147 - SM Marilao'
          ],
          [
               'id' => '20',
               'name' => ' 15-0184 - SM Batangas',
               'value' => ' 15-0184 - SM Batangas'
          ],
          [
              'id' => '21',
              'name' => '15-0197 - SM San Lazaro',
              'value' => '15-0197 - SM San Lazaro'
          ],
          [
              'id' => '22',
              'name' => '15-0199 - SM Sucat',
              'value' => '15-0199 - SM Sucat'
          ],
          [
              'id' => '23',
              'name' => '15-0205 - SM Mall of Asia',
              'value' => '15-0205 - SM Mall of Asia',
          ],
          [
               'id' =>'24',
               'name' => '15-0206 - SM Sta. Rosa',
               'value' => '15-0206 - SM Sta. Rosa'
          ],
          [
               'id' => '25',
               'name' => '15-0208 - SM Clark',
               'value' => '15-0208 - SM Clark'
          ],
          [
              'id' => '26',
              'name' => '15-0238 - SM Lipa',
              'value' => '15-0238 - SM Lipa'
          ],
          [
              'id' => '27',
              'name' => '15-0257 - SM Bacolod',
              'value' => '15-0257 - SM Bacolod'
          ],
          [
              'id' => '28',
              'name' => '15-0290 - SM Taytay',
              'value' => '15-0290 - SM Taytay',
          ],
          [
               'id' =>'29',
               'name' => ' 15-0324 - SM Marikina',
               'value' => ' 15-0324 - SM Marikina'
          ],
          [
               'id' => '30',
               'name' => '15-0326 - SM BALIWAG',
               'value' => '15-0326 - SM BALIWAG'
          ],
          [
              'id' => '31',
              'name' => '15-0331 - SM NAGA',
              'value' => '15-0331 - SM NAGA'
          ],
          [
              'id' => '32',
              'name' => '15-0335 - SM ROSALES',
              'value' => '15-0335 - SM ROSALES'
          ],
          [
              'id' => '33',
              'name' => '15-0375 - SM Tarlac',
              'value' => '15-0375 - SM Tarlac',
          ],
          [
               'id' =>'34',
               'name' => '15-0384 - SM Calamba',
               'value' => '15-0384 - SM Calamba'
          ],
          [
               'id' => '35',
               'name' => ' 15-0385 - SM San Pablo',
               'value' => ' 15-0385 - SM San Pablo'
          ],
          [
              'id' => '36',
              'name' => '15-0386 - SM Novaliches',
              'value' => '15-0386 - SM Novaliches'
          ],
          [
              'id' => '37',
              'name' => '15-0392 - SM Masinag',
              'value' => '15-0392 - SM Masinag'
          ],
          [
              'id' => '38',
              'name' => '15-0397 - SM San Fernando',
              'value' => '15-0397 - SM San Fernando',
          ],
          [
               'id' =>'39',
               'name' => '15-0398 - SM Olongapo',
               'value' => '15-0398 - SM Olongapo'
          ],
          [
               'id' => '40',
               'name' => '15-0413 - SM Consolacion',
               'value' => '15-0413 - SM Consolacion'
          ],
          [
              'id' => '41',
              'name' => '15-0414 - SM Gensan',
              'value' => '15-0414 - SM Gensan'
          ],
          [
              'id' => '42',
              'name' => '15-0424 - SM Lanang',
              'value' => '15-0424 - SM Lanang'
          ],
          [
              'id' => '43',
              'name' => '15-0440 - SM Aura Premier',
              'value' => '15-0440 - SM Aura Premier',
          ],
          [
               'id' =>'44',
               'name' => '15-0446 - SM BF Parañaque',
               'value' => '15-0446 - SM BF Parañaque'
          ],
          [
               'id' => '45',
               'name' => '15-0453 - SM Cauayan',
               'value' => '15-0453 - SM Cauayan'
          ],
          [
              'id' => '46',
              'name' => '15-0484 - SM San Mateo',
              'value' => '15-0484 - SM San Mateo'
          ],
          [
              'id' => '47',
              'name' => ' 15-0493 - SM Cabanatuan',
              'value' => ' 15-0493 - SM Cabanatuan'
          ],
          [
              'id' => '48',
              'name' => ' 15-0494 - SM Seaside Cebu',
              'value' => ' 15-0494 - SM Seaside Cebu',
          ],
          [
               'id' =>'49',
               'name' => '15-0518 - SM San Jose Del Monte',
               'value' => '15-0518 - SM San Jose Del Monte'
          ],
          [
               'id' => '50',
               'name' => '15-0519 - SM Trece Martires',
               'value' => '15-0519 - SM Trece Martires'
          ],
          [
              'id' => '51',
              'name' => '15-0537 - SM Molino',
              'value' => '15-0537 - SM Molino'
          ],
          [
              'id' => '52',
              'name' => '15-0538 - SM Store East Ortigas',
              'value' => '15-0538 - SM Store East Ortigas'
          ],
          [
              'id' => '53',
              'name' => '15-0572 - SM Puerto Princesa',
              'value' => '15-0572 - SM Puerto Princesa',
          ],
          [
               'id' =>'54',
               'name' => '15-0581 - SM Cubao E-Store',
               'value' => '15-0581 - SM Cubao E-Store'
          ],
          [
               'id' => '55',
               'name' => '15-0595 - SM Urdaneta',
               'value' => '15-0595 - SM Urdaneta'
          ],
          [
              'id' => '56',
              'name' => '15-0598 - SM City Telabastagan',
              'value' => '15-0598 - SM City Telabastagan'
          ],
          [
              'id' => '57',
              'name' => '15-0620 - SM Valenzuela',
              'value' => '15-0620 - SM Valenzuela'
          ],
          [
              'id' => '58',
              'name' => '15-0628 - SM Makati - Outdoors',
              'value' => '15-0628 - SM Makati - Outdoors',
          ],
          [
               'id' =>'59',
               'name' => '15-0640 - SM City Olongapo Central',
               'value' => '15-0640 - SM City Olongapo Central'
          ],
          [
               'id' => '60',
               'name' => '15-0643 - SM Estancia',
               'value' => '15-0643 - SM Estancia'
          ],
          [
              'id' => '61',
              'name' => '15-0660 - SM Butuan',
              'value' => '15-0660 - SM Butuan',
          ],
          [
               'id' =>'62',
               'name' => '15-0661 - SM Mindpro Zamboanga',
               'value' => '15-0661 - SM Mindpro Zamboanga'
          ],
          [
               'id' => '63',
               'name' => '15-0740 - SM Grand Central',
               'value' => '15-0740 - SM Grand Central'
          ],
          [
              'id' => '64',
              'name' => '15-0010 - Robinsons Galleria',
              'value' => '15-0010 - Robinsons Galleria',
          ],
          [
               'id' =>'65',
               'name' => '15-0023 - Robinsons Ermita',
               'value' => '15-0023 - Robinsons Ermita'
          ],
          [
               'id' => '66',
               'name' => '15-0051 - Robinsons Metropolis',
               'value' => '15-0051 - Robinsons Metropolis'
          ],
          [
               'id' =>'67',
               'name' => '15-0065 - Robinsons Imus',
               'value' => '15-0065 - Robinsons Imus'
          ],
          [
               'id' => '68',
               'name' => '15-0081 - Robinsons Cebu',
               'value' => '15-0081 - Robinsons Cebu'
          ],
          [
              'id' => '69',
              'name' => '15-0091 - Robinsons Metro East',
              'value' => '15-0091 - Robinsons Metro East',
          ],
          [
               'id' =>'70',
               'name' => '15-0098 - Robinsons Pampanga',
               'value' => '15-0098 - Robinsons Pampanga'
          ],
          [
               'id' => '71',
               'name' => '15-0130 - Robinsons Bacolods',
               'value' => '15-0130 - Robinsons Bacolods'
          ],
          [
               'id' =>'72',
               'name' => '15-0134 - Robinsons Dasmarinas',
               'value' => '15-0134 - Robinsons Dasmarinas'
          ],
          [
               'id' => '73',
               'name' => '15-0141 - Robinsons Lipa',
               'value' => '15-0141 - Robinsons Lipa'
          ],
          [
               'id' =>'74',
               'name' => '15-0149 - Robinsons Ermita - SE',
               'value' => '15-0149 - Robinsons Ermita - SE'
          ],
          [
               'id' => '75',
               'name' => '15-0151 - Robinsons Bulacan',
               'value' => '15-0151 - Robinsons Bulacan'
          ],
          [
               'id' =>'76',
               'name' => '15-0176 - Robinsons Angeles - SE',
               'value' => '15-0176 - Robinsons Angeles - SE'
          ],
          [
               'id' => '77',
               'name' => '15-0178 - Robinsons Place - Bacolod 2',
               'value' => '15-0178 - Robinsons Place - Bacolod 2'
          ],
          [
               'id' =>'78',
               'name' => '15-0216 - Robinsons Dagupan',
               'value' => '15-0216 - Robinsons Dagupan'
          ],
          [
               'id' => '79',
               'name' => '15-0223 - Robinsons Cagayan',
               'value' => '15-0223 - Robinsons Cagayan'
          ],
          [
               'id' => '80',
               'name' => '15-0327 - Robinsons Cabanatuan',
               'value' => '15-0327 - Robinsons Cabanatuan'
          ],
          [
               'id' =>'81',
               'name' => '15-0357 - Robinsons Dumaguete',
               'value' => '15-0357 - Robinsons Dumaguete'
          ],
          [
               'id' => '82',
               'name' => '15-0361 - Robinsons Laoag',
               'value' => '15-0361 - Robinsons Laoag'
          ],
          [
               'id' =>'83',
               'name' => '15-0412 - Robinsons Calasiao',
               'value' => '15-0412 - Robinsons Calasiao'
          ],
          [
               'id' => '84',
               'name' => '15-0416 - Robinsons Puerto Princesa',
               'value' => '15-0416 - Robinsons Puerto Princesa'
          ],
          [
               'id' => '85',
               'name' => '15-0427 - Robinsons Magnolia',
               'value' => '15-0427 - Robinsons Magnolia'
          ],
          [
               'id' =>'86',
               'name' => ' 15-0447 - Robinsons Butuan',
               'value' => ' 15-0447 - Robinsons Butuan'
          ],
          [
               'id' => '87',
               'name' => '15-0448 - Robinsons Roxas',
               'value' => '15-0448 - Robinsons Roxas'
          ],
          [
               'id' => '88',
               'name' => '15-0449 - Robinsons Malolos',
               'value' => '15-0449 - Robinsons Malolos'
          ],
          [
               'id' =>'89',
               'name' => '15-0450 - Robinsons Santiago',
               'value' => '15-0450 - Robinsons Santiago'
          ],
          [
               'id' => '90',
               'name' => '15-0506 - Robinsons Galleria Cebu',
               'value' => '15-0506 - Robinsons Galleria Cebu'
          ],
          [
               'id' => '91',
               'name' => '15-0523 - Robinsons Tagum',
               'value' => '15-0523 - Robinsons Tagum'
          ],
          [
               'id' => '92',
               'name' => '15-0524 - Robinsons General Trias',
               'value' => '15-0524 - Robinsons General Trias'
          ],
          [
               'id' => '93',
               'name' => '15-0540 - Robinsons Jaro Iloilo',
               'value' => '15-0540 - Robinsons Jaro Iloilo'
          ],
          [
               'id' =>'94',
               'name' => '15-0555 - Robinsons Southpark',
               'value' => '15-0555 - Robinsons Southpark'
          ],
          [
               'id' => '95',
               'name' => '15-0569 - Robinsons Iligan',
               'value' => '15-0569 - Robinsons Iligan'
          ],
          [
               'id' => '96',
               'name' => '15-0576 - Robinsons Naga',
               'value' => '15-0576 - Robinsons Naga'
          ],
          [
               'id' => '97',
               'name' => '15-0587 - Robinsons Cloverleaf',
               'value' => '15-0587 - Robinsons Cloverleaf'
          ],
          [
               'id' => '98',
               'name' => '15-0589 - Robinsons Cotabato',
               'value' => '15-0589 - Robinsons Cotabato'
          ],
          [
               'id' => '99',
               'name' => '15-0593 - Robinsons North Tacloban',
               'value' => '15-0593 - Robinsons North Tacloban'
          ],
          [
               'id' => '100',
               'name' => '15-0596 - Robinsons Ormoc',
               'value' => '15-0596 - Robinsons Ormoc'
          ],
          [
               'id' => '101',
               'name' => '15-0612 - Robinsons Tuguegarao',
               'value' => '15-0612 - Robinsons Tuguegarao'
          ],
          [
               'id' => '102',
               'name' => '15-0625 - Robinsons Valencia',
               'value' => '15-0625 - Robinsons Valencia'
          ],
          [
               'id' => '103',
               'name' => '15-0026 - Olympic Village Isetann',
               'value' => '15-0026 - Olympic Village Isetann'
          ],
          [
               'id' => '104',
               'name' => '15-0029 - Olympic Village Sta Lucia',
               'value' => '15-0029 - Olympic Village Sta Lucia'
          ],
          [
               'id' => '105',
               'name' => ' 15-0033 - Olympic Village Star EDSA',
               'value' => ' 15-0033 - Olympic Village Star EDSA'
          ],
          [
               'id' => '106',
               'name' => '15-0035 - Olympic Village Megamall',
               'value' => '15-0035 - Olympic Village Megamall'
          ],
          [
               'id' => '107',
               'name' => '15-0036 - Olympic Village North EDSA',
               'value' => '15-0036 - Olympic Village North EDSA'
          ],
          [
               'id' => '108',
               'name' => ' 15-0068 - Olympic Village Imus',
               'value' => ' 15-0068 - Olympic Village Imus'
          ],
          [
               'id' => '109',
               'name' => '15-0069 - Olympic Village Cebu',
               'value' => '15-0069 - Olympic Village Cebu'
          ],
          [
               'id' => '110',
               'name' => '15-0106 - Olympic Village Pampanga',
               'value' => '15-0106 - Olympic Village Pampanga'
          ],
          [
               'id' => '111',
               'name' => '15-0137 - Olympic Village Dasmarinas',
               'value' => '15-0137 - Olympic Village Dasmarinas'
          ],
          [
               'id' => '112',
               'name' => '15-0138 - Olympic Village Sta Rosa',
               'value' => '15-0138 - Olympic Village Sta Rosa'
          ],
          [
               'id' => '113',
               'name' => '15-0177 - Olympic Village Market Market',
               'value' => '15-0177 - Olympic Village Market Market'
          ],
          [
               'id' => '114',
               'name' => '15-0212 - Olympic Village Southmall',
               'value' => '15-0212 - Olympic Village Southmall'
          ],
          [
               'id' => '115',
               'name' => '15-0226 - Olympic Village Gateway',
               'value' => '15-0226 - Olympic Village Gateway'
          ],
          [
               'id' => '116',
               'name' => '15-0249 - Olympic Village Pioneer',
               'value' => '15-0249 - Olympic Village Pioneer'
          ],
          [
               'id' => '117',
               'name' => ' 15-0266 - Olympic Village Trinoma',
               'value' => ' 15-0266 - Olympic Village Trinoma'
          ],
          [
               'id' => '118',
               'name' => '15-0444 - Olympic Village Lipa',
               'value' => '15-0444 - Olympic Village Lipa'
          ],
          [
               'id' => '119',
               'name' => '15-0482 - Olympic Village Glorietta 2',
               'value' => '15-0482 - Olympic Village Glorietta 2'
          ],
          [
               'id' => '120',
               'name' => '15-0487 - Olympic Village Fisher Mall',
               'value' => '15-0487 - Olympic Village Fisher Mall'
          ],
          [
               'id' => '121',
               'name' => '15-0528 - Olympic Village Farmers',
               'value' => '15-0528 - Olympic Village Farmers'
          ],
          [
               'id' => '122',
               'name' => '15-0553 - Olympic Village Antipolo',
               'value' => '15-0553 - Olympic Village Antipolo'
          ],
          [
               'id' => '123',
               'name' => '15-0632 - Olympic Village RDS Las Piñas',
               'value' => '15-0632 - Olympic Village RDS Las Piñas'
          ],
          [
               'id' => '124',
               'name' => '15-0641 - Olympic Village Galleria South',
               'value' => '15-0641 - Olympic Village Galleria South'
          ],
          [
               'id' => '125',
               'name' => '15-0092 - Planet Sports -Mamplasan',
               'value' => '15-0092 - Planet Sports -Mamplasan'
          ],
          [
               'id' => '126',
               'name' => '15-0135 - Planet Sports -Glorietta',
               'value' => '15-0135 - Planet Sports -Glorietta'
          ],
          [
               'id' => '127',
               'name' => '15-0143 - Planet Sports -Pasig',
               'value' => '15-0143 - Planet Sports -Pasig'
          ],
          [
               'id' => '128',
               'name' => '15-0264 - Planet Sports -Greenhills',
               'value' => '15-0264 - Planet Sports -Greenhills'
          ],
          [
               'id' => '129',
               'name' => '15-0292 - Planet Sports -Alabang',
               'value' => '15-0292 - Planet Sports -Alabang'
          ],
          [
               'id' => '130',
               'name' => '15-0358 - Planet Sports -Trinoma',
               'value' => '15-0358 - Planet Sports -Trinoma'
          ],
          [
               'id' => '131',
               'name' => '15-0381 - Planet Sports - Cebu',
               'value' => '15-0135 - Planet Sports -Glorietta'
          ],
          [
               'id' => '132',
               'name' => '15-0417 - Planet Sports -Subic',
               'value' => '15-0417 - Planet Sports -Subic'
          ],
          [
               'id' => '133',
               'name' => '15-0430 - Planet Sports -SW Munoz',
               'value' => '15-0430 - Planet Sports -SW Munoz'
          ],
          [
               'id' => '134',
               'name' => '15-0431 - Planet Sports -SW Libis',
               'value' => '15-0431 - Planet Sports -SW Libis'
          ],
          [
               'id' => '135',
               'name' => '15-0550 - Planet Sports -SW Market',
               'value' => '15-0550 - Planet Sports -SW Market'
          ],
          [
               'id' => '136',
               'name' => '15-0132 - Tobys -Rustans Shangrila',
               'value' => '15-0132 - Tobys -Rustans Shangrila'
          ],
          [
               'id' => '137',
               'name' => '15-0383 - Tobys -North Edsa',
               'value' => '15-0383 - Tobys -North Edsa'
          ],
          [
               'id' => '138',
               'name' => '15-0195 - Tobys -Megamall',
               'value' => '15-0195 - Tobys -Megamall'
          ],
          [
               'id' => '139',
               'name' => '15-0193 - Tobys -The Podium',
               'value' => '15-0193 - Tobys -The Podium'
          ],
          [
               'id' => '140',
               'name' => '15-0389 - Tobys Arena -Glorietta',
               'value' => '15-0389 - Tobys Arena -Glorietta'
          ],
          [
               'id' => '141',
               'name' => '15-0222 - Tobys -Manila',
               'value' => '15-0222 - Tobys -Manila'
          ],
          [
               'id' => '142',
               'name' => '15-0113 - Tobys -Robinsons Galleria',
               'value' => '15-0113 - Tobys -Robinsons Galleria'
          ],
          [
               'id' => '143',
               'name' => '15-0325 - Tobys -Bacoor',
               'value' => '15-0325 - Tobys -Bacoor'
          ],
          [
               'id' => '144',
               'name' => '15-0104 - Tobys -Fairview',
               'value' => '15-0104 - Tobys -Fairview'
          ],
          [
               'id' => '145',
               'name' => '15-0103 - Tobys -Cebu',
               'value' => '15-0103 - Tobys -Cebu'
          ],
          [
               'id' => '146',
               'name' => '15-0196 - Tobys -Pampanga',
               'value' => '15-0196 - Tobys -Pampanga'
          ],
          [
               'id' => '147',
               'name' => '15-0131 - Tobys-Valenzuela',
               'value' => '15-0131 - Tobys-Valenzuela'
          ],
          [
               'id' => '148',
               'name' => '15-0363 - Tobys -Sta. Rosa',
               'value' => '15-0363 - Tobys -Sta. Rosa'
          ],
          [
               'id' => '149',
               'name' => '15-0102 - Tobys -Mall Of Asia',
               'value' => '15-0102 - Tobys -Mall Of Asia'
          ],
          [
               'id' => '150',
               'name' => '15-0315 - Tobys -The Block',
               'value' => '15-0315 - Tobys -The Block'
          ],
          [
               'id' => '151',
               'name' => '15-0215 - Tobys -Trinoma',
               'value' => '15-0215 - Tobys -Trinoma'
          ],
          [
               'id' => '152',
               'name' => '15-0301 - Tobys -Taytay',
               'value' => '15-0301 - Tobys -Taytay'
          ],
          [
               'id' => '153',
               'name' => '15-0251 - Tobys -SM Cebu - NORTHWING',
               'value' => '15-0251 - Tobys -SM Cebu - NORTHWING'
          ],
          [
               'id' => '154',
               'name' => '15-0105 - Tobys -Marikina',
               'value' => '15-0105 - Tobys -Marikina'
          ],
          [
               'id' => '155',
               'name' => '15-0268 - Tobys -Rosario',
               'value' => '15-0268 - Tobys -Rosario'
          ],
          [
               'id' => '156',
               'name' => '15-0200 - Tobys ATC',
               'value' => '15-0200 - Tobys ATC'
          ],
          [
               'id' => '157',
               'name' => ' 15-0395 - Tobys -Cagayan',
               'value' => ' 15-0395 - Tobys -Cagayan'
          ],
          [
               'id' => '158',
               'name' => '15-0112 - Tobys -Festival',
               'value' => '15-0112 - Tobys -Festival'
          ],
          [
               'id' => '159',
               'name' => '15-0365 - Tobys Abreeza -Davao',
               'value' => '15-0365 - Tobys Abreeza -Davao'
          ],
          [
               'id' => '160',
               'name' => '15-0155 - Royal Sporting House - Ermita',
               'value' => '15-0155 - Royal Sporting House - Ermita'
          ],
          [
               'id' => '161',
               'name' => '15-0099 - Royal Sporting House -Festival',
               'value' => '15-0099 - Royal Sporting House -Festival'
          ],
          [
               'id' => '162',
               'name' => '15-0142 - Royal Sporting House-Galleria',
               'value' => '15-0142 - Royal Sporting House-Galleria'
          ],
          [
               'id' => '163',
               'name' => '15-0129 - Royal Sporting House - Lipa',
               'value' => '15-0129 - Royal Sporting House - Lipa'
          ],
          [
               'id' => '164',
               'name' => '15-0139 - Royal Sporting House - Cebu',
               'value' => '15-0139 - Royal Sporting House - Cebu'
          ],
          [
               'id' => '165',
               'name' => '15-0591 - RSH - Megatrade Hall',
               'value' => '15-0591 - RSH - Megatrade Hall'
          ],
          [
               'id' => '166',
               'name' => '15-0340 - RSH - Starmill RDS Pampanga',
               'value' => '15-0340 - RSH - Starmill RDS Pampanga'
          ],
          [
               'id' => '167',
               'name' => '15-0535 - RSH - UP Town Center',
               'value' => '15-0535 - RSH - UP Town Center'
          ],
          [
               'id' => '168',
               'name' => '15-0556 - RSH - Valenzuela',
               'value' => '15-0556 - RSH - Valenzuela'
          ],
          [
               'id' => '169',
               'name' => '15-0544 - RSH  - Recto',
               'value' => '15-0544 - RSH  - Recto'
          ],
          [
               'id' => '170',
               'name' => '15-0252 - Gaisano - Metro - Lucena',
               'value' => '15-0252 - Gaisano - Metro - Lucena'
          ],
          [
               'id' => '171',
               'name' => '15-0224 - Gaisano - Tacloban',
               'value' => '15-0224 - Gaisano - Tacloban'
          ],
          [
               'id' => '172',
               'name' => '15-0283 - Gaisano - General - Lobby Sale',
               'value' => '15-0283 - Gaisano - General - Lobby Sale'
          ],
          [
               'id' => '173',
               'name' => '15-0253 - Gaisano - Roxas',
               'value' => '15-0253 - Gaisano - Roxas'
          ],
          [
               'id' => '174',
               'name' => '15-0133 - Gaisano - Gatuslao Bacolod',
               'value' => '15-0133 - Gaisano - Gatuslao Bacolod'
          ],
          [
               'id' => '175',
               'name' => '15-0227 - Gaisano - Mactan',
               'value' => '15-0227 - Gaisano - Mactan'
          ],
          [
               'id' => '176',
               'name' => '15-0254 - Gaisano - South',
               'value' => '15-0254 - Gaisano - South'
          ],
          [
               'id' => '177',
               'name' => '15-0185 - Gaisano - Iloilo CON',
               'value' => '15-0185 - Gaisano - Iloilo CON'
          ],
          [
               'id' => '178',
               'name' => ' 15-0380 - Gaisano Grand - Tagum',
               'value' => ' 15-0380 - Gaisano Grand - Tagum'
          ],
          [
               'id' => '179',
               'name' => '15-0610 - Gaisano Grand - Mactan',
               'value' => '15-0610 - Gaisano Grand - Mactan'
          ],
          [
               'id' => '180',
               'name' => '15-0359 - Gaisano Grand Mactan',
               'value' => '15-0359 - Gaisano Grand Mactan'
          ],
          [
               'id' => '181',
               'name' => '15-0152 - Sports Central - Baguio',
               'value' => '15-0152 - Sports Central - Baguio'
          ],
          [
               'id' => '182',
               'name' => '15-0183 - Sports Central - Sta Mesa',
               'value' => '15-0183 - Sports Central - Sta Mesa'
          ],
          [
               'id' => '183',
               'name' => '15-0534 - Sports Central - Batangas',
               'value' => '15-0534 - Sports Central - Batangas'
          ],
          [
               'id' => '184',
               'name' => '15-0188 - Sports Central - Dasmarinas',
               'value' => '15-0188 - Sports Central - Dasmarinas'
          ],
          [
               'id' => '185',
               'name' => '15-0189 - Sports Central - Fairview',
               'value' => '15-0189 - Sports Central - Fairview'
          ],
          [
               'id' => '186',
               'name' => '15-0240 - Sports Central - Pampanga',
               'value' => '15-0240 - Sports Central - Pampanga'
          ],
          [
               'id' => '187',
               'name' => '15-0241 - Sports Central - Mall Of Asia',
               'value' => '15-0241 - Sports Central - Mall Of Asia'
          ],
          [
               'id' => '188',
               'name' => '15-0190 - Sports Central - North Edsa',
               'value' => '15-0190 - Sports Central - North Edsa'
          ],
          [
               'id' => '189',
               'name' => '15-0573 - Sports Central-SM Seaside Cebu',
               'value' => '15-0573 - Sports Central-SM Seaside Cebu'
          ],
          [
               'id' => '190',
               'name' => '15-0634 - Sports Central - Cauayan',
               'value' => '15-0634 - Sports Central - Cauayan'
          ],
          [
               'id' => '191',
               'name' => '15-0156 - Sports Central - SM Lanang',
               'value' => '15-0156 - Sports Central - SM Lanang'
          ],
          [
               'id' => '192',
               'name' => '15-0586 - Sports Central-Puerto Princesa',
               'value' => '15-0586 - Sports Central-Puerto Princesa'
          ],
          [
               'id' => '193',
               'name' => '15-0626 - Sports Central-SM Makati',
               'value' => '15-0626 - Sports Central-SM Makati'
          ],
          [
               'id' => '194',
               'name' => '15-0621 - Sports Central-SM Iloilo',
               'value' => '15-0621 - Sports Central-SM Iloilo'
          ],
          [
               'id' => '195',
               'name' => '15-0507 - Sports Central - SM Southmall',
               'value' => '15-0507 - Sports Central - SM Southmall'
          ],
        ];
    }

    public function mount()
    {
        $this->fetchBrandFilters();
        $this->fetchOutletFilters();

     //    $locationCodes = LocationCode::pluck('LocationCode','id')->toArray();

     //    $this->outletFilters = collect($locationCodes)->map(function ($value, $key){
     //        return [
     //           'value' => $key,
     //           'name' => $value,
     //        ];
     //    })->toArray();
    }
    
    public function render()
    {
        $brandFilter = '%' . $this->selectedFilter . '%';
        $outletFilters = '%'.$this->selectedOutlet.'%';
    
        $query = SMSApi::groupBy('outlet')
            ->select('brand', 'unit_price', 'outlet', 'created_at', DB::raw('count(*) as total'), DB::raw('sum(unit_price) as subtotal'));
    
        if ($brandFilter) {
            $query->where('brand', 'like', $brandFilter);
        }
        if($outletFilters){
            $query->where('outlet','like',$outletFilters);
        }    
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay(),
            ]);
        }
    
        $tryCount1 = $query->get();
    
        $tryCount = SMSApi::groupBy('outlet')
            ->select('brand', 'unit_price', 'outlet', 'created_at', DB::raw('count(*) as total'), DB::raw('sum(unit_price) as subtotal'))
            ->paginate(5);
    
        $grandtotal = 0;
        foreach ($tryCount1 as $outlet) {
            $grandtotal += intval($outlet->subtotal);
        }
        $formattedTotal = '₱' . number_format($grandtotal, 2, '.', ',');
    
        return view('livewire.dashboard-component', compact('grandtotal', 'tryCount', 'tryCount1', 'formattedTotal'));
    }
}
