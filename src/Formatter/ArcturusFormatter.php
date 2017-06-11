<?php

namespace Creator\Formatter;

use Creator\Formatter\Furnidata\XmlFormatter;

class ArcturusFormatter implements FormatterInterface
{
    public $name = 'arcturus';

    public function format(array $input)
    {
        $catalogItems = sprintf("INSERT INTO catalog_items VALUES (%d, %d, %d, '%s', %d, %d, 0, %d, 0, 0, 0, 0, 0, 1, -1);",
            $input['id'],
            $input['pageId'],
            $input['id'],
            $input['swf'],
            $input['credits'],
            $input['points'],
            $input['amount']
        );

        $itemsBase = sprintf("INSERT INTO items_base VALUES (%d, %d, '%s', '%s', 's', %d, %d, 0, 0, %d, %d, 0, 1, 1, 1, 1, 1, 'default', 2, 0, 0, 0, 0);",
            $input['id'],
            $input['id'],
            $input['name'],
            $input['swf'],
            $input['width'],
            $input['length'],
            isset($input['isWalkable']) ? 1 : 0,
            isset($input['isSeatable']) ? 1 : 0
        );

        $furnidata = new XmlFormatter();
        $furnidata = $furnidata->format($input);

        return array_merge([$catalogItems, $itemsBase], $furnidata);
    }
}
