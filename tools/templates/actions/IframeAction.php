<?php

use YesWiki\Core\YesWikiAction;

class IframeAction extends YesWikiAction
{
    public function formatArguments($arg)
    {
        return [
            'url' => $arg["src"],
        ];
    }

    public function run()
    {
        //return le html
        return "<iframe frameborder=0 src='http://127.0.0.1:9001/p/" . $this->arguments["url"] . "' height=700 width=100%></iframe>";
    }
}
