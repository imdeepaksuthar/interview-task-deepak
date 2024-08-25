<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GetDataController extends Controller
{
    public function QuerieOne()
    {
        $results = DB::select("
            SELECT
                cm.class_name,
                smm.subject_name,
                MAX(mm.marks) AS highest_marks
            FROM
                marks_master mm
            JOIN
                student_master sm
            ON
                mm.student_id = sm.id
            JOIN
                class_master cm
            ON
                sm.class_id = cm.id
            JOIN
                subject_master smm
            ON
                mm.subject_id = smm.id
            GROUP BY
                cm.class_name,
                smm.subject_name;
        ");

        $resultsTwo = DB::select("
            SELECT
                cm.class_name,
                secm.section_name,
                smm.subject_name,
                MAX(mm.marks) AS highest_marks
            FROM
                marks_master mm
            JOIN
                student_master sm
            ON
                mm.student_id = sm.id
            JOIN
                class_master cm
            ON
                sm.class_id = cm.id
            JOIN
                section_master secm
            ON
                sm.section_id = secm.id
            JOIN
                subject_master smm
            ON
                mm.subject_id = smm.id
            GROUP BY
                cm.class_name,
                secm.section_name,
                smm.subject_name
        ");
        return view('dataview',compact('results','resultsTwo'));
    }


    public function QuerieTwo()
    {
        $results = DB::select("
            SELECT
                sm.student_name,
                cm.class_name,
                secm.section_name,
                COUNT(
                    CASE WHEN mm.marks >= 40 THEN 1
                END
            ) AS passed_subject_count
            FROM
                student_master sm
            JOIN
                class_master cm
            ON
                sm.class_id = cm.id
            JOIN
                section_master secm
            ON
                sm.section_id = secm.id
            JOIN
                marks_master mm
            ON
                sm.id = mm.student_id
            GROUP BY
                sm.id,
                sm.student_name,
                cm.class_name,
                secm.section_name;
        ");
        return view('dataview',compact('results'));
    }

    public function Queriethree()
    {
        $results = DB::select("
            SELECT
                sm.student_name,
                cm.class_name,
                secm.section_name,
                subm.subject_name,
                citym.city_name,
                mm.marks AS top_marks
            FROM
                marks_master mm
            JOIN
                student_master sm
            ON
                mm.student_id = sm.id
            JOIN
                class_master cm
            ON
                sm.class_id = cm.id
            JOIN
                section_master secm
            ON
                sm.section_id = secm.id
            JOIN
                subject_master subm
            ON
                mm.subject_id = subm.id
            JOIN
                city_master citym
            ON
                sm.city_id = citym.id
            JOIN
                (
                SELECT
                    MAX(mm_inner.marks) AS max_marks,
                    mm_inner.subject_id,
                    sm_inner.city_id
                FROM
                    marks_master mm_inner
                JOIN
                    student_master sm_inner
                ON
                    mm_inner.student_id = sm_inner.id
                GROUP BY
                    mm_inner.subject_id,
                    sm_inner.city_id
            ) top_students
            ON
                mm.marks = top_students.max_marks AND mm.subject_id = top_students.subject_id AND sm.city_id = top_students.city_id
            ORDER BY
                citym.city_name,
                subm.subject_name;
        ");
        return view('dataview',compact('results'));
    }

    public function QuerieFour(){
        $results = DB::select("
            SELECT
                sm.student_name,
                cm.class_name,
                secm.section_name,
                citym.city_name
            FROM
                student_master sm
            JOIN
                class_master cm
            ON
                sm.class_id = cm.id
            JOIN
                section_master secm
            ON
                sm.section_id = secm.id
            JOIN
                city_master citym
            ON
                sm.city_id = citym.id
            JOIN
                marks_master mm_english
            ON
                sm.id = mm_english.student_id
            JOIN
                subject_master subm_english
            ON
                mm_english.subject_id = subm_english.id
            JOIN
                marks_master mm_hindi
            ON
                sm.id = mm_hindi.student_id
            JOIN
                subject_master subm_hindi
            ON
                mm_hindi.subject_id = subm_hindi.id
            WHERE
                cm.class_name IN('3rd', '4th') AND subm_english.subject_name = 'English' AND mm_english.marks < 40 AND subm_hindi.subject_name = 'Hindi' AND mm_hindi.marks < 40
            GROUP BY
                sm.student_name,
                cm.class_name,
                secm.section_name,
                citym.city_name;
        ");
        return view('dataview',compact('results'));
    }

    public function QuerieFive(){
        $results = DB::select("
            SELECT
                sm.student_name,
                cm.class_name,
                secm.section_name,
                citym.city_name
            FROM
                student_master sm
            JOIN
                class_master cm
            ON
                sm.class_id = cm.id
            JOIN
                section_master secm
            ON
                sm.section_id = secm.id
            JOIN
                city_master citym
            ON
                sm.city_id = citym.id
            JOIN
                marks_master mm_english
            ON
                sm.id = mm_english.student_id
            JOIN
                subject_master subm_english
            ON
                mm_english.subject_id = subm_english.id
            JOIN
                marks_master mm_hindi
            ON
                sm.id = mm_hindi.student_id
            JOIN
                subject_master subm_hindi
            ON
                mm_hindi.subject_id = subm_hindi.id
            WHERE
                cm.class_name IN('3rd', '4th') AND subm_english.subject_name = 'English' AND mm_english.marks < 40 AND subm_hindi.subject_name = 'Hindi' AND mm_hindi.marks < 40
            GROUP BY
                sm.student_name,
                cm.class_name,
                secm.section_name,
                citym.city_name;
        ");
        return view('dataview',compact('results'));
    }

    public function QuerieSix() {
        $results = DB::select("
            SELECT
                sm.id AS student_id,
                sm.student_name
            FROM
                student_master sm
            JOIN
                marks_master mm1
            ON
                sm.id = mm1.student_id
            JOIN
                subject_master sub1
            ON
                mm1.subject_id = sub1.id
            JOIN
                marks_master mm2
            ON
                sm.id = mm2.student_id
            JOIN
                subject_master sub2
            ON
                mm2.subject_id = sub2.id
            JOIN
                marks_master mm3
            ON
                sm.id = mm3.student_id
            JOIN
                subject_master sub3
            ON
                mm3.subject_id = sub3.id
            WHERE
                sub1.subject_name = 'Maths' AND mm1.marks >= 35 AND sub2.subject_name = 'Hindi' AND mm2.marks >= 35 AND sub3.subject_name = 'Science' AND mm3.marks < 35
            GROUP BY
                sm.id,
                sm.student_name;
        ");
        return view('dataview',compact('results'));
    }

    public function QuerieSeven() {
        $results = DB::select("
            SELECT
                sm.id AS student_id,
                sm.student_name,
                ROUND(
                    SUM(mm.marks) / COUNT(DISTINCT mm.subject_id),
                    2
                ) AS percentage,
                CASE WHEN ROUND(
                    SUM(mm.marks) / COUNT(DISTINCT mm.subject_id),
                    2
                ) BETWEEN 80 AND 100 THEN 'A Grade' WHEN ROUND(
                    SUM(mm.marks) / COUNT(DISTINCT mm.subject_id),
                    2
                ) BETWEEN 70 AND 79 THEN 'B Grade' ELSE 'C Grade'
            END AS grade
            FROM
                student_master sm
            JOIN
                marks_master mm
            ON
                sm.id = mm.student_id
            GROUP BY
                sm.id,
                sm.student_name;
        ");
        return view('dataview',compact('results'));
    }
}
