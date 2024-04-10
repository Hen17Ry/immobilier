<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'mainImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'apartmentType' => 'required|string',
            'description' => 'required|string',
            'numberOfBeds' => 'required|integer',
            'numberOfShowers' => 'required|integer',
            'area' => 'required|numeric',
            'yourPhoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'firstImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'secondImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thirdImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fourthImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Enregistrer les fichiers téléchargés dans le répertoire de stockage public
        $mainImagePath = $request->file('mainImage')->store('public/images');
        $yourPhotoPath = $request->file('yourPhoto')->store('public/images');
        $firstImagePath = $request->file('firstImage')->store('public/images');
        $secondImagePath = $request->file('secondImage')->store('public/images');
        $thirdImagePath = $request->file('thirdImage')->store('public/images');
        $fourthImagePath = $request->file('fourthImage')->store('public/images');

        // Récupérer les noms des fichiers
        $mainImageName = basename($mainImagePath);
        $yourPhotoName = basename($yourPhotoPath);
        $firstImageName = basename($firstImagePath);
        $secondImageName = basename($secondImagePath);
        $thirdImageName = basename($thirdImagePath);
        $fourthImageName = basename($fourthImagePath);

        // Enregistrer les informations dans la base de données
        $annonce = new Apartment();
        $annonce->mainImage = $mainImageName;
        $annonce->location = $request->input('location');
        $annonce->price = $request->input('price');
        $annonce->apartmentType = $request->input('apartmentType');
        $annonce->description = $request->input('description');
        $annonce->numberOfBeds = $request->input('numberOfBeds');
        $annonce->numberOfShowers = $request->input('numberOfShowers');
        $annonce->area = $request->input('area');
        $annonce->mainImage = $mainImageName;
        $annonce->yourPhoto = $yourPhotoName;
        $annonce->firstImage = $firstImageName;
        $annonce->secondImage = $secondImageName;
        $annonce->thirdImage = $thirdImageName;
        $annonce->fourthImage = $fourthImageName;
        $annonce->save();

        return response()->json(['message' => 'Annonce créée avec succès'], 201);
    }
    
}
