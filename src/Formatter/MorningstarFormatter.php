<?php

namespace Creator\Formatter;

use Creator\Formatter\Furnidata\XmlFormatter;

class MorningstarFormatter implements FormatterInterface
{
    public $name = 'morningstar';

    public function format(array $input)
    {
        $catalogItems = sprintf("INSERT INTO catalog_items (id, page_id, item_ids, catalog_name, cost_credits, cost_points, amount) VALUES (%d, %d, %d, '%s', %d, %d, %d);",
            $input['id'],
            $input['pageId'],
            $input['id'],
            $input['swf'],
            $input['credits'],
            $input['points'],
            $input['amount']
        );

        $itemsBase = sprintf("INSERT INTO items_base (id, sprite_id, public_name, item_name, type, width, length, allow_walk, allow_sit) VALUES (%d, %d, '%s', '%s', '%s', %d, %d, %d, %d);",
            $input['id'],
            $input['id'],
            $input['name'],
            $input['swf'],
            $input['type'],
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
