<?php

class StoryPage extends Page
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
            // print_r($results);
        }

        $pages[] = [
            'slug'     => $results->meta->slug,
            'template' => 'story',
            'model'    => 'story',
            'content'  => [
                'title'    => $results->title,
                'tags'     => $results->tags,
                'type'     => $results->meta->type,
                'label'     => $results->label,
                'text'     => $results->body,
                'contributors' => $results->contributors,
                'location' => $results->geographical_location,
                'coordinates' => $results->coordinates->coordinates, 
                'cover'    => $results->image->meta->download_url
               
            ]
        ];

        return Pages::factory($pages, $this);
    }
}