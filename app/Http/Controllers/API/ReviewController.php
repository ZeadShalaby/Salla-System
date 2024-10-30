<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ReviewController extends Controller
{

    // ?todo return all reviews
    public function index(Request $request)
    {
        try {
            $reviews = Review::with('product', 'user')->get();
            return $this->returnSuccessMessage($reviews, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo return one review
    public function show(Review $review)
    {
        try {
            return $this->returnSuccessMessage($review, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }


    // ?todo create new review
    public function store(Request $request)
    {
        try {
            $review = Review::create($request->all());
            return $this->returnSuccessMessage($review, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }


    // ?todo edit review
    public function edit(Review $review)
    {
        try {
            return $this->returnSuccessMessage($review, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo update review
    public function update(Request $request, Review $review)
    {
        try {
            $review = $review->update($request->all());
            return $this->returnSuccessMessage("update success", "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo delete review
    public function destroy(Review $review)
    {
        try {
            $review->delete();
            return $this->returnSuccessMessage("delete Review success", "D000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }

    }

    // ?todo search product by comment || star
    public function search(Request $request)
    {
        try {
            $resultSearch = Review::whereAny(['comment', 'star'], 'like', '%' . $request->search . '%')->get();
            return $this->returnSuccessMessage($resultSearch, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }
}
