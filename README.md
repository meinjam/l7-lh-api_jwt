<h1>JSON Web Token Authentication for Laravel & Lumen</h1>

<h2>Getting Started</h2>
<h3>Step 1: Install Package</h3>
<p><code>composer require tymon/jwt-auth</code></p>
<h3>Step 2: Publish the config</h3>
<p><code>php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"</code></p>
<h3>Step 3: Generate secret key</h3>
<p><code>php artisan jwt:secret</code></p>
<h3>Step 4: Update User model App\User.php </h3>
<p><code>
    <?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
</code></p>
