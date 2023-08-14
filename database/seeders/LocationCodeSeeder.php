<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location_codes')->insert([
          //SM Start
          ['LocationCode' => '15-0006 - SM Megamall'],
          ['LocationCode' => '15-0013 - SM Makati'],
          ['LocationCode' => '15-0014 - SM North Edsa'],
          ['LocationCode' => '15-0205 - SM Mall of Asia'],
          ['LocationCode' => '15-0440 - SM Aura Premier',],
          ['LocationCode' => '15-0257 - SM Bacolod'],
          ['LocationCode' => '15-0027 - SM Bacoor'],
          ['LocationCode' => '15-0146 - SM Baguio'],
          ['LocationCode' => '15-0326 - SM Baliwag',],
          ['LocationCode' => '15-0184 - SM Batangas'],
          ['LocationCode' => '15-0446 - SM BF Parañaque'],
          ['LocationCode' => '15-0109 - SM Bicutan'],
          ['LocationCode' => '15-0660 - SM Butuan'],
          ['LocationCode' => '15-0493 - SM Cabanatuan'],
          ['LocationCode' => '15-0108 - SM Cagayan De Oro'],
          ['LocationCode' => '15-0384 - SM Calamba'],
          ['LocationCode' => '15-0453 - SM Cauayan'],
          ['LocationCode' => '15-0017 - SM Cebu'],
          ['LocationCode' => '15-0079 - SM City Manila'],
          ['LocationCode' => '15-0640 - SM City Olongapo Central'],
          ['LocationCode' => '15-0598 - SM City Telabastagan'],
          ['LocationCode' => '15-0208 - SM Clark'],
          ['LocationCode' => '15-0413 - SM Consolacion'],
          ['LocationCode' => '15-0011 - SM Cubao'],
          ['LocationCode' => '15-0581 - SM Cubao E-Store'],
          ['LocationCode' => '15-0096 - SM Davao'],
          ['LocationCode' => '15-0643 - SM Estancia'],
          ['LocationCode' => '15-0030 - SM Fairview'],
          ['LocationCode' => '15-0414 - SM Gensan'],
          ['LocationCode' => '15-0740 - SM Grand Central'],
          ['LocationCode' => '15-0012 - SM Harrison'],
          ['LocationCode' => '15-0071 - SM Iloilo'],
          ['LocationCode' => '15-0424 - SM Lanang'],
          ['LocationCode' => '15-0238 - SM Lipa'],
          ['LocationCode' => '15-0140 - SM Lucena'],
          ['LocationCode' => '15-0628 - SM Makati - Outdoors'],
          ['LocationCode' => '15-0324 - SM Marikina'],
          ['LocationCode' => '15-0147 - SM Marilao'],
          ['LocationCode' => '15-0392 - SM Masinag'],
          ['LocationCode' => '15-0661 - SM Mindpro Zamboanga'],
          ['LocationCode' => '15-0537 - SM Molino'],
          ['LocationCode' => '15-0331 - SM Naga'],
          ['LocationCode' => '15-0386 - SM Novaliches'],
          ['LocationCode' => '15-0398 - SM Olongapo'],
          ['LocationCode' => '15-0572 - SM Puerto Princesa'],
          ['LocationCode' => '15-0022 - SM Quiapo'],
          ['LocationCode' => '15-0335 - SM Rosales'],
          ['LocationCode' => '15-0397 - SM San Fernando'],
          ['LocationCode' => '15-0518 - SM San Jose Del Monte'],
          ['LocationCode' => '15-0197 - SM San Lazaro'],
          ['LocationCode' => '15-0484 - SM San Mateo'],
          ['LocationCode' => '15-0385 - SM San Pablo'],
          ['LocationCode' => '15-0494 - SM Seaside Cebu'],
          ['LocationCode' => '15-0007 - SM Southmall '],
          ['LocationCode' => '15-0008 - SM Sta. Mesa'],
          ['LocationCode' => '15-0206 - SM Sta. Rosa'],
          ['LocationCode' => '15-0538 - SM Store East Ortigas'],
          ['LocationCode' => '15-0199 - SM Sucat'],
          ['LocationCode' => '15-0375 - SM Tarlac'],
          ['LocationCode' => '15-0290 - SM Taytay'],
          ['LocationCode' => '15-0519 - SM Trece Martires'],
          ['LocationCode' => '15-0595 - SM Urdaneta'],
          ['LocationCode' => '15-0620 - SM Valenzuela'],
          //SM Ending

          //Robinsons Start
          ['LocationCode' => '15-0176 - Robinsons Angeles - SE'],
          ['LocationCode' => '15-0130 - Robinsons Bacolod'],
          ['LocationCode' => '15-0151 - Robinsons Bulacan'],
          ['LocationCode' => '15-0447 - Robinsons Butuan'],
          ['LocationCode' => '15-0223 - Robinsons Cagayan'],

          ['LocationCode' => '15-0412 - Robinsons Calasiao'],
          ['LocationCode' => '15-0081 - Robinsons Cebu'],
          ['LocationCode' => '15-0587 - Robinsons Cloverleaf'],
          ['LocationCode' => '15-0589 - Robinsons Cotabato'],
          ['LocationCode' => '15-0216 - Robinsons Dagupan'],

          ['LocationCode' => '15-0134 - Robinsons Dasmarinas'],
          ['LocationCode' => '15-0357 - Robinsons Dumaguete'],
          ['LocationCode' => '15-0023 - Robinsons Ermita'],
          ['LocationCode' => '15-0149 - Robinsons Ermita - SE'],
          ['LocationCode' => '15-0010 - Robinsons Galleria'],

          ['LocationCode' => '15-0506 - Robinsons Galleria Cebu'],
          ['LocationCode' => '15-0524 - Robinsons General Trias'],
          ['LocationCode' => '15-0569 - Robinsons Iligan'],
          ['LocationCode' => '15-0065 - Robinsons Imus'],
          ['LocationCode' => '15-0540 - Robinsons Jaro Iloilo'],

          ['LocationCode' => '15-0361 - Robinsons Laoag'],
          ['LocationCode' => '15-0141 - Robinsons Lipa'],
          ['LocationCode' => '15-0427 - Robinsons Magnolia'],
          ['LocationCode' => '15-0091 - Robinsons Metro East'],
          ['LocationCode' => '15-0051 - Robinsons Metropolis'],

          ['LocationCode' => '15-0576 - Robinsons Naga'],
          ['LocationCode' => '15-0593 - Robinsons North Tacloban'],
          ['LocationCode' => '15-0596 - Robinsons Ormoc'],
          ['LocationCode' => '15-0098 - Robinsons Pampanga'],
          ['LocationCode' => '15-0416 - Robinsons Puerto Princesa'],

          ['LocationCode' => '15-0448 - Robinsons Roxas'],
          ['LocationCode' => '15-0450 - Robinsons Santiago'],
          ['LocationCode' => '15-0555 - Robinsons Southpark'],
          ['LocationCode' => '15-0523 - Robinsons Tagum'],
          ['LocationCode' => '15-0612 - Robinsons Tuguegarao'],

          ['LocationCode' => '15-0625 - Robinsons Valencia'],
          ['LocationCode' => '15-0327 - Robinsons Cabanatuan'],
          ['LocationCode' => '15-0449 - Robinsons Malolos'],
          ['LocationCode' => '15-0178 - Robinsons Place - Bacolod 2'],
          //Robinsons Ending

          //OLYMPIC VILLAGE START
          ['LocationCode' => '15-0553 - Olympic Village Antipolo'],
          ['LocationCode' => '15-0069 - Olympic Village Cebu'],
          ['LocationCode' => '15-0137 - Olympic Village Dasmarinas'],
          ['LocationCode' => '15-0528 - Olympic Village Farmers'],
          ['LocationCode' => '15-0487 - Olympic Village Fisher Mall'],
          ['LocationCode' => '15-0641 - Olympic Village Galleria South'],
          ['LocationCode' => '15-0226 - Olympic Village Gateway'],
          ['LocationCode' => '15-0482 - Olympic Village Glorietta 2'],
          ['LocationCode' => '15-0068 - Olympic Village Imus'],
          ['LocationCode' => '15-0026 - Olympic Village Isetann'],
          ['LocationCode' => '15-0444 - Olympic Village Lipa'],
          ['LocationCode' => '15-0177 - Olympic Village Market Market'],
          ['LocationCode' => '15-0035 - Olympic Village Megamall'],
          ['LocationCode' => '15-0036 - Olympic Village North EDSA'],
          ['LocationCode' => '15-0106 - Olympic Village Pampanga'],
          ['LocationCode' => '15-0249 - Olympic Village Pioneer'],
          ['LocationCode' => '15-0632 - Olympic Village RDS Las Piñas'],
          ['LocationCode' => '15-0212 - Olympic Village Southmall'],
          ['LocationCode' => '15-0029 - Olympic Village Sta Lucia'],
          ['LocationCode' => '15-0138 - Olympic Village Sta Rosa'],
          ['LocationCode' => '15-0033 - Olympic Village Star EDSA'],
          ['LocationCode' => '15-0266 - Olympic Village Trinoma'],
        //OLYMPIC VILLAGE ENDING
        
        //Planet Sports
         ['LocationCode' => '15-0292 - Planet Sports -Alabang'],
         ['LocationCode' => '15-0381 - Planet Sports - Cebu'],
         ['LocationCode' => '15-0135 - Planet Sports -Glorietta'],
         ['LocationCode' => '15-0264 - Planet Sports -Greenhills'],
         ['LocationCode' => '15-0092 - Planet Sports -Mamplasan'],
         ['LocationCode' => '15-0421 - Planet Sports -Cebu'],
         ['LocationCode' => '15-0143 - Planet Sports -Pasig'],
         ['LocationCode' => '15-0417 - Planet Sports -Subic'],
         ['LocationCode' => '15-0431 - Planet Sports -SW Libis'],
         ['LocationCode' => '15-0550 - Planet Sports -SW Market'],
         ['LocationCode' => '15-0430 - Planet Sports -SW Munoz'],
         ['LocationCode' => '15-0358 - Planet Sports -Trinoma'],
         //Planet Sports Ending

         //Tobys Start
         ['LocationCode' => '15-0132 - Tobys -Bacoor'],
         ['LocationCode' => '15-0383 - Tobys -Cagayan'],
         ['LocationCode' => '15-0195 - Tobys -Cebu'],
         ['LocationCode' => '15-0193 - Tobys -Fairview'],
         ['LocationCode' => '15-0389 - Tobys -Festival'],
         ['LocationCode' => '15-0222 - Tobys -Mall Of Asia'],
         ['LocationCode' => '15-0113 - Tobys -Manila'],
         ['LocationCode' => '15-0325 - Tobys -Marikina'],
         ['LocationCode' => '15-0104 - Tobys -Megamall'],
         ['LocationCode' => '15-0103 - Tobys -North Edsa'],
         ['LocationCode' => '15-0196 - Tobys -Pampanga'],
         ['LocationCode' => '15-0131 - Tobys -Robinsons Galleria'],
         ['LocationCode' => '15-0363 - Tobys -Rosario'],
         ['LocationCode' => '15-0102 - Tobys -Rustans Shangrila'],
         ['LocationCode' => '15-0315 - Tobys -SM Cebu - NORTHWING'],
         ['LocationCode' => '15-0215 - Tobys -Sta. Rosa'],
         ['LocationCode' => '15-0301 - Tobys -Taytay'],
         ['LocationCode' => '15-0251 - Tobys -The Block'],
         ['LocationCode' => '15-0105 - Tobys -The Podium'],
         ['LocationCode' => '15-0268 - Tobys -Trinoma'],
         ['LocationCode' => '15-0200 - Tobys-Valenzuela'],
         ['LocationCode' => '15-0395 - Tobys Abreeza -Davao'],
         ['LocationCode' => '15-0112 - Tobys Arena -Glorietta'],
         ['LocationCode' => '15-0365 - Tobys ATC'],
        //Tobys Ending

        //Gaisano Mall Start
        ['LocationCode' => '15-0252 - Gaisano - Gatuslao Bacolod'],
        ['LocationCode' => '15-0224 - Gaisano - General - Lobby Sale'],
        ['LocationCode' => '15-0283 - Gaisano - Iloilo CON'],
        ['LocationCode' => '15-0253 - Gaisano - Mactan'],
        ['LocationCode' => '15-0133 - Gaisano - Metro - Lucena'],
        ['LocationCode' => '15-0227 - Gaisano - Roxas'],
        ['LocationCode' => '15-0254 - Gaisano - South'],
        ['LocationCode' => '15-0185 - Gaisano - Tacloban'],
        ['LocationCode' => '15-0380 - Gaisano Grand - Tagum'],
        ['LocationCode' => '15-0610 - Gaisano Grand Mactan'],
        ['LocationCode' => '15-0359 - Gaisano Grand Mactan'],
        //Gaisano Mall Ending
        
        //Royal Sporting House Start
        ['LocationCode' => '15-0155 - Royal Sporting House - Cebu'],
        ['LocationCode' => '15-0099 - Royal Sporting House - Ermita'],
        ['LocationCode' => '15-0142 - Royal Sporting House - Lipa'],
        ['LocationCode' => '15-0129 - Royal Sporting House -Festival'],
        ['LocationCode' => '15-0139 - Royal Sporting House-Galleria'],
        //Royal Sporting House End

        //Sports Central Start
        ['LocationCode' => '15-0152 - Sports Central - Baguio'],
        ['LocationCode' => '15-0183 - Sports Central - Batangas'],
        ['LocationCode' => '15-0534 - Sports Central - Cauayan'],
        ['LocationCode' => '15-0188 - Sports Central - Dasmarinas'],
        ['LocationCode' => '15-0189 - Sports Central - Fairview'],
        ['LocationCode' => '15-0240 - Sports Central - Mall Of Asia'],
        ['LocationCode' => '15-0241 - Sports Central - North Edsa'],
        ['LocationCode' => '15-0190 - Sports Central - Pampanga'],
        ['LocationCode' => '15-0573 - Sports Central - SM Lanang'],
        ['LocationCode' => '15-0634 - Sports Central - SM Southmall'],
        ['LocationCode' => '15-0156 - Sports Central - Sta Mesa'],
        ['LocationCode' => '15-0586 - Sports Central-Puerto Princesa'],
        ['LocationCode' => '15-0626 - Sports Central-SM Iloilo'],
        ['LocationCode' => '15-0621 - Sports Central-SM Makati'],
        ['LocationCode' => '15-0507 - Sports Central-SM Seaside Cebu'],
       //Sports Central Ending

       //RSH Start
       ['LocationCode' => '15-0591 - RSH  - Recto'],
       ['LocationCode' => '15-0340 - RSH - Megatrade Hall'],
       ['LocationCode' => '15-0535 - RSH - Starmill RDS Pampanga'],
       ['LocationCode' => '15-0556 - RSH - The 30th Ayala Mall'],
       ['LocationCode' => '15-0536 - RSH - UP Town Center'],
       ['LocationCode' => '15-0544 - RSH - Valenzuela'],
       //RSH Ending

        ]);
    }
}
