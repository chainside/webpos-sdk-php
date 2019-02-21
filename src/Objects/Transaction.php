<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * Transaction Object
 *
 * Bitcoin transaction paying a payment order
 *
 * @property string $txid Transaction's id
 * @property string $normalized_txid Transaction's normalized id
 * @property string $status Transaction's status
 * @property string $blockchain_status Transaction's internal status
 * @property \Illuminate\Support\Collection $outs Transaction's outputs
 * @property string $created_at 
 * @property integer $outs_sum Paying amount of the transaction
 *
 */
class Transaction extends SdkObject
{

    protected $subObjects = [
            "outs" => Out::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"txid": {"rules": ["len:64", "required"], "type": "string"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "outs": {"elements": {"schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}, "rules": [], "type": "object"}, "rules": ["required"], "type": "array"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "outs_sum": {"rules": ["required"], "type": "integer"}}, "rules": [], "type": "object"}');
    }

}