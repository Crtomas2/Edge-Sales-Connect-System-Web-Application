<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storelocations')->insert([
        [ 'Storelocations' => 'EDSA, corner Doña Julia Vargas Ave, Ortigas Center, Mandaluyong, 1555 Metro Manila'],
        [ 'Storelocations'=> 'The SM Store Makati, SM Makati, Courtyard Dr, Makati, 1223 Metro Manila' ],
        [ 'Storelocations'=> 'SM North EDSA, North Avenue, corner Epifanio de los Santos Ave, Bagong Pag-asa, Quezon City, 1105 Metro Manila'],
        [ 'Storelocations' => 'SM Mall of Asia, Pasay, Metro Manila',],
        
        [ 'Storelocations' => '26th Street, Corner McKinley Pkwy, Taguig, 1630 Metro Manila'],
        [ 'Storelocations'=> 'Rizal St, Reclamation Area, Bacolod, 6100 Negros Occidental' ],
        [ 'Storelocations'=> '2/F SM City Bacoor Tirona Highway, corner Emilio Aguinaldo Highway, Bacoor,Cavite'],
        [ 'Storelocations' => 'SM City Baguio Luneta Hill, Upper Session Rd, Baguio, 2600 Benguet',],

        [ 'Storelocations' => '21 Doña Remedios Trinidad Hwy, Baliuag, 1630 Bulacan'],
        [ 'Storelocations'=> '2/F,SM City Batangas, Pastor Village, Brgy Batangas,Batangas' ],
        [ 'Storelocations'=> 'SM City BF Parañaque,Dr Arcadio Santos Ave, Parañaque,Metro Manila'],
        [ 'Storelocations' => 'SM Bicutan, 1700 Doña Soledad Ave, Parañaque, 1709 Metro Manila',],

        [ 'Storelocations' => 'SM City Butuan, JC Aquino Ave, Butuan City, Agusan Del Norte'],
        [ 'Storelocations'=> 'SM Cabanatuan, Brgy. H. Concepcion, Along, Pan-Philippine Hwy, Cabanatuan City, 3100 Nueva Ecija' ],
        [ 'Storelocations'=> 'Fr. Masterson Avenue Cor. Gran Via St., Pueblo de Oro Township, Uptown Carmen, Cagayan de Oro, Misamis Oriental'],
        [ 'Storelocations' => 'SM City Calamba, National Road, Brgy, Real, Calamba, 4027 Laguna',],
        
        [ 'Storelocations' => 'SM City Cauayan,  Maharlika Highway, Brgy. District II 3305, Cauayan City, Isabela'],
        [ 'Storelocations'=> 'SM City Cebu, Juan Luna Ave. cor. Cabahug and Kaoshiung Streets, North Reclamation Area, Cebu Port Center, Mabolo, Cebu City'],
        [ 'Storelocations'=> 'SM City Manila, Natividad Almeda-Lopez corner A. Villegas and, San Marcelino, Ermita, Manila'],
        [ 'Storelocations' => 'Rizal Avenue, Barangay East Tapinac, 2200 Olongapo City, Zambales Philippines',],

        [ 'Storelocations' => 'MAC ARTHUR HIGHWAY, BRGY. TELABASTAGAN, CITY OF SAN FERNANDO, PAMPANGA  PHILIPPINES'],
        [ 'Storelocations'=> ' Manuel A. Roxas Highway, Clark Freeport, Barangay Malabanias, Angeles City, Pampanga, Philippines'],
        [ 'Storelocations'=> 'Rizal Avenue (Cebu North Road), Brgy. Lamac, Consolacion, Cebu'],
        [ 'Storelocations' => 'SM Cubao Building, Araneta Center, Socorro, Cubao, Quezon City 1100 Metro Manila',],

        [ 'Storelocations' => 'SM Cubao Building, Araneta Center, Socorro, Cubao, Quezon City 1100 Metro Manila'],
        [ 'Storelocations'=> 'Quimpo Blvd cor. Tulip and Ecoland Drive, Ecoland Subd., Matina, Davao City'],
        [ 'Storelocations'=> 'Ground Level to 2nd Level, East Wing, Estancia Mall Meralco Ave., Capitol Commons, Ortigas Center,Pasig, Metro Manila, Philippines'],
        [ 'Storelocations' => 'Quirino Highway corner Regalado Avenue, Novaliches, Quezon City, Philippines',],

        [ 'Storelocations' => 'San Miguel Street, Lagao, General Santos City, South Cotabato',],
        [ 'Storelocations' => 'Rizal Ave Ext, East Grace Park, Caloocan, Metro Manila',],
        [ 'Storelocations' => 'Harrison Plaza, A. Mabini corner M. Adriatico Streets, City of Manila, Metro Manila',],
        [ 'Storelocations' => 'Senator Benigno Aquino Jr. Avenue, Jaro West Diversion Road, Mandurriao District, Iloilo City, Iloilo, Philippines'],
        
        [ 'Storelocations' => 'J.P. Laurel Ave., Brgy. San Antonio, Agdao District, Davao City'],
        [ 'Storelocations' => 'JP Laurel Highway, Lipa City'],
        [ 'Storelocations' => 'Maharlika Highway corner Dalahican Road, Ibabang Dupay, Lucena City, Quezon'],
        [ 'Storelocations' => '2F SM Makati'],

        [ 'Storelocations' => 'SM Marikina, Marcos Highway,Marikina-Infanta Hwy, Marikina, 1800 Metro Manila'],    
        [ 'Storelocations' => 'MacArthur Highway, Ibayo, Marilao, Bulacan'],    
        [ 'Storelocations' => 'Marcos Highway, Brgy. Mayamot, Masinag, Antipolo City, Rizal'],    
        [ 'Storelocations' => 'La Purisima St. Brgy. Zone III Poblacion, Zamboanga City, 7000'],
        
        [ 'Storelocations' => 'Molino Paliparan Road, Brgy. Molino 4, Bacoor City, Cavite, Philippines'], 
        [ 'Storelocations' => 'Ninoy and Cory Aquino Avenue, Central Business District II, Triangulo, Naga City, Camarines Sur, Philippines'], 
        [ 'Storelocations' => 'Quirino Highway, Brgy. San Bartolome, Novaliches, Quezon City'], 
        [ 'Storelocations' => 'Rizal Avenue, Barangay East Tapinac, 2200 Olongapo City, Zambales'], 

        [ 'Storelocations' => 'SM City Puerto Princesa, Malvar Street, Brgy. San Miguel, Puerto Princesa City, Palawan, 5300'], 
        [ 'Storelocations' => 'Natividad Almeda-Lopez corner A. Villegas and San Marcelino Streets, Ermita, Manila, Philippines'], 
        [ 'Storelocations' => 'MacArthur Highway, Barangay Carmen East, Rosales, Pangasinan, Philippines'], 
        [ 'Storelocations' => 'V. Tiomico St, San Fernando,Pampanga'], 
        [ 'Storelocations' => 'SM City San Jose Del Monte, Quirino Highway, San Jose del Monte City, 3023 Bulacan'], 
    
        [ 'Storelocations' => 'Felix Huertas Street corner Lacson Avenue (C-2 Road), Santa Cruz, Manila, Philippines'], 
        [ 'Storelocations' => 'SM City San Mateo, Gen. Luna Ave, Brgy. Ampid 1, San Mateo, Rizal'], 
        [ 'Storelocations' => 'National Hwy, San Pablo City,  Laguna'], 
        [ 'Storelocations' => 'SM Seaside City Cebu, Seaside Ave, Cebu South Coastal Rd, Cebu City, Cebu'], 
        [ 'Storelocations' => 'SM Southmall, Alabang-Zapote Road, Pilar Village, Almanza Uno, Las Piñas'], 
        [ 'Storelocations' => 'R. Magsaysay cor. G Araneta Ave, Dona Imelda Quezon City '], 

        [ 'Storelocations' => 'SM City Sta.rosa, Old National Highway, Brgy, Manila S Rd, Santa Rosa, Laguna'], 
        [ 'Storelocations' => 'Sm City East Ortigas,Ortigas Ave Ext, Brgy, Pasig, 1608 Metro Manila'], 
        [ 'Storelocations' => 'SM City Sucat, Dr. Santos Ave. corner Carlos P. Garcia Avenue Extension, San Dionisio, Parañaque City'],
        [ 'Storelocations' => 'SM Tarlac City, MacArthur Highway Brgy, Tarlac City, Tarlac'],
        [ 'Storelocations' => 'Manila East Road, Dolores, Taytay, Rizal'],
        [ 'Storelocations' => 'Governors Drive, cor Capitol Rd, Trece Martires, Cavite'],
        [ 'Storelocations' => 'SM City Urdaneta,Barangay Nancayasan, McArthur Hway, Urdaneta City, Pangasinan'],
        [ 'Storelocations' => 'MacArthur Highway, Brgy. Karuhatan, Valenzuela, Metro Manila'],
        //SM Ending location Address

        //Robinsons
        [ 'Storelocations' => 'Robinsons Place Pampanga, McArthur Highway, Balibago, Angeles City, Pampanga'],
        [ 'Storelocations' => 'Robinsons Place Bacolod,Lacson Street, Mandalagan, Bacolod City'],
        [ 'Storelocations' => 'Mac Arthur Highway, Sumapang Matanda Malolos City, Bulacan'],
        [ 'Storelocations' => 'J.C.Aquino Avenue, Butuan City 8600'],
        [ 'Storelocations' => 'Rosario Crescent, Corner Florentino St, Cagayan de Oro, 9000 Misamis Oriental'],
        [ 'Storelocations' => 'Urdaneta-Dagupan Road, Barangay San Miguel Rd, Calasiao, Pangasinan'],
        [ 'Storelocations' => 'General Maxilom Avenue cor. Sergio Osmena Blvd., Brgy Tejero, Cebu City'],
        [ 'Storelocations' => '2nd and 3rd Flr, Ayala Malls Cloverleaf, A. Bonifacio Ave. Brgy. Balingasa, Quezon City, Metro Manila'],
        [ 'Storelocations' => '1st and 2nd Flr, Mall of Alnor, Annex Bldg. Alnor Complex, Sinsuat Ave., RH9, Cotabato City, Maguindanao, 9600 Maguindanao'],
        [ 'Storelocations' => ' 2nd Flr, Nepo Mall Dagupan, Arellano St., Dagupan City, Pangasinan'],
        
        [ 'Storelocations' => ' Emilio Aguinaldo Highway, corner Governors Dr, Sitio Palapala, Dasmariñas, Cavite'],
        [ 'Storelocations' => 'Dumaguete Business Park, Calindagan, Dumaguete City'],
        [ 'Storelocations' => 'Pedro Gil, cor M. Adriatico St, Ermita, Manila,Metro Manila'],
        [ 'Storelocations' => 'Pedro Gil, cor M. Adriatico St, Ermita, Manila, 1000 Metro Manila'],
        [ 'Storelocations' => 'Ortigas Ave, Ortigas Center, Quezon City, Metro Manila'],
        [ 'Storelocations' => 'Gen. Maxilom Avenue Extension, Sergio Osmeña Jr Blvd, Cebu City,Cebu'],
        [ 'Storelocations' => 'EPZA-Bacao, Level 1, Robinsons Place Gen Trias, A. Soriano Highway, Diversion Road, General Trias, Cavite'],
        [ 'Storelocations' => 'Macapagal Ave, Iligan City, Lanao del Norte'],
        [ 'Storelocations' => 'General  Emillio Aguinaldo Highway, Imus, Cavite'],
        [ 'Storelocations' => 'E. Lopez St., Brgy. San Vicente, Jaro Iloilo City'],

        [ 'Storelocations' => 'Barangay 1 San Francisco, San Nicholas, Ilocos Norte'],
        [ 'Storelocations' => 'JP Laurel, National Highway, Mataas na Lupa, Lipa City'],
        [ 'Storelocations' => 'Aurora Blvd, corner Doña Hemady St, New Manila, Quezon City,'],
        [ 'Storelocations' => 'Marcos Highway, Barangay Dela Paz, Pasig City'],
        [ 'Storelocations' => '1st and 2nd level, Starmall Alabang, Alabang, Muntinlupa City, Metro Manila, 1770 Metro Manila'],
        [ 'Storelocations' => 'Roxas Avenue cor. Almeda Highway, Brgy. Triangulo, Naga City'],
        [ 'Storelocations' => 'Tacloban City, Leyte'],
        [ 'Storelocations' => 'Brgy. Cogon, Ormoc City, Leyte'],
        [ 'Storelocations' => 'Brgy. San Jose City of San Fernando, Pampanga'],
        [ 'Storelocations' => 'National Highway, Barangay. San Manuel, Puerto Princesa City, Palawan'],

        [ 'Storelocations' => 'Immaculate Heart of Mary Avenue, Pueblo de Panay, Brgy, Roxas City, Capiz'],
        [ 'Storelocations' => 'Maharlika Highway, Mabini, Santiago City, Isabela'],
        [ 'Storelocations' => 'South Park Mall, Ground Level South Park, Ayala Malls, National Road, Alabang, Muntinlupa, 1780 Metro Manila'],
        [ 'Storelocations' => 'National Highway Tagum City, Davao City'],
        [ 'Storelocations' => 'Level 1 & 2, Tanza Tuguegarao City, Cagayan'],
        [ 'Storelocations' => 'L1&2, Sayre Highway, Brgy. Hagkol, Bagontaas Valencia, Bukidnon'],
        [ 'Storelocations' => 'KM 111, Brgy. H. Concepcion, Pan-Philippine Hwy, Cabanatuan City, 3100 Nueva Ecija'],
        [ 'Storelocations' => 'Mac Arthur Highway, Sumapang Matanda Malolos City, Bulacan'],
        [ 'Storelocations' => 'Lacson Street, Mandalagan, Bacolod City'],
    //Robinsons Ending

    //Start Olympic Village
       [ 'Storelocations' => 'LGF, Robinsons Place Antipolo, Sumulong Highway, cor L. Sumulong Memorial Circle, Antipolo, 1870 Rizal'],
       [ 'Storelocations' => '2/L, Ayala Center Cebu, Bohol Ave, Cebu City, 6000 Cebu'],
       [ 'Storelocations' => '2/L, Robinsons Place Dasmariñas, Governors Drive, Dasmariñas, 4100, Cavite'],
       [ 'Storelocations' => 'Space#00038/54 Farmers Plaza'],
       [ 'Storelocations' => 'La 3A, Fisher Mall, 325 Quezon Avenue Cor Foorsevelt Avenue, Sta Cruz, Quezon City, 1104 Metro Manila'],
       [ 'Storelocations' => 'Level 2, Robinsons Galleria South, Km. 31, National Highway, Brgy, San Pedro, Laguna'],
       [ 'Storelocations' => 'Space 022,Gateway Mall,General Roxas Ave, Cubao, Quezon City, Metro Manila'],
       [ 'Storelocations' => 'Glorietta 2, Ayala Center, Makati, 1224 Metro Manila'],
       [ 'Storelocations' => '2/L, Robinsons Place Imus, Aguinaldo Highway corner Tanzang Luma Street, Imus, Cavite City, 4103'],
       [ 'Storelocations' => 'Prime Master Innovations, Inc'],

       [ 'Storelocations' => 'Unit 02155, 2nd Flr. Robinsons Place Lipa, Pres. JP Laurel Highway, Lipa City, 4217, Batangas, President Jose P. Laurel Hwy, Lipa, Batangas'],
       [ 'Storelocations' => 'Market Market Mall McKinley Parkway 4 Flr. Market Market Mall, Taguig, 1634 Metro Manila'],
       [ 'Storelocations' => 'L3, Mega A, Doña Julia Vargas Ave, Ortigas Center, Mandaluyong, Metro Manila'],
       [ 'Storelocations' => '2/F Main Bldg , SM City North-EDSA - City Center, SM City North EDSA North Avenue corner EDSA, Quezon City, Metro Manila'],
       [ 'Storelocations' => 'Prime Master Innovations, Inc'],
       [ 'Storelocations' => 'Robinsons - Pioneer'],
       [ 'Storelocations' => 'Level 2 Al Fresco Area, Robinsons Place, 345 Alabang-Zapote Rd, Las Piñas'],
       ['Storelocations' => '2nd Level,Sm City Southmall, Alabang Zapote Road, Las Piñas'],

       [ 'Storelocations' => 'Prime Master Innovations, Inc'],
       [ 'Storelocations' => 'Prime Master Innovations, Inc'],
       [ 'Storelocations' => '2/F Robinsons Galleria'],
       [ 'Storelocations' => '4th Flr. Trinoma, EDSA corner, 1105 North Ave, Quezon City'],
    //Ending Olympic Village

    //Planet Sports Starts
      [ 'Storelocations' => '2nd Level New Wing, Alabang Town Center'],
      [ 'Storelocations' => 'GF Ayala Center, Cebu City'],
      [ 'Storelocations' => 'Prime Master Innovations, Inc'],
      [ 'Storelocations' => 'Space 204 2/F Virramall'],
      [ 'Storelocations' => 'Prime Master Innovations, Inc'],

      [ 'Storelocations' => '3rd Floor Shop 19, Newport,'],
      [ 'Storelocations' => '2/F Robinsons Metro East'],
      [ 'Storelocations' => 'Space2014 L1 Harbor Point Mall'],
      [ 'Storelocations' => 'Club650 Leinire&Com l Complex'],
      [ 'Storelocations' => 'Unit 450 4L, Market Market'],
      [ 'Storelocations' => '2F Waltermart, EDSA, Veterans'],
      [ 'Storelocations' => '2085 ABC Level M2 Trinoma Mall'],
    //Planet Sports Ending

    //Tobys Start
      [ 'Storelocations' => 'SM Bacoor, Lowe Ground Floor, Emilio Aguinaldo Hwy, Bacoor, 4102 Cavite'],
      [ 'Storelocations' => 'Ground Level, Limketkai Dr, Cagayan de Oro, 9000 Misamis Oriental'],
      [ 'Storelocations' => 'SM City Cebu, Ground Level, Main, Cebu City, 6000 Cebu'],
      [ 'Storelocations' => 'Lower Ground, SM Fairview, Quirino Highway cor. Regalado Ave., Brgy. Greater Lagro, Fairview, Quezon City, 1118 Metro Manila'],
      [ 'Storelocations' => 'Level 2, Festival Supermall, Filinvest Avenue, Corporate Ave, Alabang, Muntinlupa, 2080 Metro Manila'],

      [ 'Storelocations' => 'Level 1, Entertainment Mall SM Central Business Park, Pasay, 1300 Metro Manila'],
      [ 'Storelocations' => 'Lower Ground, SM Manila, San Marcelino St, Ermita, Manila, 1000 Metro Manila'],
      [ 'Storelocations' => '3rd Level, SM City Marikina Marcos Highway, Brgy. Calumpang, Marikina, Metro Manila, Philippines'],
      [ 'Storelocations' => '3F Bldg. A, SM Megamall, 202 EDSA Cor. Dona Julia Vargas Ave. Ortigas Center, Ortigas Center, Mandaluyong, 1550 Metro Manila'],
      [ 'Storelocations' => 'Lower Ground, SM City Complex North Ave., Brgy. Sto. Cristo I, Quezon City, 1105'],
      [ 'Storelocations' => 'Ground Level, SM Pampanga, San Fernando, Pampangga, 2000 Pampanga'],
      [ 'Storelocations' => '3rd Level, Robinsons Galleria Ortigas EDSA corner Ortigas Ave. ,Quezon City, Metro Manila, Philippines'],

      [ 'Storelocations' => 'Level 2, SM City Rosario, Gen. Trias Dr, Rosario City, 4106 Cavite'],
      [ 'Storelocations' => '1/F Edsa Shangri-la Plaza'],
      [ 'Storelocations' => 'SM City Cebu, Ground Level, Main, Cebu City, 6000 Cebu'],
      [ 'Storelocations' => 'Level 2, Unit 2025-2028, SM City, Santa Rosa, 4026 Laguna'],
      [ 'Storelocations' => 'Level 2, SM Taytay, Manila East Road Barangay, Taytay, 1920 Rizal'],
      [ 'Storelocations' => '3rd Level, The Block, SM City North EDSA North Avenue corner EDSA, Quezon City'],

      [ 'Storelocations' => '4/F The Podium, 12 ADB Ave, Ortigas Center, Mandaluyong, Metro Manila'],
      [ 'Storelocations' => 'Ground Level, Trinoma, EDSA cor. North Ave., Brgy. Bagong Pag-Asa, Quezon City'],
      [ 'Storelocations' => 'Level 2, Unit 208-210 SM City Valenzuela, MacArthur Highway Brgy, Valenzuela, 1441 Metro Manila'],
      [ 'Storelocations' => 'Abreeza Mall, Level 2, J.P. Laurel Ave, Bajada, Davao City, 8000 Davao del Sur'],
      [ 'Storelocations' => '3F Ayala Center, Makati, 1226 Metro Manila'],
      [ 'Storelocations' => 'Ground Floor, Alabang Town Center, Alabang, Muntinlupa, 1770 Metro Manila'],
    //Tobys Ending

    //Gaisano Mall Start
    [ 'Storelocations' => 'Bacolod'],
    [ 'Storelocations' => 'General Santos City'],
    [ 'Storelocations' => 'Gaisano Iloilo, Iloilo City'],
    [ 'Storelocations' => 'Gaisano Mactan, Purok'],
    [ 'Storelocations' => 'Crown Synergy Trading Corp'],
    
    [ 'Storelocations' => 'Arnaldo Blvd Roxas City'],
    [ 'Storelocations' => 'Gaisano South'],
    [ 'Storelocations' => 'Tacloban City'],
    [ 'Storelocations' => 'Gaisano Tower, 328 C. Palanca'],
    [ 'Storelocations' => 'Corner Pigato & Cabatian Road'],
    [ 'Storelocations' => 'Gaisano Fiesta Mall, Hi-Way'],
//Gaisano Mall Ending

    //Royal Sporting House Mall Start
    [ 'Storelocations' => 'Stall #112, Paseo Verde, Ayala Center Cebu, Cebu City, Cebu, 6000'],
    [ 'Storelocations' => 'La Fuerza Compound, 2214'],
    [ 'Storelocations' => 'Prime Master Innovations, Inc'],
    [ 'Storelocations' => 'Festival Mall'],
    [ 'Storelocations' => 'San Miguel Wing'],
    //Royal Sporting House Mall Ending

    //Sports Central  Mall Start
    [ 'Storelocations' => 'G/F 143 Upper Ground Flr., SM City Baguio, Upper Session Rd., Luneta Hill, Baguio City, 2600, Benguet'],
    [ 'Storelocations' => '2/F SM City Batangas, M.Pastor Ave, Barangay Pallocan West, Batangas, 4200 Batangas'],
    [ 'Storelocations' => '2/F SM City Cauayan, Pan-Philippine Hwy, Isabela'],
    [ 'Storelocations' => 'Lg/F SM Dasmarinas, Governors Dr, Sampaloc 1, Dasmariñas, 4114 Cavite'],
    [ 'Storelocations' => 'Ug/F SM Fairview, Quirino Highway Corner Regalado Avenue, Novaliches, Quezon City, 1118 Metro Manila'],
    [ 'Storelocations' => 'G/F North Entertainment Mall SM MOA SM Central Business Park, Pasay, 1300 Metro Manila'],
    [ 'Storelocations' => 'AX1 328, SM City North Edsa -Annex, Edsa, corner North Avenue, Quezon City, 1100 Metro Manila'],
    [ 'Storelocations' => 'Ground Flr. Annex A SM City Pampanga, Brgy. San Jose, San Fernando, 2000, Pampanga'],
    [ 'Storelocations' => 'Unit 164 - 167A G/F SM Lanang Premier, JP Laurel Avenue, Brgy San Antonio, Agdao Davao City'],
    [ 'Storelocations' => 'UG Floor SM Southmall  Alabang- Zapote Road, Almaanza Uno, Las Pinas'],
    [ 'Storelocations' => 'Sta. Mesa'],

    [ 'Storelocations' => '2nd Level SM Puerto Princesa City, Malvar, cor Lacao St, Puerto Princesa, 5300 Palawan'],
    [ 'Storelocations' => 'Lower Ground Level SM City IloiloBenigno Aquino Jr. Ave., West Diversion Road Mandurriao, Iloilo, Philippines'],
    [ 'Storelocations' => '2F, SM Makati, Hotel Drive,'],
    [ 'Storelocations' => 'Unit 2085 - 2091 SM Seaside City Mall, South Road Properties, Mambaling, Cebu City 6000'],
    //Sports Central  Mall Ending

    //RSH  Mall Start
    [ 'Storelocations' => '2L, Cinerama Complex, CM Recto'],
    [ 'Storelocations' => 'SM Megamall, Megatrade Hall'],
    [ 'Storelocations' => 'GF, Starmill RDS Pampanga'],
    [ 'Storelocations' => '2052A L2, The 30th Ayala Mall,'],
    [ 'Storelocations' => '#SU 208 2F Phase 2B UP Town'],
    [ 'Storelocations' => 'Unit 238-240 SM Valenzuela'],  
        //RSH  Mall Ending

        ]);
    }
}
