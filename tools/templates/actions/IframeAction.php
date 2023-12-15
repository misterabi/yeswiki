<?php

use YesWiki\Core\YesWikiAction;

class IframeAction extends YesWikiAction
{
    public function formatArguments($arg)
    {
        return [
            'url' => $arg["src"],
            'optionnel_url' => $arg["url"],
        ];
    }

    public function run()
    {
        // Utiliser la valeur fusionnée
        $optionnel_url = $this->arguments["optionnel_url"];
        $url = null;
        if ($optionnel_url != " ") {
            $url = str_replace(' ', '', $optionnel_url);
        } else {
            $url = $this->params->get('etherpad_url') . $this->arguments["url"];
        }
        // return le html
        return "<iframe frameborder=0 src='" . $url . "' height=700 width=100%></iframe>";
    }
}
