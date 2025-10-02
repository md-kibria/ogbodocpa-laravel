<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meta extends Component
{
    public $logo;
    public $site_title;
    public $site_description;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // $this->logo = Info::find(1)->logo ? asset('/storage/' . Info::find(1)->logo) : '' ;
        // $this->site_title = Info::find(1)->title;
        // $this->site_description = Info::find(1)->description;
        $this->logo = 'logo.png';
        $this->site_title = 'Ogbodo CPA';
        $this->site_description = 'Ogbodo CPA is a leading accounting firm providing top-notch financial services to businesses and individuals.';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.meta');
    }
}
