<?php

class Paginator {
    private $totalItems;
    private $itemsPerPage;
    private $currentPage;

    public function __construct($totalItems, $itemsPerPage, $currentPage) {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = max(1, $currentPage);
    }

    public function getTotalPages() {
        return ceil($this->totalItems / $this->itemsPerPage);
    }

    public function getCurrentPage() {
        return $this->currentPage;
    }

    public function hasPrev() {
        return $this->currentPage > 1;
    }

    public function hasNext() {
        return $this->currentPage < $this->getTotalPages();
    }

    public function getPrevPage() {
        return $this->currentPage - 1;
    }
    
    public function getNextPage() {
        return $this->currentPage + 1;
    }

    public function getOffset() {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

    public function getPageRange() {
        $totalPages = $this->getTotalPages();
        $current = $this->currentPage;

        if ($totalPages <= 3) {
            return range(1, $totalPages);
        }

        if ($current <= 2) {
            return [1, 2, 3];
        }

        if ($current >= $totalPages - 1) {
            return [$totalPages - 2, $totalPages - 1, $totalPages];
        }
        return [$current - 1, $current, $current + 1];

    }
}