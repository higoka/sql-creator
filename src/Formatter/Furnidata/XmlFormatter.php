<?php

namespace Creator\Formatter\Furnidata;

use Creator\Formatter\FormatterInterface;

class XmlFormatter implements FormatterInterface
{
    public function format(array $input)
    {
        return [sprintf('
<furnitype id="%d" classname="%s">
    <revision>%d</revision>
    <defaultdir>0</defaultdir>
    <xdim>%d</xdim>
    <ydim>%d</ydim>
    <partcolors/>
    <name>%s</name>
    <description>%s</description>
    <adurl/>
    <offerid>-1</offerid>
    <buyout>0</buyout>
    <rentofferid>-1</rentofferid>
    <rentbuyout>0</rentbuyout>
    <bc>1</bc>
    <excludeddynamic>0</excludeddynamic>
    <customparams/>
    <specialtype>1</specialtype>
    <canstandon>0</canstandon>
    <cansiton>0</cansiton>
    <canlayon>0</canlayon>
    <furniline/>
</furnitype>
        ',
            $input['id'],
            $input['swf'],
            $input['revision'],
            $input['height'],
            $input['length'],
            $input['name'],
            $input['description']
        )];
    }
}
