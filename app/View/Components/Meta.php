<?php

namespace App\View\Components;

use App\Models\Info;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meta extends Component
{
    public $logo;
    public $site_title;
    public $site_description;
    public $seo_description;
    public $seo_keywords;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->logo = Info::find(1)->logo ? asset('/storage/' . Info::find(1)->logo) : '' ;
        $this->site_title = Info::find(1)->title;
        $this->site_description = Info::find(1)->description;
        $this->seo_description = Info::find(1)->seo_description;
        $this->seo_keywords = Info::find(1)->seo_keywords;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.meta');
    }
}
