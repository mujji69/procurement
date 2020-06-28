<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tender;
use App\User;
use App\Upload;
use App\Award;
use App\Invoice;
use App\Information;
use App\Item;
use App\Timeline;
use jazmy\FormBuilder\Models\Submission;



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
    public function search(Request $request){
      $keyword = $request->keyword;
      $services = User::find(Auth::id());

      $cate = explode(', ',$services->service);

    $datas = Tender::latest()->where(function ($query) use($keyword) {
        $query->where('name', 'like', '%' . $keyword . '%')
           ->orWhere('category', 'like', '%' . $keyword . '%')
           ->orWhere('publishing_date', 'like', '%' . $keyword . '%')
           ->orWhere('closing_date', 'like', '%' . $keyword . '%');

      })->where('status','Active')->whereIn('category',$cate)->where('flag','0')->paginate(5);
      return view('user.tenderList',compact('datas'))
      ->with('i', (request()->input('page',1) -1)*5)
      ->with('keyword',$keyword);
    }

    public function dashboard_tenders()
    {
      $services = User::find(Auth::id());
      $cate = explode(', ',$services->service);

       $datas = Tender::latest()->where('status','Active')->whereIn('category',$cate)->where('flag','0')->
                          take(3)->get();

       return view('user.dashboard_tenders',compact('datas'));

    }

    public function details($id){

      $check = Upload::where('tender_id',$id)->where('user_id',Auth::id())->get();
      
      $submission = Submission::with('user', 'form')
                          ->where([
                              'tender_id' => $id,

                          ])
                          ->first();
      if($submission != null){
      $form_headers = $submission->form->getEntriesHeader();

      $c = count($form_headers);

      for($i=0;$i<$c;$i++){
        if(
            ($form_headers[$i]['name'] == 'closing_date') ||
            ($form_headers[$i]['name'] == 'category') ||
            ($form_headers[$i]['name'] == 'name') ||
             ($form_headers[$i]['name'] == 'description') ||
                ($form_headers[$i]['name'] == 'publishing_date'))
            {
          unset($form_headers[$i]);
        }

      }
    }
      if($submission != null){
        $data = Tender::find($id);
        return view('user.details',compact('data','submission','form_headers','check'));
      }
      else{
        $data = Tender::find($id);
        return view('user.details',compact('data','check'));
      }

    }

    public function quotation_form($id){
      $data = User::find(Auth::id());
      return view('user.quotation_form',compact('data','id'));
    }

    public function formSubmit(Request $request, $id){


      $data = new Upload;
      $data->user_id = Auth::id();
      $data->tender_id = $id;
      $data->quotation = 'no';
      $data->save();

      $model = new Information;
      $model->user_id = Auth::id();
      $model->tender_id = $id;
      $model->upload_id = $data->id;
      $model->org_name = $request->org;
      $model->address = $request->address;
      $model->phone = $request->contact;
      $model->proposal = $request->description;
      $model->duration = $request->duration;
      $model->price = $request->amount;
      $model->country = $request->country;
      $model->quantity = $request->quantity;
      $model->terms = $request->terms;
      $model->flag = 1;
      $model->save();

      // Items

      $item = $request->item;
      $price = $request->price;
      for($count = 0; $count < count($item); $count++)
      {
       $data = array(
        'information_id' => $model->id,
        'item' => $item[$count],
        'price'  => $price[$count]
       );
       $insert_data[] = $data;
      }

      if($item[0] != null){

        Item::insert($insert_data);

      }

      // Timelme

      $task = $request->task;
      $date = $request->date;
      for($count1 = 0; $count1 < count($task); $count1++)
      {
       $data1 = array(
        'information_id' => $model->id,
        'task' => $task[$count1],
        'date'  => $date[$count1]
       );
       $insert_data1[] = $data1;
      }

      if($task[0] != null)
      {
        Timeline::insert($insert_data1);

      }
      // responses

      $datas = Upload::get()->where('tender_id',$id);

      $t_response = count($datas);

      $response = Tender::find($id);
      $response->responses = $t_response;
      $response->save();

      // end responses

      $services = User::find(Auth::id());
      $cate = explode(', ',$services->service);

       $datas = Tender::latest()->where('status','Active')->whereIn('category',$cate)->where('flag','0')->paginate(5);
       return view('user.tenderList',compact('datas'))
       ->with('i', (request()->input('page',1) -1)*5);


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

            $model = new Upload;
            $model->user_id = Auth::id();
            $model->tender_id = $id;
            $model->quotation = $fileNameToStore;

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
            $model->status = 'In Transit';
            $model->save();

        return redirect()->back()->with('success','submitted successfully');
    }

    public function viewInvoices($id){
      $datas = Invoice::where('tender_id',$id)->where('user_id',Auth::id())->get();

      return view('user.viewInvoice',compact('datas'));
    }

}
