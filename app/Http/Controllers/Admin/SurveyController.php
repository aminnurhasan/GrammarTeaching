<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanSurvey;

class SurveyController extends Controller
{
    public function index()
    {
        // Mendapatkan jumlah total survey
        $totalSurvey = PertanyaanSurvey::count();

        // Mendapatkan jumlah survey pretest
        $totalPretest = PertanyaanSurvey::where('jenis_survey', 'pertama')->count();

        // Mendapatkan jumlah survey posttest
        $totalPosttest = PertanyaanSurvey::where('jenis_survey', 'kedua')->count();

        return view('admin.survey.index', compact('totalSurvey', 'totalPretest', 'totalPosttest'));
    }

    // Pretest
    public function pretest()
    {
        $surveys = PertanyaanSurvey::where('jenis_survey', 'pertama')->get(); //atau paginate
        return view('admin.survey.pretest.index', compact('surveys'));
    }

    public function createPretest()
    {
        $lastSurvey = PertanyaanSurvey::where('jenis_survey', 'pertama')->orderBy('urutan', 'desc')->first();
        $nextUrutan = ($lastSurvey) ? $lastSurvey->urutan + 1 : 1;

        return view('admin.survey.pretest.create', compact('nextUrutan'));
    }

    public function storePretest(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string', 
            'urutan' => 'nullable|integer|min:1',
        ]);
        
        PertanyaanSurvey::create([
            'pertanyaan' => $request->pertanyaan,
            'urutan' => $request->urutan,
            'jenis_survey' => 'pertama',
        ]);

        return redirect()->route('admin.survey.pretest')->with('success', 'Survey Pretest berhasil ditambahkan.');
    }

    public function showPretest(pertanyaanSurvey $survey)
    {
        return view('admin.survey.pretest.show', compact('survey'));
    }

    public function editPretest(pertanyaanSurvey $survey)
    {
        return view('admin.survey.pretest.edit', compact('survey'));
    }

    public function updatePretest(Request $request, pertanyaanSurvey $survey)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'urutan' => 'nullable|integer|min:1',
        ]);

        $survey->update([
            'pertanyaan' => $request->pertanyaan,
            'urutan' => $request->urutan,
        ]);

        return redirect()->route('admin.survey.pretest')->with('success', 'Survey Pretest berhasil diperbarui.');
    }

    public function destroyPretest(pertanyaanSurvey $survey)
    {
        $survey->delete();
        return redirect()->route('admin.survey.pretest')->with('success', 'Survey Pretest berhasil dihapus.');
    }

    // Posttest
    public function posttest()
    {
        $surveys = PertanyaanSurvey::where('jenis_survey', 'kedua')->get();
        return view('admin.survey.posttest.index', compact('surveys'));
    }

    public function createPosttest()
    {
        $lastSurvey = PertanyaanSurvey::where('jenis_survey', 'kedua')->orderBy('urutan', 'desc')->first();
        $nextUrutan = ($lastSurvey) ? $lastSurvey->urutan + 1 : 1;

        return view('admin.survey.posttest.create', compact('nextUrutan'));
    }

    public function storePosttest(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string', 
            'urutan' => 'nullable|integer|min:1',
        ]);
        
        PertanyaanSurvey::create([
            'pertanyaan' => $request->pertanyaan, 
            'urutan' => $request->urutan, 
            'jenis_survey' => 'kedua', 
        ]);

        return redirect()->route('admin.survey.posttest')->with('success', 'Survey Posttest berhasil ditambahkan.');
    }

    public function showPosttest(pertanyaanSurvey $survey)
    {
        return view('admin.survey.posttest.show', compact('survey'));
    }

    public function editPosttest(pertanyaanSurvey $survey)
    {
        return view('admin.survey.posttest.edit', compact('survey'));
    }

    public function updatePosttest(Request $request, pertanyaanSurvey $survey)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'urutan' => 'nullable|integer|min:1',
        ]);

        $survey->update([
            'pertanyaan' => $request->pertanyaan,
            'urutan' => $request->urutan,
        ]);

        return redirect()->route('admin.survey.posttest')->with('success', 'Survey Posttest berhasil diperbarui.');
    }

    public function destroyPosttest(pertanyaanSurvey $survey)
    {
        $survey->delete();
        return redirect()->route('admin.survey.posttest')->with('success', 'Survey Posttest berhasil dihapus.');
    }
}
