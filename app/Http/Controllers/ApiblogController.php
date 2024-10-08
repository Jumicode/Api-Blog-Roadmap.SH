<?php

namespace App\Http\Controllers;
use App\Models\Apiblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiblogController extends Controller
{
    
    public function index(Request $request)
{
    // Obtenemos el parámetro 'term' de la query string
    $term = $request->query('term');

    // Si 'term' está presente, filtramos por tags
    if ($term) {
        $blogs = Apiblog::whereJsonContains('tags', $term)->get();
    } else {
        // Si no hay filtro, devolvemos todos los blogs
        $blogs = Apiblog::all();
    }

    // Respondemos con los blogs encontrados
    return response()->json([
        'status' => 200,
        'blogs' => $blogs
    ], 200);
}

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:25',
            'content' => 'required|max:500',
            'category' => 'required|max:30',
            'tags' => 'required|array'
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
            'category' => $request->category,
            'tags' => $request->tags
        ]);

        if (!$blogs) {
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
                'message' => 'Data validation error',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'blogs' => $blogs,
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
                'message' => 'Data validation error',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:25',
            'content' => 'required|max:500',
            'category' => 'required|max:15',
            'tags' => 'required|array'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Data validation error',
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
            'message' => 'Successfully done',
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
                'message' => 'Data validation error',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $blogs->delete();

        $data = [
            'message' => 'Successfully done',
            'status' => 204
        ];

        return response()->json($data, 204);
    }

    public function patch(Request $request, $id)
   {
    $blogs = Apiblog::find($id);

    if (!$blogs) {
        $data = [
            'message' => 'Data validation error',
            'status' => 404
        ];
        return response()->json($data, 404);
    }

    $validator = Validator::make($request->all(), [
        'title' => 'required|max:25',
        'content' => 'required|max:500',
        'category' => 'required|max:15',
        'tags' => 'required|array'
    ]);

    if ($validator->fails()) {
        $data = [
            'message' => 'Error',
            'errors' => $validator->errors(),
            'status' => 400
        ];
        return response()->json($data, 400);
    }


    if ($request->has('title')) {
        $blogs->title = $request->title;
    }

    if ($request->has('content')) {
        $blogs->content = $request->content;
    }

    if ($request->has('category')) {
        $blogs->category = $request->category;
    }

    if ($request->has('tags')) {
        $blogs->tags = $request->tags;
    }

    $blogs->save();

    $data = [
        'message' => 'Successfully done',
        '$blogs' => $blogs,
        'status' => 200
    ];

    return response()->json($data, 200);
}
}
