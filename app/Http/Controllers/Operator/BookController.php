<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;

use App\Models\{Book};

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['currentAdminMenu'] = 'book';

        return view(
            'operator.book.index', //di folder resources
            $this->data
        );
    }

    public function ajax(Request $request)
    {
        $query = Book::orderBy("created_at", "desc");
        
        return Datatables::of($query)
                ->filter(function ($q) use ($request) {
                    if ($request->has('search')) {
                        $searchValue = $request->search['value'];
                        $q->where('name', 'ILIKE', "%$searchValue%");
                    }
                })
                ->editColumn('books.name', function ($row) {
                    return '<h6>
                        '.$row->name.'
                    </h6>
                    <div class="badge badge-success">'.$row->type.'</div>
                    ';
                })
                ->editColumn('books.author_name', function ($row) {
                    return '<h6>
                    '.$row->author_name.'
                    </h6>
                    <div class="badge badge-info">'.$row->year.'</div>
                    ';
                })
                ->addColumn('action', function($row){
                    return '
                        <button class="btn btn-primary btn-action mr-1" 
                            data-toggle="tooltip" title="" data-original-title="Edit"
                            onclick="edit('.$row->id.')">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button  class="btn btn-danger btn-action trigger--fire-modal-2" 
                            data-toggle="tooltip" title="" 
                            data-original-title="Delete"
                            onclick="destroy('.$row->id.')">
                            <i class="fas fa-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['books.name', 'books.author_name', 'action'])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'operator.book.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Book::create(
            [
                'name' => $request['name'],
                'type' => $request['type'],
                'author_name' => $request['author_name'],
                'year' => $request['year']
            ]
        );

        if($create){
            return response()
                ->json([
                    "status" => 200,
                    "message" => "Book Successfully Stored"
                ]);
        }

        return response()
            ->json([
                "status" => 400,
                "message" => "Book Failed to be Stored"
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Book::where("id", $id)->first();
        return view(
            'operator.book.edit',
            compact('data')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Book::where("id", $id)->update(
            [
                'name' => $request['name'],
                'type' => $request['type'],
                'author_name' => $request['author_name'],
                'year' => $request['year']
            ]
        );

        if($update){
            return response()
                ->json([
                    "status" => 200,
                    "message" => "Book Successfully Updated"
                ]);
        }

        return response()
            ->json([
                "status" => 400,
                "message" => "Book Failed to be Updated"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Book::where("id", $id)->first();
        if($data->delete()){
            return response()
                ->json([
                    "status" => 200,
                    "message" => "Book Successfully Deleted"
                ]);
        }

        return response()
            ->json([
                "status" => 400,
                "message" => "Book Failed to be Deleted"
            ]);
    }
}
