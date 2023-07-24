<?php

declare(strict_types=1);

namespace Vazaha\Mastodon\Requests;

use Vazaha\Mastodon\Interfaces\ModelInterface;
use Vazaha\Mastodon\Models\OAuthToken;
use Vazaha\Mastodon\Requests\Concerns\PostRequest;

final class CreateOAuthTokenRequest extends Request
{
    use PostRequest;

    public function __construct(
        protected string $clientId,
        protected string $clientSecret,
        protected string $redirectUri = 'urn:ietf:wg:oauth:2.0:oob',
        protected ?string $code = null,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/oauth/token';
    }

    public function getQueryParams(): array
    {
        return [];
    }

    public function getFormParams(): array
    {
        return array_filter([
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUri,
            'grant_type' => $this->getGrantType(),
            'code' => $this->code,
        ]);
    }

    public function createModel(): ModelInterface
    {
        return new OAuthToken();
    }

    protected function getGrantType(): string
    {
        if (isset($this->code)) {
            return 'authorization_code';
        }

        return 'client_credentials';
    }
}
