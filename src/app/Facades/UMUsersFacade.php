<?php
namespace Untrefmedia\UMUsers;
use Illuminate\Support\Facades\Facade;
/**
 * @see \Spatie\Skeleton\SkeletonClass
 */
class UMUsersFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'umusers';
    }
}
