<?php
/**
 * Created by PhpStorm.
 * User: sawyerlancer
 * Date: 09.02.2019
 * Time: 18:57
 */


class YouTubeHelper
{
    private $url;
    const YOU_TUBE_DEFAULT_LINK = 'https://www.youtube.com/';
    const YOU_TUBE_SHORT_LINK = 'https://youtu.be/';
    const YOU_TUBE_EMBED_LINK = 'https://www.youtube.com/embed/';
    const WATCH_V = 'watch?v=';
    private $message;
    private $str_position;

    public function putUrl (string $url)
    {
        if ( $this->checkUrl ($url) ) {
            $this->Init ($url);
        } else {
            return $this->message;
        }

        return $this->url;
    }

    public function getUrl ()
    {
        return $this->urlReplace ();
    }

    private function Init ($url)
    {
        $this->url = $url;
    }

    private function checkUrl ($url)
    {

        if ( strlen ($url) == 0 ) {
            $this->message = 'url is empty';
            return false;
        }

        if ( stristr ($url, self::YOU_TUBE_DEFAULT_LINK) === false ) {
            $this->message = 'Not YouTube url';
            return false;
        }

        /*if ( stristr ($url, self::YOU_TUBE_SHORT_LINK) === false ) {
            $this->message = 'Not YouTube url';
            return false;
        }*/

        return true;
    }

    private function urlReplace ()
    {
        $this->url = str_replace (self::WATCH_V, '', $this->url);

        $this->str_position = stripos($this->url,'&list');
        $this->url = mb_substr($this->url,0,$this->str_position);

        $this->url = str_replace (self::YOU_TUBE_DEFAULT_LINK,
            self::YOU_TUBE_EMBED_LINK,
            $this->url);

        $this->url = str_replace (self::YOU_TUBE_SHORT_LINK,
            self::YOU_TUBE_EMBED_LINK,
            $this->url);

        return $this->url;
    }

}