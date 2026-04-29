<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property string $uid
 * @property string $number
 * @property string $name
 * @property string $barcode
 * @property int $bale_qty
 * @property string $price
 * @property int $qty_available
 * @property string $weight
 * @property string $bin_loc
 * @property string $photo_uri
 * @property string $uri
 */
class Item extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'number' => true,
        'name' => true,
        'barcode' => true,
        'bale_qty' => true,
        'price' => true,
        'qty_available' => true,
        'weight' => true,
        'bin_loc' => true,
        'photo_uri' => true,
        'uri' => true,
    ];
}
