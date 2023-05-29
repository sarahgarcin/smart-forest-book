<?php

class LogbookPage extends Page
{
    public function children()
    {
        $results = [];
        $pages   = [];
        // $htmlpage = "/stories/digital-technologies-and-conservation-surveillance/";
        // print($this->link());
        $htmlpage = $this->link();
        $request = Remote::get('https://atlas.smartforests.net/api/v2/pages/find/?html_path='. $htmlpage);
        if ($request->code() === 200) {
            $results = $request->json(false);
            //print_r($results);
            $id = $results->id;
            // print($id);
            $request_children = Remote::get('https://atlas.smartforests.net/api/v2/pages/?type=logbooks.LogbookEntryPage&fields=*&child_of='.$id);
            if ($request_children->code() === 200) {
                $results_children = $request_children->json(false);
                // print_r($results_children);
            }
        }

        $pages[] = [
            'slug'     => $results->meta->slug,
            'template' => 'logbook',
            'model'    => 'logbook',
            'content'  => [
                'title'    => $results->title,
                'label'     => $results->label ?? 'default',
                'tags'     => $results->tags ?? 'default',
                'contributors' => $results->contributors ?? 'default',
                'type'     => $results->meta->type ?? 'default',
                'description' => $results->description ?? 'default',
                'articles'  => $results_children->items ?? 'default',
                'added' => $results->meta->first_published_at ?? 'default',
            ]
        ];

        return Pages::factory($pages, $this);
    }
}