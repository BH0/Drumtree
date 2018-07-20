<?php 

//// Item / Drum / Drumkit Controller 

namespace App\Http\Controllers; 

use App\Drum; 
use App\User; // may not need this 

use Illuminate\Support\Facades\Auth; // may not need 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DrumkitController extends Controller { 
    
    public function postCreateDrum(Request $request) { 
        // validation 
        $drum = new Drum(); 
        // * Item name (may include model/manufacturer) 
        $drum->drumname = $request['drumname']; 
        $drum->body = $request['body']; // description 
        $file = $request->file('image'); 
        // $filename = $request['email'] . '-' . $drum->id . '.jpg';  
        $filename = $request['drumname'] . '-' . $drum->drumname . '.jpg'; // "$drum->drumname" xhould become "$drum->id" 
        $drum->image = $filename; // image-path 
        if ($file) { 
            Storage::disk('local')->put($filename, File::get($file)); 
        }       
        // * Price 
        $message = 'There was an error'; 
        if ($request->user()->drums()->save($drum)) { 
            $message = 'Post successfully created'; 
        } 
        return redirect()->route('dashboard')->with(['message' => $message]); 
    } 
    
	public function getDrumImage($filename) { 
		$file = Storage::disk('local')->get($filename);
        return new Response($file, 200);	
	} 

    /// Get Drums View 
    public function getDrums(Request $request) { 
        $drums = Drum::orderBy('created_at', 'desc')->get(); 
		return view('drums', ["drums" => $drums]); 
    }
} 