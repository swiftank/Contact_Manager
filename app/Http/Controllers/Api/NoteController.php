<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $note = Note::create($request->all());

      return response()->json([
        'status' => true,
        'message' => 'Note Created Successfully',
        'contact' => $note
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => false,
        'message' => "Something went wrong. Please try after some time."
      ]);
    }
  }
}
