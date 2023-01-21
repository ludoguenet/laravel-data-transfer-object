<?php

declare(strict_types=1);

namespace App\Enums;

enum PostStatusEnum: string
{
        case DRAFT = 'draft';
        case VALIDATED = 'validated';
        case ONLINE = 'online';

        public function color(): string
        {
            return match ($this) {
                self::DRAFT => 'gray',
                self::VALIDATED => 'purple',
                self::ONLINE => 'green',
            };
        }
}
