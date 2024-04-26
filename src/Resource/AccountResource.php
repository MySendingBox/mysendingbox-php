<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class AccountResource
{
    private UserResource $user;
    private CompanyResource $companyResource;

    public function __construct(
        UserResource $user,
        CompanyResource $companyResource
    ) {
        $this->companyResource = $companyResource;
        $this->user = $user;
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
