<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers;
use App\Models\Agencycontact;
use App\Models\Country;
use App\Models\Hotellist;
use App\Models\Hotelroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;



class HoteListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $hotels = Hotellist::All();
             $hotels = Hotellist::limit(10)->get();

        return view('admin.hotels.index',['hotels'=>$hotels]) ;  

    }

    
    
    public function import(Request $request)
    {
        //   return 'dddd';
        // Validation du fichier d'import
    
    
        try {
            // Import the CSV file
            $request->validate([
                'csv_file' => 'required|mimes:csv,txt'
            ]);
        
            // Récupérer le fichier CSV à partir de la demande
            $file = $request->file('csv_file');
            
            // Ouvrir le fichier CSV
            $handle = fopen($file, "r");
        //  return  fgetcsv($handle, 1000, ",");
            // Parcourir chaque ligne du fichier CSV
            $i=0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Ajouter la logique nécessaire pour importer les données à partir du fichier CSV et les enregistrer dans votre base de données
                // Exemple:Hotelmapping
                //   return $data;
                if($i!=0)
                {
                 $Hote = new Hotellist;
                $Hote->Hotel_Code = $data[0];
                $Hote->Hotel_Name = $data[1];
                $Hote->Address = $data[2];
        //         $Hote->Longitude = $data[3];
        //         $Hote->Latitude = $data[4];
        //         $Hote->Phone = $data[5];
        //         $Hote->CategoryCode = $data[6];
        //         $Hote->CategoryName = $data[7];
        //         $Hote->CityCode = $data[8];
        //         $Hote->City = $data[9];
        //         $Hote->Country_Code = $data[10];
                
        // //   if($data[10]=="")
        //         $Hote->Country = $data[11];
                
        //         $Hote->Zip_Code = $data[12];
        //         $Hote->ChainCode = $data[13];
        //         $Hote->ChainName = $data[14];
    
            //   if($data[10])
            // {
            //       $countries = Country::where('alpha2',$data[10])->first();
            //              if($countries)
            //             $Hote->Country = $countries['nom_en_gb'];
            // }
                //  $chiffre = 'BDC' . str_pad(random_int(1, 9999999), 7, '0', STR_PAD_LEFT);
                //     while (DB::table('hotellists')->where('bdc_id', $chiffre)->exists()) {
                //         $chiffre = 'BDC' . str_pad(random_int(1, 9999999), 7, '0', STR_PAD_LEFT);
                //     }
                // $Hote->bdc_id = $chiffre;
                // $Hote->UnicaId = 0;
                // $Hote->Country = $countries['nom_en_gb'];
                // $sellers = Agencycontact::where('Agency_ID',$data[15])->first();
            //   return $sellers['Agency_Name'];
                //  $Hote->provider_id = $data[15];
              
            //       if($data[14])
            // {
            //     $sellers = Agencycontact::where('Agency_ID',$data[15])->first();
            //     $Hote->provider = $sellers['Agency_Name'];
            // }
            
                // return $data[10];nom_fr_fr
                // $countries = Country::where('alpha2',$data[10])->first();
                // return  $countries;
                // $Hote->bdc_id = $data[1];
                // $Hote->Giata_id = $data[2];
                // $Hote->provider_id = $data[3];
               
         
                
                // $Hote->Zip_Code = $data[9];
                // $Hote->Email = $data[10];
                // $Hote->Country = $data[11];
                // $Hote->Country_Code = $data[12];  
                // $Hote->provider = $data[13];
                
                $Hote->save(); 
                }
        
                $i=$i+1;
            }
        
            // Fermer le fichier CSV
            fclose($handle);
        
            // Rediriger l'utilisateur vers une page de confirmation
            return redirect()->back()
            ->with('status', 'success')
                ->withErrors('Le fichier CSV a été importé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('status', 'error')
                ->withErrors('Importation du fichier CSV échouée : '.$e->getMessage());
        }
        //...
    }
    
    public function export()
    {
        // Récupérez les données que vous souhaitez exporter depuis votre modèle ou votre source de données
// SELECT COUNT(*) AS nbr_doublon, bdc_id FROM hotellists GROUP BY bdc_id HAVING COUNT(*) > 1;
        $data = DB::table('hotellists')
        // ->where('id','>=',532182)
        ->select(DB::raw('COUNT(*) AS nbr_doublon , bdc_id'))
        
         ->groupBy('bdc_id')
        ->having('nbr_doublon', '>', 1)
        ->get();
        // $data  =  Hotellist::All();
    //   return $data ;
        // $data = new Hotellist;
    
        // Convertissez les données en tableau ou en format souhaité pour l'exportation (par exemple, CSV, Excel, etc.)
        $exportData = [];
    
        foreach ($data as $row) {
            $exportData[] = [
            'nbr_doublon' => $row->nbr_doublon,
            // 'Hotel_Code' => $row->Hotel_Code,
            // 'Hotel_Name' => $row->Hotel_Name,
            'bdc_id' => $row->bdc_id,
            // 'provider_id' => $row->provider_id,
            // 'provider' => $row->provider,     
            // 'Address' => $row->Address,
            // 'Longitude' => $row->Longitude,
            // 'Latitude' => $row->Latitude,
            // 'Phone' => $row->Phone,
            // 'CategoryCode' => $row->CategoryCode,
            // 'CategoryName' => $row->CategoryName,
            // 'CityCode' => $row->CityCode,
            // 'City' => $row->City,
            // 'Country_Code' => $row->Country_Code,
            // 'Country' => $row->Country,
            // 'Zip_Code' => $row->Zip_Code,
            // 'ChainCode' => $row->ChainCode,
            // 'ChainName' => $row->ChainName,
           
                // Ajoutez d'autres colonnes si nécessaire
            ];
        }
    
        // Convertissez les données en format CSV en utilisant la fonction de Laravel
        $csvData = $this->convertToCsv($exportData);
    
        // Définissez les en-têtes de la réponse pour indiquer qu'il s'agit d'un fichier CSV à télécharger
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="export.csv"',
        ];
    
        // Retournez la réponse avec les données CSV et les en-têtes
        return Response::make($csvData, 200, $headers);
    }

    private function convertToCsv(array $data)
    {
        $delimiter = ',';
        $enclosure = '"';
        $handle = fopen('php://temp', 'w');
    
        // En-têtes du fichier CSV
        fputcsv($handle, array_keys($data[0]), $delimiter, $enclosure);
    
        // Données du fichier CSV
        foreach ($data as $row) {
            fputcsv($handle, $row, $delimiter, $enclosure);
        }
    
        rewind($handle);
        $csvData = stream_get_contents($handle);
        fclose($handle);
    
        return $csvData;
    }
    
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create') ;  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'Hotel_Code' => 'required',
            'bdc_id' => 'nullable',
            'Giata_id' => 'nullable',
            'provider_id' => 'nullable',
            'Hotel_Name' => 'required',
            'Latitude' => 'nullable',
            'Longitude' => 'nullable',
            'Address' => 'nullable',
            'City' => 'nullable',
            'Zip_Code' => 'nullable',
            'Email' => 'nullable',
            'Country' => 'nullable',
            'Country_Code' => 'nullable',
  
        ]);
    
        Hotellist::create($request->all());
     
        return redirect()->route('hotellist.index')
                        ->with('success','Hotel created successfully.');  
                      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($HotelCode)
    {

        $hotel = Hotellist::where('Hotel_Code',$HotelCode)->first();
        $rooms = Hotelroom::where('Hotel_Code',$HotelCode)->get();
        return view('admin.hotels.hotelrooms.index',compact('rooms','hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotellist $hotellist)
    {
        //dd($hotellist);
        return view('admin.hotels.edit',compact('hotellist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotellist $hotellist)
    {
        $request->validate([
            'Hotel_Code' => 'nullable',
            'bdc_id' => 'nullable',
            'Giata_id' => 'nullable',
            'provider_id' => 'nullable',
            'Hotel_Name' => 'required',
            'Latitude' => 'nullable',
            'Longitude' => 'nullable',
            'Address' => 'nullable',
            'City' => 'nullable',
            'Zip_Code' => 'nullable',
            'Email' => 'nullable',
            'Country' => 'nullable',
            'Country_Code' => 'nullable',
            'provider' => 'required',
            
        ]);
    
        $hotellist->update($request->all());
    
        return redirect()->route('hotellist.index')
                        ->with('success','Hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
 
}
