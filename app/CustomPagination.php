<?php namespace App;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\SimpleBootstrapThreePresenter ;

class CustomPagination extends SimpleBootstrapThreePresenter
{
    public function __construct(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    public function hasPages()
    {
        return $this->paginator->hasPages() && count($this->paginator->items()) > 0;
    }

    public function render()
    {
        if ($this->hasPages())
        {
            return sprintf(
                '<ul class="pager">%s %s</ul>',
                $this->getPreviousButton("Prev"),
                $this->getNextButton("Next")
            );
        }

        return '';
    }
}