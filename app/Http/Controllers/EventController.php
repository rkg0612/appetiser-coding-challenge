<?php

namespace App\Http\Controllers;

use App\Models\Event;
use DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function getEvents()
    {
        try {
            $event = Event::find(1);
            $startDate = $event->start_date;
            $endDate = $event->end_date;
            $periodEnd = date('Y-m-d', strtotime($endDate . "+ 1 days"));

            $datePeriod = new \DatePeriod(
                new \DateTime($startDate),
                new \DateInterval('P1D'),
                new \DateTime($periodEnd)
            );
            $eventData = [
                'date_range' => date("F j, Y", strtotime($startDate)) . " - " . date("F j, Y", strtotime($endDate)),
                'dates' => []
            ];

            foreach($datePeriod as $key => $value) {
                $eventData['dates'][] = [
                    'has_event' => in_array($value->format('l'), $event->dow),
                    'date' => $value->format('F j D'),
                    'name' => in_array($value->format('l'), $event->dow) ? $event->name : null
                ];
            }

            $status = 'success';
            $message = 'Loaded events successfully!';
            $code = 200;
        } catch (\Exception $e) {
            $eventData = null;
            $status = 'error';
            $message = $e->getMessage();
            $code = 500;
        }
        
        return response()->json([
            'status' => $status,
            'message' => $message,
            'event_data' => $eventData
        ], $code);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data['days_of_week'] = serialize($data['days_of_week']);
        try {
            DB::beginTransaction();
            $event = Event::find(1);
            $event->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Saved events successfully!';
            $code = 200;
        } catch (Exception $e) {
            $status = 'error';
            $message = $e->getMessage();
            $code = 500;
        }
        
        return response()->json([
            'status' => $status,
            'message' => $message
        ], $code);
    }
}
