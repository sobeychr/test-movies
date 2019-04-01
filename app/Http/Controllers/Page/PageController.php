<?php

namespace App\Http\Controllers\Page;

use App\Http\Data\MovieData;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class PageController extends BaseController
{
    protected $dataClass = false;

    protected $sort = ['id'];

    protected $viewEntry = '';
    protected $viewList  = '';
    protected $viewType  = '';

    public function showEntry(int $id, string $name='')
    {
        try {
            $entry = $this->dataClass::where('id', $id)->firstOrFail();
        }
        catch(ModelNotFoundException $exception) {
            $view = View('errors.404', [
                'title' => $this->viewType . ' not found',
                'description' => $this->viewType . ' not found',
            ]);
            return response($view, 404);
        }

        $route = $entry->getRoute();
        if(!$name || strpos($route, $name) === false) {
            return redirect($route);
        }
        
        return View('pages.' . $this->viewEntry, [
            'entry' => $entry,
        ]);
    }
   
    public function showList():string
    {
        $cmd = [];
        foreach($this->sort as $field)
        {
            $cmd[] = 'orderBy("'.$field.'")';
        }
        eval('$list = $this->dataClass::' . implode('->', $cmd) . ';');

        return View('pages.' . $this->viewList, [
            'type' => $this->viewType,
            'list' => $list->get(),
        ]);
    }
}
