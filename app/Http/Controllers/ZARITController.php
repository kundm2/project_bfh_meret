<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question as AppQuestion;
use App\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ZARITController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $reports = Report::where('user_id', Auth::user()->id)->get()->sortByDesc('issue_date');
        if (!$reports->isEmpty()) {
            $graphData = $this->getGraphData($reports);
            return view('zarit.zaritIndex', [
                'reports' => $reports,
                'graphData' => $graphData
            ]);
        } else {
            return redirect('zarit/new');
        }
    }

    public function new() {
        $questions = AppQuestion::all();
        return view('zarit.zaritNew', [
            'questions' => $questions
        ]);
    }

    public function addNew(Request $request) {
        $this->validate($request, [
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question4' => 'required',
            'question5' => 'required',
            'question6' => 'required',
            'question7' => 'required',
        ], [
            'required' => 'This question is required.',
        ]);

        $report = new Report();
        $report->issue_date = Carbon::now()->toDateTimeString();
        $report->user_id = Auth::user()->id;
        $report->save();

        $requestAnswers = $request->all();

        for ($i=1; $i <= 7; $i++) {
            $answer = new Answer();
            $answer->report_id = $report->id;
            $answer->question_id = $i;
            switch ( strval( $requestAnswers['question' . strval($i)]) ) {
                case "zero": $answer->answer = 0; break;
                case "0.5": $answer->answer = 0.5; break;
                case "1": $answer->answer = 1; break;
                default: break;
            }
            $answer->save();
        }
        return redirect('zarit');
    }

    public function getGraphData($reports) {
        $retVal = '[';
        foreach ($reports as $report) {
            $retVal .= $report->getScore() . ', ';
        }
        return substr($retVal, 0, -2) . ']';
    }
}
