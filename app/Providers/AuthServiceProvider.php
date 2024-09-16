<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\Tutor;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('control-course', function (Tutor $user, $course) {
            if (is_object($course) && get_class($course) == Course::class) {
                return $course->tutors()->wherePivot('tutor_id', $user->phone)->exists();
            } else {
                return DB::table('teach')->where('tutor_id', $user->phone)->where('course_id', $course)->exists();
            }
        });

        Gate::define('control-lecture', function (Tutor $user, $lecture) {
            if (is_object($lecture) && get_class($lecture) == Lecture::class) {
                $lecture->load('course');
                return Gate::allows('control-course', $lecture->course);
            } else {
                return false;
            }
        });
    }
}
