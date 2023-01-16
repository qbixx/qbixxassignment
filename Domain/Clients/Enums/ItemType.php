<?php

declare(strict_types=1);

namespace Domain\Clients\Enums;

enum ItemType: string
{
    case Wisdom = 'Wisdom';
    case Philosophy = 'Philosophy';
    case Design = 'Design';
}
