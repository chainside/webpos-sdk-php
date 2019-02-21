<?php

return [

    'webpos' => [
        'mode' => env('CHAINSIDE_PAY_MODE', 'live'),
        'client_id' => env('CHAINSIDE_PAY_CLIENT_ID'),
        'secret' => env('CHAINSIDE_PAY_SECRET')
    ]

];