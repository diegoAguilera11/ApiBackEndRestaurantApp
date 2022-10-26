<?php

declare(strict_types=1);

namespace Dotenv\Repository\Adapter;

interface ReaderInterface
{
    /**
     * Read an environment variable, if it exists.
     *
<<<<<<< Updated upstream
     * @param non-empty-string $name
=======
     * @param string $name
>>>>>>> Stashed changes
     *
     * @return \PhpOption\Option<string>
     */
    public function read(string $name);
}
