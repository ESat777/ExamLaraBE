<?php

namespace App\Http\Controllers;

use App\Models\Appli;
use App\Models\Schools;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppliController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != 1)
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 401);

        $applis = Appli::where('user_id', auth()->user()->id)->get();

        $generatedApplis = [];

        foreach ($applis as $appli) {
            $school = Schools::find($appli->school_id);
            $user = User::find($appli->user_id);
            $appli['school_name'] = $school->name;
            $appli['code'] = $school->code;
            $appli['city'] = $school->city;
            $appli['user'] = $user->email;
            // $appli['address'] = $school->address;
            $generatedApplis[] = $appli;
        }

        if ($generatedApplis) {
            return response()->json([
                'success' => true,
                'message' => $generatedApplis
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nepavyko gauti prašymų sąrašo'
            ], 500);
        }
    }

    public function all()
    {
        //Authentification
        if (auth()->user()->role != 0)
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);

        $applis = Appli::all();

        $generatedApplis = [];

        foreach ($applis as $appli) {
            $school = Schools::find($appli->school_id);
            $appli['school_name'] = $school->name;
            $appli['code'] = $school->code;
            $appli['city'] = $school->city;
            $appli['address'] = $school->address;
            $generatedApplis[] = $appli;
        }

        return response()->json([
            'success' => true,
            'message' => $generatedApplis
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'school_id' => 'required'
        ]);


        $school = new Appli();
        $school->school_id = $request->school_id;
        $school->name = $request->name;
        $school->surname = $request->surname;
        $school->student_bd = $request->student_bd;
        $school->student_id = $request->student_id;
        $school->class = $request->class;
        $school->approved = 0;
        $school->user_id = auth()->user()->id;
 

        if ($school->save())
            return response()->json([
                'success' => true,
                'message' => $school->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Nepavyko sukurti prašymo'
            ], 500);
    }

    public function status($id, Request $request)
    {
        //Authentification
        if (auth()->user()->role != 0)
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);

        $school = Appli::find($id);
        if ($school->update(['approved' => $school->approved === 0 ? 1 : 0]))
            return response()->json([
                'success' => true,
                'message' => 'Prašymo statusas sėkmingai pakeistas.'
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Nepavyko pakeisti prašymo statuso.'
            ], 500);
    }

    public function destroy($id, Appli $applis)
    {
        // Authentification
        if (auth()->user()->role != 0)
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);

        $school = Appli::where('id', $id);

        if ($school->delete())
            return response()->json([
                'success' => true,
                'message' => 'Prašymas sėkmingai ištrintas'
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Nepavyko ištrinti prašymo'
            ], 500);
    }

    public function destroyAppli($id, Appli $applis)
    {
        $school = Appli::where('id', $id);

        if ($school->delete())
            return response()->json([
                'success' => true,
                'message' => 'Prašymas sėkmingai ištrintas'
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Nepavyko ištrinti prašymo'
            ], 500);
    }
}

