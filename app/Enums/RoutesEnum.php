<?php

declare(strict_types=1);

namespace App\Enums;

class RoutesEnum
{
    /**
     * @string
     */
    public const ADMIN_INDEX_CLIENTS = 'admin.clients.index';

    /**
     * @string
     */
    public const ADMIN_CREATE_CLIENT = 'admin.clients.create';

    /**
     * @string
     */
    public const ADMIN_STORE_CLIENT = 'admin.clients.store';

    /**
     * @string
     */
    public const ADMIN_EDIT_CLIENT = 'admin.clients.edit';

    /**
     * @string
     */
    public const ADMIN_UPDATE_CLIENT = 'admin.clients.update';

    /**
     * @string
     */
    public const ADMIN_DELETE_CLIENT = 'admin.clients.destroy';

    /**
     * @string
     */
    public const ADMIN_EDIT_ITEM = 'admin.items.edit';

    /**
     * @string
     */
    public const ADMIN_UPDATE_ITEM = 'admin.items.update';

    /**
     * @string
     */
    public const FRONT_WELCOME = 'front.welcome';

    /**
     * @string
     */
    public const FRONT_SHOW_CLIENT = 'front.clients.show';

    /**
     * @string
     */
    public const BASE_UPDATE_LOCALE = 'base.locale.update';
}
