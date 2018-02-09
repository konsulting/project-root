<?php

namespace Konsulting;

use Exception;

class PackageDirectoryNotFound extends Exception
{
    public static function make($package)
    {
        return new static("Unable to locate package directory '{$package}' in path");
    }
}
