<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
use GuzzleHttp\Client;
use App\Models\Log;
use App\Models\News;
use App\Models\Image;

class Parse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'url:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse webpage received by url';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // I've set default timezone, because it was impossible to get valid timezone from RSS
        date_default_timezone_set('Europe/Moscow');
        $url = 'http://static.feed.rbc.ru/rbc/logical/footer/news.rss';


        // This is first method of parsing with Guzzle Http
        $client = new Client();
        $res = $client->get($url);
        $log = new Log;
        $log->req_method = 'GET';
        $log->req_url = $url;
        $log->res_code = $res->getStatusCode();
        $log->req_body = $res->getBody();
        $log->save();

        if ($res->getStatusCode() == 200) {
            $str = $res->getBody();
            $xml = simplexml_load_string($str, 'SimpleXMLElement', LIBXML_NOCDATA);

            foreach ($xml->channel->item as $item) {
                // There we check news by GUID, so we prevent duplication
                $temp = News::where('guid', (string) $item->guid)->first();
                if (!$temp) {
                    $news = new News;
                    $news->guid = (string) $item->guid;
                    $news->title = (string) $item->title;
                    $news->link = (string) $item->link;
                    $news->description = (string) $item->description;
                    $news->pubDate = date('Y-m-d H:i:s', strtotime((string) $item->pubDate));
                    if ((string) $item->author != "") {
                        $news->author = (string) $item->author;
                    }
                    $news->save();
                    $news_id = $news->id;
                    
                    if (isset($item->enclosure)) {
                        foreach ($item->enclosure as $enclosure) {
                            $image = new Image;
                            $image->news_id = $news_id;
                            $image->url = (string) $enclosure->attributes()->url;
                            $image->save();
                        }
                    }
                }
            }
        }


        // This is second method of parsing with FeedReader library by Vedmant
        // But, because of ready to use methods we can't get info about request to external link
        // 
        // $f = FeedReader::read($url);
        // foreach ($f->get_items() as $item) {
        //     $temp = News::where('guid', $item->get_id())->first();
        //     if (!$temp) {
        //         $news = new News;
        //         $news->guid = $item->get_id();
        //         $news->title = $item->get_title();
        //         $news->link = $item->get_link();
        //         $news->description = $item->get_description();
        //         $news->pubDate = $item->get_date();
        //         $news->author = $item->get_author();
        //         $news->save();
        //         $news_id = $news->id;
    
        //         foreach ($item->get_enclosures() as $enclosure) {
        //             $image = new Image;
        //             $image->news_id = $news_id;
        //             $image->url = $enclosure->get_link();
        //             $image->save();
        //         }
        //     }
        // }
    }
}
