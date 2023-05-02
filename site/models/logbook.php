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
            // print_r($results);
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
            'template' => 'story',
            'model'    => 'story',
            'content'  => [
                'title'    => $results->title,
                'label'     => $results->label,
                'tags'     => $results->tags,
                'contributors' => $results->contributors,
                'type'     => $results->meta->type,
                'description' => $results->description,
                'articles'  => $results_children->items,
                // 'text'  => $results->body,
                // 'text'     => $results->body,
                // 'headline' => $existing->headline,
                // 'byline'   => $existing->byline,
                // 'summary'  => $existing->summary_short,
                // 'date'     => $existing->publication_date,
                // 'link'     => $existing->link->url,
                // 'linkText' => $existing->link->suggested_link_text,
                // 'cover'    => $existing->multimedia->src
            ]
        ];

        return Pages::factory($pages, $this);
    }
}