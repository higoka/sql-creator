<?php

namespace Creator\Formatter;

use Creator\Formatter\Furnidata\XmlFormatter;

class PlusFormatter implements FormatterInterface
{
    public $name = 'plus';

    public function format(array $input)
    {
        $catalogItems = sprintf("INSERT INTO catalog_items VALUES (%d, %d, %d, '%s', %d, %d, %d, %d, 0, 0, 1, 0, 0, -1);",
            $input['id'],
            $input['pageId'],
            $input['id'],
            $input['swf'],
            $input['credits'],
            $input['pixels'],
            $input['diamonds'],
            $input['amount']
        );

        $furniture = sprintf("INSERT INTO furniture VALUES (%d, '%s', '%s', 's', %d, %d, 1, 1, %d, %d, %d, 1, 1, 1, 1, 1, 'default', 0, 2, 0, 0, 0, 0, 0, 0, 0);",
            $input['id'],
            $input['swf'],
            $input['name'],
            $input['width'],
            $input['length'],
            isset($input['isSeatable']) ? 1 : 0,
            isset($input['isWalkable']) ? 1 : 0,
            $input['id']
        );

        $furnidata = new XmlFormatter();
        $furnidata = $furnidata->format($input);

        return array_merge([$catalogItems, $furniture], $furnidata);
    }
}
