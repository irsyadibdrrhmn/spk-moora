<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Criteria;

class MooraController extends Controller
{
    // Halaman Perhitungan MOORA
    public function index()
    {
        $students = Student::with('evaluations')->get();
        $criteria = Criteria::all();

        // Matriks keputusan (Xij)
        $Xij = [];
        foreach ($criteria as $c) {
            foreach ($students as $s) {
                $eval = $s->evaluations->where('criteria_id', $c->id)->first();
                $Xij[$s->id][$c->id] = $eval ? $eval->score : 0;
            }
        }

        // Normalisasi (Xij*)
        $Xij_star = [];
        foreach ($criteria as $c) {
            $denominator = sqrt(array_sum(array_map(fn($v) => pow($v,2), array_column($Xij, $c->id))));
            foreach ($students as $s) {
                $Xij_star[$s->id][$c->id] = $denominator ? $Xij[$s->id][$c->id] / $denominator : 0;
            }
        }

        // Hitung Yi
        $Yi = [];
        foreach ($students as $s) {
            $benefit = 0;
            $cost = 0;
            foreach ($criteria as $c) {
                if ($c->type == 'benefit') {
                    $benefit += $c->weight * $Xij_star[$s->id][$c->id];
                } else {
                    $cost += $c->weight * $Xij_star[$s->id][$c->id];
                }
            }
            $Yi[$s->id] = $benefit - $cost;
        }

        return view('moora.index', compact('students','criteria','Xij','Xij_star','Yi'));
    }

    // Halaman Perangkingan
    public function ranking()
    {
        $students = Student::with('evaluations')->get();
        $criteria = Criteria::all();

        // Matriks keputusan (Xij)
        $Xij = [];
        foreach ($criteria as $c) {
            foreach ($students as $s) {
                $eval = $s->evaluations->where('criteria_id', $c->id)->first();
                $Xij[$s->id][$c->id] = $eval ? $eval->score : 0;
            }
        }

        // Normalisasi (Xij*)
        $Xij_star = [];
        foreach ($criteria as $c) {
            $denominator = sqrt(array_sum(array_map(fn($v) => pow($v,2), array_column($Xij, $c->id))));
            foreach ($students as $s) {
                $Xij_star[$s->id][$c->id] = $denominator ? $Xij[$s->id][$c->id] / $denominator : 0;
            }
        }

        // Hitung Yi
        $Yi = [];
        foreach ($students as $s) {
            $benefit = 0;
            $cost = 0;
            foreach ($criteria as $c) {
                if ($c->type == 'benefit') {
                    $benefit += $c->weight * $Xij_star[$s->id][$c->id];
                } else {
                    $cost += $c->weight * $Xij_star[$s->id][$c->id];
                }
            }
            $Yi[$s->id] = $benefit - $cost;
        }

        // Ranking
        arsort($Yi);
        $ranking = [];
        $rank = 1;
        foreach ($Yi as $sid => $val) {
            $ranking[] = [
                'student' => $students->where('id',$sid)->first(),
                'score'   => $val,
                'rank'    => $rank++
            ];
        }

        // Convert to collection for blade usage
        $ranking = collect($ranking);

        return view('moora.ranking', compact('ranking', 'criteria'));
    }
}