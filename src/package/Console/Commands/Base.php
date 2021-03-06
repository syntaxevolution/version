<?php

namespace SyntaxEvolution\Version\Package\Console\Commands;

use Illuminate\Console\Command;

class Base extends Command
{
    /**
     * Display the current app version.
     *
     * @param string $format
     */
    public function displayAppVersion($format = 'full')
    {
        $this->info(
            config('app.name').' '.app('syntaxevolution.version')->format($format)
        );
    }

    /**
     * Display the current app version.
     *
     * @param string $type
     *
     * @return bool
     */
    public function checkIfCanIncrement($type)
    {
        if (app('syntaxevolution.version')->isInAbsorbMode($type)) {
            $this->error(
                'Version is in git absorb mode, cannot be incremented'
            );

            return false;
        }

        return true;
    }
}
