<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * Transaction Object
 *
 * Bitcoin transaction paying a payment order
 *
 * @property \Illuminate\Support\Collection $outs Transaction's outputs
 * @property string $status Transaction's status
 * @property string $normalized_txid Transaction's normalized id
 * @property integer $outs_sum Paying amount of the transaction
 * @property string $txid Transaction's id
 * @property string $created_at 
 * @property string $blockchain_status Transaction's internal status
 *
 */
class Transaction extends SdkObject
{

    protected $subObjects = [
            "outs" => Out::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"outs": {"rules": ["required"], "elements": {"schema": {"n": {"type": "integer", "rules": ["required"]}, "amount": {"type": "integer", "rules": ["required"]}}, "type": "object", "rules": []}, "type": "array"}, "status": {"type": "string", "rules": ["required", "in:unconfirmed,confirmed,reverted"]}, "normalized_txid": {"type": "string", "rules": ["len:64", "required"]}, "outs_sum": {"type": "integer", "rules": ["required"]}, "txid": {"type": "string", "rules": ["len:64", "required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "blockchain_status": {"type": "string", "rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"]}}, "type": "object", "rules": []}');
    }

}