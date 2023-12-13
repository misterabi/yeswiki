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

        // Utiliser la valeur fusionnée
        $etherpadBaseUrl = $this->params->get('etherpad_url');

        // return le html
        return "<iframe frameborder=0 src='" . $etherpadBaseUrl . $this->arguments["url"] . "' height=700 width=100%></iframe>";
    }
}
