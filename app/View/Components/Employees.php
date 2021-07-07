<?php

namespace App\View\Components;

use App\Models\Employee;
use Illuminate\View\Component;

class Employees extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $employees = Employee::count();
        return view('components.employees',compact('employees'));
    }
}
