<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tender;
use App\Upload;
use App\Award;
use App\Invoice;
use App\User;

use Illuminate\Support\Facades\DB;


class TenderController extends Controller
{

    public function index()
    {

          $datas = Tender::orderBy('created_at','desc')->where('status','Active')->where('flag','0')->get();
        //  return view('admin.viewtender', compact('datas'))
        //
        return view('admin.viewtender',compact('datas'));


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          'name' => 'required',
          'publishing_date' => 'required',
          'closing_date' => 'required',
          'category' => 'required',
          'status' => 'required',
          // 'document' => 'required|file'

        ]);
        if($request->hasFile('document')){
            // Get filename with the extension
            $filenameWithExt = $request->file('document')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('document')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
           // Upload Image

           $path = $request->file('document')->storeAs('public/tenders', $fileNameToStore);

       }
        else {
            $fileNameToStore = 'no';
        }



   $requestData = $request->all();
   $requestData['document'] = $fileNameToStore;
   if(isset($requestData['vendors'])){
   $requestData['vendors'] = implode(', ',$requestData['vendors']);
 }else{ $requestData['vendors'] = 'null';}
         Tender::create($requestData);
        return redirect()->route('admin.tender.index')
                        ->with('success', 'created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data = Tender::find($id);
        //return view('biodata.detail', compact('biodata'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tender::find($id);
        return view('admin.edit', compact('data'));
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
      $request->validate([
          'name' => 'required',
          'publishing_date' => 'required',
          'closing_date' => 'required',
          'category' => 'required',
          'status' => 'required',
          'document' => 'file'
      ]);
       if($request->hasFile('document')){
          // Get filename with the extension
          $filenameWithExt = $request->file('document')->getClientOriginalName();
          // Get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get just ext
          $extension = $request->file('document')->getClientOriginalExtension();
          // Filename to store
          $fileNameToStore= $filename.'_'.time().'.'.$extension;
         // Upload Image

         $path = $request->file('document')->storeAs('public/tenders', $fileNameToStore);
       }
       else{
           $file = Tender::find($id);
           $fileNameToStore = $file->document;
       }
       if(isset($request->vendors)){
       $vendors = implode(', ',$request->vendors);
     }else{
       $vendors = 'null';
     }
      $data = Tender::find($id);
      $data->name = $request->get('name');
      $data->publishing_date = $request->get('publishing_date');
      $data->closing_date = $request->get('closing_date');
      $data->category = $request->get('category');
      $data->status = $request->get('status');
      $data->document = $fileNameToStore;
      $data->description = $request->get('description');
      $data->vendors = $vendors;
      $data->flag = 0;
      $data->save();
      return redirect()->route('admin.tender.index')
                      ->with('success', 'updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tender::find($id);
        $data->delete();
        return redirect()->route('admin.tender.index')
                        ->with('success', 'deleted successfully');
    }

    public function bids($id){
        $datas = Upload::get()->where('tender_id',$id);

        return view('admin.bids',compact('datas'));
    }

    public function selected(Request $request,$id)
    {
       // dd('jani');
        // $data = Upload::find($id);
        $tender = Tender::find($request->tender_id);
        $tender->status = 'In-progress';
        $tender->save();

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

           $path = $request->file('doc')->storeAs('public/pos', $fileNameToStore);

       }
        else {
            $fileNameToStore = 'no';
        }

        $data = new Award;
        $data->upload_id = $id;
        $data->award_date = $request->adate;
        $data->po = $fileNameToStore;
        $data->save();

        return redirect()->route('admin.tender.index')
                        ->with('success', 'selected successfully');
    }

    public function inProgress(){

        $datas = DB::table('uploads')->join('awards','uploads.id','=','awards.upload_id')
                                    ->join('tenders','uploads.tender_id','=','tenders.id')
                                    ->join('users','uploads.user_id','=','users.id')
                                    ->select('uploads.*','awards.*','tenders.name as tender_name','tenders.document','tenders.category','tenders.status','users.org')
                                    ->where('tenders.status','=','In-progress')
                                    ->get();

        return view('admin.inProgress',compact('datas'));
    }

    public function closed(){

        $datas = DB::table('uploads')->join('awards','uploads.id','=','awards.upload_id')
                                    ->join('tenders','uploads.tender_id','=','tenders.id')
                                    ->join('users','uploads.user_id','=','users.id')
                                    ->select('uploads.*','awards.*','tenders.name as tender_name','tenders.document','tenders.category','tenders.status','users.org')
                                    ->where('tenders.status','=','Closed')
                                    ->get();

        return view('admin.closed',compact('datas'));
    }

    public function showInvoices()
    {
        $datas = Invoice::get();

        return view('admin.showInvoice',compact('datas'));
    }

    public function changeStatus(Request $request,$id)
    {
        $tender = Tender::find($id);
        $tender->status = $request->status;
        $tender->save();

        return redirect()->back();
    }

    public function registered_vendors()
    {
        $datas = User::all();
        return view('admin.vendors',compact('datas'));
    }
    public function vendor_details($id)
    {
        $data = User::find($id);
        $datas_complete = DB::table('uploads')->join('awards','uploads.id','=','awards.upload_id')
               ->join('tenders','uploads.tender_id','=','tenders.id')
               ->select('uploads.*','awards.*','tenders.name as tender_name','tenders.document','tenders.category','tenders.status')
               ->where('uploads.user_id','=',$id)->where('tenders.status','=','Closed')
            //    ->where('uploads.id','=','awards.upload_id')
               ->get();

        $datas_progress = DB::table('uploads')->join('awards','uploads.id','=','awards.upload_id')
               ->join('tenders','uploads.tender_id','=','tenders.id')
               ->select('uploads.*','awards.*','tenders.name as tender_name','tenders.document','tenders.category','tenders.status')
               ->where('uploads.user_id','=',$id)->where('tenders.status','=','In-progress')
            //    ->where('uploads.id','=','awards.upload_id')
               ->get();

        $datas_award = DB::table('uploads')->join('awards','uploads.id','=','awards.upload_id')
                                            ->join('tenders','uploads.tender_id','=','tenders.id')
                                            ->select('uploads.*','awards.*','tenders.name as tender_name','tenders.document','tenders.category')
                                            ->where('uploads.user_id','=',$id)
                                         //   ->where('uploads.id','<>','awards.upload_id')
                                            ->get();


        return view('admin.vendorDetails',compact('data','datas_complete','datas_progress','datas_award'));
    }


    public function select_vendors(Request $request)
    {

        $datas = User::all();

        $org = array();
        $n = 0;

        for($i=0;$i<count($datas);++$i)
        {
            $services = explode(', ',$datas[$i]->service);
            if(in_array($request->cat,$services)){
              $org['data'][$n] = $datas[$i]->org;
              $n = $n + 1 ;
            }
        }
           // dd($org);





        return response()->json($org);

    }
    public function show_draft()
        {
            $datas = Tender::all()->where('flag','1');

            return view('admin.draft',compact('datas'));
        }
        public function post_draft(Request $request)
        {

            // $request->validate([
            //   'name' => 'required',
            //   'publishing_date' => 'required',
            //   'closing_date' => 'required',
            //   'category' => 'required',
            //   'status' => 'required',
            //   'document' => 'required|file'

            // ]);
            if($request->hasFile('document')){
                // dd('john');
                // Get filename with the extension
                $filenameWithExt = $request->file('document')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('document')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
               // Upload Image

               $path = $request->file('document')->storeAs('public/tenders', $fileNameToStore);

           }
            else {
                $fileNameToStore = 'no';
            }

       $requestData = $request->all();
       $requestData['document'] = $fileNameToStore;

       if(isset($requestData['vendors'])){
       $requestData['vendors'] = implode(', ',$requestData['vendors']);
     }else{ $requestData['vendors'] = 'null';}

            $model = new Tender;
            $model->name = $requestData['name'];
            $model->publishing_date = $requestData['publishing_date'];
            $model->closing_date = $requestData['closing_date'];
            $model->category = $requestData['category'];
            $model->document = $requestData['document'];
            $model->status = $requestData['status'];
            $model->description = $requestData['description'];
            $model->vendors = $requestData['vendors'];
            $model->flag = 1;
            $model->save();
            //  Tender::create($requestData);
            // return redirect()->route('admin.tender.index')
            //                 ->with('success', 'created successfully');

           // $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);

            // $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);

            return response()->json(['url'=>url('/admin/tender/create')]);
        }

        public function update_draft(Request $request,$id)
        {
          // $request->validate([
          //     'name' => 'required',
          //     'publishing_date' => 'required',
          //     'closing_date' => 'required',
          //     'category' => 'required',
          //     'status' => 'required',
          //     'document' => 'file'
          // ]);
           if($request->hasFile('document')){
              // Get filename with the extension
              $filenameWithExt = $request->file('document')->getClientOriginalName();
              // Get just filename
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              // Get just ext
              $extension = $request->file('document')->getClientOriginalExtension();
              // Filename to store
              $fileNameToStore= $filename.'_'.time().'.'.$extension;
             // Upload Image

             $path = $request->file('document')->storeAs('public/tenders', $fileNameToStore);
           }
           else{
               $file = Tender::find($id);
               $fileNameToStore = $file->document;
           }
           if(isset($request->vendors)){
           $vendors = implode(', ',$request->vendors);
          }else{
           $vendors = 'null';
          }

          $data = Tender::find($id);

          $data->name = $request->name;
          $data->publishing_date = $request->get('publishing_date');
          $data->closing_date = $request->get('closing_date');
          $data->category = $request->get('category');
          $data->status = $request->get('status');
          $data->document = $fileNameToStore;
          $data->description = $request->get('description');
          $data->vendors = $vendors;
          $data->flag = 1;
          $data->save();


          return response()->json(['url'=>url('/showDraft')]);

        }
}
