<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmsTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SmsTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sms_templates= SmsTemplate::latest()->paginate(10);
        return view('admin.sms.index', compact('sms_templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'type' => 'required|unique:sms_templates,type',
            'content' => 'content'
        ]);
        // $request->validate([
        //     'type' => 'required|unique:sms_templates,type',
        //     'content' => 'content'
        // ]);

        $smsTemplate= new SmsTemplate();

        $smsTemplate->type= $request->type;
        $smsTemplate->content= $request->content;
        $smsTemplate->status= 1;

        $smsTemplate->save();

        $smsTemplate ? flashSuccess('SMS Template Created!') : flashError('Something went wrong...');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsTemplate $smsTemplate)
    {
        //
        $sms_templates= SmsTemplate::latest()->paginate(10);
        return view('admin.sms.index', compact('smsTemplate','sms_templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsTemplate $smsTemplate)
    {
        // dd($smsTemplate);
        $request->validate([
            'content' => 'required',
        ]);

        $smsTemplate->content = $request->content;
        $edited = $smsTemplate->save();

        $edited ? flashSuccess('SMS Template Updated!') : flashSuccess('Something went wrong...');

        return redirect()->route('smsTemplate.edit', $smsTemplate->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // change sms template status
    public function changeStatus(Request $request) {
        $smsTemplate = SmsTemplate::findOrFail($request->id);
        $smsTemplate->status = $request->status;
        $smsTemplate->save();

        if ($request->status == 1) {
            return responseSuccess('Template Activated Successfully');
        } else {
            return responseSuccess('Template Deactivated Successfully');
        }
    }
}
