<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer) 
    {
        $listing = $offer->listing;
        $this->authorize('update', $offer->listing);
        // accept offer
        $offer->update(['accepted_at' => now()]);

        $offer->listing->sold_at = now();
        $listing->save();

        // reject remaining offers
        $listing->offers()->except($offer)
            ->update(['rejected_at' => now()]);

        return redirect()->back()->with(
            'success', 
            "Offer #{$offer->id} accepted, other offers rejected"
        );
    }
}
