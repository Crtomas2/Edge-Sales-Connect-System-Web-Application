<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
         [ 'Storename' => 'SM Megamall', ],
         [ 'Storename' => 'SM Makati',],   
         [ 'Storename' => 'SM North Edsa',],
         [ 'Storename'=> 'SM Mall of Asia',], 
         [ 'Storename'=> 'SM Aura Premier',], 
         [ 'Storename'=> 'SM Bacolod',], 
         [ 'Storename'=> 'SM Bacoor',], 
         [ 'Storename'=> 'SM Baguio',], 
         [ 'Storename'=> 'SM Baliwag',], 
         [ 'Storename'=> 'SM Batangas',], 
         [ 'Storename'=> 'SM BF Parañaque',], 
         [ 'Storename'=> 'SM Bicutan',], 
         [ 'Storename'=> 'SM Butuan',], 
         [ 'Storename'=> 'SM Cabanatuan',],  
         [ 'Storename'=> 'SM Cagayan De Oro',],  
         [ 'Storename'=> 'SM Calamba',],  
         [ 'Storename'=> 'SM Cauayan',],  
         [ 'Storename'=> 'SM Cebu',],  
         [ 'Storename'=> 'SM City Manila',],  
         [ 'Storename'=> 'SM City Olongapo Central',],  
         [ 'Storename'=> 'SM City Telabastagan',],  
         [ 'Storename'=> 'SM Clark',], 
         [ 'Storename'=> 'SM Consolacion',], 
         [ 'Storename'=> 'SM Cubao',], 
         [ 'Storename'=> 'SM Cubao E-Store',], 
         [ 'Storename'=> 'SM Davao',], 
         [ 'Storename'=> 'SM Estancia',], 
         [ 'Storename'=> 'SM Fairview',], 
         [ 'Storename'=> 'SM Gensan',], 
         [ 'Storename'=> 'SM Grand Central',], 
         [ 'Storename'=> 'SM Harrison',], 
         [ 'Storename'=> 'SM Iloilo',],
         [ 'Storename'=> 'SM Lanang',], 
         [ 'Storename'=> 'SM Lipa',], 
         [ 'Storename'=> 'SM Lucena',], 
         [ 'Storename'=> 'SM Makati -Outdoors',], 
         [ 'Storename'=> 'SM Marikina',], 
         [ 'Storename'=> 'SM Marilao',], 
         [ 'Storename'=> 'SM Masinag',], 
         [ 'Storename'=> 'SM Mindpro Zamboanga',], 
         [ 'Storename'=> 'SM Molino',], 
         [ 'Storename'=> 'SM NAGA',], 
         [ 'Storename'=> 'SM Novaliches',], 
         [ 'Storename'=> 'SM Olongapo',], 
         [ 'Storename'=> 'SM Puerto Princesa',], 
         [ 'Storename'=> 'SM Quiapo',], 
         [ 'Storename'=> 'SM ROSALES',], 
         [ 'Storename'=> 'SM San Fernando',], 
         [ 'Storename'=> 'SM San Jose Del Monte',], 
         [ 'Storename'=> 'SM San Lazaro',],   
         [ 'Storename'=> 'SM San Mateo',], 
         [ 'Storename'=> 'SM San Pablo',], 
         [ 'Storename'=> 'SM Seaside Cebu',], 
         [ 'Storename'=> 'SM Southmall',], 
         [ 'Storename'=> 'SM Sta. Mesa',], 
         [ 'Storename'=> 'SM Sta. Rosa',], 
         [ 'Storename'=> 'SM Store East Ortigas',], 
         [ 'Storename'=> 'SM Sucat',], 
         [ 'Storename'=> 'SM Tarlac',], 
         [ 'Storename'=> 'SM Taytay',], 
         [ 'Storename'=> 'SM Trece Martires',], 
         [ 'Storename'=> 'SM Urdaneta',], 
         [ 'Storename'=> 'SM Valenzuela',], 
        //SM Ending Storename

         //Robinsons Start
         [ 'Storename'=> 'Robinsons Angeles - SE',],
         [ 'Storename'=> 'Robinsons Bacolod',],
         [ 'Storename'=> 'Robinsons Bulacan',],
         [ 'Storename'=> 'Robinsons Butuan',],
         [ 'Storename'=> 'Robinsons Cagayan',],
         [ 'Storename'=> 'Robinsons Calasiao',],
         [ 'Storename'=> 'Robinsons Cebu',],
         [ 'Storename'=> 'Robinsons Cloverleaf',],
         [ 'Storename'=> 'Robinsons Cotabato',],
         [ 'Storename'=> 'Robinsons Dagupan',],
         [ 'Storename'=> 'Robinsons Dasmarinas',],
         [ 'Storename'=> 'Robinsons Dumaguete',],
         [ 'Storename'=> 'Robinsons Ermita',],
         [ 'Storename'=> 'Robinsons Ermita - SE',],
         [ 'Storename'=> 'Robinsons Galleria',],
         [ 'Storename'=> 'Robinsons Galleria Cebu',],
         [ 'Storename'=> 'Robinsons General Trias',],
         [ 'Storename'=> 'Robinsons Iligan',],
         [ 'Storename'=> 'Robinsons Imus',],
         [ 'Storename'=> 'Robinsons Jaro Iloilo',],
         [ 'Storename'=> 'Robinsons Laoag',],
         [ 'Storename'=> 'Robinsons Lipa',],
         [ 'Storename'=> 'Robinsons Magnolia',],
         [ 'Storename'=> 'Robinsons Metro East',],
         [ 'Storename'=> 'Robinsons Metropolis',],
         [ 'Storename'=> 'Robinsons Naga',],
         [ 'Storename'=> 'Robinsons North Tacloban',],
         [ 'Storename'=> 'Robinsons Ormoc',],
         [ 'Storename'=> 'Robinsons Pampanga',],
         [ 'Storename'=> 'Robinsons Puerto Princesa',],
         [ 'Storename'=> 'Robinsons Roxas',],
         [ 'Storename'=> 'Robinsons Santiago',],
         [ 'Storename'=> 'Robinsons Southpark',],
         [ 'Storename'=> 'Robinsons Tagum',],
         [ 'Storename'=> 'Robinsons Tuguegarao',],
         [ 'Storename'=> 'Robinsons Valencia',],
         [ 'Storename'=> 'Robinsons Cabanatuan',],
         [ 'Storename'=> 'Robinsons Malolos',],
         [ 'Storename'=> 'Robinsons Place - Bacolod 2',],
         //Robinson Ending
         
         //SM & Olympic Village Start
         [ 'Storename'=> 'Olympic Village Antipolo', ],
         [ 'Storename'=> 'Olympic Village Cebu',],
         [ 'Storename'=> 'Olympic Village Dasmarinas',],
         [ 'Storename'=> 'Olympic Village Farmers', ],
         [ 'Storename'=> 'Olympic Village Fisher Mall',],
         [ 'Storename'=> 'Olympic Village Galleria South',],
         [ 'Storename'=> 'Olympic Village Gateway', ],
         [ 'Storename'=> 'Olympic Village Glorietta 2',],
         [ 'Storename'=> 'Olympic Village Imus',],
         [ 'Storename'=> 'Olympic Village Isetann',],       
         [ 'Storename'=> 'Olympic Village Lipa', ],
         [ 'Storename'=> 'Olympic Village Market Market',],
         [ 'Storename'=> 'Olympic Village Megamall',],
         [ 'Storename'=> 'Olympic Village North EDSA',],
         [ 'Storename'=> 'Olympic Village Pampanga',],
         [ 'Storename'=> 'Olympic Village Pioneer',],
         [ 'Storename'=> 'Olympic Village RDS Las Piñas',],
         [ 'Storename'=> 'Olympic Village Southmall',],
         [ 'Storename'=> 'Olympic Village Sta Lucia',],
         [ 'Storename'=> 'Olympic Village Sta Rosa',],
         [ 'Storename'=> 'Olympic Village Star EDSA',],
         [ 'Storename'=> 'Olympic Village Trinoma',],
         //SM & Olympic Village Ending
         
         //Planet Sports Starts
         [ 'Storename'=> 'Planet Sports -Alabang',],
         [ 'Storename'=> 'Planet Sports -Cebu',],
         [ 'Storename'=> 'Planet Sports -Glorietta',],
         [ 'Storename'=> 'Planet Sports -Greenhills',],
         [ 'Storename'=> 'Planet Sports -Mamplasan',],
         [ 'Storename'=> 'Planet Sports -Newport',],
         [ 'Storename'=> 'Planet Sports -Pasig',],
         [ 'Storename'=> 'Planet Sports -Subic',],
         [ 'Storename'=> 'Planet Sports -SW Libis',],
         [ 'Storename'=> 'Planet Sports -SW Market',],
         [ 'Storename'=> 'Planet Sports -SW Munoz',],
         [ 'Storename'=> 'Planet Sports -Trinoma',],
         //Planet Sports Ending
        
         //Tobys
         [ 'Storename'=> 'Tobys -Bacoor',],
         [ 'Storename'=> 'Tobys -Cagayan',],
         [ 'Storename'=> 'Tobys -Cebu',],
         [ 'Storename'=> 'Tobys -Fairview',],
         [ 'Storename'=> 'Tobys -Festival',],
         [ 'Storename'=> 'Tobys -Mall Of Asia',],
         [ 'Storename'=> 'Tobys -Manila',],
         [ 'Storename'=> 'Tobys -Marikina',],
         [ 'Storename'=> 'Tobys -Megamall',],
         [ 'Storename'=> 'Tobys -North Edsa',],
         [ 'Storename'=> 'Tobys -Pampanga',],
         [ 'Storename'=> 'Tobys -Robinsons Galleria',],
         [ 'Storename'=> 'Tobys -Rosario',],      
         [ 'Storename'=> 'Tobys -Rustans Shangrila',],
         [ 'Storename'=> 'Tobys -SM Cebu - NORTHWING',],
         [ 'Storename'=> 'Tobys -Sta. Rosa',],
         [ 'Storename'=> 'Tobys -Taytay',],
         [ 'Storename'=> 'Tobys -The Block',],
         [ 'Storename'=> 'Tobys -The Podium',],
         [ 'Storename'=> 'Tobys -Trinoma',],
         ['Storename'=>  'Tobys-Valenzuela',],
         ['Storename'=>  'Tobys Abreeza -Davao',],
         ['Storename'=>  'Tobys Arena -Glorietta',],
         ['Storename'=>  'Tobys ATC',],
         //Tobys Ending  

        
         // Gaisano Mall Start
         ['Storename'=>  'Gaisano - Gatuslao Bacolod',],
         ['Storename'=>  'Gaisano - General - Lobby Sale',],
         ['Storename'=>  'Gaisano - Iloilo CON',],
         ['Storename'=>  'Gaisano - Mactan',],
         ['Storename'=>  'Gaisano - Metro - Lucena',],
         ['Storename'=>  'Gaisano - Roxas',],
         ['Storename'=>  'Gaisano - South',],
         ['Storename'=>  'Gaisano - Tacloban',],
         ['Storename'=>  'Gaisano Grand - Tagum',],
         ['Storename'=>  'Gaisano Grand City Gate Davao',],
         ['Storename'=>  'Gaisano Grand Mactan',],
        // Gaisano Mall Ending
        
        //Royal Sporting House Start
        ['Storename'=>  'Royal Sporting House - Cebu',],
        ['Storename'=>  'Royal Sporting House - Ermita',],
        ['Storename'=>  'Royal Sporting House - Lipa',],
        ['Storename'=>  'Royal Sporting House -Festival',],
        ['Storename'=>  'Royal Sporting House-Galleria',],
        //Royal Sporting Ending

        //Sports Central Start
        ['Storename'=>  'Sports Central - Baguio',],
        ['Storename'=>  'Sports Central - Batangas',],
        ['Storename'=>  'Sports Central - Cauayan',],
        ['Storename'=>  'Sports Central - Dasmarinas',],
        ['Storename'=>  'Sports Central - Fairview',],
        ['Storename'=>  'Sports Central - Mall Of Asia',],
        ['Storename'=>  'Sports Central - North Edsa',],
        ['Storename'=>  'Sports Central - Pampanga',],
        ['Storename'=>  'Sports Central - SM Lanang',],
        ['Storename'=>  'Sports Central - SM Southmall',],
        ['Storename'=>  'Sports Central - Sta Mesa',],
        ['Storename'=>  'Sports Central-Puerto Princesa',],
        ['Storename'=>  'Sports Central-SM Iloilo',],
        ['Storename'=>  'Sports Central-SM Makati',],
        ['Storename'=>  'Sports Central-SM Seaside Cebu',],
        //Sports Central Ending

         //RSH Start
        ['Storename'=>  'RSH  - Recto',],
        ['Storename'=>  'RSH - Megatrade Hall',],
        ['Storename'=>  'RSH - Starmill RDS Pampanga',],
        ['Storename'=>  'RSH - The 30th Ayala Mall',],
        ['Storename'=>  'RSH - UP Town Center',],
        ['Storename'=>  'RSH - Valenzuela',],   
         //RSH Ending

            


        ]);
    }
}
