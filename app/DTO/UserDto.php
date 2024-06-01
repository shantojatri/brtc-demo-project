<?php

namespace App\DTO;

use Illuminate\Http\Request;

class UserDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $status,
        public readonly string $role,
    ) {
    }

    public static function fromArray(array $data)
    {
        return new self(
            name  : $data['name'],
            email : $data['email'],
            phone : $data['phone'],
            status: $data['status'],
            role  : $data['role'],
        );
    }
}
