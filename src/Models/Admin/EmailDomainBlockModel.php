<?php

/*
 * This file is auto generated! Do not edit!
 */

declare(strict_types=1);

namespace Vazaha\Mastodon\Models\Admin;

use DateTimeInterface;
use Vazaha\Mastodon\Models\Model;

/**
 * Represents an email domain that cannot be used to sign up.
 */
class EmailDomainBlockModel extends Model
{
    /**
     * The ID of the EmailDomainBlock in the database.
     */
    public string $id;

    /**
     * The email domain that is not allowed to be used for signups.
     */
    public string $domain;

    /**
     * When the email domain was disallowed from signups.
     */
    public DateTimeInterface $created_at;

    /**
     * Usage statistics for given days (typically the past week).
     *
     * @var array<mixed>
     */
    public array $history;
}
