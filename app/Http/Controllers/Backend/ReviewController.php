<?php

namespace App\Http\Controllers\Backend;

use App\Models\Listing;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public $listing;
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    public function index($id)
    {
      $review = $this->listing->find($id)->rel_review;
      return view('backend.listing.review.index')->with('allreview',$review);
    }

    public function create()
    {
        return view();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
