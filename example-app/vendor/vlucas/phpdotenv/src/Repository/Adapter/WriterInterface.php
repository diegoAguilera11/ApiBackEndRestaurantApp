<?php

declare(strict_types=1);

namespace Dotenv\Repository\Adapter;

interface WriterInterface
{
    /**
     * Write to an environment variable, if possible.
     *
<<<<<<< Updated upstream
     * @param non-empty-string $name
     * @param string           $value
=======
     * @param string $name
     * @param string $value
>>>>>>> Stashed changes
     *
     * @return bool
     */
    public function write(string $name, string $value);

    /**
     * Delete an environment variable, if possible.
     *
<<<<<<< Updated upstream
     * @param non-empty-string $name
=======
     * @param string $name
>>>>>>> Stashed changes
     *
     * @return bool
     */
    public function delete(string $name);
}
