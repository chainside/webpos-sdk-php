<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * Transaction Object
 *
 * Bitcoin transaction paying a payment order
 *
 * @property string $status Transaction's status
 * @property string $normalized_txid Transaction's normalized id
 * @property string $txid Transaction's id
 * @property string $blockchain_status Transaction's internal status
 * @property string $created_at 
 * @property \Illuminate\Support\Collection $outs Transaction's outputs
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
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"status": {"type": "string", "rules": ["required", "in:unconfirmed,confirmed,reverted"]}, "normalized_txid": {"type": "string", "rules": ["len:64", "required"]}, "txid": {"type": "string", "rules": ["len:64", "required"]}, "blockchain_status": {"type": "string", "rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "outs": {"type": "array", "rules": ["required"], "elements": {"type": "object", "rules": [], "schema": {"n": {"type": "integer", "rules": ["required"]}, "amount": {"type": "integer", "rules": ["required"]}}}}, "outs_sum": {"type": "integer", "rules": ["required"]}}}');
    }

}