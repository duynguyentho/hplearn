<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Course;
use App\Models\ProgramUser;
use App\Models\User;
use App\Notifications\ProcessMailNotification;
use App\Notifications\SendMailNewStudent;
use Illuminate\Http\Request;
use Mail;
use Str;
use Hash;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = User::query()->where('role', config('roles.user'))->orderByDesc('id')->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        DB::beginTransaction();
        try {
            $password = Str::random(8);

            $student = User::query()->create(array_merge($request->all(), [
                'password' => Hash::make($password),
            ]));

            $student->notify(new SendMailNewStudent($student, $password));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendMailProcess($id)
    {

        $student = User::query()->with(['courses', 'programs'])->find($id);
        $results = ProgramUser::query()
        ->select([
            'course_id',
            DB::raw('COUNT(course_id) as total'),
        ])
            ->with('course')
            ->whereUserId($id)
            ->whereIn('course_id', $student->courses->pluck('id'))
            ->groupBy('course_id')
            ->get();

            $results2 = DB::table('courses')
            ->selectRaw(DB::raw('COUNT(programs.id) as programs_count, courses.id as course_id'))
            ->join('lessons', 'courses.id', '=', 'lessons.course_id')
            ->join('programs', 'lessons.id', '=', 'programs.lesson_id')
            ->groupBy('courses.id')
            ->get();

            $results2->each(function ($item) use ($results) {
                $results->each(function ($item2) use ($item) {
                    if ($item->course_id == $item2->course_id) {
                        $item->learned = $item2->total;
                        $item->learned_percent = round($item2->total / $item->programs_count * 100, 2);
                        $item->course_name = $item2->course->name;
                    }
                });
            });

            $student->notify(new ProcessMailNotification($student, $results2));

        return redirect()->route('students.index');
    }
}
