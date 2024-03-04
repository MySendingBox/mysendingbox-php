<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class AccountResource
{
    public function __construct(
        private UserResource $user,
        private CompanyResource $companyResource,
    ) {
    }

    public function getUser(): UserResource
    {
        return $this->user;
    }

    public function getCompanyResource(): CompanyResource
    {
        return $this->companyResource;
    }
}
