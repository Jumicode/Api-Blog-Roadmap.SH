<?php

namespace App\Http\Controllers;
use App\Models\Apiblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiblogController extends Controller
{
    
    public function index()
    {
     $blogs = Apiblog::All();


     $data = [
        'blogs' => $blogs,
        'status' => 200
     ];


     return response()->json($data, 200);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:25',
            'content' => 'required|max:500',
            'category' => 'required|max:15',
            'tags' => 'required|max:100'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error ',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $blogs = Apiblog::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->caterogy,
            'tags' => $request->tags
        ]);

        if (!$student) {
            $data = [
                'message' => 'Error ',
                'status' => 400
            ];
            return response()->json($data, 400);
        }

      
     $data = [
        'blogs' => $blogs,
        'status' => 201
     ];


        return response()->json($data, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blogs = Apiblog::find($id);

        if (!$blogs) {
            $data = [
                'message' => 'Error',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'student' => $blogs,
            'status' => 200
        ];

        return response()->json($data, 200); 
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blogs = Apiblog::find($id);

        if (!$blogs) {
            $data = [
                'message' => 'Error',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:25',
            'content' => 'required|max:500',
            'category' => 'required|max:15',
            'tags' => 'required|max:100'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }


        $blogs->title = $request->title;
        $blogs->content = $request->content;
        $blogs->category = $request->category;
        $blogs->tags = $request->tags;

        $blogs->save();

        $data = [
            'message' => 'Success',
            '$blogs' => $blogs,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blogs = Apiblog::find($id);

        if (!$blogs) {
            $data = [
                'message' => 'Error',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $student->delete();

        $data = [
            'message' => 'Delete',
            'status' => 204
        ];

        return response()->json($data, 204);
    }
}
