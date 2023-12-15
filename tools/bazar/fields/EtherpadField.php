<?php

namespace YesWiki\Bazar\Field;

include '../../../wakka.config.php';

use Psr\Container\ContainerInterface;

/**
 * @Field({"etherpad"})
 */
class EtherpadField extends BazarField
{
    private $urlField;

    protected const FIELD_URL = 3;

    public function __construct(array $values, ContainerInterface $services)
    {
        parent::__construct($values, $services);
        $this->urlField =  $this->getWiki()->config['etherpad_url'] . $values[self::FIELD_URL] ?? '';
    }

    protected function renderInput($entry)
    {
        if ($this->getWiki()->GetMethod() != 'etherpad') {
            $iframeUrl = $this->urlField;
            return $this->render("@bazar/inputs/etherpad.twig", [
                'iframeUrl' => $iframeUrl,
                "iframeParams" => [
                    "width" => "100%",
                    "height" => "600px",
                ],
            ]);
        }
    }

    protected function renderStatic($entry)
    {
        if ($this->getWiki()->GetMethod() == 'bazariframe') {
            return '<a class="btn btn-danger pull-right" href="javascript:window.close();"><i class="fa fa-remove icon-remove icon-white"></i>&nbsp;' . _t('BAZ_CLOSE_THIS_WINDOW') . '</a>';
        }
        if ($this->getWiki()->GetMethod() != 'etherpad') {
            $iframeUrl = $this->urlField;
            return $this->render("@bazar/inputs/etherpad.twig", [
                'iframeUrl' => $iframeUrl,
                "iframeParams" => [
                    "width" => "100%",
                    "height" => "600px",
                ],
            ]);
        }
    }

    public function getUrlField()
    {
        return $this->getWiki()->GetMethod() == 'etherpad' ? $this->getWiki()->GetUrl() : '';
    }

    // change return of this method to keep compatible with php 7.3 (mixed is not managed)
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'urlField' => $this->getUrlField(),
            ]
        );
    }
}
