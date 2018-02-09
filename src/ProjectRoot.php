<?php

namespace Konsulting;

class ProjectRoot
{
    protected $package;
    protected $parts;
    protected $packageDirectoryKey;

    public function __construct($package)
    {
        $this->package = $package;
    }

    public static function forPackage($package)
    {
        return new static($package);
    }

    public function resolve($path)
    {
        $this->parts = $this->pathParts($path);
        $this->locatePackageDirectory();

        if ($this->packageDirectoryKey === false) {
            throw PackageDirectoryNotFound::make($this->package);
        }

        return $this->projectRoot();
    }

    protected function pathParts($path)
    {
        return explode(DIRECTORY_SEPARATOR, $path);
    }

    protected function locatePackageDirectory()
    {
        $this->packageDirectoryKey = array_search($this->package, $this->parts);
    }

    protected function isADependency()
    {
        return $this->parts[$this->packageDirectoryKey - 2] === 'vendor';
    }

    protected function projectRootPosition()
    {
        return $this->isADependency() ? ($this->packageDirectoryKey - 2) : ($this->packageDirectoryKey + 1);
    }

    protected function projectRoot()
    {
        return implode(DIRECTORY_SEPARATOR, array_slice($this->parts, 0, $this->projectRootPosition()));
    }
}
