<?php

namespace App\Http\Controllers\Page;

use App\Http\Data\PageData;
use App\Http\Controllers\View\ViewController;
use Illuminate\View\View;

abstract class PageController extends ViewController
{
    protected $data = [];
    protected $dataClass = false;
    protected $file = '';

    protected $viewEntry = '';
    protected $viewList  = '';

    abstract protected function sortList($a, $b):int;

    public function showEntry(int $id, string $name='')
    {
        $entry = $this->loadEntry($id);

        if(!$entry) {
            return View('pages.404');
        }

        if($entry->nameRoute !== $name) {
            return redirect($entry->route);
        }

        return View('pages.' . $this->viewEntry, [
            'entry' => $entry,
            'nav' => $this->getNav(),
        ]);
    }
   
    public function showList():View
    {
        $list = $this->loadFile();
        usort($list, [$this, 'sortList']);
        return View('pages.' . $this->viewList, [
            'list' => $list,
            'nav'  => $this->getNav(),
        ]);
    }

    protected function loadEntry(int $id)
    {
        $data = $this->loadFile();
        $filter = array_filter($data, function(PageData $entry) use ($id) {
            return $entry->id === $id;
        });
        return array_shift($filter);
    }

    protected function loadFile():array
    {
        if(!$this->data) {
            $jsonPath = './../database/json/' . $this->file . '.json';
            $jsonStr = file_get_contents($jsonPath);
            $jsonArr = json_decode($jsonStr, true);
            
            $list = [];
            foreach($jsonArr as $entry)
            {
                $list[] = new $this->dataClass($entry);
            }
            $this->data = $list;
        }
        return $this->data;
    }
}
