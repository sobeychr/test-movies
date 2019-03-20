<?php

namespace App\Http\Controllers;

use App\Http\Data\PageData;
use Illuminate\View\View;

class PageController extends Controller
{
    protected $data = [];
    protected $dataClass = false;
    protected $file = '';

    protected $viewEntry = '';
    protected $viewList  = '';

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
        ]);
    }
   
    public function showList():View
    {
        $list = $this->loadFile();
        return View('pages.' . $this->viewList, [
            'list' => $list,
        ]);
    }

    protected function loadEntry(int $id)
    {
        $data = $this->loadFile();
        $filter = array_filter($data, function(PageData $entry) use ($id) {
            return $entry->id === $id;
        });
        return $filter[0] ?? null;
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
