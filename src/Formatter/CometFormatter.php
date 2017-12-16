<?php

namespace Creator\Formatter;

use Creator\Formatter\Furnidata\XmlFormatter;

class CometFormatter implements FormatterInterface
{
    public $name = 'comet';

    public function format(array $input)
    {
        $catalogItems = sprintf("INSERT INTO catalog_items VALUES (%d, %d, %d, '%s', %d, %d, %d, %d, 0, 0, 0, 0, 0, 1, 0, 0, -1);",
            $input['id'],
            $input['pageId'],
            $input['id'],
            $input['swf'],
            $input['credits'],
            $input['snow'],
            $input['pixels'],
            $input['amount'],
            isset($input['vipOnly']) ? 1 : 0
        );

        $itemsBase = sprintf("INSERT INTO furniture VALUES (%d, '%s', '%s', '%s', %d, %d, 0, %d, %d, %d, 1, 1, 1, 1, 1, 'default', 1, 0, 0, 0, 0, 0, 0, 0, -1, %d, '%s', 1, %d, 1, 0);",
            $input['id'],
            $input['name'],
            $input['swf'],
            $input['type'],
            $input['width'],
            $input['length'],
            isset($input['isSeatable']) ? 1 : 0,
            isset($input['isWalkable']) ? 1 : 0,
            $input['id'],
            $input['revision'],
            $input['description'],
            isset($input['isLayable']) ? 1 : 0
        );

        $furnidata = new XmlFormatter();
        $furnidata = $furnidata->format($input);

        return array_merge([$catalogItems, $itemsBase], $furnidata);
    }
}
