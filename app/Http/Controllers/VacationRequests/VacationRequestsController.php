<?php

namespace WiderFunnel\Http\Controllers\VacationRequests;

use Auth;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use WiderFunnel\Events\RequestStatusChanged;
use WiderFunnel\Http\Controllers\Controller;
use WiderFunnel\Http\Requests;
use WiderFunnel\VacationRequest;

class VacationRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vacationRequests = VacationRequest::paginate(10);

        return view('requests.index', compact('vacationRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|Requests\RequestRequest $request
     * @return Response
     */
    public function store(Requests\RequestRequest $request)
    {
        $vacationRequest = new VacationRequest($request->only(['start', 'end']));
        $vacationRequest->user()->associate(Auth::user());
        $vacationRequest->save();

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  VacationRequest $vacationRequest
     * @return Response
     */
    public function update(Request $request, $vacationRequest)
    {
        $vacationRequest->status = $request->get('status');
        $vacationRequest->save();

        event(new RequestStatusChanged($vacationRequest));

        return back()->with('message', 'Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  VacationRequest $request
     * @return Response
     */
    public function destroy($request)
    {
        if(!$request->isFromCurrentUser()) {
            return back()->with('message', 'You are not allowed to do this!');
        }

        $request->delete();

        return back();
    }
}
