<?php

namespace App\Http\Controllers\Page;

use App\Http\Data\MovieData;
use App\Http\Controllers\View\ViewController;
use Illuminate\Support\Collection;
use Illuminate\View\View;

abstract class PageController extends ViewController
{
    protected $dataClass = false;

    protected $sort = ['id'];

    protected $viewEntry = '';
    protected $viewList  = '';

    public function showEntry(int $id, string $name='')
    {
        /*
        $entry = $this->loadEntry($id);

        if(!$entry) {
            $view = View('pages.404');
            return response($view, 404);
        }

        if($entry->nameRoute !== $name) {
            return redirect($entry->route);
        }

        return View('pages.' . $this->viewEntry, [
            'entry' => $entry,
            'nav' => $this->getNav(),
        ]);
        */
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
            'nav' => $this->getNav(),
        ]);
    }
}
