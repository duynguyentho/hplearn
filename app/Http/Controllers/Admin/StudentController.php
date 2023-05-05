<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\ProgramUser;
use App\Models\User;
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

        $results = DB::table('courses')
            ->selectRaw(DB::raw('COUNT(programs.id) as programs_count, courses.id as course_id'))
            ->join('lessons', 'courses.id', '=', 'lessons.course_id')
            ->join('programs', 'lessons.id', '=', 'programs.lesson_id')
            ->groupBy('courses.id')
            ->get();

        foreach ($student->courses as $course) {
            foreach ($results as $rs) {
                if ($rs->course_id == $course->id) {
                    $course->program_count = $rs->programs_count;

                    $learned = ProgramUser::query()
                        ->whereUserId($id)
                        ->whereHas('le')
                        ->count();
                }
            }
        }

        return redirect()->route('students.index');
    }
}
