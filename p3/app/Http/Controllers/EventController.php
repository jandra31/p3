<?php

namespace App\Http\Controllers;

use Illuminate\HTTP\Request;


class EventController extends Controller
{
    public function get_results(){
        return 'results go here';
    }

    public function add_event(Request $request){

        $request->validate([
            'event_name' => 'required|alpha_num',
            'due_date' => 'required|after_or_equal:today',
            'event_description' => 'max:500',
            'event_type' => 'required',
        ]);

        dump($request->all());
        if($request->session()->get('results')==null){
            $rawData = file_get_contents(database_path('/events.json'));
            $events = json_decode($rawData,true);
            foreach ($events as $event){
                $arrayResults[$event['id']]= $event;
            }
        }
        else{
            $arrayResults = [];
        }

        return view('result')->with([
            'date'=>date("m/d/Y"),
            'filter'=> $request -> session()->get('filter',''),
            'results'=> $request -> session()->get('results',$arrayResults),
        ]);
    }

    public function home(){
        return view('home');
    }

    public function result(Request $request){

        if($request->session()->get('results')==null){
            $rawData = file_get_contents(database_path('/events.json'));
            $events = json_decode($rawData,true);
            foreach ($events as $event){
                $arrayResults[$event['id']]= $event;
            }
        }
        else{
            $arrayResults = [];
        }

        return view('result')->with([
            'date'=>date("m/d/Y"),
            'filter'=> $request -> session()->get('filter',''),
            'results'=> $request -> session()->get('results',$arrayResults),
        ]);

    }

    public function filter_results(Request $filter){
        #code fol filter
        $arrayResults = [];

        $filterVal = $filter->input('FILTER',null);
        if ($filterVal){
            $rawData = file_get_contents(database_path('/events.json'));
            $events = json_decode($rawData,true);
            foreach ($events as $event){
                if ($filterVal=='P') {
                    $today = date("Y-m-d");
                    if ($event['due_date']>$today){
                        $arrayResults[$event['id']]= $event;
                    }
                }
                elseif ($filterVal=='D') {
                    $today = date("Y-m-d");
                    if ($event['due_date']<$today){
                        $arrayResults[$event['id']]= $event;
                    }
                }
                elseif ($filterVal=='M') {
                    if ($event['event_type']=='monthly'){
                        $arrayResults[$event['id']]= $event;
                    }
                }
                elseif ($filterVal=='1') {
                    if ($event['event_type']=='one time'){
                        $arrayResults[$event['id']]= $event;
                    }
                }
                elseif ($filterVal=='O') {
                    if ($event['event_type']=='other'){
                        $arrayResults[$event['id']]= $event;
                    }
                }
            }
        }
        else {
            $rawData = file_get_contents(database_path('/events.json'));
            $events = json_decode($rawData,true);
            foreach ($events as $event){
                $arrayResults[$event['id']]= $event;
            }
        }
        return redirect('/result')->with([
           'filter' => $filterVal,
           'results' => $arrayResults,
        ]);
    }
}
