<?php
declare(strict_types=1);

namespace Interfaces\API\Clients\Controllers;

use Domain\Clients\Models\Client;

class DeleteClient
{
    public function __invoke(Client $client)
    {
        $client->delete();

        return response()->json(['message'=>'The client has been deleted.']);
    }
}
