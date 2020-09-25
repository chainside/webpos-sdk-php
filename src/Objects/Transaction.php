<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * Transaction Object
 *
 * Bitcoin transaction paying a payment order
 *
 * @property string $blockchain_status Transaction's internal status
 * @property string $normalized_txid Transaction's normalized id
 * @property integer $outs_sum Paying amount of the transaction
 * @property \Illuminate\Support\Collection $outs Transaction's outputs
 * @property string $status Transaction's status
 * @property string $created_at 
 * @property string $txid Transaction's id
 *
 */
class Transaction extends SdkObject
{

    protected $subObjects = [
            "outs" => Out::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "outs": {"rules": ["required"], "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}, "type": "array"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}');
    }

}