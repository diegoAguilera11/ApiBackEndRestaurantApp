<?php

declare(strict_types=1);

namespace Dotenv\Repository\Adapter;

use PhpOption\Option;
use PhpOption\Some;

final class ServerConstAdapter implements AdapterInterface
{
    /**
     * Create a new server const adapter instance.
     *
     * @return void
     */
    private function __construct()
    {
        //
    }

    /**
     * Create a new instance of the adapter, if it is available.
     *
     * @return \PhpOption\Option<\Dotenv\Repository\Adapter\AdapterInterface>
     */
    public static function create()
    {
        /** @var \PhpOption\Option<AdapterInterface> */
        return Some::create(new self());
    }

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
    public function read(string $name)
    {
        /** @var \PhpOption\Option<string> */
        return Option::fromArraysValue($_SERVER, $name)
<<<<<<< Updated upstream
            ->filter(static function ($value) {
                return \is_scalar($value);
            })
=======
>>>>>>> Stashed changes
            ->map(static function ($value) {
                if ($value === false) {
                    return 'false';
                }

                if ($value === true) {
                    return 'true';
                }

<<<<<<< Updated upstream
                /** @psalm-suppress PossiblyInvalidCast */
                return (string) $value;
=======
                return $value;
            })->filter(static function ($value) {
                return \is_string($value);
>>>>>>> Stashed changes
            });
    }

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
    public function write(string $name, string $value)
    {
        $_SERVER[$name] = $value;

        return true;
    }

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
    public function delete(string $name)
    {
        unset($_SERVER[$name]);

        return true;
    }
}
