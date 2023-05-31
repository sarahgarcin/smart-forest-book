<?php

class RadioPage extends Page
{
    public function children()
    {


        $results = [];
        $pages   = [];
        $htmlpage = $this->link();
        $request = Remote::get('https://atlas.smartforests.net/api/v2/pages/find/?html_path='. $htmlpage);
        if ($request->code() === 200) {
            $results = $request->json(false);
            // print_r($results);
        }

        $pages[] = [
            'slug'     => $results->meta->slug,
            'template' => 'radio',
            'model'    => 'radio',
            'content'  => [
                'title'    => $results->title,
                'tags'     => $results->tags ?? 'default',
                'type'     => $results->meta->type ?? 'default',
                'label'     => $results->label ?? 'default',
                'text'     => $results->body ?? 'default',
                'location' => $results->geographical_location ?? 'default',
                'coordinates' => $results->coordinates->coordinates ?? 'default', 
                'cover'    => $results->image->meta->download_url ?? 'default',
                'uuid'     => $results->meta->slug . "2023"
               
            ]
        ];

        return Pages::factory($pages, $this);
    }
}