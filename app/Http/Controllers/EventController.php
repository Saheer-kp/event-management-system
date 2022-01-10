<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Mail\EventInvitationMail;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        $events = Event::when($q, function($query, $q) {
            $query->where('name', 'like', "%$q%")
                  ->orWhere(DB::raw("DATE_FORMAT(start_date, '%M %d, %Y')"), 'like', "%$q%")
                  ->orWhere(DB::raw("DATE_FORMAT(end_date, '%M %d, %Y')"), 'like', "%$q%");
        })
        ->when($fromDate, function($query, $fromDate) {
            $query->where('start_date', '>=', $fromDate);
        })
        ->when($toDate, function($query, $toDate) {
            $query->where('start_date', '<=', $toDate);
        })
        ->paginate(6)->appends(['q' => $q, 'from_date' => $fromDate, 'to_date' => $toDate]);
        
        $request->flash('q', 'from_date', 'to_date');

        return view('pages.event.list',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = new event();
        $event->name = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->created_by = Auth::id();

        DB::transaction(function() use($event) {
            $event->save();

            if($event) {
                $users = User::where('id', '!=', Auth::id())->get();
                $event->eventUsers()->attach($users->pluck('id'));
                foreach ($users as $user) {
                    Mail::to($user->email)->queue(new EventInvitationMail($event, $user));
                }
            }
        });
        
        return redirect()->route('events.show', ['event' => $event->id])->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('pages.event.details', compact('event'));
    }

    public function deleteUser(Event $event, $userId)
    {
        $event->eventUsers()->detach($userId);

        return [
            'success' => true,
            'message' => 'User removed from the event'
        ];
    }

}
