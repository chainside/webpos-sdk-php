<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentDisputeEndCallback
 *
 *
 * @property string $object_type Type of the object sent in the callback
 * @property string $created_at Date in which the callback was sent
 * @property CallbackPaymentOrder $object 
 * @property string $event Event which triggered the callback
 *
 */
class PaymentDisputeEndCallback extends SdkObject
{

    protected $subObjects = [
        'object' => CallbackPaymentOrder::class
    ];

    public static function schema()
    {
        return Spec::fromJson('
            {
                "rules": [
                    "nullable"
                ],
                "schema": {
                    "created_at": {
                        "rules": [
                            "required"
                        ],
                        "type": "ISO_8601_date"
                    },
                    "event": {
                        "rules": [
                            "required",
                            "equals:payment.dispute.end"
                        ],
                        "type": "string"
                    },
                    "object": {
                        "rules": [],
                        "schema": {
                            "uuid": {
                                "rules": [
                                    "required"
                                ],
                                "type": "uuid"
                            }
                        },
                        "type": "object"
                    },
                    "object_type": {
                        "rules": [
                            "required",
                            "nullable"
                        ],
                        "type": "string"
                    }
                },
                "type": "object"
            }
            
        ');
    }

}