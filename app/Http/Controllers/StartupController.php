<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use App\Models\MasterCivitas;
use App\Models\MasterComponent;
use App\Models\MasterFakultas;
use App\Models\MasterMember;
use App\Models\MasterProgramInkubasi;
use App\Models\MasterProgramStudy;
use App\Models\MasterQuestion;
use App\Models\MasterQuestionRange;
use App\Models\MasterStartup;
use App\Models\MasterUniversitas;
use App\Models\RegistationAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MasterPeriode;

class StartupController extends Controller
{
    public function index(){
        $incubations = MasterProgramInkubasi::all();
        $categories = MasterCategory::all();
        $societies = MasterCivitas::all();
        $universities = MasterUniversitas::all();
        $faculties = MasterFakultas::all();
        $studyPrograms = MasterProgramStudy::all();
        // $questions = MasterQuestion::all();
        // $questionRange=MasterQuestionRange::all();
        $components = MasterComponent::with('periodeProgram.masterPeriode', 'periodeProgram.masterProgramInkubasi','question', 'question.questionRange')->get();
        return view('Startup.daftarStartup', compact(
            'incubations',
            'categories',
            'societies',
            'universities',
            'faculties',
            'studyPrograms',
            'components'));
    }

    public function store(Request $request){
            @dd($request);
            
            MasterStartup::create([
                'ms_startdate'=> Carbon::now(),
                'ms_pks' => $request->programStartup,
                'ms_phone' => $request->kontakStartup,
                'ms_name' => $request->namaStartup,
                'ms_address' => $request->alamat,
                'ms_website' => $request->website,
                'ms_socialmedia' => $request->sosialMedia,      
                'ms_legal' => $request->legalitas,
                'ms_pitchdeck' => $request->pitchDeck,
                'user_id'=>$request->userid,
                'mpd_id'=>'1',
                'ms_status'=>"1",
            ]);
            // dd(MasterStartup::where('ms_name', $request->namaStartup)->first()->get('ms_id'));

        for($i=0; $i< count($request->namaLengkap); $i++){
            MasterMember::create([
                'mm_name' => $request->namaLengkap[$i],
                'mm_nik' => $request->nik[$i],
                'mm_position' => $request->jabatan[$i],
                'mm_phone' => $request->nomorHp[$i],
                'mm_email' => $request->email[$i],
                'mm_nim_nip' => $request->nimNip[$i],
                'mm_socialmedia' => $request->mediaSosial[$i],
                'mu_id' => $request->universitas[$i],
                'mf_id' => $request->fakultas[$i],
                'mps_id' => $request->prodi[$i],
                'mci_id' => $request->civitasTelu[$i],
                'mm_cv' => $request->cv[$i],
                'ms_id' => MasterStartup::where('ms_name', $request->namaStartup)->first()->get('ms_id'),
            ]);
        }

        $score = 0;
        for($i =0; $i < count($request->mqr_id); $i++){
            $point = RegistationAnswer::where('mqr_id', $request->mqr_id[$i])->first()->get('mqr_poin');
            $score += $point;
        }
        

        RegistationAnswer::create([
            'user_id' => $request->userid,
            'ra_score' => $score,
        ]);

    }

    

    public function setInkubasi(Request $request){
        $component = MasterComponent::with('question', 'question.questionRange', 'periodeProgram.masterPeriode', 'periodeProgram.masterProgramInkubasi')->where('mct_id', $request->program_id)->first();
        return response()->json($component);

    }
}
