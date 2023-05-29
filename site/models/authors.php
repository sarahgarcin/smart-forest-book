<?php

class AuthorsPage extends Page
{
    public function children()
    {
        $results = [];
        $pages   = [];
        $htmlpage = $this->link();
        $request = Remote::get('https://atlas.smartforests.net/api/v2/pages/find/?html_path=/contributors/kate-lewis-hood/');
        if ($request->code() === 200) {
            $results = $request->json(false);
            // print_r($results);
        }

        $pages[] = [
            'slug'     => $results->meta->slug,
            'template' => 'authors',
            'model'    => 'authors',
            'content'  => [
                'title'    => $results->title,
                'subtitle' => $results->byline,
                'bio'      => $results->bio,
            ]
        ];

        return Pages::factory($pages, $this);
    }
}