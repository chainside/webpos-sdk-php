<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentDisputeStartCallback
 *
 *
 * @property string $event Event which triggered the callback
 * @property string $created_at Date in which the callback was sent
 * @property string $object_type Type of the object sent in the callback
 * @property CallbackPaymentOrder $object 
 *
 */
class PaymentDisputeStartCallback extends SdkObject
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
                            "equals:payment.dispute.start"
                        ],
                        "type": "string"
                    },
                    "object": {
                        "rules": [],
                        "schema": {
                            "address": {
                                "rules": [
                                    "regex:^(bc1|[13]|tb1|[2nm]|bcrt)[a-zA-HJ-NP-Z0-9]{25,40}$",
                                    "required"
                                ],
                                "type": "string"
                            },
                            "amount": {
                                "rules": [
                                    "decimal",
                                    "required"
                                ],
                                "type": "string"
                            },
                            "btc_amount": {
                                "rules": [
                                    "required"
                                ],
                                "type": "integer"
                            },
                            "callback_url": {
                                "rules": [
                                    "regex[https_url]:^https://",
                                    "required"
                                ],
                                "type": "url"
                            },
                            "cancel_url": {
                                "rules": [
                                    "regex[https_url]:^https://",
                                    "required"
                                ],
                                "type": "url"
                            },
                            "chargeback_date": {
                                "rules": [
                                    "required",
                                    "nullable"
                                ],
                                "type": "ISO_8601_date"
                            },
                            "continue_url": {
                                "rules": [
                                    "regex[https_url]:^https://",
                                    "required"
                                ],
                                "type": "url"
                            },
                            "created_at": {
                                "rules": [
                                    "required"
                                ],
                                "type": "ISO_8601_date"
                            },
                            "created_by": {
                                "rules": [
                                    "required"
                                ],
                                "schema": {
                                    "active": {
                                        "rules": [],
                                        "type": "boolean"
                                    },
                                    "deposit_account": {
                                        "rules": [
                                            "required"
                                        ],
                                        "schema": {
                                            "name": {
                                                "rules": [
                                                    "required"
                                                ],
                                                "type": "string"
                                            },
                                            "type": {
                                                "rules": [
                                                    "in:bank,bitcoin",
                                                    "required"
                                                ],
                                                "type": "string"
                                            },
                                            "uuid": {
                                                "rules": [
                                                    "required"
                                                ],
                                                "type": "uuid"
                                            }
                                        },
                                        "type": "object"
                                    },
                                    "name": {
                                        "rules": [
                                            "required"
                                        ],
                                        "type": "string"
                                    },
                                    "type": {
                                        "rules": [
                                            "required",
                                            "in:web,mobile"
                                        ],
                                        "type": "string"
                                    },
                                    "uuid": {
                                        "rules": [
                                            "required"
                                        ],
                                        "type": "uuid"
                                    }
                                },
                                "type": "object"
                            },
                            "currency": {
                                "rules": [
                                    "required"
                                ],
                                "schema": {
                                    "name": {
                                        "rules": [
                                            "required"
                                        ],
                                        "type": "string"
                                    },
                                    "type": {
                                        "rules": [
                                            "in:crypto,fiat",
                                            "required"
                                        ],
                                        "type": "string"
                                    },
                                    "uuid": {
                                        "rules": [
                                            "required"
                                        ],
                                        "type": "uuid"
                                    }
                                },
                                "type": "object"
                            },
                            "details": {
                                "rules": [
                                    "required",
                                    "nullable"
                                ],
                                "type": "string"
                            },
                            "dispute_start_date": {
                                "rules": [
                                    "required",
                                    "nullable"
                                ],
                                "type": "ISO_8601_date"
                            },
                            "expiration_time": {
                                "rules": [
                                    "required"
                                ],
                                "type": "ISO_8601_date"
                            },
                            "expires_in": {
                                "rules": [
                                    "required"
                                ],
                                "type": "integer"
                            },
                            "rate": {
                                "rules": [
                                    "required"
                                ],
                                "schema": {
                                    "created_at": {
                                        "rules": [
                                            "required"
                                        ],
                                        "type": "ISO_8601_date"
                                    },
                                    "from": {
                                        "rules": [],
                                        "type": "string"
                                    },
                                    "source": {
                                        "rules": [
                                            "required"
                                        ],
                                        "type": "string"
                                    },
                                    "to": {
                                        "rules": [],
                                        "type": "string"
                                    },
                                    "value": {
                                        "rules": [
                                            "decimal",
                                            "required"
                                        ],
                                        "type": "string"
                                    }
                                },
                                "type": "object"
                            },
                            "redirect_url": {
                                "rules": [
                                    "regex[https_url]:^https://",
                                    "required"
                                ],
                                "type": "url"
                            },
                            "reference": {
                                "rules": [
                                    "nullable",
                                    "required"
                                ],
                                "type": "string"
                            },
                            "required_confirmations": {
                                "rules": [
                                    "required"
                                ],
                                "type": "integer"
                            },
                            "resolved_at": {
                                "rules": [
                                    "required",
                                    "nullable"
                                ],
                                "type": "ISO_8601_date"
                            },
                            "state": {
                                "rules": [
                                    "required"
                                ],
                                "schema": {
                                    "blockchain_status": {
                                        "rules": [
                                            "in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback",
                                            "required"
                                        ],
                                        "type": "string"
                                    },
                                    "in_confirmation": {
                                        "rules": [
                                            "required",
                                            "nullable"
                                        ],
                                        "schema": {
                                            "crypto": {
                                                "rules": [
                                                    "required"
                                                ],
                                                "type": "integer"
                                            },
                                            "fiat": {
                                                "rules": [
                                                    "required",
                                                    "decimal"
                                                ],
                                                "type": "string"
                                            }
                                        },
                                        "type": "object"
                                    },
                                    "paid": {
                                        "rules": [
                                            "required",
                                            "nullable"
                                        ],
                                        "schema": {
                                            "crypto": {
                                                "rules": [
                                                    "required"
                                                ],
                                                "type": "integer"
                                            },
                                            "fiat": {
                                                "rules": [
                                                    "required",
                                                    "decimal"
                                                ],
                                                "type": "string"
                                            }
                                        },
                                        "type": "object"
                                    },
                                    "status": {
                                        "rules": [
                                            "in:pending,paid,cancelled,expired,network_dispute,chargeback",
                                            "required"
                                        ],
                                        "type": "string"
                                    },
                                    "unpaid": {
                                        "rules": [
                                            "required",
                                            "nullable"
                                        ],
                                        "schema": {
                                            "crypto": {
                                                "rules": [
                                                    "required"
                                                ],
                                                "type": "integer"
                                            },
                                            "fiat": {
                                                "rules": [
                                                    "required",
                                                    "decimal"
                                                ],
                                                "type": "string"
                                            }
                                        },
                                        "type": "object"
                                    }
                                },
                                "type": "object"
                            },
                            "transactions": {
                                "elements": {
                                    "rules": [],
                                    "schema": {
                                        "blockchain_status": {
                                            "rules": [
                                                "required",
                                                "in:mempool,unconfirmed,confirmed,reverted"
                                            ],
                                            "type": "string"
                                        },
                                        "created_at": {
                                            "rules": [
                                                "required"
                                            ],
                                            "type": "ISO_8601_date"
                                        },
                                        "normalized_txid": {
                                            "rules": [
                                                "len:64",
                                                "required"
                                            ],
                                            "type": "string"
                                        },
                                        "outs": {
                                            "elements": {
                                                "rules": [],
                                                "schema": {
                                                    "amount": {
                                                        "rules": [
                                                            "required"
                                                        ],
                                                        "type": "integer"
                                                    },
                                                    "n": {
                                                        "rules": [
                                                            "required"
                                                        ],
                                                        "type": "integer"
                                                    }
                                                },
                                                "type": "object"
                                            },
                                            "rules": [
                                                "required"
                                            ],
                                            "type": "array"
                                        },
                                        "outs_sum": {
                                            "rules": [
                                                "required"
                                            ],
                                            "type": "integer"
                                        },
                                        "status": {
                                            "rules": [
                                                "required",
                                                "in:unconfirmed,confirmed,reverted"
                                            ],
                                            "type": "string"
                                        },
                                        "txid": {
                                            "rules": [
                                                "len:64",
                                                "required"
                                            ],
                                            "type": "string"
                                        }
                                    },
                                    "type": "object"
                                },
                                "rules": [
                                    "required",
                                    "nullable"
                                ],
                                "type": "array"
                            },
                            "uri": {
                                "rules": [
                                    "required"
                                ],
                                "type": "string"
                            },
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