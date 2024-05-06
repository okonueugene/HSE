<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_environment');
        $this->middleware('permission:add_environment');
        $this->middleware('permission:edit_environment');
        $this->middleware('permission:delete_environment');
    }

    public function index()
    {

        $concerns = Environment::all();

        return view('admin/environment_concerns')->with('concerns', $concerns);
    }

    public function environmentalPolicyChecklist()
    {
        return view('admin/environmental_policy_checklist');
    }

    public function storeFreeForm(Request $request)
    {

        $rules = [
            'type' => 'required',
            'comment' => 'required',
            'project_manager' => 'required',
            'auditor' => 'required',
            'status' => 'required',
        ];

        $messages = [
            'type.required' => 'Type is required',
            'project_manager.required' => 'Project Manager is required',
            'auditor.required' => 'Auditor is required',
            'status.required' => 'Status is required',
            'comments.required' => 'Comment is required',
        ];
        $this->validate($request, $rules, $messages);

        $environment = new Environment();
        $environment->user_id = auth()->user()->id;
        $environment->type = $request->input('type');
        $environment->comments = $request->input('comments');
        $environment->project_manager = $request->input('project_manager');
        $environment->auditor = $request->input('auditor');
        $environment->status = $request->input('status');

        $environment->save();

        return response()->json([
            'data' => $environment
            , 200,
        ]);
    }

    public function storeCheckList(Request $request)
    {

        // return response()->json($request->all());
        $rules = [
            'checklist' => 'required',
            'comments' => 'required',
            'project_manager' => 'required',
            'auditor' => 'required',
        ];

        $messages = [
            'checklist.required' => 'Checklist is required',
            'project_manager.required' => 'Project Manager is required',
            'auditor.required' => 'Auditor is required',
            'status.required' => 'Status is required',
        ];
        $this->validate($request, $rules, $messages);

        $corrective_actions = json_decode($request->input('corrective_action'), true);
        $checklist = json_decode($request->input('checklist'), true);

        $environment = new Environment();
        $environment->user_id = auth()->user()->id;
        $environment->checklist = $checklist;
        $environment->type = "Checklist";
        $environment->comments = $request->input('comments');
        $environment->corrective_actions = $corrective_actions;
        $environment->project_manager = $request->input('project_manager');
        $environment->auditor = $request->input('auditor');

        $environment->save();

        return response()->json([
            'data' => $environment
            , 200,
        ]);
    }

}
