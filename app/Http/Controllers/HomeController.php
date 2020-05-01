<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tender;
use App\User;
use App\Upload;
use App\Award;
use App\Invoice;

use Illuminate\Support\Facades\DB;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function list()
    {
        $services = User::find(Auth::id());
        $cate = explode(', ',$services->service);

         $datas = Tender::latest()->where('status','Active')->whereIn('category',$cate)->where('flag','0')->paginate(5);
         return view('user.tenderList',compact('datas'))
         ->with('i', (request()->input('page',1) -1)*5);
       // return view('user.tenderList');
    }

    public function submit(Request $request, $id){


        if($request->hasFile('doc')){
            // Get filename with the extension
            $filenameWithExt = $request->file('doc')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('doc')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
           // Upload Image

           $path = $request->file('doc')->storeAs('public/quotations', $fileNameToStore);

       }
        else {
            $fileNameToStore = 'no';
        }
        if($request->has('quotationText')){
          $text = $request->quotationText;
        }else{
          $text = 'empty';
        }
            $model = new Upload;
            $model->user_id = Auth::id();
            $model->tender_id = $id;
            $model->quotation = $fileNameToStore;
            $model->quotationText = $text;
            $model->save();

            $datas = Upload::get()->where('tender_id',$id);
            $response = Tender::find($id);
            $response->responses = count($datas);
            $response->save();

        return redirect()->back()->with('success','submitted successfully');

    }

    public function personal()
    {
        if(Auth::check()){
        $data = User::find(Auth::id());
        return view('user.edit_profile',compact('data'));
        }
    }

    public function progress()
    {

        // $datas = Award::with('uploads')->where('user_id',Auth::id());
       $datas_progress = DB::table('uploads')->join('awards','uploads.id','=','awards.upload_id')
       ->join('tenders','uploads.tender_id','=','tenders.id')
       ->select('uploads.*','awards.*','tenders.name as tender_name','tenders.document','tenders.category','tenders.status')
       ->where('uploads.user_id','=',Auth::user()->id)->where('tenders.status','=','In-progress')
    //    ->where('uploads.id','=','awards.upload_id')
       ->get();

// dd($datas);

        return view('user.progress',compact('datas_progress'));
    }


    public function complete()
    {

        // $datas = Award::with('uploads')->where('user_id',Auth::id());
       $datas_complete = DB::table('uploads')->join('awards','uploads.id','=','awards.upload_id')
       ->join('tenders','uploads.tender_id','=','tenders.id')
       ->select('uploads.*','awards.*','tenders.name as tender_name','tenders.document','tenders.category','tenders.status')
       ->where('uploads.user_id','=',Auth::user()->id)->where('tenders.status','=','Closed')
    //    ->where('uploads.id','=','awards.upload_id')
       ->get();

// dd($datas);

        return view('user.complete',compact('datas_complete'));
    }


    public function award()
    {

        // $datas = Award::with('uploads')->where('user_id',Auth::id());
       $datas_award = DB::table('uploads')->join('awards','uploads.id','=','awards.upload_id')
                                    ->join('tenders','uploads.tender_id','=','tenders.id')
                                    ->select('uploads.*','awards.*','tenders.name as tender_name','tenders.document','tenders.category')
                                    ->where('uploads.user_id','=',Auth::user()->id)
                                 //   ->where('uploads.id','<>','awards.upload_id')
                                    ->get();



        return view('user.award',compact('datas_award'));
    }

    public function uploads()
    {
        $datas = Upload::get()->where('user_id',Auth::id());


        return view('user.uploads',compact('datas'));
    }

    public function invoice(Request $request, $id)
    {

        if($request->hasFile('invoice')){

            // Get filename with the extension
            $filenameWithExt = $request->file('invoice')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('invoice')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
           // Upload Image

           $path = $request->file('invoice')->storeAs('public/invoices', $fileNameToStore);

       }
        else {
            $fileNameToStore = 'no';
        }

            $model = new Invoice;
            $model->user_id = Auth::id();
            $model->tender_id = $id;
            $model->invoice = $fileNameToStore;
            $model->save();

        return redirect()->back()->with('success','submitted successfully');
    }

}
