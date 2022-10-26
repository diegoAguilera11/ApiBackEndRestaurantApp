<?php

declare(strict_types=1);

namespace Dotenv\Repository;

use Dotenv\Repository\Adapter\ReaderInterface;
use Dotenv\Repository\Adapter\WriterInterface;
<<<<<<< Updated upstream
use InvalidArgumentException;
=======
>>>>>>> Stashed changes

final class AdapterRepository implements RepositoryInterface
{
    /**
     * The reader to use.
     *
     * @var \Dotenv\Repository\Adapter\ReaderInterface
     */
    private $reader;

    /**
     * The writer to use.
     *
     * @var \Dotenv\Repository\Adapter\WriterInterface
     */
    private $writer;

    /**
     * Create a new adapter repository instance.
     *
     * @param \Dotenv\Repository\Adapter\ReaderInterface $reader
     * @param \Dotenv\Repository\Adapter\WriterInterface $writer
     *
     * @return void
     */
    public function __construct(ReaderInterface $reader, WriterInterface $writer)
    {
        $this->reader = $reader;
        $this->writer = $writer;
    }

    /**
     * Determine if the given environment variable is defined.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has(string $name)
    {
<<<<<<< Updated upstream
        return '' !== $name && $this->reader->read($name)->isDefined();
=======
        return $this->reader->read($name)->isDefined();
>>>>>>> Stashed changes
    }

    /**
     * Get an environment variable.
     *
     * @param string $name
     *
<<<<<<< Updated upstream
     * @throws \InvalidArgumentException
     *
=======
>>>>>>> Stashed changes
     * @return string|null
     */
    public function get(string $name)
    {
<<<<<<< Updated upstream
        if ('' === $name) {
            throw new InvalidArgumentException('Expected name to be a non-empty string.');
        }

=======
>>>>>>> Stashed changes
        return $this->reader->read($name)->getOrElse(null);
    }

    /**
     * Set an environment variable.
     *
     * @param string $name
     * @param string $value
     *
<<<<<<< Updated upstream
     * @throws \InvalidArgumentException
     *
=======
>>>>>>> Stashed changes
     * @return bool
     */
    public function set(string $name, string $value)
    {
<<<<<<< Updated upstream
        if ('' === $name) {
            throw new InvalidArgumentException('Expected name to be a non-empty string.');
        }

=======
>>>>>>> Stashed changes
        return $this->writer->write($name, $value);
    }

    /**
     * Clear an environment variable.
     *
     * @param string $name
     *
<<<<<<< Updated upstream
     * @throws \InvalidArgumentException
     *
=======
>>>>>>> Stashed changes
     * @return bool
     */
    public function clear(string $name)
    {
<<<<<<< Updated upstream
        if ('' === $name) {
            throw new InvalidArgumentException('Expected name to be a non-empty string.');
        }

=======
>>>>>>> Stashed changes
        return $this->writer->delete($name);
    }
}
