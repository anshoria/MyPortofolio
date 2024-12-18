<?php

namespace App\Providers;

use App\Models\Aboutpage;
use App\Models\BackendSkills;
use App\Models\FrontendSkills;
use App\Models\Skills;
use App\Observers\AboutpageObserver;
use App\Observers\BackendSkillsObserver;
use App\Observers\FrontendSkillsObserver;
use App\Observers\SkillsObserver;
use App\Models\Blog;
use App\Models\Comments;
use App\Models\Contact;
use App\Models\Homepage;
use App\Models\Projects;
use App\Observers\BlogObserver;
use App\Observers\CommentsObserver;
use App\Observers\ContactObserver;
use App\Observers\HomepageObserver;
use App\Observers\ProjectsObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Aboutpage::observe(AboutpageObserver::class);
        FrontendSkills::observe(FrontendSkillsObserver::class);
        BackendSkills::observe(BackendSkillsObserver::class);
        Skills::observe(SkillsObserver::class);
        Blog::observe(BlogObserver::class);
        Comments::observe(CommentsObserver::class);
        Projects::observe(ProjectsObserver::class);
        Homepage::observe(HomepageObserver::class);
        Contact::observe(ContactObserver::class);
    }
}
