<?php

return [
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'environment' => env('MIDTRANS_ENVIRONMENT', 'sandbox'),
    'api_url' => env('MIDTRANS_API_URL'),

];
